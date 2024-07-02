<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeluargaAnggota;
class KeluargaAnggotaController extends Controller
{
    public function index(Request $request)
    {
        return KeluargaAnggota::where('anggota_id', $request->anggota_id)->get();
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'id' => 'nullable',
            // 'anggota_id' => 'required',
            // 'nama' => 'required',
            // 'tamat_jabatan' => 'required',
            // 'no_sprin_awal' => 'required',
            // 'satuan_kerja_id' => 'required'
        ]);

        if($validated['id']) 
        {
            $model = KeluargaAnggota::find($validated['id']);
            $model->update($request->except('id'));
            return $model;
        }
        return KeluargaAnggota::create($request->all());
    }

    public function delete(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required'
        ]);

        $model = KeluargaAnggota::findOrFail($validated['id']);
        $model->delete();
        return $model;
    }

    public function upload(Request $request)
    {

        $validated = $request->validate([
            'id' => 'required',
            'file_buku_nikah' => 'nullable'
        ]);

        $data = [];
        $names = [
            'file_buku_nikah'
        ];
        
        $model = KeluargaAnggota::findOrFail($validated['id']);

        foreach($names as $name)
        {
            if($request->hasFile($name))
            {
                $file = $request->file($name);
                $hashname = $file->hashName();
                $path = $request->file($name)->storeAs("keluarga-anggota", $hashname, "public_upload");
                $data[$name] = $path;
            }
            
        }

        return $model->update($data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendidikanAnggota;

class PendidikanAnggotaController extends Controller
{
    public function index(Request $request)
    {
        return PendidikanAnggota::where('anggota_id', $request->anggota_id)->get();
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
            $model = PendidikanAnggota::find($validated['id']);
            $model->update($request->except('id'));
            return $model;
        }

        $model = PendidikanAnggota::create($request->all());
        return $model;
    }

    public function delete(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required'
        ]);

        $model = PendidikanAnggota::findOrFail($validated['id']);
        $model->delete();
        return $model;
    }

    public function upload(Request $request)
    {

        $validated = $request->validate([
            'id' => 'required',
            'file_akreditasi' => 'nullable',
            'file_ijazah' => 'nullable',
            'file_transkrip_nilai' => 'nullable'
        ]);

        $data = [];
        $names = [
            'file_akreditasi',
            'file_ijazah',
            'file_transkrip_nilai'
        ];
        
        $model = PendidikanAnggota::findOrFail($validated['id']);

        foreach($names as $name)
        {
            if($request->hasFile($name))
            {
                $file = $request->file($name);
                $hashname = $file->hashName();
                $path = $request->file($name)->storeAs("pendidikan-anggota", $hashname, "public_upload");
                $data[$name] = $path;
            }
            
        }

        return $model->update($data);
    }
}

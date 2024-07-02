<?php

namespace App\Http\Controllers;

use App\Models\JabatanAnggota;
use Illuminate\Http\Request;

class JabatanAnggotaController extends Controller
{
    public function index(Request $request)
    {
        return JabatanAnggota::with('satuan_kerja')->where('anggota_id', $request->anggota_id)->get();
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'id' => 'nullable',
            'anggota_id' => 'required',
            'nama' => 'required',
            'tamat_jabatan' => 'required',
            'no_sprin_awal' => 'required',
            'satuan_kerja_id' => 'required'
        ]);

        $jabatan_anggota = [];

        if($validated['id']) 
        {
            $jabatan_anggota = JabatanAnggota::find($validated['id']);
            $jabatan_anggota->update($validated);
            return $jabatan_anggota;
        }

        $jabatan_anggota = JabatanAnggota::create($validated);

        return $jabatan_anggota;
    }

    public function delete(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required'
        ]);

        $jabatan_anggota = JabatanAnggota::findOrFail($validated['id']);
        $jabatan_anggota->delete();
        return $jabatan_anggota;
    }

    public function upload(Request $request)
    {

        $validated = $request->validate([
            'id' => 'required',
            'file' => 'nullable'
        ]);

        $data = [];
        $names = [
            'file'
        ];
        
        $model = JabatanAnggota::findOrFail($validated['id']);

        foreach($names as $name)
        {
            if($request->hasFile($name))
            {
                $file = $request->file($name);
                $hashname = $file->hashName();
                $path = $request->file($name)->storeAs("jabatan-anggota", $hashname, "public_upload");
                $data[$name] = $path;
            }
            
        }

        return $model->update($data);
    }
}

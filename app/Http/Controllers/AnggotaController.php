<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\SatuanKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{

    public $slug = "anggota";
    public $model = Anggota::class;

    public function __construct()
    {
        view()->share('slug', $this->slug);
        view()->share('singular', ucfirst(Str::title(Str::replace('-', ' ', $this->slug))));
        $this->model = new $this->model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $koleksi = $this->model->when($request->s, function($query, $keyword){
            return $query->where("nama", "LIKE", "%{$keyword}%");
        })
        ->when($request->status, function($query, $status){
            return $query->where('status', $status);
        })
        ->when($request->jenis_kelamin, function($query, $jk){
            if($jk == "Pria") {
                return $query->where('jenis_kelamin', 0);
            }else {
                return $query->where('jenis_kelamin', 1);
            }
        })
        ->when($request->nama, function($query, $nama){
            return $query->where('nama', 'LIKE', '%' . $nama . '%');
        })
        ->when($request->satuan_id, function($query, $satuan_id){
            return $query->where('satuan_kerja_id', $satuan_id);
        })
        ->when($request->jabatan, function($query, $jabatan){
        
        })
        ->when($request->user(), function($query, $user){
            if($user->role_id == 1) {
                return $query->where('satuan_kerja_id', $user->satuan_kerja_id);
            }
        })
        ->paginate(20);
        $koleksi_satuan_kerja = SatuanKerja::orderBy('nama', 'ASC')->get();
        return view("{$this->slug}.index", compact("koleksi", "koleksi_satuan_kerja"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $this->model;
        $koleksi_satuan_kerja = SatuanKerja::orderBy('nama', 'ASC')->get();

        if(Auth::user()->role_id == 1)
        {
            $koleksi_satuan_kerja = SatuanKerja::where('id', Auth::user()->satuan_kerja_id)->orderBy('nama', 'ASC')->get();
        }        

        return view("{$this->slug}.form", compact('model', 'koleksi_satuan_kerja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $model = $this->model->create($request->all());

        return redirect(route("{$this->slug}.edit", $model->id))
            ->with('status', 'success')
            ->with('message', 'Berhasil menyimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view("{$this->slug}.show", compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        $slug = Str::replace('-', '_', $this->slug);
        $model = $$slug;
        $koleksi_satuan_kerja = SatuanKerja::orderBy('nama', 'ASC')->get();
        return view("{$this->slug}.form", compact('model', 'koleksi_satuan_kerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        // $validated = $request->validate([
        //     'wilayah_hukum_id' => 'nullable',
        //     'nama' => 'required'
        // ]);
        $anggota = Anggota::findOrFail($id);
        $slug = Str::replace('-', '_', $this->slug);
        $this->model = $$slug;
        $this->model->update($request->all());

        $this->upload($this->model, $request);

        

        return back()
            ->with('status', 'success')
            ->with('message', 'Berhasil menyimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $anggota)
    {
        $slug = Str::replace('-', '_', $this->slug);
        $this->model = $$slug;
        $this->model->delete();

        return back()
            ->with('status', 'success')
            ->with('message', 'Berhasil menghapus');
    }

    public function upload($anggota, Request $request)
    {
        $data = [];
        $names = [
            //'file_bpjs',
            //'file_npwp',
            //'file_nik',
            'file_paspor',
            //'file_kk',
            'file_akta_lahir',
            'foto'
        ];

        foreach($names as $name)
        {
            if($request->hasFile($name))
            {
                $file = $request->file($name);
                $hashname = $file->hashName();
                $path = $request->file($name)->storeAs("anggota", $hashname, "public_upload");
                $data[$name] = $path;
            }
            
        }

        return $anggota->update($data);
    }
}

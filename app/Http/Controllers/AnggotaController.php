<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\SatuanKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        })->paginate(20);
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
        $validated = $request->validate([
            'wilayah_hukum_id' => 'nullable',
            'nama' => 'required'
        ]);

        $model = $this->model->create($validated);

        return redirect(route("{$this->slug}.index"))
            ->with('status', 'success')
            ->with('message', 'Berhasil menyimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        $slug = Str::replace('-', '_', $this->slug);
        $model = $$slug;
        return view("{$this->slug}.form", compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota $anggota)
    {
        $validated = $request->validate([
            'wilayah_hukum_id' => 'nullable',
            'nama' => 'required'
        ]);

        $slug = Str::replace('-', '_', $this->slug);
        $this->model = $$slug;
        $this->model->update($validated);

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
}

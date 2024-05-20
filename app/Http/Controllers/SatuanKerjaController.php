<?php

namespace App\Http\Controllers;

use App\Models\SatuanKerja;
use App\Models\Provinsi;
use App\Models\WilayahHukum;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SatuanKerjaController extends Controller
{


    public $slug = "satuan-kerja";
    public $model = SatuanKerja::class;

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
        })->paginate($request->posts_per_page ?? 20);
        return view("{$this->slug}.index", compact("koleksi"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $this->model;
        return view( $this->slug . ".form", compact('model'));
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
            'jenis' => 'required',
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
     * @param  \App\Models\SatuanKerja  $satuanKerja
     * @return \Illuminate\Http\Response
     */
    public function show(SatuanKerja $satuanKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SatuanKerja  $satuanKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(SatuanKerja $satuan_kerja)
    {
        $slug = Str::replace('-', '_', $this->slug);
        $model = $$slug;
        return view("{$this->slug}.form", compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SatuanKerja  $satuanKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SatuanKerja $satuan_kerja)
    {
        $validated = $request->validate([
            'jenis' => 'required',
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
     * @param  \App\Models\SatuanKerja  $satuanKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(SatuanKerja $satuan_kerja)
    {
        $slug = Str::replace('-', '_', $this->slug);
        $this->model = $$slug;
        $this->model->delete();

        return back()
            ->with('status', 'success')
            ->with('message', 'Berhasil menghapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KotaController extends Controller
{


    public $slug = "kota";
    public $model = Kota::class;

    public function __construct()
    {
        view()->share('slug', $this->slug);
        view()->share('singular', ucfirst($this->slug));
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
        })->paginate(1);
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
        $koleksi_provinsi = Provinsi::orderBy('nama', 'ASC')->get();
        return view( $this->slug . ".form", compact('model', 'koleksi_provinsi'));
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
            'provinsi_id' => 'required',
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
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show(Kota $kota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit(Kota $kota)
    {
        $model = $$this->slug;
        $koleksi_provinsi = Provinsi::orderBy('nama', 'ASC')->get();
        return view("{$this->slug}.form", compact('model', 'koleksi_pronvisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kota $kota)
    {
        $validated = $request->validate([
            'provinsi_id' => 'required',
            'nama' => 'required'
        ]);

        $this->model = $$this->slug;
        $this->model->update($validated);

        return back()
            ->with('status', 'success')
            ->with('message', 'Berhasil menyimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kota $kota)
    {
        $this->model = $$this->slug;
        $this->model->delete();

        return back()
            ->with('status', 'success')
            ->with('message', 'Berhasil menghapus');
    }
}

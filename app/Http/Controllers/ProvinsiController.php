<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{

    public $slug = "provinsi";

    public function __construct()
    {
        view()->share('slug', $this->slug);
        view()->share('singular', ucfirst($this->slug));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $koleksi_provinsi = Provinsi::when($request->s, function($query, $keyword){
            return $query->where("nama", "LIKE", "%{$keyword}%");
        })->paginate(1);
        return view("{$this->slug}.index", compact("koleksi_provinsi"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = new Provinsi();
        return view( $this->slug . ".form", compact('provinsi'));
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
            'nama' => 'required'
        ]);

        $provinsi = Provinsi::create($validated);

        return redirect(route("{$this->slug}.index"))
            ->with('status', 'success')
            ->with('message', 'Berhasil menyimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show(Provinsi $provinsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Provinsi $provinsi)
    {
        return view("{$this->slug}.form", compact('provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provinsi $provinsi)
    {
        $validated = $request->validate([
            'nama' => 'required'
        ]);

        $provinsi->update($validated);

        return back()
            ->with('status', 'success')
            ->with('message', 'Berhasil menyimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provinsi $provinsi)
    {

        $provinsi->delete();

        return back()
            ->with('status', 'success')
            ->with('message', 'Berhasil menghapus');
    }
}

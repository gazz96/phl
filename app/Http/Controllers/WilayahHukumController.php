<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\WilayahHukum;
use Illuminate\Http\Request;

class WilayahHukumController extends Controller
{

    public $slug = "wilayah-hukum";
    public $model = WilayahHukum::class;

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
        $koleksi_wilayah_hukum = WilayahHukum::orderBy('nama', 'ASC')->get();
        return view("{$this->slug}.form", compact('model', 'koleksi_wilayah_hukum'));
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
     * @param  \App\Models\WilayahHukum  $wilayahHukum
     * @return \Illuminate\Http\Response
     */
    public function show(WilayahHukum $wilayahHukum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WilayahHukum  $wilayahHukum
     * @return \Illuminate\Http\Response
     */
    public function edit(WilayahHukum $wilayah_hukum)
    {
        $slug = Str::replace('-', '_', $this->slug);
        $model = $$slug;
        $koleksi_wilayah_hukum = WilayahHukum::orderBy('nama', 'ASC')->get();
        return view("{$this->slug}.form", compact('model', 'koleksi_wilayah_hukum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WilayahHukum  $wilayahHukum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WilayahHukum $wilayah_hukum)
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
     * @param  \App\Models\WilayahHukum  $wilayahHukum
     * @return \Illuminate\Http\Response
     */
    public function destroy(WilayahHukum $wilayah_hukum)
    {
        $slug = Str::replace('-', '_', $this->slug);
        $this->model = $$slug;
        $this->model->delete();

        return back()
            ->with('status', 'success')
            ->with('message', 'Berhasil menghapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\SatuanKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public $slug = "user";
    public $model = User::class;

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
        $koleksi_satuan_kerja = SatuanKerja::orderBy('nama', 'ASC')->get();
        return view( $this->slug . ".form", compact('model', 'koleksi_satuan_kerja'));
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
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'satuan_kerja_id' => 'required'
        ]);

        $validated['role_id'] = 1;
        
        $validated['password'] = Hash::make($validated['password']);

        $model = $this->model->create($validated);

        return redirect(route("{$this->slug}.index"))
            ->with('status', 'success')
            ->with('message', 'Berhasil menyimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $slug = Str::replace('-', '_', $this->slug);
        $model = $$slug;
        $koleksi_satuan_kerja = SatuanKerja::orderBy('nama', 'ASC')->get();
        return view("{$this->slug}.form", compact('model', 'koleksi_satuan_kerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'password' => 'nullable',
            'satuan_kerja_id' => 'required'
        ]);

        $validated['role_id'] = 1;

        if($validated['password'] ?? '')
        {
            $validated['password'] = Hash::make($validated['password']);
        } 
        else {
            unset($validated['password']);
        }

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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $slug = Str::replace('-', '_', $this->slug);
        $this->model = $$slug;
        $this->model->delete();

        return back()
            ->with('status', 'success')
            ->with('message', 'Berhasil menghapus');
    }
}

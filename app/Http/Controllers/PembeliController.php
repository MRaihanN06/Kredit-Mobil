<?php

namespace App\Http\Controllers;

use App\Models\pembeli;
use Illuminate\Http\Request;
class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pembeli.index', [
            'pembeli' => pembeli::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboar.pembeli.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ktp_pembeli' => 'required',
            'nama_pembeli' => 'required',
            'alamat_pembeli' => 'required',
            'telp_alamat' => 'required',
        ]);


        Pembeli::create($validatedData);

        return redirect('/dashboard/pembeli')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pembeli)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembeli $pembeli)
    {
        return view('dashboard.pembeli.edit', [
            'pembeli' => $pembeli
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembeli $pembeli)
    {
        $validatedData = $request->validate([
            'ktp_pembeli' => 'required',
            'nama_pembeli' => 'required',
            'alamat_pembeli' => 'required',
            'telp_alamat' => 'required',
        ]);

        $pembeli->update($validatedData);

        return redirect('/dashboard/pembeli')->with('success', 'Post has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return redirect('/dashboard/pembeli')->with('success', 'Post has been deleted!');
        $validatedData = Pembeli::find($id);
        $validatedData->delete();
        return redirect('/dashboard/pembeli');
    }
}

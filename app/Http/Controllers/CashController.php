<?php

namespace App\Http\Controllers;

use App\Models\pembeli;
use App\Models\mobil;
use App\Models\beli_cash;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['mobil'] = Mobil::all();
        $data['pembeli'] = Pembeli::all();

        return view('dashboard.cash.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.cash.index');
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
            'ktp_pembeli' => 'required',
            'kode_mobil' => 'required',
            'cash_tgl' => 'required',
            'cash_bayar' => 'required'
        ]);

        $last_id = beli_cash::select('kode_cash')->orderBy('created_at','desc')->first();

        $kode_cash = ($last_id==null)?sprintf('C%08d',1)
                    :sprintf('C%08d',substr($last_id->kode_cash,1,8)+1);

        $validated['kode_cash'] = $kode_cash;

        //dd($request);
        $input = beli_cash::create($validated);

        if($input) return redirect('dashboard/cash')->with('success', 'Data Cash berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\beli_cash  $beli_cash
     * @return \Illuminate\Http\Response
     */
    public function show(beli_cash $beli_cash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\beli_cash  $beli_cash
     * @return \Illuminate\Http\Response
     */
    public function edit(beli_cash $beli_cash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\beli_cash  $beli_cash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, beli_cash $beli_cash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\beli_cash  $beli_cash
     * @return \Illuminate\Http\Response
     */
    public function destroy(beli_cash $beli_cash)
    {
        //
    }

    public function faktur(beli_cash $beli_cash){
        $beli_cash->load(['mobil','pembeli']);

        //dd($beli_cash);
        $data['beli_cash'] = $beli_cash;
        return view('dashboard/cash/faktur',$data);
    }
}

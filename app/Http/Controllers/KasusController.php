<?php

namespace App\Http\Controllers;

// use App\Kasus;
use App\Models\Kasus;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KasusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasus = Kasus::with(['PraKasus', 'PegawaiKasus', 'StatusKasus', 'PerintahDisposisi', 'LembagaKepolisian'])->get();
        return json_decode($kasus);
        // return view('kasus', ['kasus' => $kasus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kasus_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kasus' => 'required',
            'deskripsi_kasus' => 'required',
            'tindak_pidana' => 'required',
        ]);

        Kasus::create([
            'nama_kasus' => $request->nama_kasus,
            'deskripsi_kasus' => $request->deskripsi_kasus,
            'tindak_pidana' => $request->tindak_pidana,
        ]);

        return redirect('/kasus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kasus = Kasus::find($id);
        return view('kasus_edit', ['kasus' => $kasus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kasus' => 'required',
            'deskripsi_kasus' => 'required',
            'tindak_pidana' => 'required',
        ]);

        $kasus = Kasus::find($id);
        $kasus->nama_kasus = $request->nama_kasus;
        $kasus->deskripsi_kasus = $request->deskripsi_kasus;
        $kasus->tindak_pidana = $request->tindak_pidana;
        $kasus->save();
        return redirect('/kasus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $kasus = Kasus::find($id);
        $kasus->delete();
        return redirect('/kasus');
    }
}

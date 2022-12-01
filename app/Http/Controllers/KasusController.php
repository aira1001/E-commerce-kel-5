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
        // return view("pages.kasus", ['kasus' => $kasus]);
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
            'status_kasus' => 'required',
            'pegawai_pic' => 'required',
            'lembaga_pic' => 'required',
            'perintah' => 'required',
        ]);

        Kasus::create([
            'status_kasus' => $request->id_status_kasus,
            'pegawai_pic' => $request->id_pegawai_pic,
            'lembaga_pic' => $request->lembaga_pic,
            'perintah' => $request->id_perintah,
        ]);

        // return redirect('/kasus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show()
    // {
    //     return view('pages.kasus');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kasus)
    {
        $kasus = Kasus::find($id_kasus);
        return view('kasus_edit', ['kasus' => $kasus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kasus)
    {
        $this->validate($request, [
            'status_kasus' => 'required',
            'pegawai_pic' => 'required',
            'lembaga_pic' => 'required',
            'perintah' => 'required',
        ]);

        $kasus = Kasus::find($id_kasus);
        $kasus->id_status_kasus = $request->id_status_kasus;
        $kasus->id_pegawai_pic = $request->id_pegawai_pic;
        $kasus->lembaga_pic = $request->lembaga_pic;
        $kasus->id_perintah = $request->id_perintah;
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PelaporKasus;

class PelaporKasusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelapor_kasus = PelaporKasus::all();
    	return view('pelapor_kasus', ['pelapor_kasus' => $pelapor_kasus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function show($id_pelapor)
    // {
    //     $pelapor_kasus = PelaporKasus::all();
    // 	return view('pelapor_kasus', ['pelapor_kasus' => $pelapor_kasus]);
    // }

    public function create()
    {
        return view('pelapor_kasus_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
    		'perihal' => 'required',
    		'deskripsi' => 'required',
    	]);

        $pelapor_kasus = PelaporKasus::create([
            'nama' => $request->nama,
    		'perihal' => $request->perihal,
    		'deskripsi' => $request->deskripsi,
    	]);

        $pelapor_kasus -> save();
    	return redirect('/pelapor_kasus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pelapor)
    {
        $pelapor_kasus = PelaporKasus::find($id_pelapor);
        return view('pelapor_kasus_edit', ['pelapor_kasus' => $pelapor_kasus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pelapor)
    {
        $this->validate($request,[
            'perihal' => 'required',
            'deskripsi' => 'required',
         ]);

         $pelapor_kasus = PelaporKasus::find($id_pelapor);
         $pelapor_kasus->perihal = $request->perihal;
         $pelapor_kasus->deskripsi = $request->deskripsi;
         $pelapor_kasus->save();
         return redirect('/pelapor_kasus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pelapor)
    {
        $pelapor_kasus = PelaporKasus::find($id_pelapor);
        $pelapor_kasus->delete();
        return redirect()->route('pelapor_kasus.index')->withSuccess(__('kasus delete successfully.'));
    }
}

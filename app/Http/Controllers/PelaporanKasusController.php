<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Pegawai;
use App\Models\PelaporanKasus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PelaporanKasusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $idUser = Auth::id();
        // $pegawai = Pegawai::with(['kasus', 'user', 'kasus.prakasus', 'kasus.statuskasus', 'kasus.lembagakepolisian', 'kasus.perintahdisposisi'])->where('id_user', $idUser)->first();

        $pegawai = Auth::user()->pegawai;

        // dd($pegawai);
        // error_log($pegawai->kasus);
        // return json_decode($pegawai);
        return view('pages.pelaporan_kasus', ['pegawai' => $pegawai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pelaporan_kasus_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestPelaporan = $request->validate([
            'perihal' => 'required',
            'deskripsi' => 'required',
            'id_kasus' => 'required|exists:kasus,id' //id nya harus ada yang di table kasus
        ]);
        // dd($requestPelaporan['id_kasus']);
        $pelaporanKasus = new PelaporanKasus($requestPelaporan);
        $pelaporanKasus->save();

        return redirect()->route('pelaporanKasus.show',$requestPelaporan['id_kasus'])->with('success', 'Success add data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kasus)
    {
        $kasus = Kasus::with(['prakasus.user', 'prakasus.pelaporFile','prakasus.saksi', 'pegawaikasus', 'statuskasus', 'perintahdisposisi', 'lembagakepolisian', 'pelaporankasus'])->findOrFail($id_kasus);
        // return json_decode($kasus);
        return view('pages.pelaporan_kasus_show', ['kasus' => $kasus]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $pelaporanKasus = PelaporanKasus::find($id);
            $pelaporanKasus->delete();
            // return redirect('/tim/kasus')->withSuccess(__('pelaporan kasus delete successfully.'));
            return Redirect::back()->with('success', "laporan kasus was deleted successfully");
        } catch (\Throwable $e) {
            error_log($e);
            return redirect()->route('pelaporanKasus.index')->with('warning', 'Something Went Wrong!');
        }
    }
}

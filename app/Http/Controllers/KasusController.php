<?php

namespace App\Http\Controllers;

// use App\Kasus;
use App\Models\Kasus;
use App\Models\LembagaKepolisian;
use App\Models\Pegawai;
use App\Models\PerintahDisposisi;
use App\Models\PraKasus;
use App\Models\StatusKasus;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KasusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasus = Kasus::with(['prakasus', 'pegawaikasus', 'statuskasus', 'perintahdisposisi', 'lembagakepolisian'])->get();
        // return json_encode($kasus);
        return view("pages.kasus", ['kasus' => $kasus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'lembaga_pic' => 'required',
            'perintah' => 'required',
        ]);

        Kasus::create([
            'status_kasus' => $request->id_status_kasus,
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
    public function show($id_kasus)
    {
        $kasus = Kasus::with(['prakasus', 'prakasus.user', 'prakasus.pelaporFile', 'prakasus.saksi', 'pegawaikasus', 'statuskasus', 'perintahdisposisi', 'lembagakepolisian'])->findOrFail($id_kasus);
        // dd($kasus);
        // return json_decode($kasus);
        return view('pages.kasus_show', ['kasus' => $kasus]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kasus)
    {
        $kasus = Kasus::with(['prakasus.user', 'prakasus.pelaporFile', 'pegawaikasus', 'statuskasus', 'perintahdisposisi', 'lembagakepolisian'])->findOrFail($id_kasus);
        $listlembaga = LembagaKepolisian::all();
        $liststatus = StatusKasus::all();
        $listperintah = PerintahDisposisi::all();
        // dd(Kasus::with('prakasus')->findOrFail($id_kasus));
        return view('pages.kasus_edit', ['kasus' => $kasus, 'listlembaga' => $listlembaga, 'liststatus' => $liststatus, 'listperintah' => $listperintah]);
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
        $kasus = Kasus::with('prakasus')->find($id_kasus);
        // dd($request->all());
         $this->validate($request, [
            'status_kasus' => 'required',
            'lembaga_pic' => 'required',
            'perintah_disposisi' => 'required',
        ]);

        DB::beginTransaction();
        try {
            //step 1 : update kasus
            $kasus->id_status_kasus = $request->status_kasus;
            $kasus->lembaga_pic = $request->lembaga_pic;
            $kasus->id_perintah = $request->perintah_disposisi;
            $kasus->save();

            //step 2 : update pra kasus
            $pra_kasus = $kasus->prakasus;
            $pra_kasus->status = 1;
            $pra_kasus->save();
            DB::commit();
            return redirect()->route('kasus.index')->with('success', 'kasus telah diedit!');
        } catch (\Throwable $e) {
            DB::rollback();
            error_log($e);
            return redirect()->route('kasus.index')
                ->with('warning', 'Something Went Wrong!');
        }
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
            $kasus = Kasus::find($id);
            $kasus->delete();
            return redirect('/kasus')->withSuccess(__('kasus delete successfully.'));
        } catch (\Throwable $e) {
            error_log($e);
            return redirect()->route('kasus.index')->with('warning', 'Something Went Wrong!');
        }
    }

    public function updatePegawai(Request $request, $id_kasus){
        $kasus = Kasus::find($id_kasus);
        $requestValidate = $this->validate($request, [
            'pegawai_pic' => 'required'
        ]);
        $kasus->id_pegawai_pic = $requestValidate['pegawai_pic'];
        $kasus->save();
        return Redirect::back()->with('success', "pegawai was edited succcessfully");
        // dd($requestValidate);

    }

    public function updatePerintah(Request $request, $id_kasus){
        $kasus = Kasus::find($id_kasus);
        $requestValidate = $this->validate($request, [
            'perintah_disposisi' => 'required'
        ]);
        $kasus->id_perintah = $requestValidate['perintah_disposisi'];
        $kasus->save();
        return Redirect::back()->with('success', "perintah disposisi was edited succcessfully");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PraKasus;
use App\Models\PelaporKasus;
use App\Models\Saksi;
use Illuminate\Support\Facades\DB;

class PraKasusController extends Controller
{
    public function index()
    {
        $pra_kasus = PraKasus::all();
        return view('pra_kasus', ['pra_kasus' => $pra_kasus]);
    }
    public function create()
    {
        return view('pra_kasus_create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' =>'required',
            'judul_kasus' => 'required',
            'tgl_kejadian' => 'required',
            'time_kejadian' => 'required',
            'tempat_kejadian' => 'required',
            'terlapor' => 'required',
            'korban' => 'required',
            'bagaimana_terjadi' => 'required',
            // 'username_1' =>'required',
            // 'umur_1' => 'required'
        ]);

        $combinedDT = date('Y-m-d H:i:s', strtotime("$request->tgl_kejadian, $request->time_kejadian"));

        DB::beginTransaction();
        try{
            // Step 1 : pelapor kasus
            $pelapor_kasus = new PelaporKasus();
            $pelapor_kasus->nama = $request->username;
            $pelapor_kasus->save();

            //Step 2 : kasus reservation
            $pra_kasus = new PraKasus();
            $pra_kasus->id_pelapor = $pelapor_kasus->id_pelapor;
            $pra_kasus->judul_kasus = $request->judul_kasus;
            $pra_kasus->waktu_kejadian = $combinedDT;
            $pra_kasus->tempat_kejadian = $request->tempat_kejadian;
            $pra_kasus->terlapor = $request->terlapor;
            $pra_kasus->korban = $request->korban;
            $pra_kasus->bagaimana_terjadi = $request->bagaimana_terjadi;
            $pra_kasus->uraian_singkat_kejadian = $request->uraian_singkat_kejadian;
            $pra_kasus->save();

            //step 3 : saksi
            $saksi = new Saksi();
            $saksi->id_pra_kasus = $pra_kasus->id_pra_kasus;
            $saksi->nama = $request->nama_1;
            $saksi->umur= $request->umur_1;
            $saksi->save();

            DB::commit();

            return redirect()->route('pra_kasus.index')->with('success','Thank You for your report!');

        }catch(\Exception $e){
            DB::rollback();
            error_log($e);
            return redirect()->route('pra_kasus.index')
                        ->with('warning','Something Went Wrong!');
        }
        // try {
        //     DB::insert('insert into pelapor_kasus (nama) values (?) returning ', ["$request->nama"]);
        //     $pelapor_kasus = PelaporKasus::create([
        //         'nama' => $request->nama
        //     ]);
        //     PraKasus::create([
        //     'id_pelapor' => $pelapor_kasus->id_pelapor,
        //     'judul_kasus' => $request->judul_kasus,
        //     'waktu_kejadian' => $combinedDT,
        //     'tempat_kejadian' => $request->tempat_kejadian,
        // 	'terlapor' => $request->terlapor,
        // 	'korban' => $request->korban,
        //     'bagaimana_terjadi' => $request->bagaimana_terjadi,
        //     'uraian_singkat_kejadian' => $request->uraian_singkat_kejadian,
        // ]);
        //     DB::insert('insert into pra_kasuss (id_pelapor,judul_kasus,waktu_kejadian,tempat_kejadian, terlapor, korban, bagaimana_terjadi, uraian_singkat_kejadian values(?,?,?,?,?,?,?,?)', ["$pelapor_kasus->id_pelapor", "$request->judul_kasus", "$combinedDT", "$request->tempat_kejadian", "$request->terlapor", "$request->korban", "$request->bagaimana_terjadi", "$request->uraian_singkat_kejadian"]);
        //     DB::commit();
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return redirect()->route('pra_kasus.index')
        //                 ->with('warning','Something Went Wrong!');
        // }
        // $pra_kasus = PraKasus::create([
        //     'judul_kasus' => $request->judul_kasus,
        //     'waktu_kejadian' => $combinedDT,
        //     'tempat_kejadian' => $request->tempat_kejadian,
        // 	'terlapor' => $request->terlapor,
        // 	'korban' => $request->korban,
        //     'bagaimana_terjadi' => $request->bagaimana_terjadi,
        //     'uraian_singkat_kejadian' => $request->uraian_singkat_kejadian,
        // ]);

        // $pra_kasus -> save();
        // return redirect('/pra_kasus');
    }

    public function destroy($id_pra_kasus)
    {
        $pra_kasus = PraKasus::find($id_pra_kasus);
        $pra_kasus->delete();
        return redirect()->route('pra_kasus.index')->withSuccess(__('kasus delete successfully.'));
    }
}

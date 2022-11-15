<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KasusReservation;
use App\Models\PelaporKasus;
use App\Models\Saksi;
use Illuminate\Support\Facades\DB;

class KasusReservationController extends Controller
{
    public function index()
    {
        $kasus_reservation = KasusReservation::all();
        return view('kasus_reservation', ['kasus_reservation' => $kasus_reservation]);
    }
    public function create()
    {
        return view('kasus_reservation_create');
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
            $kasus_reservation = new KasusReservation();
            $kasus_reservation->id_pelapor = $pelapor_kasus->id_pelapor;
            $kasus_reservation->judul_kasus = $request->judul_kasus;
            $kasus_reservation->waktu_kejadian = $combinedDT;
            $kasus_reservation->tempat_kejadian = $request->tempat_kejadian;
            $kasus_reservation->terlapor = $request->terlapor;
            $kasus_reservation->korban = $request->korban;
            $kasus_reservation->bagaimana_terjadi = $request->bagaimana_terjadi;
            $kasus_reservation->uraian_singkat_kejadian = $request->uraian_singkat_kejadian;
            $kasus_reservation->save();

            //step 3 : saksi
            $saksi = new Saksi();
            $saksi->id_reservasi = $kasus_reservation->id_reservasi;
            $saksi->nama = $request->nama_1;
            $saksi->umur= $request->umur_1;
            $saksi->save();

            DB::commit();

            return redirect()->route('kasus_reservation.index')->with('success','Thank You for your report!');

        }catch(\Exception $e){
            DB::rollback();
            error_log($e);
            return redirect()->route('kasus_reservation.index')
                        ->with('warning','Something Went Wrong!');
        }
        // try {
        //     DB::insert('insert into pelapor_kasus (nama) values (?) returning ', ["$request->nama"]);
        //     $pelapor_kasus = PelaporKasus::create([
        //         'nama' => $request->nama
        //     ]);
        //     KasusReservation::create([
        //     'id_pelapor' => $pelapor_kasus->id_pelapor,
        //     'judul_kasus' => $request->judul_kasus,
        //     'waktu_kejadian' => $combinedDT,
        //     'tempat_kejadian' => $request->tempat_kejadian,
        // 	'terlapor' => $request->terlapor,
        // 	'korban' => $request->korban,
        //     'bagaimana_terjadi' => $request->bagaimana_terjadi,
        //     'uraian_singkat_kejadian' => $request->uraian_singkat_kejadian,
        // ]);
        //     DB::insert('insert into kasus_reservations (id_pelapor,judul_kasus,waktu_kejadian,tempat_kejadian, terlapor, korban, bagaimana_terjadi, uraian_singkat_kejadian values(?,?,?,?,?,?,?,?)', ["$pelapor_kasus->id_pelapor", "$request->judul_kasus", "$combinedDT", "$request->tempat_kejadian", "$request->terlapor", "$request->korban", "$request->bagaimana_terjadi", "$request->uraian_singkat_kejadian"]);
        //     DB::commit();
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return redirect()->route('kasus_reservation.index')
        //                 ->with('warning','Something Went Wrong!');
        // }
        // $kasus_reservation = KasusReservation::create([
        //     'judul_kasus' => $request->judul_kasus,
        //     'waktu_kejadian' => $combinedDT,
        //     'tempat_kejadian' => $request->tempat_kejadian,
        // 	'terlapor' => $request->terlapor,
        // 	'korban' => $request->korban,
        //     'bagaimana_terjadi' => $request->bagaimana_terjadi,
        //     'uraian_singkat_kejadian' => $request->uraian_singkat_kejadian,
        // ]);

        // $kasus_reservation -> save();
        // return redirect('/kasus_reservation');
    }

    public function destroy($id_reservasi)
    {
        $kasus_reservation = KasusReservation::find($id_reservasi);
        $kasus_reservation->delete();
        return redirect()->route('kasus_reservation.index')->withSuccess(__('kasus delete successfully.'));
    }
}

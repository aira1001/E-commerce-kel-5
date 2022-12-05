<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\PelaporFile;
use Illuminate\Http\Request;
use App\Models\PraKasus;
use App\Models\PelaporKasus;
use App\Models\Saksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PraKasusController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $pra_kasus = PraKasus::where('id_pelapor', $userId)->get();
        return view('pages.pra_kasus', ['pra_kasus' => $pra_kasus]);
    }
    public function show($id_pra_kasus)
    {
        // $praKasusGetById = PraKasus::find($id_pra_kasus);
        $praKasusGetById = PraKasus::with(['user', 'saksi', 'pelaporFile'])->where('id_pra_kasus', $id_pra_kasus)->first();
        // $pra_kasus = PraKasus::where('id_pelapor', $userId)->get();
        return view('pages.pra_kasus_show', ['pra_kasus' => $praKasusGetById]);
    }
    public function create()
    {
        return view('pages.pra_kasus_create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'judul_kasus' => 'required',
            'tgl_kejadian' => 'required',
            'time_kejadian' => 'required',
            'tempat_kejadian' => 'required',
            'terlapor' => 'required',
            'korban' => 'required',
            'bagaimana_terjadi' => 'required',
            'addMoreInputFields.*.nama' => 'required',
            'addMoreInputFields.*.umur' => 'required',
        ]);

        $combinedDT = date('Y-m-d H:i:s', strtotime("$request->tgl_kejadian, $request->time_kejadian"));
        $userId = Auth::id();
        // error_log(print_r($userId, true));
        DB::beginTransaction();
        try {
            //Step 1 : pra kasus
            $pra_kasus = new PraKasus();
            $pra_kasus->id_pelapor = $userId;
            $pra_kasus->judul_kasus = $request->judul_kasus;
            $pra_kasus->waktu_kejadian = $combinedDT;
            $pra_kasus->tempat_kejadian = $request->tempat_kejadian;
            $pra_kasus->terlapor = $request->terlapor;
            $pra_kasus->korban = $request->korban;
            $pra_kasus->bagaimana_terjadi = $request->bagaimana_terjadi;
            $pra_kasus->uraian_singkat_kejadian = $request->uraian_singkat_kejadian;
            $pra_kasus->save();

            //step 2 : saksi
            foreach ($request->addMoreInputFields as $key => $value) {
                // Saksi::create([
                //     'id_pra_kasus'=>$pra_kasus->id_pra_kasus,
                //     'nama' => $value,
                // ]);
                $saksi = new Saksi();
                $saksi->id_pra_kasus = $pra_kasus->id_pra_kasus;
                $saksi->nama = $value['nama'];
                $saksi->umur = $value['umur'];
                // error_log(print_r($value['nama'],true));
                $saksi->save();
            }

            //step 3: add image file to pelapor file
            if ($request->hasFile("filename")) {
                foreach ($request->file('filename') as $image) {
                    $name = $image->getClientOriginalName();
                    // $path = $image->store('/images/', ['links' => public_path('storage')]);
                    $path =  $image->move(public_path() . '/image/', $name);
                    error_log('path :' . $path);
                    $pelapor_file = new PelaporFile();
                    $pelapor_file->id_pra_kasus = $pra_kasus->id_pra_kasus;
                    $pelapor_file->path_file = $name;
                    $pelapor_file->save();

                }
            }

            //step 4 : add to table kasus
            $kasus = new Kasus();
            $kasus->id_pra_kasus = $pra_kasus->id_pra_kasus;
            $kasus->save();

            DB::commit();
            return redirect()->route('pra_kasus.index')->with('success', 'Thank You for your report!');
        } catch (\Exception $e) {
            DB::rollback();
            error_log($e);
            return redirect()->route('pra_kasus.index')
                ->with('warning', 'Something Went Wrong!');
        }

    }

    public function destroy($id_pra_kasus)
    {
        DB::beginTransaction();
        try {
            //delete saksi
            $saksi = Saksi::where('id_pra_kasus', $id_pra_kasus);
            $saksi->delete();

            //delete pelapor_file
            $pelapor_file = PelaporFile::where('id_pra_kasus', $id_pra_kasus);
            $pelapor_file->delete();

            //delete kasus
            $kasus = Kasus::where('id_pra_kasus', $id_pra_kasus);
            $kasus->delete();

            //delete pra_kasus
            $pra_kasus = PraKasus::where('id_pra_kasus', $id_pra_kasus);
            $pra_kasus->delete();
            DB::commit();
            return redirect()->route('pra_kasus.index')->withSuccess(__('kasus delete successfully.'));
        } catch (\Throwable $e) {
            DB::rollback();
            error_log($e);
            return redirect()->route('pra_kasus.index')
                ->with('warning', 'Something Went Wrong!');
        }
    }
    public function edit($id_pra_kasus)
    {
        $pra_kasus = PraKasus::with(['user', 'saksi'])->where('id_pra_kasus', '=', $id_pra_kasus)->first();
        // error_log($pra_kasus);
        return view('pages.pra_kasus_edit', ['pra_kasus' => $pra_kasus]);
    }
    public function update(Request $request, $id_pra_kasus)
    {
        $this->validate($request, [
            // 'username' => 'required',
            'judul_kasus' => 'required',
            'tgl_kejadian' => 'required',
            'time_kejadian' => 'required',
            'tempat_kejadian' => 'required',
            'terlapor' => 'required',
            'korban' => 'required',
            'bagaimana_terjadi' => 'required',
            'addMoreInputFields.*.nama' => 'required',
            'addMoreInputFields.*.umur' => 'required',
        ]);

        $pra_kasus = PraKasus::find($id_pra_kasus);
        $combinedDT = date('Y-m-d H:i:s', strtotime("$request->tgl_kejadian, $request->time_kejadian"));
        DB::beginTransaction();
        try {
            //Step 1 : kasus reservation
            $pra_kasus->judul_kasus = $request->judul_kasus;
            $pra_kasus->waktu_kejadian = $combinedDT;
            $pra_kasus->tempat_kejadian = $request->tempat_kejadian;
            $pra_kasus->terlapor = $request->terlapor;
            $pra_kasus->korban = $request->korban;
            $pra_kasus->bagaimana_terjadi = $request->bagaimana_terjadi;
            $pra_kasus->uraian_singkat_kejadian = $request->uraian_singkat_kejadian;
            $pra_kasus->save();

            //step 2 : update saksi
            $saksi = Saksi::where('id_pra_kasus', $id_pra_kasus);
            $saksi->delete();

            error_log(print_r($request->addMoreInputFields, true));

            //step 3 : add saksi
            foreach ($request->addMoreInputFields as $key => $value) {
                $saksiNew = new Saksi();
                $saksiNew->id_pra_kasus = $id_pra_kasus;
                $saksiNew->nama = $value['nama'];
                $saksiNew->umur = $value['umur'];
                $saksiNew->save();
            }

            //step 4 : update file
            $pelapor_file = PelaporFile::where('id_pra_kasus', $id_pra_kasus);
            $pelapor_file->delete();

            if ($request->hasFile("filename")) {
                foreach ($request->file('filename') as $image) {
                    $name = $image->getClientOriginalName();
                    // $path = $image->store('/images/', ['links' => public_path('storage')]);
                    $path =  $image->move(public_path() . '/image/', $name);
                    error_log('path :' . $path);
                    $pelapor_file = new PelaporFile();
                    $pelapor_file->id_pra_kasus = $id_pra_kasus;
                    $pelapor_file->path_file = $name;
                    $pelapor_file->save();
                }
            }
            DB::commit();

            return redirect()->route('pra_kasus.index')->with('success', 'data telah diedit!');
        } catch (\Exception $e) {
            DB::rollback();
            error_log($e);
            return redirect()->route('pra_kasus.index')
                ->with('warning', 'Something Went Wrong!');
        }
    }
    public function lembar_disporsisi()
    {
        $data ['surat'] = DB::table('kasus')
        ->join('pra_kasus', 'pra_kasus.id_pra_kasus', 'kasus.id_pra_kasus')
        ->join('pelapor_kasus', 'pelapor_kasus.id_pelapor', 'pra_kasus.id_pelapor')
        ->select('*')
        ->get();
   
        return view('disporsisi',$data);

    }
    public function daftar()
    {
        $data ['daftar'] = DB::table('kasus')
        ->join('pra_kasus', 'pra_kasus.id_pra_kasus', 'kasus.id_pra_kasus')
        ->join('users', 'users.id', 'kasus.id')
        ->select('*')
        ->get();
        return view('daftar_disporsisi',$data);

    }
    public function open_data($id_open)
    {
        $data ['surat'] = DB::table('kasus')
        ->join('pra_kasus', 'pra_kasus.id_pra_kasus', 'kasus.id_pra_kasus')
        ->join('perintah_disposisi', 'kasus.id_perintah', 'perintah_disposisi.id_perintah')
        ->join('users', 'users.id', 'pra_kasus.id_pelapor')
        ->where('kasus.id', $id_open)
        ->select('pra_kasus.*','kasus.*','users.name','perintah_disposisi.perintah')
        ->get();
        // dd($data);
   
        return view('disporsisi',$data);

    }

}

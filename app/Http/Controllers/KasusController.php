<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasusController extends Controller
{
    public function index()
    {
    	// mengambil data dari table kasus
    	$pegawai = DB::table('kasus')->get();
 
    	// mengirim data kasus ke view index
    	return view('index',['kasus' => $kasus]);
 
    }
}

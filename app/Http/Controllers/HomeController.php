<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use app\Models\Dokter;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['jdokter'] = \App\Models\Dokter::all()->count();
        $data['jpoli'] = \App\Models\Poli::all()->count();
        $data['jpasiens'] = \App\Models\Pasien::all()->count();
        $data['jantrian'] = \App\Models\Administrasi::all()->count();
        return view('home', $data);
    }
}

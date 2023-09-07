<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;

class MylogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $tanggalAkhir = date('Y-m-d'); // Menggunakan tanggal hari ini sebagai tanggal akhir
        $tanggal = new DateTime($tanggalAkhir);
        $awal = new DateTime('2023-08-01');
    
        $interval = date_diff($tanggal, $awal);
        $minggu = floor($interval->days / 7);
    
        for ($i = $minggu; $i > 0; $i--) {
            $tanggalMulai = clone $tanggal;
            $tanggalMulai->modify("-$i weeks")->modify('next monday');
            $tanggalJumat = clone $tanggalMulai;
            $tanggalJumat->modify('+4 days');
            array_push($data, [ $tanggalMulai,  $tanggalJumat]);
        }
    
        $data_reverse = array_reverse($data);
        return view('page.log.mylog', ['list_week' => $data_reverse]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tanggalAwal = new DateTime($id);
        $data = [clone $tanggalAwal];
        for ($i=1; $i <= 4 ; $i++) { 
            $next = clone $tanggalAwal->modify('next day');
            array_push($data, $next);
            
        }
        // dd($data);
        return view('page.log.daylog', ['days' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $request->validate([
            'body' => ['required']
        ]);


        Log::create([
            'body' => $request->body,
            'user_id' => Auth::user()->id,
            'date' => $request->date
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $logs = Log::where('user_id', Auth::user()->id)->orderBy('date', 'DESC')->get();
        $tanggalAwal = new DateTime($id);
        
        $data = [];
        
        for ($i=0; $i <= 4 ; $i++) { 
            $next = clone $tanggalAwal;
            $status = false;
            $harian = [];
            $next->modify('+'.($i).' day');
            $harian = [$next];
            if($logs->count() != 0){
                foreach ($logs as $item) {
                    $date = new DateTime($item->date);
                    if($date == $next){
                        $status = true;
                        array_push($harian, $status);
                        array_push($harian, $item);
                    }
                 
                }
    
                if(!$status){
                    array_push($harian, $status);
                    array_push($harian, $item);
                }
            }else{
                array_push($harian, false);
                array_push($harian, 0);
            }
            // dd($harian);
            array_push($data, $harian);
        }

        return view('page.log.daylog', ['days' => array_reverse($data)]);
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
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

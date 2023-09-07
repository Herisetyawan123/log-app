<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StafflogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = User::with('bawahan')->where('id', Auth::user()->id)->first()->bawahan;
        return view('page.stafflog.index', ['staff' => $staff]);
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

        $user = DB::table('users')->where('id', $id)->where('superior_id', Auth::user()->id)->get();
    

        if($user->count() == 0){
            return redirect('/staff');
        }

        $logs = Log::where('user_id', $id)->orderBy('date', 'DESC')->get();
        return view('page.stafflog.list', ['logs' => $logs, 'name' => $user[0]->name]);
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
        $log = Log::find($id);
        // dd($log);
        $log->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

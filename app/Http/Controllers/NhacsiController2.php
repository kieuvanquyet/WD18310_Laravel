<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\table;

class NhacsiController2 extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('nhacsis')->get();
        return view('nhacsi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nhacsi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        //img
        if ($request->hasFile('anh')) {
            $url = Storage::put('nhacsi', $request->file('anh'));
        } else {
            $url = '';
        }

        DB::table('nhacsis')->insert([
            'ten'      => $request->ten,
            'anh'      => $url,
            'ngaysinh' => $request->ngaysinh,
            'quequan'  => $request->quequan,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('nhacsi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = DB::table('nhacsis')->where('id', $id)->first();
        $listAmNhac = DB::table('amnhacs')
            ->join('nhacsis', 'amnhacs.id_nhacsi', '=', 'nhacsis.id')
            ->where('id_nhacsi', $id)
            ->select('amnhacs.*', 'nhacsis.ten as ten_nhacsi')->get();
        // $listAmNhac = DB::table('amnhacs')->where('id_nhacsi',$id)->get();
        return view('nhacsi.show', compact('model', 'listAmNhac'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = DB::table('nhacsis')->where('id', $id)->first();
        return view('nhacsi.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($request->hasFile('anh')) {
            $url = Storage::put('nhacsi', $request->file('anh'));
        } else {
            $url = '';
        }

        DB::table('nhacsis')->where('id',$id)
            ->update([
                'ten'      => $request->ten,
                'anh'      => $url,
                'ngaysinh' => $request->ngaysinh,
                'quequan'  => $request->quequan,
                'created_at' => Carbon::now()
            ]);
        return redirect()->route('nhacsi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('nhacsis')->where('id', $id)->delete();
        return back();
    }
}

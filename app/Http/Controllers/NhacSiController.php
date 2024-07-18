<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class NhacSiController extends Controller
{
    //
    public function list()
    {

        $list = DB::table('nhacsi')->get();
        return view('nhacsi.list', compact('list'));
    }

    public function detail($idns)
    {
        $data = DB::table('nhacsi')->where('id', '=', $idns)->first();
        if (!$data) {
            echo 'khong tim thay du lieu';
        } else {
            $amNhacData = DB::table('nhacsi')
                ->join('amnhac', 'nhacsi.id', '=', 'amnhac.id_nhacsi')
                ->select('nhacsi.*', 'amnhac.id as id_amnhac', 'amnhac.ten as ten_amnhac')
                ->where('nhacsi.id', '=', $idns)
                ->get();
            return view('nhacsi.detail', compact('data', 'amNhacData'));
        }
    }

    public function delete($id)
    {

        $exit = DB::table('amnhac')->where('id_nhacsi', "=", $id)->exists();
        if ($exit) {
            return redirect()->route('nhacsi.list')->with('error', 'khong the xoa nhac si nay');
        } else {

            $sql = DB::table('nhacsi')->where('id', '=', $id)->delete();
            return redirect()->route('nhacsi.list');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DataPencatatan;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListPencatatanController extends Controller
{
    public function listPencatatan(){
        // Get all data from data_pencatatans
        $listPencatatan = DB::table("data_pencatatans")->join("personals", 'data_pencatatans.id_izin', '=', 'personals.id_izin')->leftJoin("jadwal_bnsp_table", 'data_pencatatans.id_izin', 'jadwal_bnsp_table.id_izin')->get();

        // $listPencatatan = DataPencatatan::all();
        // foreach($listPencatatan as $pencatatan){
        //     Personal::where("id_izin", $pencatatan->id_izin)->update(['status' => "50"]);
        // }
        // dd("Pencatatan berhasil di update!");

        return view("list-pencatatan", ["listPencatatan" => $listPencatatan]);
    }
}

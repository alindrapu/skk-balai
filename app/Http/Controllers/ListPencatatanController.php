<?php

namespace App\Http\Controllers;

use App\Models\DataPencatatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListPencatatanController extends Controller
{
    public function listPencatatan(){
        // Get all data from data_pencatatans
        $listPencatatan = DB::table("data_pencatatans")->join("personals", 'data_pencatatans.id_izin', '=', 'personals.id_izin')->join("jadwal_bnsp_table", 'data_pencatatans.id_izin', 'jadwal_bnsp_table.id_izin')->get();

        return view("list-pencatatan", ["listPencatatan" => $listPencatatan]);
    }
}

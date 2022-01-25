<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MstAddress;
use App\Models\KenAllRome;

class SearchByAddressController extends Controller
{
    public function index () {
        $ken = MstAddress::select("ken_id", "ken_name")->groupBy("ken_id", "ken_name")->orderBy("ken_id")->get();
        $data["ken"] = $ken;
        return view("search_by_address")->with($data);
    }

    public function submit (Request $request) {
        $data = [];
        $names = [
            "ken_name",
            "city_name",
            "town_name",
            "office_name"
        ];
        foreach ($names as $name):
            if ($request->$name) $where_clause[] = [$name, "like", "%".$request->$name."%"];
        endforeach;
        if (isset($where_clause)):
            $data["results"] = MstAddress::where($where_clause)->limit(100)->get();
        else:
            $data["error"] = "該当するレコードがありません";
        endif;
        return view("search_by_address")->with($data);
    }
}

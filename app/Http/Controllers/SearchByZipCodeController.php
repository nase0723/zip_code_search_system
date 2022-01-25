<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MstAddress;

class SearchByZipCodeController extends Controller
{
    public function index($zip_code = null) {
        $data["zip_code"] = $zip_code;
        if (is_null($zip_code) == false) {
            // ハイフンを入れる
            if (strlen($zip_code) == 7) {
                $zip_code = substr_replace($zip_code, '-', 3, 0); 
            }
            // 郵便番号からレコード取得
            $data["results"] = MstAddress::where("zip", $zip_code)->get();
        }
        return view("search_by_zip_code")->with($data);
    }

    public function submit(Request $request) {
        if ($request->has("btn_search")) {
            return redirect("search_by_zip_code/" . $request->zip_code);
        } 
    }

}

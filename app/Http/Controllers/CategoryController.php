<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function getCategory()
    {
        $getData = DB::table('category')->where('rec_state', 0)->get();
        return response()->json(['data' => $getData]);
    }
}

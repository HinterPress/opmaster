<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{


    public function test()
    {
        $data = DB::table('category')->get();
        
        return response()->json(['foo' => $data]);
    }
}

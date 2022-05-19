<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function getCategory() //get data category
    {
        try {
            $statusCode = 200;
            $statusMessage = "Success";
            $getData = DB::table('category')->select('id', 'name')->where('rec_state', 0)->get();
        } catch (\Throwable $th) {
            $statusCode = 500;
            $statusMessage = "Failed";
            $getData = [];
        }
        return response()->json(['statusCode' => $statusCode, 'statusMessage' => $statusMessage, 'data' => $getData]);
    }

    public function insertCategory(Request $request)
    {
        $validRequest = Validator::make($request->all(), [
            'name' => 'required|max:3'
        ]);
        if ($validRequest->fails()) {
            return response()->json('test');
        }
        // return response()->json($validRequest->fails());

        // if($validRequest){
        //     return response()->json($validRequest);
        // }else{
        //     return response()->json('test', 500);
        // }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

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

    public function insertCategory(Request $request) // crate category
    {
        $validRequest = Validator::make($request->all(), [
            'name' => 'required|max:255'
        ]);
        if ($validRequest->fails()) { //if validation true
            $errorMessage = $validRequest->errors()->all();
            $statusCode = 500;
            $statusMessage = "Failed";
        } else {
            $name = $request->name;
            try {
                $statusCode = 200;
                $statusMessage = "Success";
                $errorMessage = [];
                DB::table('category')->insert(['name' => $name]);
            } catch (\Exception $th) {
                $statusCode = 500;
                $statusMessage = "Failed";
                $errorMessage = $th->getMessage();
            }
        }
        return response()->json(['statusCode' => $statusCode, 'statusMessage' => $statusMessage, 'errorMessage' => $errorMessage]);
    }
}

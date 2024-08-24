<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use LaravelSalatNotifier\Models\SalatTime;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalatTimeResource;



class SalatTimeController extends Controller
{
    public function index()
    {
    
            $data = SalatTimeResource::collection(SalatTime::all());
            return response()->json(['message'=>"Salat Time List Loaded Successfully", 'data'=>$data]);
    }

    public function store(Request $request)
    { 
       

            $salat = new SalatTime();
            $salat->name = $request->name;
            $salat->time = $request->time;
            $salat->save();

            $data= (new SalatTimeResource($salat));
            return response()->json(['message'=>"Salat Time Save Successfully", 'data'=>$data]);

    }



    public function show(Request $request)
    {
       
            $salat = SalatTime::where('id', $request->id)->first(); 
            if( empty($salat) ){
                return response()->json("Salat Time Not Found", 404);
            }
            else
            {
                $data= (new SalatTimeResource($salat));
                return response()->json(['message'=>"Salat Time Save Successfully", 'data'=>$data]);
            }

    }

    public function update(Request $request)
    {
        $salat = SalatTime::where('id', $request->id)->first();
        $salat->name = $request->name;
        $salat->time = $request->time;
        $salat->save();

        $data= (new SalatTimeResource($salat));
        return response()->json(['message'=>"Salat Time Update Successfully", 'data'=>$data]);
    }

    public function delete(Request $request)
    {

        SalatTime::where("id", $request->id)->delete();
        return response()->json(['message'=>"Salat Time List Deleted Successfully"], 200);

    }

}

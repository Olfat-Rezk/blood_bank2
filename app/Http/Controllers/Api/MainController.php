<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    Public function blood_types(){
        $blood_types = BloodType::all();
        return responseJson(1,'success',$blood_types);
    }

    public function governorates(){
        $governorates = Governorate::all();
        return  responseJson(1,'success',$governorates);

    }
    public function cities(Request $request){
        $cities = City::where(function ($query)use ($request){
            if ($request->has('governorate_id')){
                $query->where('governorete_id',$request->governorete_id);

            }

        })->get();
        return responseJson(1,'success',$cities);
    }
}

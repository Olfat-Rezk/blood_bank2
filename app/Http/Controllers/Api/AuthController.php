<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = validator()->make($request->all(),[
            'name'=>'required',
            'email'=>'required unique:clients',
            'password'=>'required confirmed',
            'phone'=>'required',
            'last_donation_date'=>'required',
            'city_id'=>'required',
            'blood_type_id'=>'required int',

            ]);
        if ($validator->fails())
        {
            return responseJson(0,$validator->errors()->first(),$validator->errors());

        }
        $request->merge('password'->bcrypt($request->password));

     $client = Client::creating($request->all());
     $client->api_token = str_random(60);
     $client->save();
        return responseJson(1,'added success',[
            'api_token'=>$client->api_token,
            'client'=>$client
        ]);

    }
    public function login(Request $request){
        $validator = validator()->make($request->all(),[

            'password'=>'required',
            'phone'=>'required',


        ]);
        if ($validator->fails())
        {
            return responseJson(0,$validator->errors()->first(),$validator->errors());

        }
       $client = Client::where('phpne',$request->phone)->first();
        if ($client){
            if (Hash::make($request->password,[$client->password])){
                return responseJson(1,'تم التسجيل ',[
                    'api_token'=>$client->api_token,
                    'client'=>$client

                ]);

            }
            else{
                return responseJson(0, 'data error');
            }

        }else{
            return responseJson(0, 'data error');
        }



    }
}

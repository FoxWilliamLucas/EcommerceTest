<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\{User, Store};
use App\ValidationRules\UserRules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Auth, Hash, Validator};
use App\Helpers\{Response, ValidatorHelper, ResponseStatus};

class AuthController extends Controller
{

    public function register(Request $request){
        try{
            $data = $request->all();
            $validator = Validator::make($data ,UserRules::register() ,ValidatorHelper::messages());
            if ($validator->passes()){
                $data['password'] = bcrypt($request->password);
                $user = User::create($data);
                Store::create(['user_id'   => $user->id]);
                return Response::respondSuccess(Response::SUCCESS , $user);
            }
            return Response::respondError($validator->errors()->all(), ResponseStatus::VALIDATION_ERROR);
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function login(Request $request){
        try{
            $data = $request->only(['email','password']); 
            $validator = Validator::make($data , UserRules::login(),ValidatorHelper::messages());
            if ($validator->passes()){
                $user = User::where('email',$data['email'])->first();
                if ($user) {
                    if (Hash::check($request->password, $user->password)) {
                        $response['token'] = $user->createToken(config('app.name'))->plainTextToken;
                        return Response::respondSuccess(Response::LOGIN_SUCCESSFULLY, $response);
                    } else {
                        return Response::respondError(Response::LOGIN_FAILED, ResponseStatus::UNAUTHORIZED);
                    }
                } else {
                    return Response::respondError(Response::USER_NOT_FOUND, ResponseStatus::UNAUTHORIZED);
                }
            }
            return Response::respondError($validator->errors()->all(), ResponseStatus::VALIDATION_ERROR);
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function logout(){
        try{
            if (Auth::check()) {
                Auth::user()->currentAccessToken()->delete();
                return Response::respondSuccess(Response::LOGOUT_SUCCESSFULLY);
            } else {
                return Response::respondError(Response::USER_NOT_FOUND, ResponseStatus::UNAUTHORIZED);
            }
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}

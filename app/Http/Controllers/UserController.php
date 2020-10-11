<?php

namespace App\Http\Controllers;

use App\Models\Constants;
use App\Models\User;
use const false;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {

        if ($request->api_username != Constants::$API_USERNAME || $request->api_password != Constants::$API_PASSOWRD) {
            return response()->json([
                'code' => Response::HTTP_FORBIDDEN, 'message' => "Wrong api credentials"
            ], Response::HTTP_FORBIDDEN);
        } else {
            $user = DB::table('users')
                ->where('email', $request->email)
                ->first();


            if ($user != null) {
                return response()->json([
                    'code' => 302, 'message' => 'Account already exist',
                ], 302);
            } else {

                if ($request->email == null) {
                    return response()->json([
                        'code' => 302, 'message' => 'Empty params',
                    ], Response::HTTP_OK);
                } else {

                    $user = new User();
                    $user->name = $request->first_name;
                    $user->email = $request->email;
                    $user->current_team_id = $request->current_team_id;
                    $user->profile_photo_path = $request->profile_photo_path;
                    $user->first_name = $request->first_name;
                    $user->second_name = $request->second_name;
                    $user->third_name = $request->third_name;
                    $user->sir_name = $request->sir_name;
                    $user->phone_verified = false;
                    $user->user_type = $request->user_type;
                    $user->individual_type = $request->individual_type;
                    $user->institutional_type = $request->institutional_type;
                    $user->company_name = $request->company_name;
                    $user->company_registry_number = $request->company_registry_number;
                    $user->registry_date = $request->registry_date;
                    $user->registry_expiry_date = $request->registry_expiry_date;
                    $user->registry_issuing_area = $request->registry_issuing_area;
                    $user->registry_area = $request->registry_area;
                    $user->registry_pic_url = $request->registry_pic_url;
                    $user->identity_or_residence = $request->identity_or_residence;
                    $user->residence_permit_pic_url = $request->residence_permit_pic_url;
                    $user->password = md5($request->password);

                    $user->save();
                    return response()->json([
                        'code' => Response::HTTP_OK, 'message' => "false", 'user' => $user
                        ,
                    ], Response::HTTP_OK);
                }

            }

        }

    }

    public function getUserData(Request $request)
    {
        if ($request->api_username != Constants::$API_USERNAME || $request->api_password != Constants::$API_PASSOWRD) {
            return response()->json([
                'code' => Response::HTTP_FORBIDDEN, 'message' => "Wrong api credentials"
            ], Response::HTTP_FORBIDDEN);
        } else {
            $user = User::find($request->id);
            return response()->json([
                'code' => Response::HTTP_OK, 'message' => "false", 'user' => $user
                ,
            ], Response::HTTP_OK);
        }
    }
}

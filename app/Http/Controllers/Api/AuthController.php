<?php
/* app\Http\Controllers\Api\AuthController.php */

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\customer_info;
use Illuminate\Validation\Rules;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Auth\Events\Registered;
use App\Http\Resources\userDataResource;

class AuthController extends Controller
{
    //
    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $already_eaused_email = User::where('email', $request->email)->first();
        if ($already_eaused_email) {
            return response()->json(
                [
                    "user" => Null,
                    "message" => "phone-already-in-use",
                    "stus" => "failed",
                ],
                200
            );
        }




        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);



        function splitName($name)
        {
            // Use the explode function to split the name by the comma
            $parts = explode(',', $name);

            // Check if the split resulted in exactly 2 parts
            if (count($parts) == 2) {
                // Return an associative array with firstName and lastName
                return [
                    'firstName' => trim($parts[0]),
                    'lastName'  => trim($parts[1])
                ];
            } else {
                // Handle the case where the input is not in the expected format
                return [
                    'firstName' => null,
                    'lastName'  => null
                ];
            }
        }



        $user = customer_info::create([
            'user_id' => $user['id'],
            'firstName' => splitName($request->name)['firstName'],
            'lastName' => splitName($request->name)['lastName'],
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'birthDate' => $request->birthDate,
        ]);

        event(new Registered($user));

        // $created_user = User::where('email', '=', $request->email)->first();

        return response()->json([
            'stus' => 'registered',
        ], 200);
    }



    public function login(Request $request)
    {


        if (!Auth::attempt($request->only("email", "password"))) {
            return response()->json(
                [
                    "user" => Null,
                    "message" => "invalid-credentials",
                    "stus" => "failed",
                ],
                422
            );
        }




        $user = User::where("email", $request["email"])->firstOrFail();

        $user_loggedin = [
            'id' => $user->id,
            'email' => $user->email,
            'stus' => 'loggedin'
        ];

        return response()->json(
            $user_loggedin,
            200
        );
    }
  
    public function reset_pass(Request $request)
    {
        $user = User::where("email", $request["email"])->first();
        if ($user) {
            $user->password = Hash::make($request["new_password"]);
            $user->save();
            return response()->json([
                'stus' => 'reset',
            ], 200);
        } else {
            return response()->json([
                'stus' => 'failed',
            ], 200);
        }
    }
 
    public function update_user_data(Request $request)
    {



        $verify_user =  User::find($request->query('user_id'));

        if ($verify_user) {

            $user_info = customer_info::where("user_id", $request->query('user_id'))->firstOrFail();

            $user_info->update($request->all());

            return response()->json(

                [
                    "data" => $user_info,
                    "message" => "custmer data has been updated",
                    "stus" => "success",
                ],
                200
            );
        }

        return response()->json(
            [
                "user" => [],
                "message" => "invalid-credentials",
                "stus" => "failed",
            ],
            200
        );
    }
    public function get_user_data(Request $request)
    {

        $verify_user =  User::find($request->query('user_id'));
        // dd($verify_user);


        if ($verify_user->id ?? null) {


            $user_info = customer_info::where('user_id', $verify_user->id)->get(); // error
            if (count($user_info)) {
                return new userDataResource($user_info[0]);
            }

            return response()->json(
                [
                    "user" => [],
                    "message" => "user not found",
                    "stus" => "failed",
                    "code" => 404,
                ],
                404
            );
        }

        return response()->json(
            [
                "user" => [],
                "message" => "user not found",
                "stus" => "failed",
                "code" => 404,
            ],
            404
        );
    }


    public function CompanyData(Request $request)
    {


        return response()->json(
            [
                "data" => [
                    "phone_number_1" => env('PHONENOONE'),
                    "phone_number_2" => env('PHONENOTWO'),
                    "email" => env('EMAIL'),
                ],
                "message" => "data fetched correctrly",
                "stus" => "success",
                "code" => 200,
            ],
            200
        );
    }



    public function send_user_photo(Request $request)
    {
        $user = User::find($request->query('user_id'));
        $user_info = customer_info::where("user_id", $request->query('user_id'))->firstOrFail();


        // dd($user_info);
        // dd('hello');
        if ($user && $user_info) {

            if (isset($user_info->profileImage)) {
                $image_path = asset('uploads/' . $user_info->profileImage);  // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }


            $request->photo->storeAs('profile_photo', 'user_' . $user->id . '.jpg', 'my_public');



            $user_info->profileImage = 'user_' . $user->id . '.jpg';
            $user_info->update();

            return response()->json(

                [
                    "message" => "user profile photo  has been updated successfully",
                    "stus" => "success",
                    "code" => 200,
                ],
                200
            );
        } else {
            return response()->json(
                [
                    "user" => [],
                    "message" => "error has acuured",
                    "stus" => "failed",
                ],
                500
            );
        }
    }
}

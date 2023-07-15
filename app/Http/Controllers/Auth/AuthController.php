<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Password;
use Laravel\Passport\HasApiTokens;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
        // $token = createToken('APPTOKEN')->accessToken;
        // return $token;
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => ['required'],
        ]);

        // $loginTime = [
        //     'last_logged_in' => Carbon::now(),
        // ];
        // $update = User::where('username', $request->username)->first();
        // $update->update($loginTime);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        $user = User::where('username', $request->username)->first();
// dd($user);
// dd($request->password);
        if ($user) {
            if ($request->password === $user->password) {
                Auth::login($user);
                $token = $user->createToken('APPTOKEN')->accessToken;
                $response = ['token' => $token];
                // return response($response, 200);
                return redirect()->route('dashboard');
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" => 'User does not exist'];
            return response($response, 422);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'first_name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            // 'email' => 'required|string|email|unique:users,email',
            'username' => 'required|unique:users,username',
            // 'date_of_birth' => 'required|date',
            // 'tel_code' => 'required',
            // 'mobile_no' => 'required',
            // 'gender' => ['required', Rule::in(['male', 'female', 'others'])],
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->letters()],
            // 'agreement' => 'required',
        ]);

        if ($validator->fails()) {
            return response()
                ->json($validator->errors()
                    ->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            [
                'password' => $request->password,
                // 'device' => 'app',
            ]
        ));

        // $sendemail = $user->sendEmailVerificationNotification();

        $token = $user->createToken('APPLOGIN')->accessToken;

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ], 200);
    }

    public function perform(Request $request)
    {
        // dd('p');
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
        // $token = $request->user()->token();
        // $token->revoke();
     
        return redirect('/');
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        // $response = ['message' => '!'];

        return response()->json([
            'status' => 'success',
        ], 200);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function refresh()
    // {
    //     // return $this->createNewToken(auth()->refresh());
    // }

    // public function userProfile()
    // {
    //     return response()->json(auth()->user());
    // }

    // protected function createNewToken($token)
    // {
    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'bearer',
    //         'user' => auth()->user()
    //     ]);
    // }
}

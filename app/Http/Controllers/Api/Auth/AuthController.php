<?php
namespace App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\Auth\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class AuthController extends Controller
{
    /**
     * Register a User.
     * @return \Illuminate\Http\Response
     */

    public function me(Request $request)
    {
        $user =$request->user();
        return new UserResource($user);
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3','max:50'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'surname'=>['nullable','string','min:3','max:50'],
            'age'=>['nullable','integer'],
            'address'=>['nullable','string'],
            'gender'=>['nullable','integer'],
        ]);
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        $token = $user->createToken('MyAppToken')->plainTextToken;

        
        return response()->json([
            'status' => true,
            'message' => 'User successfully registered',
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);
        if (Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])) {
            $user = Auth::user();
            Auth::guard('web')->login($user);
            $token = $user->createToken('ShopApp')->plainTextToken;
            $minutes = 1440;
            $timestamp = now()->addMinute($minutes);
            $expires_at = date('M d, Y H:i A', strtotime($timestamp));
            return response()->json([
                //'user'=>$user,
                'status' => true,
                'message' => 'Login successful',
                'access_token' => $token,
                'token_type' => 'Bearer',
                'expires_at' => $expires_at,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Credentials',
            ], 400);
        }
    }
    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        Auth::guard('web')->logout();
        return response()->json([
            'status' => true,
            'message' => 'Logged out',
        ], 200);
    }
}
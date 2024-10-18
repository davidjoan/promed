<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Resources\Login;
use App\Models\User;
use LevelUp\Experience\Models\Achievement;

class AuthController extends Controller
{
    /**
     * Login user (Create a new  token)
     *
     * @return [string] message
     */
    public function login(Request $request)
    {
		if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
			$success['user']  =  Login::make($request->user()); 
            $success['token'] =  $request->user()->createToken('Promed')->plainTextToken; 
			return $this->sendResponse($success, 'Login successfully.');
		} else{ 
			return $this->sendError('Login Error.', ['error'=>'Unauthorized'], 401);
		} 
    }

    /**
     * Validate and Register new Users
     *
     * @return [json] user object
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($request->password);
        $user = User::create($validatedData);
        $accessToken = $user->createToken('Promed')->accessToken;

        $achievement = Achievement::find(1);
        $user->grantAchievement($achievement);

        return $this->sendResponse([
            'user' => $user, 
            'access_token' => $accessToken],
            'Successfully user registered.');
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();  
        return $this->sendResponse([
        ], 'Successfully logged out.'); 
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return $this->sendResponse(['user' => $request->user()->toArray()],
        'Successfully User info provided.');
    }

    /**
     * Refresh User Token
     *
     * @return [json] user object
     */
    public function refreshToken(Request $request) {

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return $this->sendResponse([
            'user' => $user,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ],'Personal Access Token Successfully refreshed.');
    }
}
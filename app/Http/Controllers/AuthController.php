<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\PersonalAccessToken;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public $user = '';
    public $token = '';

    public function getUser()
    {
        if (Auth::user()) {
            $this->user = Auth::user();
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6']
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $this->user = User::create($input);
        if ($this->user) {
            Auth::login($this->user);
            return redirect('/');
        } else {
            return responder()->error('', 'Error create User')->respond(400);
        }
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6']
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return back()->withErrors('User not found/bad password')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function token()
    {
        $this->getUser();

        if (!$this->user) {
            return redirect('/login');
        }

        $this->user->tokens()->delete();
        $this->token = $this->user->createToken($this->user->name)->plainTextToken;
    }

    public function tokenDel(string $userName)
    {
        $user = User::whereName($userName)->first();
        $user->tokens()->delete();

        return redirect('/tokens');
    }

    public function home()
    {
        $this->token();

        return view('welcome', [
            'token' => $this->token
        ]);
    }

    public function tokens()
    {
        $tokens = PersonalAccessToken::all();

        return view('tokens', [
            'tokens' => $tokens
        ]);
    }

}

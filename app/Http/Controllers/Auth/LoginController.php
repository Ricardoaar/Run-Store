<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($driver): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    public function getUserInformation($driver)
    {
        $userMedia = Socialite::driver($driver)->stateless()->user();
        $email = $userMedia->getEmail();


        $user = User::where('email', $email)->first();

        if ($user) {
            auth()->login($user);
            return redirect()->route('home');
        } else {

            $user = User::create([
                'name' => $userMedia->getName(),
                'email' => $userMedia->getEmail(),
                'password' => null,
            ]);
            auth()->login($user);
            return redirect()->route('home');

        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\Candidate;
use App\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param ResetPasswordRequest $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function reset(ResetPasswordRequest $request)
    {
        $broker = User::where('email', $request->get('email'))->count() ? 'users' : 'candidates';
        $guard = $broker == 'users' ? '' : 'candidate';

        $response = $this->broker($broker)->reset(
                $this->credentials($request), function ($user, $password) use($guard) {
                $this->resetPassword($user, $password, $guard);
            }
        );

        return $response === Password::PASSWORD_RESET
            ? $this->success(null, route('candidate.dash'))
            : $this->fails('Aconteceu algum erro, tente novamente.');
    }

    /**
     * @param $user
     * @param $password
     * @param $guard
     */
    protected function resetPassword($user, $password, $guard)
    {
        $this->setUserPassword($user, $password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        $this->guard($guard)->login($user);
    }

    /**
     * @param $broker
     * @return mixed
     */
    public function broker($broker)
    {
        return Password::broker($broker);
    }

    /**
     * @param $guard
     * @return mixed
     */
    protected function guard($guard)
    {
        return Auth::guard($guard);
    }

}

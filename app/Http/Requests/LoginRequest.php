<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws ValidationException
     */
    public function authenticate():void
    {
        $user = User::where('username', $this->input('username'))->first();

        // If the user exists and their password is correct
        if ($user && Hash::check($this -> input('password'), $user->password)) {
            // Log the user in
            Auth::login($user);
        }
        else {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
//        $this->ensureIsNotRateLimited();
//
//        $user = User::where('email', $this->input('email'))->orWhere('username', $this->input('username'))->first();
//
//        if ($user && $user->locked) {
//            $seconds = RateLimiter::availableIn($this->throttleKey());
//
//            throw ValidationException::withMessages([
//                'email' => trans('auth.throttle', [
//                    'seconds' => $seconds,
//                    'minutes' => ceil($seconds / 60),
//                    'hours' => ceil($seconds / 3600),
//                ]),
//            ]);
//        }
//
//        if (! Auth::attempt($this->only('email', 'username', 'password'), $this->boolean('remember'))) {
//            RateLimiter::hit($this->throttleKey());
//
//            throw ValidationException::withMessages([
//                'email' => trans('auth.failed'),
//            ]);
//        }
//
//        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5, 86400)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
                'hours' => ceil($seconds / 3600),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email').$this->input('username')).'|'.$this->ip());
    }
}

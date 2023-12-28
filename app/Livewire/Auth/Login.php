<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class Login extends Component
{
    #[Rule('required|email')]
    public $email;

    #[Rule('required|min:8')]
    public $password;

    #[Layout('layouts.auth')]
    #[Title('Login')]

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function submit()
    {
        $this->validate();

        $auth = $this->authenticate();

        if ($auth == 0) {
            return;
        }

        Session::regenerate();

        $this->redirect(
            session('url.intended', RouteServiceProvider::HOME),
            navigate: true
        );
    }

    public function authenticate()
    {
        $limit = $this->ensureIsNotRateLimited();

        if ($limit == 0) {
            return 0;
        }

        if (!Auth::attempt($this->only(['email', 'password']))) {
            RateLimiter::hit($this->throttleKey());

            $this->dispatch('show-error');

            return 0;
        }

        RateLimiter::clear($this->throttleKey());
        return 1;
    }


    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited()
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return 1;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        $this->dispatch('show-error', [
            'message' => "Available in {$seconds} seconds."
        ]);

        return 0;
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }
}

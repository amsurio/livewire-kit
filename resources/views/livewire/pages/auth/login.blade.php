<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col justify-center items-center w-full h-[100vh] bg-[#282D2D] px-5">
    <div class="w-full p-5 rounded-md xl:max-w-3xl sm:p-10">
        <h1 class="text-xl font-semibold text-center text-white sm:text-3xl">
            Log In
        </h1>
        <div class="w-full mt-8">
            <div class="flex flex-col max-w-xs gap-4 mx-auto sm:max-w-md md:max-w-lg">
                <form wire:submit.prevent="login">
                    <input
                        class="w-full px-5 py-3 mt-4 text-sm font-medium text-black placeholder-gray-500 border-2 border-transparent rounded-lg focus:outline-none focus:border-2 focus:outline focus:border-white"
                        type="email" placeholder="Enter your email" wire:model="form.email" />
                    @error('password')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                    <input
                        class="w-full px-5 py-3 mt-4 text-sm font-medium placeholder-gray-500 border-2 border-transparent rounded-lg focus:outline-none focus:border-2 focus:outlinetext-black focus:border-white"
                        type="password" placeholder="Confirm your password" wire:model="form.password" />
                    @error('password_confirmation')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                    <button type="submit"
                        class="mt-5 tracking-wide font-semibold bg-[#E9522C] text-gray-100 w-full py-4 rounded-lg hover:bg-[#E9522C]/90 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                        <svg class="w-6 h-6 -m1-2" fill="none" stroke="currentColor" strokeWidth="2" fill="none"
                            strokeLinecap="round" strokeLinejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                            <path d="M20 12h-13l3 -3m0 6l-3 -3" />
                        </svg>
                        <span class="ml-3">LogIn</span>
                    </button>
                </form>
                <p class="mt-6 text-xs text-center text-gray-600">
                    Don't have an account?
                    <a href="/register" wire:navigate>
                        <span class="text-[#E9522C] font-semibold">Register</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

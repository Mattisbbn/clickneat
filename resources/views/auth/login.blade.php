@extends("layouts.auth")
@section("content")
<main class="d-flex align-items-center align-items-center bg-white p-4 rounded-3 shadow flex-column">
    <h1 class="mb-2">Se connecter</h1>
    <form method="POST" action="{{ route('login') }}" class="d-flex flex-column">
        @csrf

        <div class="p-2">
            <input placeholder="Adresse email" class="w-100 p-1 ps-2 pe-2 rounded-3 border-0 shadow-sm" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email">
            <x-input-error :messages="$errors->get('email')"/>
        </div>

        <div class="p-2 mb-2">
            <input placeholder="Mot de passe" class="w-100 p-1 ps-2 pe-2 rounded-3 border-0 shadow-sm" type="password" id="password" name="password"  required autocomplete="current-password" >
            <x-input-error :messages="$errors->get('password')"/>
        </div>

        <div>
            <label for="remember_me" class="d-flex align-items-center ps-2">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">Rester connecté</span>
            </label>
        </div>

        <div class="mt-2 ps-2 pe-2">
            @if (Route::has('password.request'))
                <a class="text-body-secondary me-2" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
            @endif
           
        </div>
        <x-submit-button>Se connecter</x-submit-button>
    </form>
</main>
<x-auth-session-status class="mb-4" :status="session('status')" />
@endsection
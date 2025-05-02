<x-auth-layout>


<main class="bg-white m-auto shadow-lg rounded-lg flex flex-col align-middle justify-center">
    <img class=" mx-auto w-2/12 p-4" src="{{ asset("img/logo.svg") }}" alt="">
    <h1 class="font-bold text-center text-xl">Bienvenue sur Click&Eat</h1>
    <h6 class="font-semibold text-center text-gray-600">Créer votre compte</h6>

    <form method="POST" class="d-flex flex-column w-10/12 mx-auto" action="{{ route('register') }}">
        @csrf

        <div class="p-2">
            <p class="mb-2">Nom d'utilisateur</p>
            <x-auth-input placeholder="Nom d'utilisateur" id="name" type="text" name="name"></x-auth-input>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="p-2">
            <p class="mb-2">Adresse email</p>
            <x-auth-input placeholder="Adresse email" id="email" type="email" name="email"></x-auth-input>
            <x-input-error :messages="$errors->get('email')"/>
        </div>

        <div class="p-2">
            <p class="mb-2">Mot de passe</p>
            <x-auth-input placeholder="Mot de passe" id="password" type="password" name="password" required></x-auth-input>
            <x-input-error :messages="$errors->get('password')"/>
        </div>
        <div class="p-2">
            <p class="mb-2">Confirmation mot de passe</p>
            <x-auth-input placeholder="Confirmation mot de passe" id="password_confirmation" type="password" name="password_confirmation" required></x-auth-input>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <div class="p-2">
            <x-submit-button class="w-full">S'inscrire</x-submit-button>
        </div>

            <p class="text-center mb-4">
                Déja inscrit ? <a class="text-clementine-500 font-semibold hover:underline" href="{{ route('login') }}">Se connecter</a>
            </p>

    </form>
</main>
</x-auth-layout>


{{--
<x-auth-layout>
    <div class="bg-white m-auto shadow-lg rounded-lg flex flex-col align-middle justify-center">
        <img class=" mx-auto w-2/12 p-4" src="{{ asset("img/logo.svg") }}" alt="">
        <h1 class="font-bold text-center text-xl">Bienvenue sur Click&Eat</h1>
        <h6 class="font-semibold text-center text-gray-600">Connectez-vous pour commander</h6>
        <form method="POST" action="{{ route('login') }}" class="d-flex flex-column w-10/12 mx-auto">
            @csrf
            <div class="mt-4">
                <p class="mb-2">Adresse email</p>
                <x-auth-input placeholder="example@email.com" id="email" type="email" name="email" value="{{ old('email') }}" />
                <x-input-error :messages="$errors->get('email')"/>
            </div>

            <div class="mt-4">
                <p class="mb-2">Mot de passe</p>
                <x-auth-input placeholder="********" type="password" id="password" name="password"  required autocomplete="current-password"/>
                <x-input-error :messages="$errors->get('password')"/>
            </div>

            <div class="mt-4 flex justify-between">
                <label for="remember_me" class="flex align-middle ">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2">Se souvenir de moi</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-clementine-500 font-semibold" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                @endif

            </div>



            <x-submit-button class="mt-4 mb-3">Se connecter</x-submit-button>

            <p class="text-center mb-4">
                Pas encore de compte ? <a class="text-clementine-500 font-semibold hover:underline" href="{{ route('register') }}">Créer mon compte</a>
            </p>
        </form>
    </div>
</x-auth-layout> --}}

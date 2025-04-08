<x-auth-layout>

@section("content")
<main class="d-flex align-items-center align-items-center bg-white p-4 rounded-3 shadow flex-column">
    <h1 class="mb-2">Créer son compte</h1>


    <form method="POST" class="d-flex flex-column w-100" action="{{ route('register') }}">
        @csrf

        <div class="p-2">
            <input placeholder="Nom d'utilisateur" id="name" class="w-100 p-1 ps-2 pe-2 rounded-3 border-0 shadow-sm" type="text" name="name" value="{{old('name')}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="p-2">
            <input placeholder="Adresse email" class="w-100 p-1 ps-2 pe-2 rounded-3 border-0 shadow-sm" type="email" id="email" name="email" required autocomplete="email" >
            <x-input-error :messages="$errors->get('email')"/>
        </div>

        <div class="p-2">
            <input placeholder="Mot de passe" class="w-100 p-1 ps-2 pe-2 rounded-3 border-0 shadow-sm" type="password" id="password" name="password"  required  >
            <x-input-error :messages="$errors->get('password')"/>
        </div>
        <div class="p-2">
            <input placeholder="Confirmation mot de passe" class="w-100 p-1 ps-2 pe-2 rounded-3 border-0 shadow-sm" type="password" id="password_confirmation" name="password_confirmation"  required  >
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <div class="p-2">
            <a class="text-body-secondary" href="{{ route('login') }}">Déja inscrit ?</a>
        </div>

            <x-submit-button>S'inscrire</x-submit-button>

    </form>
</main>
</x-auth-layout>


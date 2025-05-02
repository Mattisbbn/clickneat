<x-guest-layout>

    <section class="flex flex-col align-start justify-start m-auto bg-white p-4 mt-6 shadow-xs rounded-lg w-[90%]">
        <h1 class="font-bold text-2xl">Paramètres du compte</h1>
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">@csrf</form>

        <form class="mt-3 flex flex-col me-auto " method="post" action="{{ route('profile.update') }}">
            <h2 class="text-lg mb-2">Informations personnelles</h2>
            @csrf
            @method('patch')


            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" class="border-0 shadow-sm rounded-3 px-3 py-1 mt-1" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @if($errors->get('name'))
                <div class="error-message">{{ implode(', ', $errors->get('name')) }}</div>
            @endif


            <x-input-label class="mt-2" for="email" :value="__('Email')" />
            <x-text-input id="email" class="border-0 shadow-sm rounded-3 px-3 py-1 mt-1" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @if($errors->get('email'))
                <div class="error-message">{{ implode(', ', $errors->get('email')) }}</div>
            @endif

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div class="mt-2">
                        <p>Votre adresse email n'est pas vérifiée. <button form="send-verification">Cliquez ici pour renvoyer l'email de vérification.</button></p>
                        @if (session('status') === 'verification-link-sent')
                            <p>Un nouveau lien de vérification a été envoyé à votre adresse email.</p>
                        @endif
                    </div>
                @endif

                    <x-submit-button class="mt-4">Sauvegarder les modifications</x-submit-button>

                @if (session('status') === 'profile-updated')
                    <p class="status-message">Sauvegardé</p>
                @endif

        </form>

        <!-- Formulaire de changement de mot de passe -->
        <form method="post"class="mt-3 flex flex-col me-auto " action="{{ route('password.update') }}">
            @csrf
            @method('put')
            <h2 class="text-black mb-2">Modifier le mot de passe</h2>

            <x-input-label for="update_password_current_password" :value="__('Mot de passe actuel')" />
            <x-text-input id="update_password_current_password" class="border-0 shadow-sm rounded-3 px-3 py-1 mt-1" name="current_password" type="password" autocomplete="current-password" />
            @if($errors->updatePassword->get('current_password'))
                <div class="error-message">{{ implode(', ', $errors->updatePassword->get('current_password')) }}</div>
            @endif

            <x-input-label for="update_password_password" :value="__('Nouveau mot de passe')" />
            <x-text-input id="update_password_password" class="border-0 shadow-sm rounded-3 px-3 py-1 mt-1" name="password" type="password" autocomplete="new-password" />
            @if($errors->updatePassword->get('password'))
                <div class="error-message">{{ implode(', ', $errors->updatePassword->get('password')) }}</div>
            @endif

            <x-input-label for="update_password_password_confirmation" :value="__('Confirmez le mot de passe')" />
            <x-text-input id="update_password_password_confirmation" class="border-0 shadow-sm rounded-3 px-3 py-1 mt-1" name="password_confirmation" type="password" autocomplete="new-password" />
            @if($errors->updatePassword->get('password_confirmation'))
                <div class="error-message">{{ implode(', ', $errors->updatePassword->get('password_confirmation')) }}</div>
            @endif

            <x-submit-button class="mt-4">Sauvegarder les modifications</x-submit-button>
            @if (session('status') === 'password-updated')
                <p class="status-message">Saved.</p>
            @endif

        </form>
<hr class="my-4 border-gray-300">

<form action="{{ route('logout') }}" method="post">
    @csrf
    @method('post')
    <x-submit-button class="mt-4"><i class="fa-solid fa-right-from-bracket me-2"></i>Se deconnecter</x-submit-button>
</form>

        <div class="flex justify-start">
            <x-secondary-button class="text-center mt-4" onclick="openModal('confirm-user-deletion')"><i class="fa-solid fa-trash me-2"></i> Supprimer le compte</x-secondary-button>
        </div>
        <!-- Formulaire de suppression du compte -->
        <form method="post" action="{{ route('profile.destroy') }}" class="mt-4">
            @csrf
            @method('delete')

                <div id="confirm-user-deletion" class="modal" style="display: none;">
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <h2>Êtes-vous sûr de vouloir supprimer votre compte ?</h2>

                        <p>
                            Une fois que votre compte est supprimé, toutes ses ressources et données seront définitivement supprimées. Veuillez entrer votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.
                        </p>

                        <div>
                            <x-input-label for="password">{{ __('Mot de passe') }}</x-input-label>
                            <x-text-input class="px-3 py-1 mb-2" id="password" name="password" type="password" placeholder="{{ __('Mot de passe') }}" />
                            @if($errors->userDeletion->get('password'))
                                <div class="error-message">{{ implode(', ', $errors->userDeletion->get('password')) }}</div>
                            @endif
                        </div>

                        <div>
                            <x-secondary-button type="button" onclick="closeModal('confirm-user-deletion')">
                                {{ __('Annuler') }}
                            </x-secondary-button>

                            <x-secondary-button  type="submit">
                                {{ __('Supprimer le compte') }}
                            </x-secondary-button>
                        </div>
                    </form>
                </div>


            <script>
                function openModal(modalId) {
                    document.getElementById(modalId).style.display = 'block';
                }

                function closeModal(modalId) {
                    document.getElementById(modalId).style.display = 'none';
                }
            </script>


{{--
            @include('profile.partials.update-password-form')
            @include('profile.partials.delete-user-form') --}}


        </section>
</x-guest-layout>

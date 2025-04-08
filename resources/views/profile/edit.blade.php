<x-auth-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <section class="mt-3 mb-4 p-4 rounded-3 shadow d-flex m-auto flex-column col-10 col-xl-5">
                <h2 class="text-black fw-bold">Paramètres du compte</h2>

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form class="border border-2 p-4 rounded-3 border-gray" method="post" action="{{ route('profile.update') }}">
                    <h5 class="text-black mb-2">Information personelles</h5>
                    @csrf
                    @method('patch')
                    <div class="d-flex flex-column">
                        <label for="name">Nom</label>
                        <input id="name" class=" border-0 shadow-sm rounded-3 px-2" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                        @if($errors->get('name'))
                            <div class="error-message">{{ implode(', ', $errors->get('name')) }}</div>
                        @endif
                    </div>

                    <div class="d-flex flex-column">
                        <label for="email">Email</label>
                        <input id="email"  class=" border-0 shadow-sm rounded-3 px-2" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username" />
                        @if($errors->get('email'))
                            <div class="error-message">{{ implode(', ', $errors->get('email')) }}</div>
                        @endif

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                            <div>
                                <p>Your email address is unverified.<button form="send-verification">Click here to re-send the verification email.</button></p>

                                @if (session('status') === 'verification-link-sent')
                                    <p>
                                        A new verification link has been sent to your email address.
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="d-flex">
                        <div class="ms-auto mt-3"><x-submit-button>Sauvegarder les modifications</x-submit-button></div>
                        @if (session('status') === 'profile-updated')
                            <p class="status-message">Sauvegardé</p>
                        @endif
                    </div>
                </form>




                <form method="post" action="{{ route('password.update') }}" class="border border-2 p-4 rounded-3 border-gray mt-4">
                    @csrf
                    @method('put')
                    <h5 class="text-black mb-2">Modifier le mot de passe</h5>

                    <div class="d-flex flex-column">
                        <label for="update_password_current_password">Mot de passe actuel</label>
                        <input class=" border-0 shadow-sm rounded-3 px-2" id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" />
                        @if($errors->updatePassword->get('current_password'))
                            <div class="error-message">{{ implode(', ', $errors->updatePassword->get('current_password')) }}</div>
                        @endif
                    </div>

                    <div class="d-flex flex-column">
                        <label for="update_password_password">Nouveau mot de passe</label>
                        <input class=" border-0 shadow-sm rounded-3 px-2" id="update_password_password" name="password" type="password" autocomplete="new-password" />
                        @if($errors->updatePassword->get('password'))
                            <div class="error-message">{{ implode(', ', $errors->updatePassword->get('password')) }}</div>
                        @endif
                    </div>

                    <div class="d-flex flex-column">
                        <label for="update_password_password_confirmation">Confirmez le mot de passe</label>
                        <input class=" border-0 shadow-sm rounded-3 px-2" id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
                        @if($errors->updatePassword->get('password_confirmation'))
                            <div class="error-message">{{ implode(', ', $errors->updatePassword->get('password_confirmation')) }}</div>
                        @endif
                    </div>

                    <div class="form-buttons d-flex">
                        <div class="ms-auto mt-3"><x-submit-button>Sauvegarder les modifications</x-submit-button></div>
                        @if (session('status') === 'password-updated')
                            <p class="status-message">Saved.</p>
                        @endif
                    </div>
                </form>



                <button class="mt-4 bg-transparent px-3 py-1 rounded-3 border border-2 border-danger text-danger fw-semibold m-auto" onclick="openModal('confirm-user-deletion')">Supprimer le compte</button>













            </section>





































            <section>




                <div id="confirm-user-deletion" class="modal" style="display: none;">
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <h2>{{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}</h2>

                        <p>
                            {{ __('Une fois que votre compte est supprimé, toutes ses ressources et données seront définitivement supprimées. Veuillez entrer votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.') }}
                        </p>

                        <div>
                            <label for="password">{{ __('Mot de passe') }}</label>
                            <input id="password" name="password" type="password" placeholder="{{ __('Mot de passe') }}" />
                            @if($errors->userDeletion->get('password'))
                                <div class="error-message">{{ implode(', ', $errors->userDeletion->get('password')) }}</div>
                            @endif
                        </div>

                        <div>
                            <button type="button" onclick="closeModal('confirm-user-deletion')">
                                {{ __('Annuler') }}
                            </button>

                            <button type="submit">
                                {{ __('Supprimer le compte') }}
                            </button>
                        </div>
                    </form>
                </div>
            </section>

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
        </div>
    </div>
</x-auth-layout>

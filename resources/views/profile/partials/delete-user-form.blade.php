<section>
    <header>
        <h2>Supprimer le compte</h2>
        <p>
            {{ __('Une fois que votre compte est supprimé, toutes ses ressources et données seront définitivement supprimées. Avant de supprimer votre compte, veuillez télécharger toute donnée ou information que vous souhaitez conserver.') }}
        </p>
    </header>

    <button onclick="openModal('confirm-user-deletion')">{{ __('Supprimer le compte') }}</button>

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

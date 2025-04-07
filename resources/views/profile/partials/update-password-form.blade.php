<section class="mt-3 mb-4">
    <h2 class="text-center">Modifier le mot de passe</h2>

    <form method="post" action="{{ route('password.update') }}" class="d-flex flex-column align-items-center align-items-center">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" />
            @if($errors->updatePassword->get('current_password'))
                <div class="error-message">{{ implode(', ', $errors->updatePassword->get('current_password')) }}</div>
            @endif
        </div>

        <div>
            <label for="update_password_password">New Password</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password" />
            @if($errors->updatePassword->get('password'))
                <div class="error-message">{{ implode(', ', $errors->updatePassword->get('password')) }}</div>
            @endif
        </div>

        <div>
            <label for="update_password_password_confirmation">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
            @if($errors->updatePassword->get('password_confirmation'))
                <div class="error-message">{{ implode(', ', $errors->updatePassword->get('password_confirmation')) }}</div>
            @endif
        </div>

        <div class="form-buttons">
            <button type="submit">Save</button>
            @if (session('status') === 'password-updated')
                <p class="status-message">Saved.</p>
            @endif
        </div>
    </form>
</section>


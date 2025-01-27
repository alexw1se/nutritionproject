<!-- this view is shown when a user requests a password reset -->
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div>
        <label for="email">Email Address</label>
        <input type="email" name="email" required autofocus>
    </div>
    <button type="submit">Send Password Reset Link</button>
</form>

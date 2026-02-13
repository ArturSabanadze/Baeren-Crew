<div class="main-container-wrapper">
    <div class="login-container">
    <h1>Sign in</h1>
        <div class="form-slider">
        <!-- Username or email login field -->
            <form id="loginFormUsername" class="form-step active">
                <input type="hidden" name="action" value="verify_username" />
                <label for="username">Username or Email</label>
                <input type="text" id="username" name="username" />
                <button type="submit" class="btn-primary">Continue</button>
            </form>
        <!-- Password form is hidden by default and will be shown after username verification -->
             <form id="loginFormPassword" class="form-step">
                <input type="hidden" name="action" value="verify_password" />
                <label for="password">Password</label>
                <input type="password" id="password" name="password_plain" />
                <button type="submit" class="btn-primary">Continue</button>
            </form>
        </div>
        <div id="loginError" style="color:red; margin-top:10px;"></div>
            <p class="legal">
                By continuing, you agree to UNIQs
                <a href="#">Conditions of Use</a> and
                <a href="#">Privacy Notice</a>.
            </p>
            <details class="help">
                <summary>Need help?</summary>
                <a href="#">Forgot your password?</a>
                <a href="contact.php">Other issues with sign-in</a>
            </details>
        <!-- Divider -->
            <div class="divider">
                <span>New to UNIQ?</span>
            </div>
        <!-- Create Account -->
        <div class="register">
            <button onClick="location.href='?page=register'" class="btn-secondary">
                Create your UNIQ account
            </button>
    </div>
</div>

<div class="main-container-wrapper">
    <div class="login-container">
        <h1>Create account</h1>

        <div class="form-slider">
            <form id="registerForm" class="form-step active" method="post">
                <input type="hidden" name="action" value="register_new_user"  />

                <label for="reg_username">Username</label>
                <input type="text" id="reg_username" name="username" required />

                <label for="reg_email">Email</label>
                <input type="email" id="reg_email" name="email" required />

                <label for="reg_email_confirm">Confirm Email</label>
                <input type="email" id="reg_email_confirm" name="email_confirm" required />

                <label for="reg_password">Password</label>
                <input type="password" id="reg_password" name="password" required />

                <label for="reg_password_confirm">Confirm Password</label>
                <input type="password" id="reg_password_confirm" name="password_confirm" required />

                <button type="submit" class="btn-primary">Create Account</button>
            </form>
        </div>

        <div id="registerError" style="color:red; margin-top:10px;"></div>

        <p class="legal">
            By creating an account, you agree to UNIQ’s
            <a href="#">Conditions of Use</a> and
            <a href="#">Privacy Notice</a>.
        </p>

        <div class="divider">
            <span>Already have an account?</span>
        </div>

        <div class="register">
            <button onClick="location.href='?page=login'" class="btn-secondary">
                Sign in
            </button>
        </div>
    </div>
</div>

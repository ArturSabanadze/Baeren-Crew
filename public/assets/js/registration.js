document.addEventListener("DOMContentLoaded", () => {
  const formRegistration = document.getElementById("registerForm");
  const loginError = document.getElementById("loginError");
  const formData = new FormData();

  async function handleRegistration(e) {
    e.preventDefault();

    const username = formRegistration.querySelector('[name="username"]').value.trim();
    const email = formRegistration.querySelector('[name="email"]').value.trim();
    const password = formRegistration.querySelector('[name="password"]').value;
    const confirmPassword = formRegistration.querySelector('[name="password_confirm"]').value;
    if (!username || !email || !password || !confirmPassword) {
      loginError.textContent = "Please fill in all fields.";
      return;
    }
    if (password !== confirmPassword) {
      loginError.textContent = "Passwords do not match.";
      return;
    }
    formData.set("username", username);
    formData.set("email", email);
    formData.set("password", password);
    formData.set("action", "register_new_user");

    try {
      const res = await fetch(window.location.href, {
        method: "POST",
        body: formData,
      });

      const data = await res.json();

      if (data.success) {
        window.location.href = "index.php";
      } else {
        loginError.textContent = "Invalid password.";
      }
      } catch (err) {
        console.error(err);
        loginError.textContent = "Server error. Please try again.";
      }
    }
    formRegistration.addEventListener("submit", handleRegistration);
});

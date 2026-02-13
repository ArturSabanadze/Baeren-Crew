document.addEventListener("DOMContentLoaded", () => {
  const formUsername = document.getElementById("loginFormUsername");
  const formPassword = document.getElementById("loginFormPassword");
  const loginError = document.getElementById("loginError");
  const formData = new FormData();

  formUsername.addEventListener("submit", e => {
        e.preventDefault();
        const username = formUsername.querySelector('[name="username"]').value.trim();
        if (!username) {
          loginError.textContent = "Please enter your username or email.";
          return;
        }
        formData.set("username", username);

        formUsername.classList.add("exit-left");
        formPassword.classList.add("active");
        document.getElementById("password").focus();
    });

  formPassword.addEventListener("submit", e => {
      e.preventDefault();
      const password = formPassword.querySelector('[name="password_plain"]').value;
      formData.set("password", password);
      formData.set("action", "authenticate");
      fetch(window.location.href, {
        method: "POST",
        body: formData,
        headers: {
          "X-Requested-With": "XMLHttpRequest"
        }
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          window.location.href = "index.php?page=home";
        } else {
          loginError.textContent = "Invalid credentials.";
        }
      });
    });
});

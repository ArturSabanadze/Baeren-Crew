const form = document.getElementById("user-profile-form");

 form.addEventListener("submit", e => {
        e.preventDefault();

        form.querySelectorAll('[disabled]').forEach(el => {
          el.removeAttribute('disabled');
        });
        e.preventDefault();
        const formData = new FormData(form);

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
            console.log("Profile updated successfully");
            window.location.href = "index.php?page=my-account";
          } else {
            loginError.textContent = "Invalid credentials.";
          }
        });
    }
);

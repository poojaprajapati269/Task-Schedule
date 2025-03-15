// Password Toggle Functionality
document.addEventListener("DOMContentLoaded", function() {
    const passwordField = document.getElementById("password");
    const togglePasswordButton = document.getElementById("toggle-password");

    if (passwordField && togglePasswordButton) {
        togglePasswordButton.addEventListener("click", function() {
            // Toggle password visibility
            if (passwordField.type === "password") {
                passwordField.type = "text";
                togglePasswordButton.textContent = "Hide Password";
            } else {
                passwordField.type = "password";
                togglePasswordButton.textContent = "Show Password";
            }
        });
    }
});

// Form Validation (example: user login)
document.getElementById("login-form")?.addEventListener("submit", function(event) {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    if (email === "" || password === "") {
        event.preventDefault();
        alert("Please fill in both email and password.");
    }
});

// Task Form Validation
document.getElementById("task-form")?.addEventListener("submit", function(event) {
    const startTime = document.getElementById("start_time").value;
    const stopTime = document.getElementById("stop_time").value;

    if (!startTime || !stopTime) {
        event.preventDefault();
        alert("Please provide both start and stop times.");
    }
});

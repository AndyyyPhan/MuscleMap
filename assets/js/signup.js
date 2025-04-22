document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("signupForm");
  
    form.addEventListener("submit", function (e) {
      const username = document.getElementById("username").value.trim();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirmPassword").value;
  
      let errorMessages = [];
  
      if (username.length < 3) {
        errorMessages.push("Username must be at least 3 characters long.");
      }
  
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        errorMessages.push("Please enter a valid email address.");
      }
  
      const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/;
      if (!passwordRegex.test(password)) {
        errorMessages.push("Password must be at least 8 characters long and include uppercase, lowercase, number, and special character.");
      }
  
      if (password !== confirmPassword) {
        errorMessages.push("Passwords do not match.");
      }
  
      if (errorMessages.length > 0) {
        e.preventDefault(); // Stop form submission
  
        // Remove existing error if any
        let oldError = document.getElementById("form-error");
        if (oldError) oldError.remove();
  
        const errorDiv = document.createElement("div");
        errorDiv.className = "alert alert-danger";
        errorDiv.id = "form-error";
        errorDiv.innerHTML = errorMessages.join("<br>");
        form.parentNode.insertBefore(errorDiv, form);
      }
    });
  });
  
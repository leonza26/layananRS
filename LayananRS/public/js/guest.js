// Password visibility toggle
const togglePasswordButton = document.getElementById('togglePassword');
const passwordInput = document.getElementById('password');
const eyeIcon = togglePasswordButton.querySelector('i');

togglePasswordButton.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    // Toggle eye icon
    eyeIcon.classList.toggle('fa-eye');
    eyeIcon.classList.toggle('fa-eye-slash');
});

// Set current year in footer
document.getElementById('currentYearLogin').textContent = new Date().getFullYear();

// Handle form submission (basic example, prevent default)
// In a real application, you would send this data to a server.
const loginForm = document.querySelector('form');
loginForm.addEventListener('submit', function(event) {
    event.preventDefault();
    // Add your login logic here, e.g., an AJAX request
    console.log('Form submitted');
    // Example: Show a message (replace with actual feedback)
    alert('Login attempt (see console for data). Implement actual login logic here.');
    // For demonstration, you might redirect or show a success message.
    // window.location.href = 'dashboard.html'; // Example redirect
});
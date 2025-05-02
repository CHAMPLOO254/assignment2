// Client-side validation for registration form
document.getElementById('registerForm')?.addEventListener('submit', function(e) {
    const username = document.getElementById('username').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    
    // Clear previous errors
    document.querySelectorAll('.error').forEach(el => el.textContent = '');
    
    let isValid = true;
    
    // Username validation
    if (username.length < 3) {
        document.getElementById('usernameError').textContent = 'Username must be at least 3 characters';
        isValid = false;
    }
    
    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById('emailError').textContent = 'Invalid email format';
        isValid = false;
    }
    
    // Password validation
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (!passwordRegex.test(password)) {
        document.getElementById('passwordError').textContent = 
            'Password must be at least 8 characters with 1 number and 1 uppercase letter';
        isValid = false;
    }
    
    // Confirm password
    if (password !== confirmPassword) {
        document.getElementById('confirmPasswordError').textContent = 'Passwords do not match';
        isValid = false;
    }
    
    if (!isValid) {
        e.preventDefault();
    }
});

// Client-side validation for submission form
document.getElementById('dataForm')?.addEventListener('submit', function(e) {
    const fullname = document.getElementById('fullname').value.trim();
    const studentId = document.getElementById('student_id').value.trim();
    const course = document.getElementById('course').value.trim();
    const message = document.getElementById('message').value.trim();
    
    if (!fullname || !studentId || !course || !message) {
        alert('All fields are required');
        e.preventDefault();
    }
});
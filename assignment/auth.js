// Example of handling session token (if needed)
document.addEventListener('DOMContentLoaded', function() {
    // Check if session token exists
    const sessionToken = getCookie('session_token');
    if (!sessionToken) {
        // Redirect to login if not authenticated
        window.location.href = 'login.html';
    }
});

// Function to get a cookie by name
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}
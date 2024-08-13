// Check authentication status when the page loads
window.addEventListener('load', function() {
    fetch('/auth/check') // Backend route to check authentication status
    .then(response => {
        if (response.ok) {
            showLogoutButton();
        } else {
            showLoginButton();
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

// Function to show login button and hide logout button
function showLoginButton() {
    document.getElementById('loginBtn').style.display = 'inline';
    document.getElementById('logoutBtn').style.display = 'none';
}

// Function to show logout button and hide login button
function showLogoutButton() {
    document.getElementById('loginBtn').style.display = 'none';
    document.getElementById('logoutBtn').style.display = 'inline';
}

// Login button click event
document.getElementById('loginBtn').addEventListener('click', function() {
    // Implement logic to show login form or redirect to login page
    // For simplicity, I'll just show an alert
    // alert('Redirecting to login page...');
    window.location.href=('./index.php');
});

// Logout button click event
document.getElementById('logoutBtn').addEventListener('click', function() {
    fetch('/auth/logout') // Backend route to logout
    .then(response => {
        if (response.ok) {
            showLoginButton(); // Show login button after successful logout
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

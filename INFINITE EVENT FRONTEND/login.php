
<!-- login.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit" name="login">Login</button>
        <p>if you haven't account <a href="reg.php"></a></p>
    </form>
</body>
</html>

<!-- login.php -->
<?php
// Start session
session_start();

// Connect to the database (replace with your actual database credentials)
@require_once 'db/cn.php';


if (!session_id()) {
    session_start();
}

// Check if the login form is submitted
if (isset($_POST['login'])) {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind SQL statement
    $stmt = $cn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();

    // Store result
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        // Bind result variables
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, start a new session
            session_regenerate_id();
            $_SESSION['username'] = $username;
            echo "Login successful. Welcome, $username!";
            header("Location: welcome.php");
        } else {
            // Password is incorrect
            echo "Incorrect password.";
        }
    } else {
        // User does not exist
        echo "User not found.";
    }

    // Close statement and connection
    $stmt->close();
    $cn->close();
}
?>

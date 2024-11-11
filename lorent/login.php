<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Welcome, " . $username . "!";
        } else {
            echo "Invalid credentials, please try again.";
        }
    } else {
        echo "No user found with that username.";
    }

    $conn->close();
}
?>

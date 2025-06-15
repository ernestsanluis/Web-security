<?php include("db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Vulnerable to SQL Injection
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "Logged in (vulnerably)!";
    } else {
        echo "Invalid login.";
    }
}
?>

<form method="POST">
  Username: <input name="username"><br>
  Password: <input type="password" name="password"><br>
  <button type="submit">Login</button>
</form>
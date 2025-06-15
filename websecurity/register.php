<?php include("db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashed = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed);
    if ($stmt->execute()) {
        echo "Registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<form method="POST">
  Username: <input name="username"><br>
  Password: <input type="password" name="password"><br>
  <button type="submit">Register</button>
</form>
<?php include("db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $desc = $_POST["description"];

    $sql = "INSERT INTO events (title, description) VALUES ('$title', '$desc')";
    $conn->query($sql);
}

$result = $conn->query("SELECT * FROM events");
while ($row = $result->fetch_assoc()) {
    echo "<h2>{$row['title']}</h2><p>{$row['description']}</p>";
}
?>

<form method="POST">
  Title: <input name="title"><br>
  Description: <textarea name="description"></textarea><br>
  <button type="submit">Create Event</button>
</form>
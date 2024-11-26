<?php
require 'dbConnect.php';
$db = new dbConnect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $gender = $_POST['gender'];
    $education = $_POST['education'];
    $adrss = $_POST['addrss'];

    if ($db->insert($fname, $email, $contact, $gender, $education, $adrss)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Failed to add user.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <h2>Add User</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="username" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Phone:</label>
        <input type="text" name="phone" required><br>
        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female<br>
        <label>Education:</label>
        <input type="text" name="education" required><br>
        <label>Address:</label>
        <textarea name="addrss" required></textarea><br>
        <button type="submit">Add</button>
    </form>
</body>
</html>

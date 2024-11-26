<?php
include 'dbConnect.php';
$db = new dbConnect();

$id = $_GET['id'];
$result = mysqli_query($db->dbh, "SELECT * FROM user1 WHERE id = $id");
$user = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $gender = $_POST['gender'];
    $education = $_POST['education'];
    $adrss = $_POST['addrss'];

    $update = mysqli_query($db->dbh, "UPDATE user1 SET 
        username='$fname', email='$email', phone='$contact', gender='$gender', 
        education='$education', addrss='$adrss' WHERE id=$id");

    if ($update) {
        header("Location: index.php");
        exit();
    } else {
        echo "Failed to update user.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="username" value="<?= $user['username'] ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?= $user['email'] ?>" required><br>
        <label>Phone:</label>
        <input type="text" name="phone" value="<?= $user['phone'] ?>" required><br>
        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" <?= $user['gender'] === 'Male' ? 'checked' : '' ?>> Male
        <input type="radio" name="gender" value="Female" <?= $user['gender'] === 'Female' ? 'checked' : '' ?>> Female<br>
        <label>Education:</label>
        <input type="text" name="education" value="<?= $user['education'] ?>" required><br>
        <label>Address:</label>
        <textarea name="addrss" required><?= $user['addrss'] ?></textarea><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>

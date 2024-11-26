<?php
include 'dbConnect.php';
$db = new dbConnect();

$id = $_GET['id'];
$delete = mysqli_query($db->dbh, "DELETE FROM user1 WHERE id = $id");

if ($delete) {
    header("Location: index.php");
    exit();
} else {
    echo "Failed to delete user.";
}
?>

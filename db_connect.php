<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'crud_oop');

class dbConnect
{
    //constructor
function __construct()
{
$conn = mysqli_connect(DB_SERVER, DB_USER ,DB_PASS, DB_NAME);
$this->dbh=$conn;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
}


public function insert($fname,$email,$contact,$gender,$education,$adrss)
{
$add=mysqli_query($this->dbh,"INSERT INTO user1(username,email,phone,gender,education,addrss) 
values('$fname','$email','$contact','$gender','$education','$adrss')");
return $add;
}
}
?>
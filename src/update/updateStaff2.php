<?php
if (isset($_COOKIE["username"])) {
$username = $_COOKIE["username"];
$password = $_COOKIE["password"];

$conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,'group11');
$sql = "update STAFF set id='$_POST[id]',duty='$_POST[duty]',wage='$_POST[wage]',hours='$_POST[hours]' where id='$_POST[id]'";
if($conn->query($sql))
{
	echo "<h3> Staff updated!</h3>";

} else {
   $err = $conn->errno();
   if($err == 1062)
   {
      echo "<p>Staff ID: $_POST[id] already exists!</p>";
   } else {
      echo "error code $err";
   }

}

echo "<a href=\"../main.php\">Return</a> to Home Page.";

} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"../index.php\">Login First</a></p>";
}
?>

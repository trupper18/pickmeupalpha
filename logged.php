<?php
session_start(); // Starting session cookies
if($_SESSION['username'])  //Checking if they have the session cookie
{
    echo "<title>Members area</title>";
    // Has session cookie
    echo "Welcome to Pick Me Up!<br>";
	echo "<a href='mainPage.php'>Begin</a>";
	

}

else
{
    echo "<title>Error!</title>";
    //Doesn't have session cookie
    echo "YOU ARE NOT LOGGED IN!";
}
?>

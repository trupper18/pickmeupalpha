<?php
session_start();
MySQLi_connect("localhost", "root", "", "myseconddatabase"); // Server connection
$page = $_POST['registerform']; // Setting the page value
$user = $_POST['usrnme']; // Setting the user value
$pass = $_POST['pwd']; // Setting the pass value
$repeatPass = $_POST['rptpwd'];
$first = $_POST['frstnme'];
$last = $_POST['lstnme'];
$email = $_POST['emal'];
$age = $_POST['age'];
$cat = $_POST['select_cat'];
$topic = $_POST['select_top'];
$creator = $_POST['post_by'];
$title = $_POST['post_title'];
$college = $_POST['post_college'];
$eventDay = $_POST['day_event'];
$start = $_POST['post_start'];
$end = $_POST['post_end'];
$capacity = $_POST['post_capacity'];
$description = $_POST['post_description'];



if($page == 1){
	if($user==true){
		if($pass==true){
			if($pass==$repeatPass){
				if($first==true){
					if($last==true){
						if($email==true){
							if($age!=='Age'){
								//This means that the page is the register form so the register form code goes here
								$query = ("select * FROM userdata WHERE username = '$user'");
								$result = mysqli_query(mysqli_connect("localhost", "root", "", "myseconddatabase"),$query); // Queries the Database to check if the user already exists
								if(mysqli_num_rows($result) >0) // Checks if there is any rows with that user
								{
									echo "THIS USER IS ALREADY TAKEN!<br>"; // Stops there 
								}
								$query = ("select * FROM userdata WHERE email= '$email'");
								$result = mysqli_query(mysqli_connect("localhost", "root", "", "myseconddatabase"),$query); // Queries the Database to check if the user already exists
								if(mysqli_num_rows($result) >0)
								{
									echo "THIS EMAIL IS ALREADY REGISTERED!";
								}
								else
								{
									$query = ("INSERT INTO userdata (username, password, firstName, lastName, email, age) VALUES('$user', '$pass', '$first', '$last', '$email', '$age')");
									mysqli_query(mysqli_connect("localhost", "root", "", "myseconddatabase"),$query); // Inserts into the database.
									echo "REGISTERED! <BR> <a href='login.php'>Go to the login page</a>"; //Link and text to go to the login
								}    
							}
							else
							echo "Please enter your age";
						}
						else
						echo "Please enter a valid email";
					}
					else
					echo "Please enter your last name";
				}
				else
				echo "Please enter your first name";
			}
			else
			echo "Your passwords don't match";
		}
		else
		echo "Please input a password";
	}
	else
	echo "Please input a username";
}


if($page == 0)
{
    //This means that the page is the login form so the register form code goes here
    $query = ("SELECT username FROM userdata WHERE username = '$user'"); // Queries the Database to check if the user doesn't exist
	$result = mysqli_query(mysqli_connect("localhost", "root", "", "myseconddatabase"),$query); // Queries the Database to check if the user already exists
    if(mysqli_num_rows($result) ==0) // Checks if there is any rows with that user
    {
        echo "User doesn't exist"; // Stops there 
    }
    $query = ("SELECT username FROM userdata WHERE username = '$user' AND password = '$pass'");
	$result = mysqli_query(mysqli_connect("localhost", "root", "", "myseconddatabase"),$query);
    if(mysqli_num_rows($result) !== 0) // Checks if there is any rows with that user and pass
    {
        echo "Welcome $user <BR> <a href='logged.php'>Go to the logged in</a>"; //Link and text to go to the login
        $_SESSION['username'] = $user;
    }
    
}

if($page == 2){
	if($title==true){
		if($college!=='College'){
			if($start!=='Start Time'){
				if($end!=='End Time'){
					if($capacity!=='People'){
						if($description==true){
							$slash = addslashes($title);
							$query = ("select * FROM posts");
							$result = mysqli_query(mysqli_connect("localhost", "root", "", "myseconddatabase"),$query); // Queries the Database to check if the user already exists
							if(mysqli_num_rows($result) >=0)
							{	
								$query = ("INSERT INTO posts (post_topic, post_date, post_cat, post_by, post_title, post_college, day_event, post_start, post_end, post_capacity, post_description) VALUES('$topic', NOW(), '$cat', '$creator', '$slash', '$college', '$eventDay', '$start', '$end', '$capacity', '$description')");
								mysqli_query(mysqli_connect("localhost", "root", "", "myseconddatabase"),$query); // Inserts into the database.
								echo "Event Made! <BR> <a href='mainPage.php'>Go to Main Page</a>"; //Link and text to go to the login
									$query = ("SELECT * FROM posts ORDER by post_id DESC LIMIT 1"); // Queries the Database to check if the user doesn't exist
									$rs = mysqli_query(mysqli_connect("localhost", "root", "", "myseconddatabase"),$query);
									while($row = mysqli_fetch_array($rs)) {
									$id = ($row['post_id']);
									echo "$id";
									$newPost = fopen("$id.php", "w") or die("Unable to create event");
										$query = ("SELECT * FROM posts WHERE post_id='$id'"); // Queries the Database to check if the user doesn't exist
										$rs = mysqli_query(mysqli_connect("localhost", "root", "", "myseconddatabase"),$query);
										while($row = mysqli_fetch_array($rs)) {
											$name = ($row['post_title']);
											$start = ($row['post_start']);
											$end = ($row['post_end']);
											$capacity = ($row['post_capacity']);
											$birth = ($row['post_date']);
											$poster = ($row['post_by']);											
											$txt = "<div align='center'>$name<br>
											Posted: $birth<br>
											$start - $end<br>
											Capicity: $capacity
											</div>\n";
										fwrite($newPost, $txt);
										fclose($newPost);
										$readPost = fopen("$id.php", "r") or die("Unable to create event");								
										fread($readPost, filesize("$id.php"));
									}
								}
							}
						}
						else
						echo "Please enter a description of your event";
					}
					else
					echo "Please enter the max people you want";
				}
				else
				echo "Please enter an end time";
			}
			else
			echo "Please enter a start time";
		}
		else
		echo "Please enter your college";
	}
	else
	echo "Please enter a title";
}
?>

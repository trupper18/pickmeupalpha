<?php
session_start(); // Starting session cookies
MySQLi_connect("localhost", "root", "", "myseconddatabase"); 
if($_SESSION['username'])  //Checking if they have the session cookie
{
echo "<style type='text/css'>
/*#wrap {
    width: 150px; 
    height: 50px; 
    padding-bottom: 10px;
    margin: 0; /* Ensures there is no space between sides of the screen and the menu */
    z-index: 1; /* Makes sure that your menu remains on top of other page elements */
    position: fixed;
    background-color: RoyalBlue;

    }
.navbar {
    height: 50px;
    padding: 0;
    padding-bottom: 10px;
    margin: 0;
    position: fixed; /* Ensures that the menu doesn’t affect other elements */
    border-right: 1px solid #54879d; 
    z-index: 12;
    }
.navbar li  {
            padding-bottom: 10px;
            height: auto;
            width: 450px;  /* Each menu item is 150px wide */
            /*float: left;   This lines up the menu items horizontally */
            object-position: top;
            text-align: center;  /* All text is placed in the center of the box */
            list-style: none;  /* Removes the default styling (bullets) for the list */
            font: normal bold 12px/1.2em Arial, Verdana, Helvetica;  
            padding: 0;
            margin: 0;
            background-color: RoyalBlue;
                        }
.navbar a   {                           
        padding: 18px 0;  /* Adds a padding on the top and bottom so the text appears centered vertically */
        border-left: 1px solid #0026ff; /* Creates a border in a slightly lighter shade of blue than the background.  Combined with the right border, this creates a nice effect. */
        border-right: 1px solid #0026ff; /* Creates a border in a slightly darker shade of blue than the background.  Combined with the left border, this creates a nice effect. */
        text-decoration: none;  /* Removes the default hyperlink styling. */
        color: #000; /* Text color is black */
        display: block;
        }

.navbar li:hover, a:hover {
    background-color: rgba(4, 6, 0, 0.00);
}
             
.navbar li ul   {
        display: none;  /* Hides the drop-down menu */
        height: auto;                                   
        margin: 0; /* Aligns drop-down box underneath the menu item */
        padding: 0; /* Aligns drop-down box underneath the menu item */         
        }  
.navbar li:hover ul     {
                        display: block; /* Displays the drop-down box when the menu item is hovered over */
                        z-index: 12;
                        padding-left: 1px;

                        }

.navbar li ul li {
    background-color: #2ba6ff;
}

.navbar li ul li a  {
        border-left: 1px solid #0026ff;
        border-right: 1px solid #0026ff;
        border-top: 1px solid #0026ff;
        z-index: 1001;
        }

.navbar li ul li a:hover {
    background-color: #0094ff;
    z-index: 1000;
}
span.left {
 position: absolute;
 left: 0;
 }
 span.right {
 position: absolute;
 right: 0;
 }
 div.line {
 position: relative;
 text-align: center;
 width: 100%;
 }
</style>";
	 echo "<div id='wrap'>
	 <div align='center'>
          <ul class='navbar'>
             <li><a href='/index.php'>Pick Me Up</a></li>
             <li><a href='mainPage.php'>All Categories</a>
                <ul>
                    <li><a href='sports.php'>Sports</a></li>
                   <li><a href='activities.php'>Activities</a></li>
                </ul>         
             </li>
             <li><a href='mainPage.php'>All Topics</a>
                <ul>
                    <li><a href='favoriteEvents.php'>Favorites</a></li>
                   <li><a href='createEvent.php' >Create an Event</a></li>
                    <li><a href='soccer.php'>Soccer</a></li>
                    <li><a href='workingOut.php'>Working Out</a></li>
                </ul>         
             </li>";  
			 $query = ("SELECT * FROM posts ORDER by post_id DESC"); // Queries the Database to check if the user doesn't exist
	$rs = mysqli_query(mysqli_connect("localhost", "root", "", "myseconddatabase"),$query);
	while($row = mysqli_fetch_array($rs)) {

	   // Write the value of the column FirstName (which is now in the array $row)
	$name = ($row['post_title']);
	$id = ($row['post_id']);
	$eventDay = ($row['day_event']);
	$start = ($row['post_start']);
	$end = ($row['post_end']);
	$capacity = ($row['post_capacity']);
	$birth = ($row['post_date']);
	$poster = ($row['post_by']);
	echo "<li>
	<a href='$id.php'>
	$name<br>
	Date: $eventDay<br>
	<div class='line'>
	<span class='centre'>$start - $end</span><span class='right'>0/$capacity</span>
	</div>
	<div class='line'>
	<span class='centre'>Posted: $birth</span><span class='right'>Capacity</span>
	</div>
	
	</a>
	</li>";
	}
        echo        "</ul>
		</div>
       </div>";
}	 
?>

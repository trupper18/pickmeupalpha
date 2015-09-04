<?php
echo "<div align='center'>";

session_start(); // Starting session cookies
MySQLi_connect("localhost", "root", "", "myseconddatabase"); 
if($_SESSION['username'])  //Checking if they have the session cookie
{

echo "<form action='finished.php' method='post'>";
echo "<style type='text/css'>
input {
border: none;
background: #FFF;
width: 165px;
}
.rounded {
background:  url(rounded.gif) no-repeat left top;
padding: 8px;
}
</style>";
echo "<br>";
echo "<input type='hidden' name='registerform' value='2'>"; //Hidden Field.
echo "<div class='rounded'>
<input type='text' name='address' />
</div>";
echo "<input type='text' style='width: 418px' name='post_title' placeholder='Title'><br>";    
   echo "<select name='post_college' placeholder='College' style='width: 418px'>
      <option selected>College</option>
      <option>University of Alabama, Tuscaloosa</option>
	  <option>Alabama A&M University, Normal</option>
<option>Alabama State University, Montgomery</option>
<option>Amridge University, Montgomery</option>
<option>Athens State University, Athens</option>
<option>Auburn University, Auburn</option>
<option>Auburn University, Montgomery</option>
<option>Birmingham-Southern College, Birmingham</option>
<option>Concordia College Alabama, Selma</option>
<option>Faulkner University, Montgomery</option>
<option>Heritage Christian University, Florence</option>
<option>Jacksonville State University, Jacksonville</option>
<option>Judson College, Marion</option>
<option>Miles College, Fairfield</option>
<option>Oakwood University, Huntsville</option>
<option>Samford University, Birmingham</option>
<option>Southeastern Bible College, Birmingham</option>
<option>Spring Hill College, Mobile</option>
<option>Stillman College, Tuscaloosa</option>
<option>Talladega College, Talladega</option>
<option>Troy University, Troy</option>
<option>Tuskegee University, Tuskegee</option>
<option>United States Sports Academy, Daphne</option>
<option>University of Alabama, Birmingham</option>
<option>University of Alabama, Huntsville</option>
<option>University of Mobile, Mobile</option>
<option>University of Montevallo, Montevallo</option>
<option>University of North Alabama, Florence</option>
<option>University of South Alabama, Mobile</option>
<option>University of West Alabama, Livingston</option>

		</select><br>";
echo "<select id='select_cat' name='select_cat' style='width: 209px'>";
echo "<option selected value='Sports'>Sports</option>";
echo "<option value='Activities'>Activities</option>";
echo "</select>";
echo "<select id='select_top' name='select_top' style='width: 209px'>";
echo "</select>";
echo "<script type='text/javascript'>
(function(){

    //setup an object fully of arrays
    //alternativly it could be something like
    //{'Sports':[{value:sweet, text:Sweet}.....]}
    //so you could set the label of the option tag something different than the name
    var bOptions = {'Sports':['Soccer', 'Football'], 'Activities':['Working Out']};

    var select_cat = document.getElementById('select_cat');
    var select_top = document.getElementById('select_top');

    //on change is a good event for this because you are guarenteed the value is different
    select_cat.onchange = function(){
        //clear out select_top
        select_top.length = 0;
        //get the selected value from select_cat
        var _val = this.options[this.selectedIndex].value;
        //loop through bOption at the selected value
        for ( var i in bOptions[_val]){
            //create option tag
            var op = document.createElement('option');
            //set its value
            op.value = bOptions[_val][i];
            //set the display label
            op.text = bOptions[_val][i];
            //append it to select_top
            select_top.appendChild(op);
        }
    };
    //fire this to update select_top on load
    select_cat.onchange();
})()
</script>";
echo "<br>";
echo "<input type='date' name='day_event'>";
   echo "<br>";
echo "<select name='post_start' style='width: 202px'>
	<option selected>Start Time</option>
	<option>12:00 AM</option>
	<option>12:15 AM</option>
	<option>12:30 AM</option>
	<option>12:45 AM</option>
	<option>1:00 AM</option>
	<option>1:15 AM</option>
	<option>1:30 AM</option>
	<option>1:45 AM</option>
	<option>2:00 AM</option>
	<option>2:15 AM</option>
	<option>2:30 AM</option>
	<option>2:45 AM</option>
	<option>3:00 AM</option>
	<option>3:15 AM</option>
	<option>3:30 AM</option>
	<option>3:45 AM</option>
	<option>4:00 AM</option>
	<option>4:15 AM</option>
	<option>4:30 AM</option>
	<option>4:45 AM</option>
	<option>5:00 AM</option>
	<option>5:15 AM</option>
	<option>5:30 AM</option>
	<option>5:45 AM</option>
	<option>6:00 AM</option>
	<option>6:15 AM</option>
	<option>6:30 AM</option>
	<option>6:45 AM</option>
	<option>7:00 AM</option>
	<option>7:15 AM</option>
	<option>7:30 AM</option>
	<option>7:45 AM</option>
	<option>8:00 AM</option>
	<option>8:15 AM</option>
	<option>8:30 AM</option>
	<option>8:45 AM</option>
	<option>9:00 AM</option>
	<option>9:15 AM</option>
	<option>9:30 AM</option>
	<option>9:45 AM</option>
	<option>10:00 AM</option>
	<option>10:15 AM</option>
	<option>10:30 AM</option>
	<option>10:45 AM</option>
	<option>11:00 AM</option>
	<option>11:15 AM</option>
	<option>11:30 AM</option>
	<option>11:45 AM</option>
	<option>12:00 PM</option>
	<option>12:15 PM</option>
	<option>12:30 PM</option>
	<option>12:45 PM</option>
	<option>1:00 PM</option>
	<option>1:15 PM</option>
	<option>1:30 PM</option>
	<option>1:45 PM</option>
	<option>2:00 PM</option>
	<option>2:15 PM</option>
	<option>2:30 PM</option>
	<option>2:45 PM</option>
	<option>3:00 PM</option>
	<option>3:15 PM</option>
	<option>3:30 PM</option>
	<option>3:45 PM</option>
	<option>4:00 PM</option>
	<option>4:15 PM</option>
	<option>4:30 PM</option>
	<option>4:45 PM</option>
	<option>5:00 PM</option>
	<option>5:15 PM</option>
	<option>5:30 PM</option>
	<option>5:45 PM</option>
	<option>6:00 PM</option>
	<option>6:15 PM</option>
	<option>6:30 PM</option>
	<option>6:45 PM</option>
	<option>7:00 PM</option>
	<option>7:15 PM</option>
	<option>7:30 PM</option>
	<option>7:45 PM</option>
	<option>8:00 PM</option>
	<option>8:15 PM</option>
	<option>8:30 PM</option>
	<option>8:45 PM</option>
	<option>9:00 PM</option>
	<option>9:15 PM</option>
	<option>9:30 PM</option>
	<option>9:45 PM</option>
	<option>10:00 PM</option>
	<option>10:15 PM</option>
	<option>10:30 PM</option>
	<option>10:45 PM</option>
	<option>11:00 PM</option>
	<option>11:15 PM</option>
	<option>11:30 PM</option>
	<option>11:45 PM</option>
</select> - ";	
echo "<select name='post_end' style='width: 202px'>
	<option selected>End Time</option>
	<option>12:00 AM</option>
	<option>12:15 AM</option>
	<option>12:30 AM</option>
	<option>12:45 AM</option>
	<option>1:00 AM</option>
	<option>1:15 AM</option>
	<option>1:30 AM</option>
	<option>1:45 AM</option>
	<option>2:00 AM</option>
	<option>2:15 AM</option>
	<option>2:30 AM</option>
	<option>2:45 AM</option>
	<option>3:00 AM</option>
	<option>3:15 AM</option>
	<option>3:30 AM</option>
	<option>3:45 AM</option>
	<option>4:00 AM</option>
	<option>4:15 AM</option>
	<option>4:30 AM</option>
	<option>4:45 AM</option>
	<option>5:00 AM</option>
	<option>5:15 AM</option>
	<option>5:30 AM</option>
	<option>5:45 AM</option>
	<option>6:00 AM</option>
	<option>6:15 AM</option>
	<option>6:30 AM</option>
	<option>6:45 AM</option>
	<option>7:00 AM</option>
	<option>7:15 AM</option>
	<option>7:30 AM</option>
	<option>7:45 AM</option>
	<option>8:00 AM</option>
	<option>8:15 AM</option>
	<option>8:30 AM</option>
	<option>8:45 AM</option>
	<option>9:00 AM</option>
	<option>9:15 AM</option>
	<option>9:30 AM</option>
	<option>9:45 AM</option>
	<option>10:00 AM</option>
	<option>10:15 AM</option>
	<option>10:30 AM</option>
	<option>10:45 AM</option>
	<option>11:00 AM</option>
	<option>11:15 AM</option>
	<option>11:30 AM</option>
	<option>11:45 AM</option>
	<option>12:00 PM</option>
	<option>12:15 PM</option>
	<option>12:30 PM</option>
	<option>12:45 PM</option>
	<option>1:00 PM</option>
	<option>1:15 PM</option>
	<option>1:30 PM</option>
	<option>1:45 PM</option>
	<option>2:00 PM</option>
	<option>2:15 PM</option>
	<option>2:30 PM</option>
	<option>2:45 PM</option>
	<option>3:00 PM</option>
	<option>3:15 PM</option>
	<option>3:30 PM</option>
	<option>3:45 PM</option>
	<option>4:00 PM</option>
	<option>4:15 PM</option>
	<option>4:30 PM</option>
	<option>4:45 PM</option>
	<option>5:00 PM</option>
	<option>5:15 PM</option>
	<option>5:30 PM</option>
	<option>5:45 PM</option>
	<option>6:00 PM</option>
	<option>6:15 PM</option>
	<option>6:30 PM</option>
	<option>6:45 PM</option>
	<option>7:00 PM</option>
	<option>7:15 PM</option>
	<option>7:30 PM</option>
	<option>7:45 PM</option>
	<option>8:00 PM</option>
	<option>8:15 PM</option>
	<option>8:30 PM</option>
	<option>8:45 PM</option>
	<option>9:00 PM</option>
	<option>9:15 PM</option>
	<option>9:30 PM</option>
	<option>9:45 PM</option>
	<option>10:00 PM</option>
	<option>10:15 PM</option>
	<option>10:30 PM</option>
	<option>10:45 PM</option>
	<option>11:00 PM</option>
	<option>11:15 PM</option>
	<option>11:30 PM</option>
	<option>11:45 PM</option>
</select><br>";	
echo "<select name='post_capacity' style='width: 418px'>
	<option selected>People</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
	<option>10</option>
	<option>11</option>
	<option>12</option>
	<option>13</option>
	<option>14</option>
	<option>15</option>
	<option>16</option>
	<option>17</option>
	<option>18</option>
	<option>19</option>
	<option>20</option>
	<option>21</option>
	<option>22</option>
	<option>23</option>
	<option>24</option>
	<option>25</option>
	<option>26</option>
	<option>27</option>
	<option>28</option>
	<option>29</option>
	<option>30</option>
	</select><br>";
echo "<textarea name='post_description' rows='5' style='width: 418px' maxlength='250' placeholder='More specific location, description, etc..'></textarea><br>";
	
$query = ("SELECT * FROM userdata WHERE username = '".$_SESSION['username']."'"); // Queries the Database to check if the user doesn't exist
	$rs = mysqli_query(mysqli_connect("localhost", "root", "", "myseconddatabase"),$query);
	while($row = mysqli_fetch_array($rs)) {

	   // Write the value of the column FirstName (which is now in the array $row)
	  $name = ($row['username']);
	  $uid = ($row['uid']);
	  echo "$name<br>";
	 echo "<input type='hidden' name='post_by' value='$uid'/>";
	 }
echo "<input type='submit' name='submit' value='submit'>"; //Submit button.
echo "<input type='hidden' name='usrnme' /><br>";
echo "<input type='hidden' name='pwd' /><br>";
echo "<input type='hidden' name='rptpwd' /><br>";
echo "<input type='hidden' name='frstnme' /><br>";
echo "<input type='hidden' name='lstnme' /><br>";
echo "<input type='hidden' name='emal' /><br>";
echo "<input type='hidden' name='age' /><br>";
echo "</form>";
echo "</div>"; 
}
?>



<?php

$servername = "sql2.njit.edu";    //sql2.njit.edu:3306 AFS
$database = "dp663";
$username = "dp663";
$password = "rlxqcbSd";


// Create connection

$conn = new mysqli($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}






?>

<?php
 
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$PatientID = $_POST['PatientID'];
$password = $_POST['password'];
$login = false;

//$service = $_POST['service'];

$sql = "SELECT `Patient_Password`,`Patient_First_Name`, `Patient_Last_Name` FROM `Patient` WHERE `Patient_ID` = $PatientID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);


if($row["Patient_Password"] != $password){
    echo (" <br><br>Your credentials are incorrect. Please, try again.");
    $login = false;
    ?><br><input type="button" value="Go back!" onclick="history.back()"><?php 
    return;
}
else if($row["Patient_First_Name"] != $firstName){
    echo (" <br><br>Your credentials are incorrect. Please, try again.");
    $login = false;
    ?><br><input type="button" value="Go back!" onclick="history.back()"><?php
    return;
}
else if($row["Patient_Last_Name"] != $lastName){
    echo (" <br><br>Your credentials are incorrect. Please, try again.");
    $login = false;
    ?><br><input type="button" value="Go back!" onclick="history.back()"><?php
    return;
}
else {
    echo ("<br><br>Welcome $firstName $lastName");
    $login = true;
    ?>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="DonarkPatel-Assignment_4.js"></script>


</head>
<body>
<div class="LogIn">
    <h1>Smiles Galore Dental</h1>
    <form action="newfile2.php" onsubmit="" method="POST">
      <table class="main" border="border">
				<tr>
		          <td><label for="ID">ID:</label></td>
		          <td><input type="text" id="PatientID" name="PatientID" value="<?php echo ($PatientID)?>" readonly="readonly" /></td>
		      </tr>
		      <tr>
                <td>Service:</td>
                <td><select id="service" name="service">
                      <option value="Searching for a patients records">Searching for a patients records</option>
                      <option value="Cancelling an Appointment">Cancelling an Appointment</option>
                     
                    </select>
                </td>
              </tr>
      </table>
      			<input type="submit" onclick="" name="submitForm" value="Search / Update" class="submit">
 	</form>
 	
 	<br>
 	<br>
 	<br>
 	<form action="Appointment.php" onsubmit="" method="POST">
      <table class="main" border="border">
			<tr>
		          <td><label for="ID">ID:</label></td>
		          <td><input type="text" id="PatientID" name="PatientID" value="<?php echo ($PatientID)?>" readonly="readonly" /></td>
		      </tr>
		      <tr>
		          <td><label for="date">Date:(MM/DD/YYYY)</label></td>
		          <td><input type="text" id="date" name="date" /></td>
		      </tr>
		      <tr>
		          <td><label for="time">Time:(HH:MI AM/PM)</label></td>
		          <td><input type="text" id="time" name="time" /></td>
		      </tr>
		      <tr>
                <td>Doctor:</td>
                <td><select id="doctor" name="doctor">
                      <option value="Dr Edward Austin"> Dr Edward Austin</option>
                      <option value="Dr Jack Fernandez"> Dr Jack Fernandez</option>
                      <option value="Dr Matthew Chavez"> Dr Matthew Chavez</option>
                      <option value="Dr Ella Lane"> Dr Ella Lane</option>
                      <option value="Dr Phoebe Meyer">Dr Phoebe Meyer</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td>Service:</td>
                <td><select id="service" name="service">
                      <option value="Cleaning"> Cleaning</option>
                      <option value="Filling"> Filling</option>
                      <option value="Root Canal"> Root Canal</option>
                      <option value="Crown">Crown</option>
                      <option value="Bridge">Bridge</option>
                    </select>
                </td>
              </tr>
      </table>
      			<input type="submit" onclick="" name="submitForm" value="Schedule an Appointment" class="submit">
 	</form>
 </div>

</body>

</html>
    
    <?php
}

?> 


				










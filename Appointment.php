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
$serviceTemp = $_POST['service'];
$doctorTemp = $_POST['doctor'];
$PatientID = $_POST['PatientID'];
$date = $_POST['date'];
$time = $_POST['time'];

if($doctorTemp == 'Dr Edward Austin'){
    $doctor = 1;
}
else if($doctorTemp == 'Dr Jack Fernandez'){
    $doctor = 2;
}
else if($doctorTemp == 'Dr Matthew Chavez'){
    $doctor = 3;
}
else if($doctorTemp == 'Dr Ella Lane'){
    $doctor = 4;
}
else if($doctorTemp == 'Dr Phoebe Meyer'){
    $doctor = 5;
}

if($serviceTemp == 'Cleaning')
{
    $service = 1;
}

else if($serviceTemp == 'Filling')
{
    $service = 2;
}
else if($serviceTemp == 'Root Canal')
{
    $service = 3;
}
else if($serviceTemp == 'Crown')
{
    $service = 4;
}
else if($serviceTemp == 'Bridge')
{
    $service = 5;
}

echo ("<br>Before<br>");
$sql = "SELECT Patient.Patient_ID, Patient.Patient_Password, Patient.Patient_First_Name, Patient.Patient_Last_Name, Patient.Patient_Email, Doctor.Doctor_First_Name, Doctor.Doctor_Last_Name, Appointment.Appointment_Date, Appointment.Appointment_Time, Service.Service_Name FROM Patient JOIN Doctor on Patient.Doctor_ID = Doctor.Doctor_ID JOIN Appointment on Patient.Appointment_ID = Appointment.Appointment_ID JOIN Service on Patient.Service_ID = Service.Service_ID WHERE Patient.Patient_ID = $PatientID";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)==0)
{
    echo "Patient not found, Please, enter correct patient ID number";
    ?><br><br><input type="button" value="Go back!" onclick="history.back()"><?php
    }
    else {
        echo"<Table border='1' class='Table'>";
        echo"<tr><td>Patient_ID</td><td>Patient_Password</td><td>Patient_First_name</td><td>Patient_Last_Name</td><td>Patient_Email</td><td>Doctor_First_name</td><td>Doctor_Last_name</td><td>Appointment_Date</td><td>Appointment_Time</td><td>Service</td></tr>";
        
        while($row = mysqli_fetch_array($result)){
            echo "<tr><td>{$row["Patient_ID"]}</td><td>{$row["Patient_Password"]}</td><td>{$row["Patient_First_Name"]}</td><td>{$row["Patient_Last_Name"]}</td><td>{$row["Patient_Email"]}</td><td>{$row["Doctor_First_Name"]}</td><td>{$row["Doctor_Last_Name"]}</td><td>{$row["Appointment_Date"]}</td><td>{$row["Appointment_Time"]}</td><td>{$row["Service_Name"]}</td></tr>";
            
        }
        
        echo"</table>";
        
       
    } 

$sql = "INSERT INTO `Appointment`(`Appointment_Date`, `Appointment_Time`) VALUES ('$date','$time')";
mysqli_query($conn, $sql) or die("bad sql insert");

$sql = "SELECT `Appointment_ID` FROM `Appointment` WHERE `Appointment_Date` = '$date' and `Appointment_Time` = '$time'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$Appointment_ID = $row["Appointment_ID"];

$sql = "UPDATE `Patient` SET `Doctor_ID`= $doctor,`Appointment_ID`= $Appointment_ID,`Service_ID`= $service WHERE `Patient_ID` = $PatientID";
        


mysqli_query($conn, $sql) or die("bad sql update");

echo("<br><br>Your appointment is scheduled for Date: $date  Time: $time ");
echo("<br>Doctor: $doctorTemp");
echo("<br>Service: $serviceTemp <br>");

$sql = "SELECT Patient.Patient_ID, Patient.Patient_Password, Patient.Patient_First_Name, Patient.Patient_Last_Name, Patient.Patient_Email, Doctor.Doctor_First_Name, Doctor.Doctor_Last_Name, Appointment.Appointment_Date, Appointment.Appointment_Time, Service.Service_Name FROM Patient JOIN Doctor on Patient.Doctor_ID = Doctor.Doctor_ID JOIN Appointment on Patient.Appointment_ID = Appointment.Appointment_ID JOIN Service on Patient.Service_ID = Service.Service_ID WHERE Patient.Patient_ID = $PatientID";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)==0)
{
    echo "Patient not found, Please, enter correct patient ID number";
    ?><br><br><input type="button" value="Go back!" onclick="history.back()"><?php
    }
    else {
        echo"<Table border='1' class='Table'>";
        echo"<tr><td>Patient_ID</td><td>Patient_Password</td><td>Patient_First_name</td><td>Patient_Last_Name</td><td>Patient_Email</td><td>Doctor_First_name</td><td>Doctor_Last_name</td><td>Appointment_Date</td><td>Appointment_Time</td><td>Service</td></tr>";
        
        while($row = mysqli_fetch_array($result)){
            echo "<tr><td>{$row["Patient_ID"]}</td><td>{$row["Patient_Password"]}</td><td>{$row["Patient_First_Name"]}</td><td>{$row["Patient_Last_Name"]}</td><td>{$row["Patient_Email"]}</td><td>{$row["Doctor_First_Name"]}</td><td>{$row["Doctor_Last_Name"]}</td><td>{$row["Appointment_Date"]}</td><td>{$row["Appointment_Time"]}</td><td>{$row["Service_Name"]}</td></tr>";
            
        }
        
        echo"</table>";
        
       
    } 
?><br><br><input type="button" value="Go back!" onclick="history.back()"><?php
?>
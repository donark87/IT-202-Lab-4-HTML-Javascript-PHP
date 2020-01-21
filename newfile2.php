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

$service = $_POST['service'];

$PatientID = $_POST['PatientID'];


if($service == 'Searching for a patients records')
{
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
}
else if ($service == 'Cancelling an Appointment')
{   
    echo ("<br>Before<br>");
    $sql = "SELECT * FROM `Patient` WHERE `Patient_ID` = $PatientID";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==0)
    {
        echo "Patient not found, Please, enter correct patient ID number";
        ?><br><br><input type="button" value="Go back!" onclick="history.back()"><?php 
    }
    else
    {   
        
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
        
        
        
        
        
        
        
        $sql = "UPDATE Patient SET `Appointment_ID` = '0',`Doctor_ID` = '0', `Service_ID` = '0'  WHERE `Patient_ID` = $PatientID";
        mysqli_query($conn, $sql);
        echo("<br>Patient record updated");
        echo("<br>Appointment date, Time, Doctor info and Service info removed");
        $sql = "SELECT Patient.Patient_ID, Patient.Patient_Password, Patient.Patient_First_Name, Patient.Patient_Last_Name, Patient.Patient_Email, Doctor.Doctor_First_Name, Doctor.Doctor_Last_Name, Appointment.Appointment_Date, Appointment.Appointment_Time, Service.Service_Name FROM Patient JOIN Doctor on Patient.Doctor_ID = Doctor.Doctor_ID JOIN Appointment on Patient.Appointment_ID = Appointment.Appointment_ID JOIN Service on Patient.Service_ID = Service.Service_ID WHERE Patient.Patient_ID = $PatientID";
        
        $result = mysqli_query($conn, $sql);
        
        echo"<Table border='1' class='Table'>";
        echo"<tr><td>Patient_ID</td><td>Patient_Password</td><td>Patient_First_name</td><td>Patient_Last_Name</td><td>Patient_Email</td><td>Doctor_First_name</td><td>Doctor_Last_name</td><td>Appointment_Date</td><td>Appointment_Time</td><td>Service</td></tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr><td>{$row["Patient_ID"]}</td><td>{$row["Patient_Password"]}</td><td>{$row["Patient_First_Name"]}</td><td>{$row["Patient_Last_Name"]}</td><td>{$row["Patient_Email"]}</td><td>{$row["Doctor_First_Name"]}</td><td>{$row["Doctor_Last_Name"]}</td><td>{$row["Appointment_Date"]}</td><td>{$row["Appointment_Time"]}</td><td>{$row["Service_Name"]}</td></tr>";
            echo"</table>";
        }
        
        
        
        
        
        
    }
    ?><br><br><input type="button" value="Go back!" onclick="history.back()"><?php
    
}





?>
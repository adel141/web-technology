<?php 
include "config.php";

$success = $error = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $sName = $_POST["sName"];
    $email = $_POST["email"];
    $regNo = $_POST["regNo"];
    $dept = $_POST["dept"];

    if (empty($sName) || empty($email) || empty($regNo) || empty($dept)) {
        $error = "Please fill all the fields.";
    } else {
        $stmt = "INSERT INTO students(name, email, registration_no, department) VALUES ('$sName', '$email', '$regNo', '$dept')";

        if (mysqli_query($conn,$stmt)) {
            $success = "Registration complete!";
        } else {
            $error = "Error: " . mysqli_error($conn);
        }

    }
    
        mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>
    <h2>Register Student</h2>
    <form method="post" action="">
        Student Name: <input type="text" name="sName"><br><br>
        Email: <input type="email" name="email"><br><br>
        Registration No: <input type="text" name="regNo"><br><br>
        Department: 
        <select name="dept">
            <option value="CSE">CSE</option>
            <option value="EEE">EEE</option>
        </select><br><br>
        <input type="submit" value="Register">
    </form>

    <p style="color:green;"><?php echo $success; ?></p>
    <p style="color:red;"><?php echo $error; ?></p>
    <a href="view.php">View Registered Students</a>

    

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>
<h2>Student Registration Form</h2>

<?php

$fullName = $email = $username = $password = $confirmPassword = $age = $gender = $course_section = $terms_conditions = "";
$emptyErr = $nameErr = $emailErr = $unameErr = $passwordErr = $confirmPasswordErr = $ageErr = $genderErr = $courseErr = $termsErr = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['fullName']) || empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password']) ||
        empty($_POST['confirmPassword']) || empty($_POST['age']) || empty($_POST['gender']) || empty($_POST['course_section']) ||
        !isset($_POST['terms'])) {
        $emptyErr = "All fields are required.";
    }
    else
    {
        if (!preg_match("/^[a-zA-Z ]+$/", $_POST['fullName'])) {
            $nameErr = "Full Name must contain only letters and spaces.";
        } else {
            $fullName = $_POST['fullName'];
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Email must be a valid email format.";
        } else {
            $email = $_POST['email'];
        }

        if (strlen($_POST['username']) < 5) {
            $unameErr = "Username must be at least 5 characters long.";
        } else {
            $username = $_POST['username'];
        }

        if (strlen($_POST['password']) < 6) {
            $passwordErr = "Password must be at least 6 characters long.";
        }

        if ($_POST['password'] !== $_POST['confirmPassword']) {
            $confirmPasswordErr = "Password and Confirm Password must match.";
        }

        if (!is_numeric($_POST['age']) || $_POST['age'] < 18) {
            $ageErr = "Age must be 18 or above.";
        } else {
            $age = $_POST['age'];
        }

        if (empty($_POST['gender'])) {
            $genderErr = "Gender must be selected.";
        } else {
            $gender = $_POST['gender'];
        }

        if (empty($_POST['course_section'])) {
            $courseErr = "Course must be selected.";
        } else {
            $course_section = $_POST['course_section'];
        }

        if (!isset($_POST['terms'])) {
            $termsErr = "You must accept Terms & Conditions.";
        }
    }

    if (empty($emptyErr) && empty($nameErr) && empty($emailErr) && empty($unameErr) && empty($passwordErr) && empty($confirmPasswordErr) && empty($ageErr) && empty($genderErr) && empty($courseErr) && empty($termsErr)) {
        $success = "Registration successful!";
    }

}

?>

<form method="POST">
    <table>
        <tr>
            <td><label>Full Name:</label></td>
            <td><input type="text" name="fullName" value="<?php echo $fullName; ?>"></td>
            <td><span style="color:red;"><?php echo $nameErr; ?></span></td>
        </tr>
        <tr>
            <td><label>Email Address:</label></td>
            <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
            <td><span style="color:red;"><?php echo $emailErr; ?></span></td>
        </tr>
        <tr>
            <td><label>Username:</label></td>
            <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
            <td><span style="color:red;"><?php echo $unameErr; ?></span></td>
        </tr>
        <tr>
            <td><label>Password:</label></td>
            <td><input type="password" name="password"></td>
            <td><span style="color:red;"><?php echo $passwordErr; ?></span></td>
        </tr>
        <tr>
            <td><label>Confirm Password:</label></td>
            <td><input type="password" name="confirmPassword"></td>
            <td><span style="color:red;"><?php echo $confirmPasswordErr; ?></span></td>
        </tr>
        <tr>
            <td><label>Age:</label></td>
            <td><input type="number" name="age" value="<?php echo $age; ?>"></td>
            <td><span style="color:red;"><?php echo $ageErr; ?></span></td>
        </tr>
        <tr>
            <td><label>Gender:</label></td>
            <td>
                <input type="radio" name="gender" value="Male" <?php echo $gender === 'Male' ? 'checked' : ''; ?>> Male
                <input type="radio" name="gender" value="Female" <?php echo $gender === 'Female' ? 'checked' : ''; ?>> Female
            </td>
            <td><span style="color:red;"><?php echo $genderErr; ?></span></td>
        </tr>
        <tr>
            <td><label>Course Selection:</label></td>
            <td>
                <select name="course_section">
                    <option value="">Select a Course</option>
                    <option value="Computer Science" <?php echo $course_section === 'Computer Science' ? 'selected' : ''; ?>>Computer Science</option>
                    <option value="Engineering" <?php echo $course_section === 'Engineering' ? 'selected' : ''; ?>>Engineering</option>
                    <option value="Business" <?php echo $course_section === 'Business' ? 'selected' : ''; ?>>Business</option>
                    <option value="Medicine" <?php echo $course_section === 'Medicine' ? 'selected' : ''; ?>>Medicine</option>
                </select>
            </td>
            <td><span style="color:red;"><?php echo $courseErr; ?></span></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="checkbox" name="terms" <?php echo (isset($_POST['terms'])) ? 'checked' : ''; ?>>
                <label>I accept Terms  Conditions</label>
            </td>
            <td><span style="color:red;"><?php echo $termsErr; ?></span></td>
        </tr>
        <?php if ($emptyErr): ?>
        <tr>
            <td colspan="3"><span style="color:red;"><?php echo $emptyErr; ?></span></td>
        </tr>
        <?php endif; ?>
    </table>

    <input type="submit" value="Register">
</form>

<?php
if ($success) {
    echo "$success";
}
?>

</body>
</html>

<?php
include "config.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];

    mysqli_query($conn, "UPDATE students 
        SET name='$name', email='$email', department='$dept' 
        WHERE id=$id");

    header("Location: view.php");
}
?>

<form method="post">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
    Department:
    <select name="dept">
        <option value="CSE">CSE</option>
        <option value="EEE">EEE</option>
    </select><br><br>

    <input type="submit" name="update" value="Update">
</form>
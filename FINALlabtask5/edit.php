<?php
include "config.php";

$id = $_GET['id'];
$editQuery = "SELECT * FROM students WHERE id=$id";
$result = mysqli_query($conn, $editQuery);
$row = mysqli_fetch_assoc($result);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];

    $viewQuery = "UPDATE students SET name='$name', email='$email', department='$dept' WHERE id=$id";
    mysqli_query($conn, $viewQuery);

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

    <input type="submit" value="Update">
</form>
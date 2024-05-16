<?php
    // Include db.php for database connection
    include 'db.php';

    //get the information based on the id
    if(isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        // Execute SQL query to select user information
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Assign user information to variables
            $fname = $row["fname"];
            $lname = $row["lname"];
            $mname = $row["mname"];
        } else {
            echo "No user found with the given ID.";
            exit(); // Stop script execution if ID not found
        }
    } else {
        echo "No ID provided.";
        exit(); // Stop script execution if ID not provided
    }

    // Updates the records.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mname = $_POST['mname'];

        // Prepare and execute SQL query for update
        $sql = "UPDATE users SET fname='$fname', lname='$lname', mname='$mname' WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Data updated successfully!');</script>";
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    }

    // Close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Citizen</title>
    <!-- Add your CSS styles here if needed -->
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <form method="POST">
        Barangay registration Form<br><br>
        <input type="hidden" name="id" value="<?php echo $id ?>"><br> <!-- "echo $id"  used to display value-->
        First Name:
        <input type="text" name="fname" value="<?php echo $fname ?>"><br><br>
        Last Name:
        <input type="text" name="lname" value="<?php echo $lname ?>"><br><br>
        Middle Name:
        <input type="text" name="mname" value="<?php echo $mname ?>"><br><br>
        <input type="submit" value="Update"> 
        <a href="home.php"><input type="button" value="Back"></a>
    </form>
</body>
</html>

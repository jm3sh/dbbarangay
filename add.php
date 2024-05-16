<html>
    <body>
        <h2>Barangay Registration Form</h2>
        <form method="POST">
            First Name:
            <input type="text" name="fname" required><br><br>
            Last Name:
            <input type="text" name="lname" required><br><br>
            Middle Name:
            <input type="text" name="mname" required><br><br>
            <input type="submit" value="Add">
            <input type="reset" value="Clear">
            <a href="home.php"><input type="button" value="Back"></a>

        </form>
        <?php
            include 'db.php'; // Include db.php for database connection

            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Collect form data
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $mname = $_POST['mname']; 

                // Insert data into database
                $sql = "INSERT INTO users (fname, lname, mname) VALUES ('$fname', '$lname', '$mname')";
                
                
                if (mysqli_query($conn, $sql)) {
                    echo "<p style='color:green;'>Data added successfully!</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        ?>
    </body>
</html>

<?php
// Database connection parameters (same as before)
$host = 'localhost';
$username = 'root';
$password = 'your password';
$dbname = 'your dbname';

$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM resumes";
$result = $conn->query($query);


if ($result->num_rows > 0) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>List of Resumes</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2 class="mb-4">List of Resumes</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Father's Name</th>
                        <th>Mother's Name</th>
                        <th>Qualification</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
         
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['first_name']."</td>";
                        echo "<td>".$row['last_name']."</td>";
                        echo "<td>".$row['date_of_birth']."</td>";
                        echo "<td>".$row['father_name']."</td>";
                        echo "<td>".$row['mother_name']."</td>";
                        echo "<td>".$row['qualification']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['phone']."</td>";
                        echo "<td><a href='download.php?resume_id=".$row['id']."'>Download</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
} else {
    echo "No resumes found.";
}

$result->close();
$conn->close();
?>

<?php
// Database connection parameters (same as before)
$host = 'localhost';
$username = 'root';
$password = 'Exam@170501';
$dbname = 'RESUMES';

$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_of_birth = $_POST['date_of_birth'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$qualification = $_POST['qualification'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// ...

if ($_FILES['resume']['type'] === 'application/pdf') {
    // Get the contents of the PDF file
    $resume = file_get_contents($_FILES['resume']['tmp_name']);

    $stmt = $conn->prepare("INSERT INTO resumes (first_name, last_name, date_of_birth, father_name, mother_name, qualification, email, phone, resume)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Error: " . $conn->error); // Output the specific error message
    }

    $stmt->bind_param("ssssssssb", $first_name, $last_name, $date_of_birth, $father_name, $mother_name, $qualification, $email, $phone, $resume);

    if ($stmt->execute()) {
        $message = "Resume submitted successfully.";
    } else {
        $message = "Error submitting the resume.";
    }
} else {
    $message = "Please upload a PDF file.";
}

// ...

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<body>
    <?php echo "<p style='font-size: 30px; text-align: center;'>$message</p>"; ?>
    
    <button onclick="window.location.href = '../resumes_list.php';" style="font-size: 22px; font-weight: bold; display: block; margin: 20px auto;">View all resumes</button>
    
    <script>
        setTimeout(function(){
            window.location.href = "../index.html";
        }, 9000); 
    </script>
</body>
</html>

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

if (isset($_GET['resume_id'])) {
    $resume_id = $_GET['resume_id'];

    // Fetch the resume data based on the provided resume ID
    $query = "SELECT resume FROM resumes WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $resume_id);
    $stmt->execute();
    $stmt->bind_result($resume_data);
    $stmt->fetch();
    $stmt->close();

    // Set appropriate headers for file download
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="resume.pdf"');
    header('Content-Length: ' . strlen($resume_data));

    // Output the resume data
    echo $resume_data;
}

$conn->close();
?>

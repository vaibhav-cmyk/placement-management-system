<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'placement_system'; // change to your actual DB name

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['fullName'];
    $srn = $_POST['srn'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $branch = $_POST['branch'];
    $gradYear = $_POST['gradYear'];
    $marks10 = $_POST['marks10'];
    $marks12 = $_POST['marks12'];
    $degreeMarks = $_POST['degreeMarks'];
    $skills = isset($_POST['skills']) ? implode(',', $_POST['skills']) : '';

    // File upload
    // $resumeName = $_FILES['resume']['name'];
    // $resumeTmp = $_FILES['resume']['tmp_name'];
    // $resumePath = 'uploads/' . basename($resumeName); // make sure uploads/ folder exists
    // move_uploaded_file($resumeTmp, $resumePath);

    // Insert into database
        $stmt = $conn->prepare("INSERT INTO users (fullName, srn, email, phone, dob, address, gender, branch, gradYear, marks10, marks12, degreeMarks, skills) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssiddss", $fullName, $srn, $email, $phone, $dob, $address, $gender, $branch, $gradYear, $marks10, $marks12, $degreeMarks, $skills);

    if ($stmt->execute()) {
        // echo "Registration successful!";
        
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>

<?php
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $srn = trim($_POST['srn'] ?? '');
    $dob = $_POST['dob'] ?? '';

    if ($srn && $dob) {
        // DB connection info - update if necessary
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'placement_system';

        $conn = new mysqli($host, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Database connection failed: " . $conn->connect_error);
        }

        // Prepare and bind to avoid SQL Injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE srn = ? AND dob = ?");
        $stmt->bind_param("ss", $srn, $dob);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $_SESSION['student_logged_in'] = true;
            $_SESSION['student_srn'] = $srn;
            header('Location: student_dashboard.php'); // Create this page to show student info
            exit();
        } else {
            $error = "Invalid SRN or Date of Birth.";
        }

        $stmt->close();
        $conn->close();
    } else {
        $error = "Please enter both SRN and Date of Birth.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student Login - Placement System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light d-flex align-items-center" style="height:100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5 bg-white p-4 rounded shadow">
        <h3 class="mb-4 text-center">Student Login</h3>
        <?php if ($error): ?>
          <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="POST" action="">
          <div class="mb-3">
            <label for="srn" class="form-label">SRN</label>
            <input type="text" class="form-control" id="srn" name="srn" required autofocus />
          </div>
          <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" required />
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
      </div>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

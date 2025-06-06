<?php
session_start();

// Check if student is logged in
if (!isset($_SESSION['student_logged_in']) || !$_SESSION['student_logged_in']) {
    header('Location: student_login.php');
    exit();
}

$srn = $_SESSION['student_srn'];

// DB connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'placement_system';
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Fetch student details
$stmt = $conn->prepare("SELECT fullName, srn, email, phone, dob, address, cgpa FROM users WHERE srn = ?");
$stmt->bind_param("s", $srn);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    session_destroy();
    header('Location: student_login.php');
    exit();
}

$student = $result->fetch_assoc();
$cgpa = $student['cgpa'];
$stmt->close();

// Fetch eligible companies
$sqlCompanies = "SELECT * FROM companies WHERE min_cgpa <= ? ORDER BY application_deadline ASC";
$stmt = $conn->prepare($sqlCompanies);
$stmt->bind_param("d", $cgpa);
$stmt->execute();
$resultCompanies = $stmt->get_result();

$conn->close();

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student Dashboard - Placement System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Placement System</a>
    <div>
      <a href="?logout=true" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
  </div>
</nav>

<main class="container mt-5">
  <h2 class="mb-4">Welcome, <?= htmlspecialchars($student['fullName']) ?></h2>

  <div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">Your Profile Details</div>
    <div class="card-body">
      <p><strong>SRN:</strong> <?= htmlspecialchars($student['srn']) ?></p>
      <p><strong>Email:</strong> <?= htmlspecialchars($student['email']) ?></p>
      <p><strong>Phone:</strong> <?= htmlspecialchars($student['phone']) ?></p>
      <p><strong>Date of Birth:</strong> <?= htmlspecialchars($student['dob']) ?></p>
      <p><strong>CGPA:</strong> <?= htmlspecialchars($student['cgpa']) ?></p>
      <p><strong>Address:</strong> <?= nl2br(htmlspecialchars($student['address'])) ?></p>
    </div>
  </div>

  <!-- Eligible Companies -->
  <div class="card shadow-sm">
    <div class="card-header bg-success text-white">Eligible Companies</div>
    <div class="card-body">
      <?php if ($resultCompanies && $resultCompanies->num_rows > 0): ?>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="table-success">
              <tr>
                <th>Company Name</th>
                <th>Job Role</th>
                <th>CTC</th>
                <th>Location</th>
                <th>Skills Required</th>
                <th>Recruitment Date</th>
                <th>Application Deadline</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($company = $resultCompanies->fetch_assoc()): ?>
                <tr>
                  <td><?= htmlspecialchars($company['company_name']) ?></td>
                  <td><?= htmlspecialchars($company['job_role']) ?></td>
                  <td><?= htmlspecialchars($company['ctc']) ?></td>
                  <td><?= htmlspecialchars($company['location']) ?></td>
                  <td><?= htmlspecialchars($company['skills_required']) ?></td>
                  <td><?= htmlspecialchars($company['recruitment_date']) ?></td>
                  <td><?= htmlspecialchars($company['application_deadline']) ?></td>
                  <td><?= nl2br(htmlspecialchars($company['description'])) ?></td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <p class="text-muted">No eligible companies available at this time.</p>
      <?php endif; ?>
    </div>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: admin_login.php');
    exit();
}

// DB connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'placement_system';
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}

// Handle company operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'add_company') {
        $name = $_POST['company_name'] ?? '';
        $desc = $_POST['description'] ?? '';
        $elig = $_POST['eligibility_criteria'] ?? '';
        $minCgpa = floatval($_POST['min_cgpa'] ?? 0);
        $jobRole = $_POST['job_role'] ?? '';
        $ctc = $_POST['ctc'] ?? '';
        $location = $_POST['location'] ?? '';
        $recruitmentDate = $_POST['recruitment_date'] ?? '';
        $deadline = $_POST['application_deadline'] ?? '';
        $skills = $_POST['skills_required'] ?? '';

        $stmt = $conn->prepare("INSERT INTO companies (company_name, description, eligibility_criteria, min_cgpa, job_role, ctc, location, recruitment_date, application_deadline, skills_required) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdsdssss", $name, $desc, $elig, $minCgpa, $jobRole, $ctc, $location, $recruitmentDate, $deadline, $skills);
        $stmt->execute();
        $stmt->close();
    }

    if ($_POST['action'] === 'update_company' && isset($_POST['company_id'])) {
        $id = intval($_POST['company_id']);
        $name = $_POST['company_name'] ?? '';
        $desc = $_POST['description'] ?? '';
        $elig = $_POST['eligibility_criteria'] ?? '';
        $minCgpa = floatval($_POST['min_cgpa'] ?? 0);
        $jobRole = $_POST['job_role'] ?? '';
        $ctc = $_POST['ctc'] ?? '';
        $location = $_POST['location'] ?? '';
        $recruitmentDate = $_POST['recruitment_date'] ?? '';
        $deadline = $_POST['application_deadline'] ?? '';
        $skills = $_POST['skills_required'] ?? '';

        $stmt = $conn->prepare("UPDATE companies SET company_name=?, description=?, eligibility_criteria=?, min_cgpa=?, job_role=?, ctc=?, location=?, recruitment_date=?, application_deadline=?, skills_required=? WHERE id=?");
        $stmt->bind_param("sssdsdssssi", $name, $desc, $elig, $minCgpa, $jobRole, $ctc, $location, $recruitmentDate, $deadline, $skills, $id);
        $stmt->execute();
        $stmt->close();
    }

    if ($_POST['action'] === 'delete_company' && isset($_POST['company_id'])) {
        $id = intval($_POST['company_id']);
        $stmt = $conn->prepare("DELETE FROM companies WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Fetch students and companies
$sqlStudents = "SELECT srn, fullName, email FROM users ORDER BY fullName ASC";
$resultStudents = $conn->query($sqlStudents);

$sqlCompanies = "SELECT * FROM companies ORDER BY company_name ASC";
$resultCompanies = $conn->query($sqlCompanies);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard - Placement System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .cursor-pointer { cursor: pointer; }
    .card:hover { background-color: #f8f9fa; transform: scale(1.01); transition: 0.2s; }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Placement System - Admin</a>
    <div><a href="?logout=true" class="btn btn-outline-light btn-sm">Logout</a></div>
  </div>
</nav>

<main class="container mt-5">
  <h2 class="mb-4">Welcome, <?= htmlspecialchars($_SESSION['admin_username']) ?></h2>

  <!-- Box Navigation -->
  <div class="row mb-4 text-center">
    <div class="col-md-6">
      <div class="card shadow p-4 cursor-pointer" onclick="toggleSection('studentsSection')">
        <h4>📋 Student Data</h4>
        <p>View registered students</p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card shadow p-4 cursor-pointer" onclick="toggleSection('companiesSection')">
        <h4>🏢 Manage Companies</h4>
        <p>Add or update company details</p>
      </div>
    </div>
  </div>

  <!-- Student Section -->
  <section id="studentsSection" class="d-none">
    <h4 class="mb-3">Registered Students</h4>
    <?php if ($resultStudents && $resultStudents->num_rows > 0): ?>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="table-dark">
            <tr>
              <th>SRN</th>
              <th>Full Name</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = $resultStudents->fetch_assoc()): ?>
              <tr>
                <td><?= htmlspecialchars($row['srn']) ?></td>
                <td><?= htmlspecialchars($row['fullName']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?><p>No students found.</p><?php endif; ?>
  </section>

  <!-- Company Section -->
  <section id="companiesSection" class="d-none mt-4">
    <h4 class="mb-3">Manage Companies</h4>

    <!-- Add Company Form -->
    <form method="POST" class="mb-4">
      <input type="hidden" name="action" value="add_company" />
      <div class="row g-3">
        <div class="col-md-4"><input type="text" name="company_name" class="form-control" placeholder="Company Name" required /></div>
        <div class="col-md-4"><input type="text" name="job_role" class="form-control" placeholder="Job Role" required /></div>
        <div class="col-md-4"><input type="text" name="ctc" class="form-control" placeholder="CTC (e.g. 6 LPA)" required /></div>
        <div class="col-md-4"><input type="text" name="location" class="form-control" placeholder="Location" required /></div>
        <div class="col-md-4"><input type="date" name="recruitment_date" class="form-control" required /></div>
        <div class="col-md-4"><input type="date" name="application_deadline" class="form-control" required /></div>
        <div class="col-md-6"><input type="text" name="skills_required" class="form-control" placeholder="Skills Required (comma-separated)" required /></div>
        <div class="col-md-3"><input type="number" step="0.01" min="0" max="10" name="min_cgpa" class="form-control" placeholder="Min CGPA" required /></div>
        <div class="col-md-3"><input type="text" name="eligibility_criteria" class="form-control" placeholder="Eligibility Criteria" required /></div>
        <div class="col-12"><textarea name="description" class="form-control" placeholder="Company Description" required></textarea></div>
        <div class="col-12 text-end"><button type="submit" class="btn btn-success">Add Company</button></div>
      </div>
    </form>

    <!-- Companies Table -->
    <?php if ($resultCompanies && $resultCompanies->num_rows > 0): ?>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="table-light">
            <tr>
              <th>Company Name</th>
              <th>Job Role</th>
              <th>CTC</th>
              <th>Location</th>
              <th>Recruitment Date</th>
              <th>Deadline</th>
              <th>Skills</th>
              <th>Min CGPA</th>
              <th>Eligibility</th>
              <th>Description</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while($company = $resultCompanies->fetch_assoc()): ?>
              <tr>
                <form method="POST">
                  <input type="hidden" name="action" value="update_company" />
                  <input type="hidden" name="company_id" value="<?= $company['id'] ?>" />
                  <td><input type="text" name="company_name" value="<?= htmlspecialchars($company['company_name']) ?>" class="form-control" required /></td>
                  <td><input type="text" name="job_role" value="<?= htmlspecialchars($company['job_role']) ?>" class="form-control" /></td>
                  <td><input type="text" name="ctc" value="<?= htmlspecialchars($company['ctc']) ?>" class="form-control" /></td>
                  <td><input type="text" name="location" value="<?= htmlspecialchars($company['location']) ?>" class="form-control" /></td>
                  <td><input type="date" name="recruitment_date" value="<?= $company['recruitment_date'] ?>" class="form-control" /></td>
                  <td><input type="date" name="application_deadline" value="<?= $company['application_deadline'] ?>" class="form-control" /></td>
                  <td><input type="text" name="skills_required" value="<?= htmlspecialchars($company['skills_required']) ?>" class="form-control" /></td>
                  <td><input type="number" step="0.01" name="min_cgpa" value="<?= htmlspecialchars($company['min_cgpa']) ?>" class="form-control" /></td>
                  <td><input type="text" name="eligibility_criteria" value="<?= htmlspecialchars($company['eligibility_criteria']) ?>" class="form-control" /></td>
                  <td><textarea name="description" class="form-control"><?= htmlspecialchars($company['description']) ?></textarea></td>
                  <td>
                    <button type="submit" class="btn btn-sm btn-primary mb-1 w-100">Update</button>
                </form>
                <form method="POST" onsubmit="return confirm('Delete this company?');">
                  <input type="hidden" name="action" value="delete_company" />
                  <input type="hidden" name="company_id" value="<?= $company['id'] ?>" />
                  <button type="submit" class="btn btn-sm btn-danger w-100">Delete</button>
                </form>
                  </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?><p>No companies found.</p><?php endif; ?>
  </section>
</main>

<script>
  function toggleSection(sectionId) {
    document.getElementById('studentsSection').classList.add('d-none');
    document.getElementById('companiesSection').classList.add('d-none');
    document.getElementById(sectionId).classList.remove('d-none');
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

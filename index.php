<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Placement System - Home</title>

  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    /* Reset & base */
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      flex-direction: column;
      background: #f8f9fa;
    }

    main {
      flex: 1 0 auto;
      padding-bottom: 40px;
    }

    footer {
      flex-shrink: 0;
      background-color: #212529;
      color: #adb5bd;
      padding: 20px 0;
      font-size: 0.9rem;
      text-align: center;
      position: relative;
      z-index: 10;
      user-select: none;
    }

    /* Navbar */
    .navbar-custom {
      background-color:  #212529;
    }
    .navbar-brand {
      transition: color 0.3s ease;
      font-weight: 700;
      font-size: 1.6rem;
    }
    .navbar-brand:hover {
      color: #20c997;
    }
    .navbar-nav .nav-link {
      transition: color 0.3s ease;
      font-weight: 500;
    }
    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
      color: #20c997;
      font-weight: 600;
    }

    /* Hero Section */
    header {
      position: relative;
      text-align: center;
      color: white;
      padding: 100px 15px 120px;
      background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%);
      overflow: hidden;
    }
    header .college-name {
      color:rgb(160, 152, 154);
      text-transform: uppercase;
      font-weight: 700;
      margin-bottom: 0.5rem;
      letter-spacing: 2px;
      animation-delay: 0.1s;
      font-size: 1.5rem; /* Increased font size */
    }

    header::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle at center, rgba(255,255,255,0.2) 0%, transparent 70%);
      animation: pulse 8s ease-in-out infinite;
      z-index: 0;
      pointer-events: none;
    }
    @keyframes pulse {
      0%, 100% {
        transform: scale(1) translate(0, 0);
        opacity: 0.15;
      }
      50% {
        transform: scale(1.1) translate(10%, 10%);
        opacity: 0.3;
      }
    }

    header h1 {
      font-size: 3.5rem;
      font-weight: 800;
      letter-spacing: 1.5px;
      position: relative;
      z-index: 1;
      animation: fadeInUp 1.2s ease forwards;
      opacity: 0;
      margin-bottom: 0.5rem;
    }
    header p {
      font-size: 1.35rem;
      font-weight: 500;
      position: relative;
      z-index: 1;
      animation: fadeInUp 1.4s ease forwards;
      opacity: 0;
      margin-bottom: 1.8rem;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    }
    .btn-custom {
      position: relative;
      z-index: 1;
      background-color: #fff;
      color: #20c997;
      border-radius: 50px;
      padding: 15px 40px;
      font-size: 1.2rem;
      font-weight: 600;
      box-shadow: 0 5px 15px rgba(32, 201, 151, 0.5);
      border: none;
      transition: all 0.3s ease;
      animation: fadeInUp 1.6s ease forwards;
      opacity: 0;
      text-transform: uppercase;
      letter-spacing: 1.2px;
    }
    .btn-custom:hover,
    .btn-custom:focus {
      background-color: #20c997;
      color: white;
      box-shadow: 0 8px 20px rgba(32, 201, 151, 0.8);
      transform: translateY(-3px);
      outline: none;
    }

    /* Feature cards */
    .card {
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
      padding: 30px 20px;
      background: white;
    }
    .card:hover {
      transform: translateY(-8px) scale(1.05);
      box-shadow: 0 14px 25px rgba(32, 201, 151, 0.3);
    }
    .card-title {
      font-weight: 700;
      font-size: 1.5rem;
      margin-bottom: 15px;
      color: #212529;
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .card-title i {
      font-size: 2rem;
      color: #20c997;
      flex-shrink: 0;
    }
    .card-text {
      color: #495057;
      font-size: 1.05rem;
      flex-grow: 1;
    }

    /* Animations */
    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Footer social icons */
    .footer-socials {
      margin-top: 10px;
      display: flex;
      justify-content: center;
      gap: 20px;
    }
    .footer-socials a {
      color: #adb5bd;
      font-size: 1.4rem;
      transition: color 0.3s ease;
    }
    .footer-socials a:hover {
      color: #20c997;
    }

    /* Responsive tweaks */
    @media (max-width: 768px) {
      header h1 {
        font-size: 2.6rem;
      }
      header p {
        font-size: 1.1rem;
      }
    }
  </style>
</head>
<body>

<!-- Navbar -->
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm">
    <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#" style="padding-left: 0.3rem;">
              <i class="bi bi-briefcase-fill me-2" style="font-size: 1.5rem; color: #20c997; margin-left: -80px;"></i>
                Placement System
            </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <i class="bi bi-house-door-fill me-1"></i> Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="student_login.php">
              <i class="bi bi-person-circle me-1"></i> Student Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_login.php">
              <i class="bi bi-shield-lock-fill me-1"></i> Admin Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registrationform.php">
              <i class="bi bi-pencil-square me-1"></i> Register
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


<main>
  <!-- Hero Section -->
   <header class="text-center py-5 mb-4">
    <div class="container">
      <!-- <p class="college-name">KLE TECHNOLOGICAL UNIVERSITY, BELGAUM (Campus)</p> -->
      <h1 class="display-4"><b><i>KLE TECHNOLOGICAL UNIVERSITY, BELGAUM (Campus)</i></b></h1>
      <p class="lead">Welcome to the Placement System</p>
      <a href="registrationform.php" class="btn btn-custom btn-lg">Get Started</a>
    </div>
  </header>

  <!-- Features Section -->
  <div class="container my-5">
    <div class="row text-center">
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><i class="bi bi-person-badge"></i> Student Profiles</h5>
            <p class="card-text">Create and manage detailed student profiles including skills and academic records.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><i class="bi bi-building"></i> Company Listings</h5>
            <p class="card-text">List companies and their placement drives, manage job openings and eligibility criteria.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><i class="bi bi-bar-chart-line"></i> Placement Reports</h5>
            <p class="card-text">Generate reports on placement statistics, student selections, and company participation.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Footer -->
<footer>
  <div class="container">
    &copy; <?php echo date("Y"); ?> Placement System. All rights reserved.
    <div class="footer-socials mt-2">
      <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
      <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
    </div>
  </div>
</footer>

<!-- Bootstrap JS Bundle CDN (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

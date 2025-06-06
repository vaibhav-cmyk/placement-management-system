<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registration - Placement Eligibility System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      background-color: #f1f3f5;
      font-family: 'Poppins', sans-serif;
    }
    .form-section {
      max-width: 800px;
      margin: 50px auto;
      background-color: #fff;
      padding: 35px 40px;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.12);
      transition: box-shadow 0.3s ease;
    }
    .form-section:hover {
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
    .form-section h2 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: 600;
      color: #0d6efd;
      letter-spacing: 0.03em;
    }
    .form-label {
      font-weight: 500;
    }
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="date"],
    input[type="number"],
    textarea,
    select,
    input[type="file"] {
      border-radius: 6px;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    input:focus,
    select:focus,
    textarea:focus,
    input[type="file"]:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 8px rgba(13, 110, 253, 0.3);
      outline: none;
    }
    .form-check-label {
      font-weight: 400;
      user-select: none;
    }
    .btn-primary {
      background-color: #0d6efd;
      border: none;
      font-weight: 600;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }
    .btn-primary:hover,
    .btn-primary:focus {
      background-color: #0056b3;
      transform: scale(1.04);
      box-shadow: 0 4px 12px rgba(0, 86, 179, 0.4);
    }
    .invalid-feedback {
      font-size: 0.875rem;
    }
    /* Checkbox group inline spacing */
    .form-check-inline {
      margin-right: 18px;
    }
    /* Responsive tweaks */
    @media (max-width: 576px) {
      .form-section {
        padding: 25px 20px;
      }
      .form-check-inline {
        display: block;
        margin-bottom: 8px;
      }
    }
    /* Custom dropdown with checkboxes styles */
    .dropdown-menu {
      max-height: 200px;
      overflow-y: auto;
      padding: 10px;
    }
    .dropdown-toggle::after {
      margin-left: 0.5em;
    }
    .skills-dropdown {
      user-select: none;
    }
    .skills-dropdown label {
      display: flex;
      align-items: center;
      cursor: pointer;
      margin-bottom: 4px;
    }
    .skills-dropdown input[type="checkbox"] {
      margin-right: 8px;
    }
  </style>
</head>
<body>

<div class="container form-section">
  <h2>Student Registration</h2>
  <form class="needs-validation" id="studentForm" action="register.php" method="POST" enctype="multipart/form-data" novalidate>

    <div class="mb-3">
      <label for="fullName" class="form-label">Full Name</label>
      <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" required>
      <div class="invalid-feedback">Please enter your full name.</div>
    </div>

    <div class="mb-3">
      <label for="srn" class="form-label">SRN</label>
      <input type="text" class="form-control" id="srn" name="srn" placeholder="Enter your SRN" required>
      <div class="invalid-feedback">Please enter your SRN.</div>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email Address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
      <div class="invalid-feedback">Please enter a valid email.</div>
    </div>

    <div class="mb-3">
      <label for="phone" class="form-label">Phone Number</label>
      <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" placeholder="Enter 10-digit phone number" required>
      <div class="invalid-feedback">Please enter a valid 10-digit phone number.</div>
    </div>

    <div class="mb-3">
      <label for="dob" class="form-label">Date of Birth</label>
      <input type="date" class="form-control" id="dob" name="dob" required>
      <div class="invalid-feedback">Please enter your date of birth.</div>
    </div>

    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <textarea class="form-control" id="address" name="address" rows="2" placeholder="Enter your address" required></textarea>
      <div class="invalid-feedback">Please enter your address.</div>
    </div>

    <div class="mb-3">
      <label for="gender" class="form-label">Gender</label>
      <select class="form-select" id="gender" name="gender" required>
        <option value="">Select gender</option>
        <option>Male</option>
        <option>Female</option>
        <option>Other</option>
      </select>
      <div class="invalid-feedback">Please select your gender.</div>
    </div>

    <div class="mb-3">
      <label for="branch" class="form-label">Branch</label>
      <select class="form-select" id="branch" name="branch" required>
        <option value="">Select branch</option>
        <option>Computer Science</option>
        <option>Electronics</option>
        <option>Mechanical</option>
        <option>Civil</option>
        <option>Information Technology</option>
        <option>Computer Application</option>

      </select>
      <div class="invalid-feedback">Please select your branch.</div>
    </div>

    <div class="mb-3">
      <label for="gradYear" class="form-label">Graduation Year</label>
      <input type="number" class="form-control" id="gradYear" name="gradYear" min="2024" max="2030" placeholder="Enter graduation year" required>
      <div class="invalid-feedback">Please enter a valid graduation year.</div>
    </div>

    <div class="mb-3">
      <label for="marks10" class="form-label">10th Marks (%)</label>
      <input type="number" class="form-control" id="marks10" name="marks10" min="0" max="100" step="0.01" placeholder="Enter 10th marks" required>
      <div class="invalid-feedback">Enter 10th marks between 0–100.</div>
    </div>

    <div class="mb-3">
      <label for="marks12" class="form-label">12th Marks (%)</label>
      <input type="number" class="form-control" id="marks12" name="marks12" min="0" max="100" step="0.01" placeholder="Enter 12th marks" required>
      <div class="invalid-feedback">Enter 12th marks between 0–100.</div>
    </div>

    <div class="mb-3">
      <label for="degreeMarks" class="form-label">Degree Marks (CGPA or %)</label>
      <input type="number" class="form-control" id="degreeMarks" name="degreeMarks" min="0" max="100" step="0.01" placeholder="Enter degree marks" required>
      <div class="invalid-feedback">Enter valid degree marks.</div>
    </div>

    <div class="mb-3">
      <label class="form-label">Skills Known</label>
      <div class="dropdown">
        <button
          class="btn btn-outline-primary dropdown-toggle w-100 text-start"
          type="button"
          id="skillsDropdown"
          data-bs-toggle="dropdown"
          aria-expanded="false"
          aria-haspopup="true"
          aria-label="Select Skills"
        >
          Select Skills
        </button>
        <ul class="dropdown-menu skills-dropdown" aria-labelledby="skillsDropdown">
          <li><label><input type="checkbox" name="skills[]" value="Java" /> Java</label></li>
          <li><label><input type="checkbox" name="skills[]" value="Python" /> Python</label></li>
          <li><label><input type="checkbox" name="skills[]" value="C++" /> C++</label></li>
          <li><label><input type="checkbox" name="skills[]" value="Web Development" /> Web Development</label></li>
          <li><label><input type="checkbox" name="skills[]" value="SQL" /> SQL</label></li>
          <li><label><input type="checkbox" name="skills[]" value="JavaScript" /> JavaScript</label></li>
          <li><label><input type="checkbox" name="skills[]" value="React" /> React</label></li>
          <li><label><input type="checkbox" name="skills[]" value="Angular" /> Angular</label></li>
          <li><label><input type="checkbox" name="skills[]" value="Node.js" /> Node.js</label></li>
          <li><label><input type="checkbox" name="skills[]" value="Django" /> Django</label></li>
          <li><label><input type="checkbox" name="skills[]" value="Flutter" /> Flutter</label></li>
          <li><label><input type="checkbox" name="skills[]" value="Swift" /> Swift</label></li>
          <li><label><input type="checkbox" name="skills[]" value="Kotlin" /> Kotlin</label></li>
          <li><label><input type="checkbox" name="skills[]" value="AWS" /> AWS</label></li>
          <li><label><input type="checkbox" name="skills[]" value="Docker" /> Docker</label></li>
          <li><label><input type="checkbox" name="skills[]" value="Kubernetes" /> Kubernetes</label></li>
          <li><label><input type="checkbox" name="skills[]" value="Machine Learning" /> Machine Learning</label></li>
          <li><label><input type="checkbox" name="skills[]" value="Data Science" /> Data Science</label></li>
          <li><label><input type="checkbox" name="skills[]" value="Blockchain" /> Blockchain</label></li>
          <li><label><input type="checkbox" name="skills[]" value="Cybersecurity" /> Cybersecurity</label></li>
          <li><label><input type="checkbox" name="skills[]" value="UI/UX Design" /> UI/UX Design</label></li>
          <li><label><input type="checkbox" name="skills[]" value="DevOps" /> DevOps</label></li>
          <li><label><input type="checkbox" name="skills[]" value="Big Data" /> Big Data</label></li>
        </ul>
      </div>
      <!-- <div class="invalid-feedback d-block" id="skillsError" style="display:none;">Please select at least one skill.</div> -->
    </div>

    <!-- <div class="mb-4">
      <label for="resume" class="form-label">Upload Resume (PDF)</label>
      <input type="file" class="form-control" id="resume" name="resume" accept=".pdf" required>
      <div class="invalid-feedback">Please upload your resume in PDF format.</div>
    </div> -->

    <button class="btn btn-primary w-100" type="submit">Register</button>
  </form>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Your Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="confirmationData">
        <!-- Content added by JS -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Edit</button>
        <button type="button" class="btn btn-primary" id="confirmSubmit">Confirm & Submit</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  (function () {
    'use strict';
    const form = document.querySelector('#studentForm');
    const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
    const confirmSubmitBtn = document.getElementById('confirmSubmit');
    const confirmationData = document.getElementById('confirmationData');
    const skillsDropdownBtn = document.getElementById('skillsDropdown');
    const skillsError = document.getElementById('skillsError');

    let finalSubmit = false;

    // Update dropdown button text based on checked skills
    function updateSkillsDropdownText() {
      const checkedBoxes = form.querySelectorAll('input[name="skills[]"]:checked');
      if (checkedBoxes.length === 0) {
        skillsDropdownBtn.textContent = 'Select Skills';
      } else {
        const selectedSkills = Array.from(checkedBoxes).map(cb => cb.value);
        skillsDropdownBtn.textContent = selectedSkills.join(', ');
      }
    }

    // Attach change event to skill checkboxes to update dropdown button text
    form.querySelectorAll('input[name="skills[]"]').forEach(cb => {
      cb.addEventListener('change', () => {
        updateSkillsDropdownText();
        if (form.classList.contains('was-validated')) {
          validateSkills();
        }
      });
    });

    // Custom validation for skills (at least one required)
    function validateSkills() {
      const checkedBoxes = form.querySelectorAll('input[name="skills[]"]:checked');
      if (checkedBoxes.length === 0) {
        skillsError.style.display = 'block';
        return false;
      } else {
        skillsError.style.display = 'none';
        return true;
      }
    }

    form.addEventListener('submit', function (event) {
      const skillsValid = validateSkills();

      if (!form.checkValidity() || !skillsValid) {
        event.preventDefault();
        event.stopPropagation();
        form.classList.add('was-validated');
        return;
      }

      if (!finalSubmit) {
        event.preventDefault();

        const data = new FormData(form);
        let skillsSelected = [];
        for (let option of data.getAll('skills[]')) {
          skillsSelected.push(option);
        }

        confirmationData.innerHTML = `
          <p><strong>Full Name:</strong> ${data.get('fullName')}</p>
          <p><strong>SRN:</strong> ${data.get('srn')}</p>
          <p><strong>Email:</strong> ${data.get('email')}</p>
          <p><strong>Phone:</strong> ${data.get('phone')}</p>
          <p><strong>Date of Birth:</strong> ${data.get('dob')}</p>
          <p><strong>Gender:</strong> ${data.get('gender')}</p>
          <p><strong>Address:</strong> ${data.get('address')}</p>
          <p><strong>Branch:</strong> ${data.get('branch')}</p>
          <p><strong>Graduation Year:</strong> ${data.get('gradYear')}</p>
          <p><strong>10th Marks:</strong> ${data.get('marks10')}%</p>
          <p><strong>12th Marks:</strong> ${data.get('marks12')}%</p>
          <p><strong>Degree Marks:</strong> ${data.get('degreeMarks')}</p>
          <p><strong>Skills:</strong> ${skillsSelected.length ? skillsSelected.join(', ') : 'None'}</p>
          <p><strong>Resume:</strong> ${data.get('resume')?.name || 'Not uploaded'}</p>
        `;

        confirmModal.show();
      }

      form.classList.add('was-validated');
    });

    confirmSubmitBtn.addEventListener('click', function () {
      finalSubmit = true;
      confirmModal.hide();
      form.requestSubmit();
    });

    // Initialize dropdown text
    updateSkillsDropdownText();
  })();
</script>


</body>
</html>

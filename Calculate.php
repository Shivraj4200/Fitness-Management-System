<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sleep Tracker</title>
  <link rel="icon" href="https://img.icons8.com/?size=100&id=ww9Pzn0Q3R4T&format=png&color=000000" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="Style.css" />
</head>
<body>
  
<nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="fit.jpg" width="68" height="57" class="img-fluid rounded me-2" alt="Logo" />
      Fit Track
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="Sleep.php">Sleep Tracker</a></li>
        <li class="nav-item"><a class="nav-link" href="Workout.php">Workout Tracker</a></li>
        <li class="nav-item"><a class="nav-link" href="Nutrition.php">Nutrition Goals</a></li>
        <li class="nav-item"><a class="nav-link" href="Calculate.php">Calculate BMI</a></li>
      </ul>

      <!-- Profile Dropdown Menu -->
      <div class="dropdown ms-auto">
        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://img.icons8.com/ios-filled/50/000000/user-male-circle.png" alt="Profile" width="40" height="40" class="rounded-circle" />
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
          <li class="dropdown-item-text" id="userName">Welcome, User</li>
          <li><hr class="dropdown-divider" /></li>
          <li><a class="dropdown-item" href="#" id="logoutBtn">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<section id="bmi-calculator">
  <div class="bmi-card">
    <h2>BMI Calculator</h2>
    <form id="bmi-form">
      <div class="mb-3">
        <input type="number" id="weight" class="form-control" placeholder="Enter your weight (kg)" min="1" step="0.1" required />
      </div>
      <div class="mb-3">
        <select id="height-unit" class="form-select" required>
          <option value="cm">Height in Centimeters (cm)</option>
          <option value="feet">Height in Feet</option>
        </select>
      </div>
      <div class="mb-3">
        <input type="number" id="height-value" class="form-control" placeholder="Enter Height" min="0.1" step="0.01" required />
      </div>
      <button type="submit" class="btn btn-primary w-100">Calculate BMI</button>
    </form>

    <div id="bmi-result" class="bmi-result mt-4 d-none">
      <h4>Your BMI: <span id="bmi-value">0</span></h4>
      <p class="category-alert" id="bmi-category"></p>
    </div>
  </div>
</section>
<footer class="footer bg-dark text-light pt-5">
        <div class="container">
        <div class="row">
            <div class="col-md-4">
            <h3>Fit Track</h3>
            <p>Your ultimate companion for a healthier lifestyle, offering personalized fitness and wellness insights.</p>
            </div>
            <div class="col-md-4">
            <h3>Contact Us</h3>
            <ul class="list-unstyled">
                <li>Email: <a href="guptaaman8101@gmail.com" class="text-light">guptaaman8101@gmail.com</a></li>
                <li>Jalandhar, Punjab</li>
            </ul>
            </div>
            <div class="col-md-4">
            <h3>Follow Us</h3>
            <div class="social-links d-flex">
                <a href="https://github.com/Amangupta81" target="_blank" class="me-3">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/github.png" alt="GitHub" width="30" />
                </a>
                <a href="https://www.linkedin.com/in/aman-gupta-632a3424a/" target="_blank">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/linkedin.png" alt="LinkedIn" width="30" />
                </a>
            </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <p>&copy; 2024 Fit Track. All rights reserved.</p>
        </div>
        </div>
    </footer>
<!-- Bootstrap JS Bundle (only include once) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom Script -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // BMI Calculation
    const bmiForm = document.getElementById("bmi-form");
    const heightUnitSelect = document.getElementById("height-unit");
    const heightInput = document.getElementById("height-value");
    const bmiResult = document.getElementById("bmi-result");
    const bmiValue = document.getElementById("bmi-value");
    const bmiCategory = document.getElementById("bmi-category");

    bmiForm.addEventListener("submit", (event) => {
      event.preventDefault();
      const weight = parseFloat(document.getElementById("weight").value);
      const heightUnit = heightUnitSelect.value;
      const heightValue = parseFloat(heightInput.value);

      if (isNaN(weight) || isNaN(heightValue) || weight <= 0 || heightValue <= 0) {
        alert("Please enter valid values for weight and height.");
        return;
      }

      let heightInMeters = heightUnit === "cm" ? heightValue / 100 : heightValue * 0.3048;
      const bmi = (weight / (heightInMeters * heightInMeters)).toFixed(1);
      bmiValue.textContent = bmi;
      displayBMICategory(bmi);
      bmiResult.classList.remove("d-none");
    });

    function displayBMICategory(bmi) {
      let category = bmi < 18.5 ? "Underweight 🥗" :
                     bmi < 24.9 ? "Normal 🌟" :
                     bmi < 29.9 ? "Overweight ⚠️" : "Obese 🚨";
      bmiCategory.textContent = `Category: ${category}`;
    }

    // Fetch username from session (PHP)
    document.getElementById('userName').textContent = 'Welcome, <?= $_SESSION["username"] ?? "User"; ?>';

    // Logout functionality
    document.getElementById('logoutBtn').addEventListener('click', function (e) {
      e.preventDefault();
      window.location.href = 'logout.php';
    });
  });
</script>

</body>
</html>

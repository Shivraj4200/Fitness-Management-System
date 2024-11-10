<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nutrition Tracker</title>
    <link
        rel="icon"
        href="https://img.icons8.com/?size=100&id=ww9Pzn0Q3R4T&format=png&color=000000"
    />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="fit.jpg" width="68" height="57" class="img-fluid rounded me-2" alt="Logo" />
                Fit Track
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Sleep.php">Sleep Tracker</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Workout.php">Workout Tracker</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Nutrition.php">Nutrition Goals</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="Calculate.php">Calculate BMI</a></li>
                </ul>
                <div class="dropdown ms-auto">
                    <a
                    href="#"
                    class="d-flex align-items-center text-decoration-none dropdown-toggle"
                    id="profileDropdown"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    >
                    <img
                        src="https://img.icons8.com/ios-filled/50/000000/user-male-circle.png"
                        alt="Profile"
                        width="40"
                        height="40"
                        class="rounded-circle"
                    />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li class="dropdown-item-text" id="userName">Welcome, User</li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                        <a class="dropdown-item" href="#" id="logoutBtn">Logout</a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <br/><br/>
    <div class="container nutrition-section">
        <h2>Your Nutritional Goals</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 animate-fadeIn">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Calories</h5>
                        <p class="card-text">Daily Target: 2000 kcal</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 animate-fadeIn">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Protein</h5>
                        <p class="card-text">Daily Target: 150g</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 animate-fadeIn">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Carbohydrates</h5>
                        <p class="card-text">Daily Target: 250g</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="container">
        <h2>Nutritional Tips</h2>
        <ul class="list-group">
            <li class="list-group-item">
                Stay hydrated by drinking plenty of water.
            </li>
            <li class="list-group-item">
                Incorporate a variety of fruits and vegetables into your diet.
            </li>
            <li class="list-group-item">
                Choose whole grains over refined grains.
            </li>
            <li class="list-group-item">
                Monitor portion sizes to avoid overeating.
            </li>
            <li class="list-group-item">Limit added sugars and saturated fats.</li>
        </ul>
    </div>
    <br/><br/><br/>
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
                <li>Email: <a href="mailto:guptaaman8101@gmail.com" class="text-light">guptaaman8101@gmail.com</a></li>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
  // Fetch username from session (Example: Replace this with your PHP logic)
        document.getElementById('userName').textContent = 'Welcome, <?= $_SESSION["username"] ?? "User"; ?>';
      // Handle logout
        document.getElementById('logoutBtn').addEventListener('click', function (e) {
        e.preventDefault();
        // Perform an AJAX request to logout.php to end the session
        window.location.href = 'logout.php';
        });
    </script>
</body>
</html>

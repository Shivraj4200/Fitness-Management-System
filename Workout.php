<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "fit_track";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for adding workout logs
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $email = $_SESSION['user']; // Get the email from the session
    $workout_type = $_POST['workoutType'];
    $duration = intval($_POST['duration']);
    $workout_date = $_POST['workoutDate'];

    // Validate form inputs
    if (!empty($workout_type) && $duration > 0 && !empty($workout_date)) {
        // Prepare an SQL statement to insert data into the database
        $stmt = $conn->prepare("INSERT INTO workout_logs (email, workout_type, duration, workout_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $email, $workout_type, $duration, $workout_date);

        // Execute the statement
        if ($stmt->execute()) {
            $success_message = "Workout log saved successfully!";
        } else {
            $error_message = "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        $error_message = "Please fill in all fields correctly.";
    }
}

// Handle deletion of workout log
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    
    // Prepare an SQL statement to delete the workout log
    $stmt = $conn->prepare("DELETE FROM workout_logs WHERE id = ? AND email = ?");
    $stmt->bind_param("is", $delete_id, $_SESSION['user']);

    // Execute the delete query
    if ($stmt->execute()) {
        $success_message = "Workout log deleted successfully!";
    } else {
        $error_message = "Error deleting log: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Fetch workout logs for the logged-in user
$email = $_SESSION['user'];
$sql = "SELECT * FROM workout_logs WHERE email = ? ORDER BY workout_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout Tracker</title>
    <link rel="icon" href="https://img.icons8.com/?size=100&id=ww9Pzn0Q3R4T&format=png&color=000000" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Style.css" />
    <style>
        body {
            background-color: #f5f5f5;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-dark {
            background-color: #4e54c8;
            border-color: #4e54c8;
        }
        .btn-dark:hover {
            background-color: #8f94fb;
            border-color: #8f94fb;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
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
<div class="container">
    <h1 class="text-center mb-4">Workout Tracker</h1>

    <!-- Display success or error messages -->
    <?php if (isset($success_message)): ?>
        <div class="success-message" id="successMessage"><?php echo $success_message; ?></div>
    <?php endif; ?>
    <?php if (isset($error_message)): ?>
        <div class="error-message" id="errorMessage"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <!-- Workout Log Form -->
    <div class="card p-4">
        <form method="POST">
            <div class="mb-3">
                <label for="workoutType" class="form-label">Workout Type</label>
                <select class="form-select" name="workoutType" id="workoutType" required>
                    <option value="">Select type</option>
                    <option value="Cardio">Cardio</option>
                    <option value="Strength">Strength</option>
                    <option value="Flexibility">Flexibility</option>
                    <option value="HIIT">HIIT</option>
                    <option value="Yoga">Yoga</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration (minutes)</label>
                <input type="number" class="form-control" name="duration" id="duration" min="1" required>
            </div>
            <div class="mb-3">
                <label for="workoutDate" class="form-label">Date</label>
                <input type="date" class="form-control" name="workoutDate" id="workoutDate" required>
            </div>
            <button type="submit" class="btn btn-dark w-100">Add Workout Log</button>
        </form>
    </div>

    <!-- Display Workout Logs -->
    <div class="mt-5">
        <h3>Your Workout Logs</h3>
        <ul class="list-group">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><strong><?= $row['workout_type'] ?></strong> - <?= $row['duration'] ?> mins</span>
                        <span class="text-muted"><?= $row['workout_date'] ?></span>

                        <!-- Delete button -->
                        <a href="?delete_id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this workout log?')">Delete</a>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <li class="list-group-item">No workout logs available.</li>
            <?php endif; ?>
        </ul>
    </div>
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
    // Auto-hide success or error message after 3 seconds
    setTimeout(function() {
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        if (successMessage) {
            successMessage.style.display = 'none';
        }
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 3000); // Hide after 3 seconds
</script>
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

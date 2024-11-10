<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

require_once "database.php";

$user_email = $_SESSION["user"]; // Get the logged-in user's email

// Handle adding sleep record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['date']) && isset($_POST['hours'])) {
    $date = $_POST['date'];
    $hours = $_POST['hours'];
    $stmt = $conn->prepare("INSERT INTO sleep_logs (user_email, date, hours) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $user_email, $date, $hours);
    if ($stmt->execute()) {
        echo "<script>alert('Record added successfully');</script>";
        header("Location: Sleep.php");
        exit();
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}

// Handle deleting sleep record
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $stmt = $conn->prepare("DELETE FROM sleep_logs WHERE id = ? AND user_email = ?");
    $stmt->bind_param("is", $id, $user_email);
    if ($stmt->execute()) {
        echo "<script>alert('Record deleted successfully');</script>";
        header("Location: Sleep.php");
        exit();
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}

// Fetch all sleep records for the logged-in user
$sql = "SELECT * FROM sleep_logs WHERE user_email = '$user_email' ORDER BY date DESC";
$result = $conn->query($sql);
$sleep_data = [];
while ($row = $result->fetch_assoc()) {
    $sleep_data[] = $row;
}

$conn->close();
?>
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
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="fit.jpg" width="68" height="57" class="img-fluid rounded me-2" alt="Logo" />
            Fit Track
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="Sleep.php">Sleep Tracker</a></li>
                <li class="nav-item"><a class="nav-link" href="Workout.php">Workout Tracker</a></li>
                <li class="nav-item"><a class="nav-link" href="Nutrition.php">Nutrition Goals</a></li>
                <li class="nav-item"><a class="nav-link" href="Calculate.php">Calculate BMI</a></li>
            </ul>
            <div class="dropdown ms-auto">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://img.icons8.com/ios-filled/50/000000/user-male-circle.png" alt="Profile" width="40" height="40" class="rounded-circle" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li class="dropdown-item-text" id="userName">Welcome, <?= $_SESSION["username"] ?? "User"; ?></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="#" id="logoutBtn">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Sleep Tracker Section -->
<section id="sleep-tracker" class="d-flex align-items-center min-vh-100">
    <div class="container text-center">
        <h2 class="section-title">Sleep Tracker</h2>
        <form id="sleep-form" method="POST" class="my-4">
            <div class="mb-3">
                <input type="date" name="date" id="sleep-date" class="form-control" placeholder="Select Date" required />
            </div>
            <div class="mb-3">
                <input type="number" name="hours" id="sleep-hours" class="form-control" placeholder="Enter Hours Slept" min="1" max="24" required />
            </div>
            <button type="submit" class="btn btn-dark">Add Sleep Record</button>
        </form>
        <div id="sleep-history" class="mt-5">
            <h3>Sleep History</h3>
            <ul id="sleep-list" class="list-group mt-3">
                <?php foreach ($sleep_data as $record) { ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $record['date'] . ": " . $record['hours'] . " Hours"; ?>
                        <a href="Sleep.php?delete_id=<?= $record['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</section>

<!-- Footer -->
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

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Display the username from session
    document.getElementById('userName').textContent = 'Welcome, <?= $_SESSION["username"] ?? "User"; ?>';
    // Handle logout
    document.getElementById('logoutBtn').addEventListener('click', function (e) {
        e.preventDefault();
        window.location.href = 'logout.php';
    });
</script>
</body>
</html>

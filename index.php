<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fit Track</title>
    <link
      rel="icon"
      href="https://img.icons8.com/?size=100&id=ww9Pzn0Q3R4T&format=png&color=000000"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="Style.css" />
  </head>
  <script>
    // Scroll-triggered animation
    window.addEventListener('scroll', function () {
      const elements = document.querySelectorAll('.feature-row');
      const windowHeight = window.innerHeight;
  
      elements.forEach((el) => {
        const position = el.getBoundingClientRect().top;
  
        if (position < windowHeight - 100) {
          el.classList.add('fade-in');
        }
      });
    });
  </script>
  
  <body>
      <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
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
            <li class="nav-item">
              <a class="nav-link" href="Calculate.php">Calculate BMI</a>
            </li>
          </ul>
          <!-- Profile Dropdown Menu -->
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

    <section
      id="home"
      class="hero text-center text-light d-flex align-items-center justify-content-center"
    >
      <div>
        <h1 class="hero-title">
          Fit Track - Your Personalized Health and Wellness Dashboard!
        </h1>
        <p class="hero-subtitle">
          Empowering you to achieve your health goals with personalized insights
          and real-time tracking.
        </p>
      </div>
    </section>
    <section class="features-section py-5">
      <div class="text-center">
        <h2 class="section-title">Explore Our Features!</h2>
      </div>
      <div class="container mt-5">
    
        <!-- Workout Tracker -->
        <div class="row feature-row">
          <div class="col-md-6 order-md-2 text-center">
            <img
              src="https://media.istockphoto.com/id/1454117517/vector/weightlifting-sport-illustration-with-athlete-lifts-a-heavy-barbell-gym-equipment-and.jpg?s=612x612&w=0&k=20&c=A9B3W00wKHw-CNn72ekkpTTAFhSk5WmDbvOfjvrCf0U="
              alt="Workout"
              class="img-fluid rounded feature-img slide-in-right"
            />
          </div>
          <div class="col-md-6 feature-text">
            <h3 class="feature-title">Workout Tracker</h3>
            <p>
              Track your progress, stay motivated, and achieve your fitness
              goals with detailed workout insights.
            </p>
            <a href="Workout.php" class="btn btn-dark">Start Your Workout</a>
          </div>
        </div>
    
        <!-- Sleep Tracker -->
        <div class="row feature-row mt-5">
          <div class="col-md-6 text-center">
            <img
              src="https://img.freepik.com/premium-vector/sick-man-calling-ambulance_179970-1744.jpg"
              alt="Sleep"
              class="img-fluid rounded feature-img slide-in-left"
            />
          </div>
          <div class="col-md-6 feature-text">
            <h3 class="feature-title">Sleep Tracker</h3>
            <p>
              Monitor your sleep patterns, improve sleep quality, and ensure
              better health with actionable insights.
            </p>
            <a href="Sleep.php" class="btn btn-dark">Track Now</a>
          </div>
        </div>
    
        <!-- Nutrition Goal -->
        <div class="row feature-row mt-5">
          <div class="col-md-6 order-md-2 text-center">
            <img
              src="https://static.vecteezy.com/system/resources/previews/012/658/143/non_2x/diet-plan-or-nutrition-consultation-concept-female-nutritionist-or-dietitian-doctor-with-vegetables-vector.jpg"
              alt="Nutrition"
              class="img-fluid rounded feature-img fade-in"
            />
          </div>
          <div class="col-md-6 feature-text">
            <h3 class="feature-title">Nutrition Goal</h3>
            <p>
              Set and track daily nutrition goals to maintain a balanced diet
              and achieve optimal health.
            </p>
            <a href="Nutrition.php" class="btn btn-dark">View Nutrition</a>
          </div>
        </div>
    
        <!-- Calculate BMI Feature -->
        <div class="row feature-row mt-5">
          <div class="col-md-6 text-center">
            <img
              src="image.png"
              alt="Calculate BMI"
              class="img-fluid rounded feature-img zoom-in"
            />
          </div>
          <div class="col-md-6 feature-text">
            <h3 class="feature-title">Calculate BMI</h3>
            <p>
              Use our BMI calculator to understand your health status and 
              take the first step toward a healthier lifestyle.
            </p>
            <a href="Calculate.php" class="btn btn-dark">Calculate Now</a>
          </div>
        </div>
      </div>
    </section>
    <br/><br/><br/>
    <footer class="footer bg-dark text-light pt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3>Fit Track</h3>
            <p>
              Your ultimate companion for a healthier lifestyle, offering
              personalized fitness and wellness insights.
            </p>
          </div>
          <div class="col-md-4">
            <h3>Contact Us</h3>
            <ul class="list-unstyled">
              <li>
                Email:
                <a href="mailto:guptaaman8101@gmail.com" class="text-light">
                    guptaaman8101@gmail.com
                </a>
              </li>
              <li>Jalandhar,Punjab</li>
            </ul>
          </div>

          <div class="col-md-4">
            <h3>Follow Us</h3>
            <div class="social-links d-flex">
              <a
                href="https://github.com/Amangupta81"
                target="_blank"
                class="me-3"
              >
                <img
                  src="https://img.icons8.com/ios-filled/50/ffffff/github.png"
                  alt="GitHub"
                  width="30"
                />
              </a>
              <a
                href="https://www.linkedin.com/in/aman-gupta-632a3424a/"
                target="_blank"
              >
                <img
                  src="https://img.icons8.com/ios-filled/50/ffffff/linkedin.png"
                  alt="LinkedIn"
                  width="30"
                />
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
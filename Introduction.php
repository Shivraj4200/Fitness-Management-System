<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fit Track</title>
    <link rel="icon" href="https://img.icons8.com/?size=100&id=ww9Pzn0Q3R4T&format=png&color=000000" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Style.css" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }
        .hero {
            height: 100vh;
            background: url('https://images.unsplash.com/photo-1605296867304-46d5465a13f1') center/cover;
            color: white;
            text-align: center;
            padding: 50px 20px;
            border-radius: 0 0 50px 50px;
        }
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        #features {
            background-color: #f1f3f5;
            border-radius: 10px;
            padding: 40px 20px;
        }
        .feature {
            display: flex; /* Flex container */
            flex-direction: column; /* Stack items vertically */
            justify-content: space-between; /* Space out items */
            height: 100%; /* Full height */
        }
        .feature-card {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            flex-grow: 1; /* Allow the card to grow equally */
            display: flex;
            flex-direction: column; /* Stack content vertically */
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }
        .feature-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 10px 0;
        }
        .feature-description {
            color: #6c757d;
            margin-top: auto; /* Push description to the bottom */
        }
        #testimonials {
            background-color: #e9ecef;
            padding: 40px 20px;
            text-align: center;
        }
        blockquote {
            font-style: italic;
            margin: 20px 0;
            padding: 10px 20px;
            border-left: 5px solid #d63384;
            background-color: #ffffff;
            border-radius: 10px;
        }
        .social-links a {
            margin-right: 15px;
            transition: transform 0.3s;
        }
        .social-links a:hover {
            transform: scale(1.1);
        }
        #navbar .navbar-brand {
            margin-left: 80px; /* Pushes the brand to the right */
        }
        .login-button {
            background: linear-gradient(to right, #1e3c72, #2a5298); /* Darker blue gradient */
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 20px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1.2rem;
            box-shadow: rgba(44, 82, 130, 0.8) 0 0 6px 5px; /* Slightly darker shadow */
            transition: background 0.4s ease; /* Smooth transition on hover */
        }

        .login-button:hover {
            background: linear-gradient(to right, #2a5298, #1e3c72); /* Reversed gradient */
        }

        /* Scrolling animations */
        .slide-in-right {
            animation: slide-in-right 0.8s ease-out;
        }

        @keyframes slide-in-right {
            0% {
                transform: translateX(100%);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="fit.jpg" width="68" height="57" class="img-fluid rounded me-2" alt="Logo" />
                <img src="vvgif.gif" width="180" height="300" class="img-fluid rounded me-2" alt="Logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="Login.Php"  class="btn login-button ms-auto slide-in-right">Login/SignUp</a>
        </div>
    </nav>

    <header>
        <div class="hero">
            <h1>Track Your Fitness Journey Like Never Before!</h1>
            <p>Join thousands of users who are transforming their health with our innovative fitness tracker.</p>
        </div>
    </header>

    <section id="features" class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">Key Features</h2>
            <div class="row">
                <div class="col-md-3 feature">
                    <div class="feature-card">
                        <img src="nutri.png" alt="Nutrition Goals" class="img-fluid mb-3">
                        <h3 class="feature-title">Nutrition Goals</h3>
                        <p class="feature-description">Empower your health journey with personalized nutrition goals tailored to your lifestyle for optimal health and well-being!</p>
                    </div>
                </div>
                <div class="col-md-3 feature">
                    <div class="feature-card">
                        <img src="work.png" alt="Personalized Insights" class="img-fluid mb-3">
                        <h3 class="feature-title">Workout Tracker</h3>
                        <p class="feature-description">Stay motivated and reach your fitness milestones with our intuitive workout tracker!</p>
                    </div>
                </div>
                <div class="col-md-3 feature">
                    <div class="feature-card">
                        <img src="bmi.jpg" alt="Community Support" class="img-fluid mb-3">
                        <h3 class="feature-title">BMI Checker</h3>
                        <p class="feature-description">Calculate your Body Mass Index effortlessly and gain insights into your health and fitness journey!</p>
                    </div>
                </div>
                <div class="col-md-3 feature">
                    <div class="feature-card">
                        <img src="sss.jpg" alt="Health Monitoring" class="img-fluid mb-3">
                        <h3 class="feature-title">Sleep Tracker</h3>
                        <p class="feature-description">Monitor your sleep patterns to enhance rest and recovery, ensuring you wake up refreshed!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial text-center">
        <h2>What Our Users Say</h2>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <img src="aman.jpg" alt="User 1" />
                    <p>"Fit Track has transformed my fitness journey!"</p>
                    <span>- Aman Gupta</span>
                </div>
                <div class="col-md-4">
                    <img src="shiv.jpg" alt="User 2" />
                    <p>"The nutrition tracker helps me stay on top of my diet goals."</p>
                    <span>- Shivraj Jaiswal</span>
                </div>
                <div class="col-md-4">
                    <img src="Ram.jpg" alt="User 3" />
                    <p>"A complete health dashboard in one place!"</p>
                    <span>- Ramsingh</span>
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
                    <p>Your ultimate companion for a healthier lifestyle, offering personalized fitness and wellness insights.</p>
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
</body>
</html>

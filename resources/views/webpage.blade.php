<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gym Support System — Home</title>
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="css/home.css">
</head>
<body>

  <nav class="navbar">
    <a href="index.html" class="nav-logo">GYM RAT</a>
    <ul class="nav-links">
      <li><a href="index.html" class="active">Home</a></li>
      <li><a href="#">Service</a></li>
      <li><a href="#">Programs</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#">FAQ</a></li>
    </ul>
    <div class="nav-right">
      <a href="{{ route('login') }}" class="btn-login">Login ▶</a>
    </div>
  </nav>

  <section class="hero">
    <div class="hero-bg"></div>

    <div class="hero-left">
      <h1 class="hero-title">
        TRACK<br>
        <span>MONITOR</span><br>
        GROW
      </h1>
    </div>

    <div class="hero-right">
      <div class="hero-img-box">
        <div class="img-placeholder">
          <img src="images/gymimg1.jpg" alt="Gym photo">
        </div>
      </div>
      <div class="hero-img-box">
        <div class="img-placeholder">
          </svg>
          <img src="images/gymimg2.jpg" alt="Gym photo">

        </div>
      </div>
    </div>
  </section>

  <div class="hero-desc">
    <div class="hero-desc-inner">
      <p>
        <strong>Track every rep and monitor every improvement</strong> in your fitness journey.
        Grow into a stronger, healthier version of yourself — with real data behind every decision.
      </p>
    </div>
  </div>

  <hr class="divider">

  <div class="full-img-section">
    <div class="section-bg"></div>
    <div class="img-placeholder-full">
    </div>
  </div>

  <hr class="divider">

  <div class="features">
    <div class="feature">
      <div class="feat-icon">
        <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
      </div>
      <h3>Attendance Tracking</h3>
      <p>Monitor daily check-ins, attendance streaks, and gym visit history per member in real time.</p>
    </div>
    <div class="feature">
      <div class="feat-icon">
        <svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
      </div>
      <h3>Workout Progress</h3>
      <p>Log exercises, sets, and reps. Visualize strength and endurance improvements over time.</p>
    </div>
    <div class="feature">
      <div class="feat-icon">
        <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 000-7.78z"/></svg>
      </div>
      <h3>Body Metrics</h3>
      <p>Track weight, BMI, and body measurements. See your physical transformation charted clearly.</p>
    </div>
    <div class="feature">
      <div class="feat-icon">
        <svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
      </div>
      <h3>Membership & Payments</h3>
      <p>Manage plans, view renewal dates, and review payment history — all in one place.</p>
    </div>
  </div>


  <footer>
    <div class="footer-inner">
      <div>
        <div class="footer-logo">GYM</div>
        <div class="footer-socials">
          <a href="#" title="Twitter">𝕏</a>
          <a href="#" title="Instagram">IG</a>
          <a href="#" title="YouTube">YT</a>
          <a href="#" title="LinkedIn">in</a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Use Cases</h4>
        <ul>
          <li><a href="#">Attendance Tracking</a></li>
          <li><a href="#">Workout Logging</a></li>
          <li><a href="#">Body Metrics</a></li>
          <li><a href="#">Member Management</a></li>
          <li><a href="#">Payment Tracking</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Explore</h4>
        <ul>
          <li><a href="#">Features</a></li>
          <li><a href="#">Membership Plans</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Programs</a></li>
          <li><a href="#">Schedule</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Resources</h4>
        <ul>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Support</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms of Service</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Pages</h4>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="{{ route('discover') }}">Discover</a></li>
          <li><a href="dashboard/progress.html">Progress</a></li>
          <li><a href="dashboard/exercises.html">Exercises</a></li>
          <li><a href="dashboard/settings.html">Settings</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2025 Gym [Name]. All rights reserved.</p>
      <p>Built with Laravel & PHP</p>
    </div>
  </footer>

</body>
</html>


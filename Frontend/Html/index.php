<?php
include("./Admin/connection.php");

$query = "SELECT * FROM events ORDER BY date DESC";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alumni | CVRCE</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
    <style>
      @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
      }

      /* Apply fade-in animation to elements */
      .topbar, .top, .Info {
        animation: fadeIn 3s ease-in-out;
      }

      /* Add transition for smoother effect */
      .topbar, .top, .Info {
        transition: opacity 0.5s ease-in-out;
      }
      
      @keyframes moveUp {
        from { transform: translateY(0); }
        to { transform: translateY(-500px); }
      }

      .graduate-cap {
        position: absolute;
        bottom: 0;
        right: 0;
        transform: translateX(-50%);
        animation: moveUp 2s ease-in-out;
      }
      .events {
            background-color: aliceblue;
            padding: 20px;
            margin: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .events h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .event {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }
        .event h3 {
            margin-top: 0;
            font-size: 20px;
            color: #007BFF;
        }
        .event p {
            margin: 5px 0;
            color: #555;
        }
        .event p strong {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
      <div class="topbar">
        <h1 class="light-300" style="background-color: black">
          Alumni &nbsp; Association
        </h1>
        <img src="../images/cvrlogo.jpg" alt="cvrlogo" width="8%" height="20%" />

        <div class="navbar">
            <ul>
              <div class="dropdown">
                <p><span class="dropbtn">Home</span></p>
                <div class="dropdown-content">
                  <a href="index.php">Home</a>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">About</button>
                <div class="dropdown-content">
                  <a href="About.html">About us</a>
                  <a href="OurTeam.html">Our Team</a>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Alumni &nbsp;Interaction</button>
                <div class="dropdown-content">
                  <a href="AlumniInteraction.html"> Former Scholars</a>
                  <a href="MOu.html">MoU</a>
                  <a href="TechTalks.html">Tech sphere</a>
                  <a href="Expo.html">Expo</a>
                  <a href="CampusDrives.html">CampusDrives</a>
                </div>
              </div>

              <div class="dropdown">
                <button class="dropbtn">Gallery</button>
                <div class="dropdown-content">
                  <a href="Gallery.html">Gallery</a>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Alumni Club</button>
                <div class="dropdown-content">
                  <a href="AluminiClub.html">Alumni Club</a>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Gatherings</button>
                <div class="dropdown-content">
                  <a href="Overseas.html">Overseas</a>
                  <a href="Oncampus.html">On Campus</a>
                </div>
              </div>

              <div class="dropdown">
                <button class="dropbtn">Wall of Frames</button>
                <div class="dropdown-content">
                  <a href="Wallofframes.html">Wall Of Frames</a>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Alumni Awards</button>
                <div class="dropdown-content">
                  <a href="AlumniAwards.html">Alumni Awards</a>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Login</button>
                <div class="dropdown-content">
                  <a href="./Admin/admin_login.php">Login(Admin)</a>
                  <a href="./Admin/admin_registration.php">NewAdmin</a>
                  <a href="./Alumni/alumni_registration.php">NewStaff(Alumni)</a>
                  <a href="./Alumni/alumni_login.php">Login(Alumni)</a>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Contacts</button>
                <div class="dropdown-content">
                  <a href="Contacts.html">Contacts</a>
                </div>
              </div>
            </ul>
        </div>
      </div>

      <div class="top">
        <img src="../images/img9.jpg" alt="backgroundimg" width="100%" />
      </div>
      
      <div class="Info">
        <h3 id="title">Welcome to Our Alumni Association! <br></h3>
        <h3 style="text-align: center;">Dear Alumni, Friends, and Visitors,</h3>
        <h3 style="text-align: center;">Welcome to the official website of our Alumni Association! We are thrilled to have you here as part of our vibrant community</h3>
<h3 style="color: blue; text-align: center;">Scroll Down to see the events</h3>


      </div>

      <div class="events">
        <h2>Upcoming Events</h2>
        <?php
        // Assuming $result is already defined and contains the query result
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='event'>";
            echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            echo "<p><strong>Date:</strong> " . htmlspecialchars($row['date']) . "</p>";
            echo "</div>";
        }
        ?>
    </div>
    </div>
</body>
</html>

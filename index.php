<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System</title>
    <link rel="stylesheet" href="design.css">
    <link rel="website icon" type="jpg" href="logo.jpg">
</head>

<body>

    <!-- NAV BAR -->
    <?php include 'header.php' ?>

    <!--HOME SECTION DESIGN-->

    <section class="home" id="home">
        <h2>Gym Management System</h2>
        <h4>Level Up Your Fitness — In a Smart Way</h4>
        <a href="#membership" class="mem-btn">Explore Plans</a>
    </section>

    <!--MEMBERSHIP SECTION DESING-->

    <section class="membership" id="membership">
        <header class="mem-header">
            <h2>Membership Plans</h2>
            <p>Choose the plan that fits your lifestyle</p>
        </header>
        <div class="plans">
            <div class="basic-plan">
                <h3>Basic</h3>
                <p class="price">৳1500/month</p>
                <ul>
                    <li>Gym Equipment Access</li>
                    <li>Locker Room Access</li>
                    <li>1 Free Fitness Assessment</li>
                </ul>
                <a href="#mem_reg" class="btn">Register</a>

            </div>

            <div class="premium-plan">
                <h3>Premium</h3>
                <p class="price">৳2500/month</p>
                <ul>
                    <li>All Basic Perks</li>
                    <li>Unlimited Fitness Classes</li>
                    <li>Personal Training</li>
                </ul>
                <a href="#mem_reg" class="btn">Register</a>

            </div>

            <div class="elite-plan">
                <h3>Elite</h3>
                <p class="price">৳3500/month</p>
                <ul>
                    <li>All Premium Perks</li>
                    <li>24/7 Access</li>
                    <li>Nutrition Consultation</li>
                </ul>
                <a href="#mem_reg" class="btn">Register</a>

            </div>
        </div>
    </section>

    <!--SEVICE SECTION DESIGN-->

    <section class="service-slider" id="Service">
        <h2 class="service-heading">Our <span>Services</span></h2>

        <div class="slider-container">
            <div class="slide active">
                <div class="service-text">
                    <h3>Personal Training</h3>
                    <p>One-on-one customized workout sessions with certified trainers.</p>
                </div>
                <img src="perosnal.jpeg" alt="Personal Training">
            </div>

            <div class="slide">
                <div class="service-text">
                    <h3>Group Fitness Classes</h3>
                    <p>High-energy classes like Yoga, Zumba, HIIT, and Spin.</p>
                </div>
                <img src="group.jpeg" alt="Group Fitness Classes">
            </div>

            <div class="slide">
                <div class="service-text">
                    <h3>Strength Training</h3>
                    <p>Build muscle and increase power with guided weightlifting programs.</p>
                </div>
                <img src="strength.jpeg" alt="Strength Training">
            </div>

            <div class="slide">
                <div class="service-text">
                    <h3>Cardio Programs</h3>
                    <p>Fat-burning cardio workouts for endurance and weight loss.</p>
                </div>
                <img src="cardio.jpeg" alt="Cardio Programs">
            </div>

            <div class="slide">
                <div class="service-text">
                    <h3>Weight Lifting</h3>
                    <p>Build muscle and increase strength with expert-guided weight training programs.</p>
                </div>
                <img src="weight.jpeg" alt="Weight Lifting Programs">
            </div>

            <div class="slide">
                <div class="service-text">
                    <h3>Nutrition Consultation</h3>
                    <p> Personalized meal plans and dietary guidance to fuel your fitness journey.</p>
                </div>
                <img src="nutrition.jpeg" alt="Nutrition">
            </div>

            <div class="arrow left" id="prev">&#10094;</div>
            <div class="arrow right" id="next">&#10095;</div>
        </div>
    </section>

    <!--GALLARY SECTION-->

    <section class="gallery" id="Gallery">
        <h2 class="opening">Gym Gallery</h2>
        <h3 class="second"><span>WHERE PROGRESS HAPPENS</span></h3>


        <div class="services-content">
            <div class="row">
                <img src="cardioPlace.jpeg" alt="">
                <h4>Cardio Area</h4>
            </div>
            <div class="row">
                <img src="strenghtPlace.jpeg" alt="">
                <h4>Strenght Training Area</h4>
            </div>
            <div class="row">
                <img src="zumba.jpeg" alt="">
                <h4>Zumba Zone</h4>
            </div>
            <div class="row">
                <img src="yoga.jpeg" alt="">
                <h4>Yoga Zone</h4>
            </div>
            <div class="row">
                <img src="locker.jpeg" alt="">
                <h4>Locker Room</h4>
            </div>
            <div class="row">
                <img src="steam.jpeg" alt="">
                <h4>Steam Bath</h4>
            </div>
        </div>
    </section>

    <!--TRAINER SECTION-->

    <section class="trainer" id="trainer">
        <header>
            <h1>Meet Our Trainers</h1>
        </header>
        <section class="trainer-section">
            <div class="trainer-card">
                <img src="omar.jpg" alt="Trainer 1">
                <h2>Omar Faruk Rakib</h2>
                <p>Muscle Building Expert</p>
            </div>
            <div class="trainer-card">
                <img src="ib.jpeg" alt="Trainer 2">
                <h2>Ibtesham Tanjim</h2>
                <p>Fat Loss Expert</p>
            </div>
            <div class="trainer-card">
                <img src="th.jpeg" alt="Trainer 3">
                <h2>Tauhid Islam</h2>
                <p>Strength Coach</p>
            </div>
            <div class="trainer-card">
                <img src="jh.jpeg" alt="Trainer 4">
                <h2>Jahed Islam</h2>
                <p>Zumba Specialist</p>
            </div>
        </section>
    </section>

    <!--Member Registration Section-->
    <section class="form" id="mem_reg">
        <div class="mem_form">
            <h2><u>Member Registration!</u></h2>

            <!-- Show session messages -->
            <?php
            if (isset($_SESSION['register_error'])) {
                echo "<p align='center' style='color: darksalmon; font-weight: bold;'>" . $_SESSION['register_error'] . "</p>";
                unset($_SESSION['register_error']); // clear message after showing
            }
            if (isset($_SESSION['register_success'])) {
                echo "<p align='center' style='color: darksalmon; font-weight: bold;'>" . $_SESSION['register_success'] . "</p>";
                unset($_SESSION['register_success']);
            }

            ?>
            <br>
            <form action="member_control.php" method="post">
                <label>NAME: </label>
                <input type="text" name="Name" placeholder="Enter Your Full Name" required><br>
                <label>AGE: </label>
                <input type="number" name="Age" placeholder="Enter Your Age" required><br>
                <label>Contact: </label>
                <input type="number" name="Contact" placeholder="Enter Your Contact Number" required><br>
                <label>EMAIL: </label>
                <input type="email" name="Email" placeholder=" Enter Your Email" required><br>
                <label>ADDRESS</label>
                <input type="text" name="Address" placeholder="Enter your Adress" required><br>
                <label>GENDER: </label>
                <div class="gender">
                    <input type="radio" value="male" name="Gender"><label for="male">MALE</label>
                    <input type="radio" value="female" name="Gender"><label for="female">FEMALE</label>
                </div>
                <br>
                <label>PASSWORD: </label>
                <input type="password" name="Password" placeholder="Enter Password" required><br>
                <select name="Role" placeholder="Select Your Role" required>
                    <option value="">--Select Role--</option>
                    <option value="Member">Member</option>
                </select><br><br>
                <button type="submit" name="register">Register</button>
            </form>
            <br>
            <p align="center">Already have Account? <a href="member_login.php"><u><b> <big>login</big></b></u> </a>here!</p>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include 'footer.php' ?>

    <!-- SERVICES SLIDE-SHOW -->
    <script>
        const slides = document.querySelectorAll(".slide");
        const prev = document.getElementById("prev");
        const next = document.getElementById("next");
        let index = 0;

        function showSlide(n) {
            slides.forEach((slide, i) => {
                slide.classList.remove("active");
                if (i === n) slide.classList.add("active");
            });
        }

        function nextSlide() {
            index = (index + 1) % slides.length;
            showSlide(index);
        }

        function prevSlide() {
            index = (index - 1 + slides.length) % slides.length;
            showSlide(index);
        }

        next.addEventListener("click", nextSlide);
        prev.addEventListener("click", prevSlide);

        // Auto-slide every 5 seconds
        setInterval(nextSlide, 5000);
    </script>


</body>

</html>
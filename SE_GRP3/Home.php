<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMEPAGE</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
    />
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="CSS/home.css" />
</head>
<body>
    <div class="links">
        <nav>
            <div class="nav-img-con">
                <a href="#.html">
                    <img src="Media/Logo.jpg" alt="Logo" class="nav-logo">
                </a>
            </div>
            <div class="nav-link" id="navbar_list">
                <a href="#">HOME</a>
                <a href="#about">ABOUT</a>
                <a href="#contact">CONTACT</a>
            </div>
            <div class="login-btn-con">
                <a href="index.php" class="primarybtn">DASHBOARD</a>
            </div>
        </nav>
    </div>

    <div class="phrase-container">
        <div class="phrase">Welcome to Our system!</div>
        <div class="phrase2">Your comfort is our priority</div>
        <button class="secondarybtn" onclick="window.location.href = 'Index.php'">View Requirements</button>
    </div>
    
    <div id="about" class="content">
        <div class="about-section">
            <h1>About Us</h1>
            <p>Learn more about our mission and values.</p>
        </div>

        <div class="mission-section">
            <h2>Our Mission</h2>
            <p>Providing the best service to ensure a comfortable stay for all our 4th-yr students.</p>
        </div>

        <div class="testimonials-section">
            <h2>What Our Respondents Say</h2>
            <blockquote>
                Useful ito lalo na para sa aming mga malayo ang bahay dahil updated ang website na ito sa mga announcement at nanonotify kami sa mga requirements namin
                <cite>- 4th yr ComSci Student</cite>
            </blockquote>
            <blockquote>
                Very student friendly dahil hindi na namin need magpabalik-balik sa CCC para alamin ang mga dapat ipasa
                <cite>- 4th yr ComSci Student</cite>
            </blockquote>
        </div>

        <div class="booking-section">
            <a href="#booking" class="booking-button">Book Now</a>
        </div>

        <section class="team-section">
            <h2>Meet Our Team</h2>
            <div class="team-container">
                <div class="team-member">
                    <img src="Media/gels.jpg" alt="Team Member 1">
                    <h3>Leoubert Angelo Nagpala</h3>
                </div>
                <div class="team-member">
                    <img src="Media/twinnie.jpg" alt="Team Member 2">
                    <h3>Twinnie Hipolito</h3>
                </div>
                <div class="team-member">
                    <img src="Media/adrian.jpg" alt="Team Member 3">
                    <h3>Adrian Catindig</h3>
                </div>
                <div class="team-member">
                    <img src="Media/nico.jpg" alt="Team Member 4">
                    <h3>Nico Mantes</h3>
                </div>
            </div>
        </section>
    </div>

    <div id="contact" class="contact-container">
        <div class="contact-info">
            <h2>Contact Us</h2>
            <p>Halang, Calamba<br>
                Laguna, 4027<br>
                Philippines</p>
            <p><strong>Phone:</strong> +123 456 7890<br>
                <strong>Email:</strong> Nagpala1819@gmail.com<br>
                <strong>Instagram:</strong> @__Gelsss</p>
        </div>

        <div class="contact-form-map">
            <form class="contact-form">
                <label for="first-name">First Name *</label>
                <input type="text" id="first-name" name="first-name" required>

                <label for="last-name">Last Name *</label>
                <input type="text" id="last-name" name="last-name" required>

                <label for="company">Company</label>
                <input type="text" id="company" name="company">

                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone *</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="address">Address *</label>
                <input type="text" id="address" name="address" required>

                <label for="city">City *</label>
                <input type="text" id="city" name="city" required>

                <label for="zip-code">Zip Code *</label>
                <input type="text" id="zip-code" name="zip-code" required>

                <label for="message">Message</label>
                <textarea id="message" name="message"></textarea>

                <label>
                    <input type="checkbox" name="privacy-policy" required>
                    I agree and consent to the use of my submitted information in accordance with the <a href="#">Privacy Policy</a>.
                </label>

                <button type="submit">Send</button>
            </form>

            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15471.859637038973!2d121.16144603898258!3d14.196833082376346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd616206a6ae61%3A0xf39a3b145891ba56!2sHalang%2C%20Calamba%2C%204027%20Laguna!5e0!3m2!1sen!2sph!4v1718385163314!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
            </div>
        </div>
    </div>
</body>
</html>

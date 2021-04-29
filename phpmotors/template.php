<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>Watching Upwind &#124; Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
    content="Part of the Weather Site project by Matt Wilson in WDD 230: Web Frontend Development at Brigham Young University - Idaho. Depicts information about Fish Haven Idaho.">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/preston.css">
    <link rel="stylesheet" href="css/preston-med.css">
    <link rel="stylesheet" href="css/preston-large.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces&family=Source+Sans+Pro&family=Yeon+Sung&display=swap"
        rel="stylesheet">
        <script src="js/menu-toggle.js"></script>
        <script src="js/fishhaven-scripts.js" defer></script>
        <script src="js/fishhaven-weather.js" defer></script>
        <script src="js/fishhaven-events.js" defer></script>
</head>

<body>
<?php
include('header.php');
?>

    <nav>
        <ul id="menu_list" class="hide">
            <li><a id="menu_button" onclick="toggleMenu()"> &#9776; Menu</a></li>
            <li><a href="index.html">Home</a></li>
            <li><a href="preston.html">Preston</a></li>
            <li><a href="sodasprings.html">Soda Springs</a></li>
            <li><a href="fishhaven.html" class="active">Fish Haven</a></li>
            <li><a href="stormcenter.html">Storm Center</a></li>
            <li><a href="gallery.html">Gallery</a></li>
        </ul>
    </nav>
    <main>
        
    </main>
    <footer>
        <iframe id="location_map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21928.09523832537!2d-111.88318076774705!3d42.09768857973415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8754f78c7cda6c31%3A0xf1b3b4fc465a4a3f!2sPreston%2C%20ID%2083263!5e0!3m2!1sen!2sus!4v1610864908872!5m2!1sen!2sus"
            width="300" height="300" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div>
            <div id="contact_info">
                <p>Email: blah@WatchUpwind.com</p>
                <p>Phone: 555-XXX-XXXX</p>
                <p>Address: There was a 3rd row...</p>
            </div>
            <div id="media_links">
                <img src="images/iconFB.png" alt="Facebook Social Media Icon">
                <img src="images/iconTW.png" alt="Twitter Social Media Icon">
                <img src="images/iconYT.png" alt="Youtube Social Media Icon">
            </div>
        </div>
        <div>
            <p>Weather Information provided by <a href='http://openweathermap.org/'>OpenWeatherMap.org</a>.</p>
            <p>&copy; <span id='copy_year'></span> Watching Upwind &#124; Attributions &#124; Matt Wilson</p>
            <p id='current_date'></p>
        </div>
    </footer>

</body>

</html>
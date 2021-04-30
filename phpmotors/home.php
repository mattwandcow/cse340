<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>PHP Motors Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php
include('structure/header.php');
include('structure/nav.php');

?>

<main>
        <h1>Welcome to PHP Motors!</h1>
        <div id="car-box">
        <p>DMC Delorean</p>
        <p>3 Cup Holders</p>
        <p>Superman Doors</p>
        <p>Fuzzy Dice!</p>
        <button>Own Today</button>
        </div>
        <img src="images/delorean.jpg">
    <div id="upgrades-box">
        <div class="upgrade-container">
        <img class="uc-img" src="images/upgrades/flux-cap.png" alt="Flux Capacitor">
        <p clss="uc-txt">Flux Capacitor</p>
        </div>
        <div class="upgrade-container">
        <img class="uc-img" src="images/upgrades/flame.jpg" alt="Flame Decals">
        <p clss="uc-txt">Flame Decals</p>
        </div>
        <div class="upgrade-container">
        <img class="uc-img" src="images/upgrades/bumper_sticker.jpg" alt="Bumper Stickers">
        <p clss="uc-txt">Bumper Stickers</p>
        </div>
        <div class="upgrade-container">
        <img class="uc-img" src="images/upgrades/hub-cap.jpg" alt="Hub Caps">
        <p clss="uc-txt">Hub Caps</p>
        </div>
    </div>
    <div id="reviews-box">
    <h2>DMC Delorean Reviews</h2>
    <ul>
        <li>"So fast it's almost like travelling through time." (4/5) </li>
        <li>"Coolest ride on the road." (4/5) </li>
        <li>"I'm feeling like Marty McFly!." (5/5) </li>
        <li>"The most futuristic ride of our day." (4.5/5) </li>
        <li>"80's livin and I love it!" (5/5) </li>
    </ul>
    </div>
</main>

<?php
include('structure/footer.php');

?>
</body>

</html>
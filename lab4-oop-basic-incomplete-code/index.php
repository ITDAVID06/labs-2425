<?php

require "Profile.php";

$profile = new Profile(
    "David",
    "Don Henessy",
    "Serrano"
);

$profile->setEmail('david.donhenessy@auf.edu.ph');
$profile->setAddress('Barangay Dau, Mabalacat City, Philippines 2010');
$profile->setFavoriteQuote('Being a developer is becoming a life-long learner.');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile: <?php echo $profile->getCompleteName(); ?></title>
</head>
<body>
    <h1><?php echo $profile->getCompleteName(); ?></h1>
    <h2>Email: <?php echo $profile->getEmail();?></h2>
    <h2>Address: <?php echo $profile->getAddress();?></h2>
    <p>
        Favorite Quote: <?php echo $profile->getFavoriteQuote(); ?>
    </p>
</body>
</html>

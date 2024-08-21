<?php

require "helpers/helper-functions.php";

session_start();

// $contact_number = $_POST['contact_number'];
// $program = $_POST['program'];
$email = $_POST['email'];
$password = $_POST['password'];
$agree = $_POST['agree'];
$age = $age = (new DateTime())->diff(new DateTime($_SESSION['birthdate']))->y - ((new DateTime()) < new DateTime((new DateTime())->format('Y') . '-' . (new DateTime($_SESSION['birthdate']))->format('m-d')) ? 1 : 0);;

$_SESSION['email'] = $email;
$_SESSION['password'] = md5($password);
$_SESSION['agree'] = $agree;
$_SESSION['age'] = $age;
// $_SESSION['contact_number'] = $contact_number;
// $_SESSION['program'] = $program;




$form_data = $_SESSION;

dump_session();

session_destroy();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #2</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />   
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>
          Thank You Page
        </h1>
      </div>
      <div class="p-section--shallow">
      
        <table aria-label="Session Data">
            <thead>
                <tr>
                    <th></th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($form_data as $key => $val):
            ?>
                <tr>
                    <th><?php echo $key; ?></th>
                    <td>
                      <?php echo $val; ?>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
      

      </div>
    </div>
  </div>
</section>

</body>
</html>
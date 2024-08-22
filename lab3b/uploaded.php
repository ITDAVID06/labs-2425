<?php 
if (isset($_FILES['jpg_file'])) {
  $upload_directory = getcwd() . '/uploads/';
  $file_name = $_FILES['jpg_file']['name'];
  $uploaded_file = $upload_directory . basename($file_name);
  $temporary_file = $_FILES['jpg_file']['tmp_name'];

  if (!file_exists($upload_directory)) {
    mkdir($upload_directory);
  }

  if (move_uploaded_file($temporary_file, $uploaded_file)) {
    $relative_path = '/uploads/';
    $image_path = $relative_path . $file_name;
    ?>
    <html>
    <head>
        <title>Uploaded Image</title>
        <style>
          body {
            background-color: #f5e1da; 
            font-family: Arial, sans-serif;
            color: #333;
            text-align: center;
          }

          .image-card {
            margin-top: 20px;
            padding: 20px;
            background-color: #ffffff; 
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 60%;
            margin: 20px auto;
          }

          .image-card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          }
        </style>
    </head>
    <body>
      <div class="image-card">
        <h3>This is your uploaded image:</h3>
        <img src="<?php echo $image_path; ?>" alt="Uploaded Image"/>
      </div>
      <h4>This is the information of the image file:</h4>
      <?php
      echo '<pre>';
      var_dump($_FILES);
      echo '</pre>';
      ?>
    </body>
    </html>
    <?php
    exit;
  } else {
    echo 'Failed to upload image file';
  }
}
?>

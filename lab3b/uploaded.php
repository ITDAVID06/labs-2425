<?php 
if (isset($_FILES['video_file'])) {
  $upload_directory = getcwd() . '/uploads/';
  $file_name = $_FILES['video_file']['name'];
  $uploaded_file = $upload_directory . basename($file_name);
  $temporary_file = $_FILES['video_file']['tmp_name'];

  if (!file_exists($upload_directory)) {
    mkdir($upload_directory);
  }

  if (move_uploaded_file($temporary_file, $uploaded_file)) {
    $relative_path = '/uploads/';
    $video_path = $relative_path . $file_name;
    ?>
    <html>
    <head>
        <title>Uploaded Video</title>
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
        <h3>This is your uploaded video:</h3>
        <video width='320' height='240' controls><source src='<?php echo $video_path; ?>' type='video/mp4'>Your browser does not support the video tag.</video>
      </div>
      <h4>This is the information of the video file:</h4>
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
    echo 'Failed to upload video file';
  }
}
?>

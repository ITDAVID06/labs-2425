<?php 
if (isset($_FILES['file_upload']) && isset($_POST['file_type'])) {
    $file_type = $_POST['file_type'];
    $upload_directory = getcwd() . '/uploads/';
    $file_name = $_FILES['file_upload']['name'];
    $uploaded_file = $upload_directory . basename($file_name);
    $temporary_file = $_FILES['file_upload']['tmp_name'];

    // Server-side validation for file extension
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allowed_exts = [
        'image' => ['jpg', 'jpeg', 'png', 'gif'],
        'audio' => ['mp3', 'wav', 'ogg'],
        'video' => ['mp4', 'webm', 'ogg'],
        'pdf' => ['pdf']
    ];

    if (!in_array($file_ext, $allowed_exts[$file_type])) {
        echo 'The selected file type does not match the file extension.';
        exit;
    }

    if (!file_exists($upload_directory)) {
        mkdir($upload_directory);
    }

    if (move_uploaded_file($temporary_file, $uploaded_file)) {
        $relative_path = '/uploads/';
        $file_path = $relative_path . $file_name;
        ?>
        <html>
        <head>
            <title>Uploaded <?php echo ucfirst($file_type); ?></title>
            <style>
              body {
                background-color: #f5e1da; 
                font-family: Arial, sans-serif;
                color: #333;
                text-align: center;
              }

              .file-card {
                margin-top: 20px;
                padding: 20px;
                background-color: #ffffff; 
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 60%;
                margin: 20px auto;
              }
            </style>
        </head>
        <body>
          <div class="file-card">
            <h3>This is your uploaded <?php echo $file_type; ?>:</h3>
            <?php if ($file_type == 'image') { ?>
                <img src="<?php echo $file_path; ?>" alt="Uploaded Image" style="max-width:100%; height:auto; border-radius:8px; box-shadow:0 4px 8px rgba(0, 0, 0, 0.1);"/>
            <?php } elseif ($file_type == 'audio') { ?>
                <audio controls><source src='<?php echo $file_path; ?>' type='audio/mp3'>Your browser does not support the audio element.</audio>
            <?php } elseif ($file_type == 'video') { ?>
                <video width='320' height='240' controls><source src='<?php echo $file_path; ?>' type='video/mp4'>Your browser does not support the video tag.</video>
            <?php } elseif ($file_type == 'pdf') { ?>
                <embed src='<?php echo $file_path; ?>' type='application/pdf' width='600' height='400'>
            <?php } ?>
          </div>
          <h4>This is the information of the <?php echo $file_type; ?> file:</h4>
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
        echo 'Failed to upload ' . $file_type . ' file';
    }
}
?>

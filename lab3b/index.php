<html>
<head>
    <meta charset="utf-8">
    <title>File Upload</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />   
    <style>
      body {
        background-color: #f5e1da; 
        font-family: Arial, sans-serif;
        color: #333;
      }

      .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff; 
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
      }

      .header .center-text {
        text-align: center;
        flex-grow: 1;
        font-size: 35px;
        font-weight: bold;
        color: #000; 
      }

      .p-logo-section__logo {
        max-width: 100px;
        height: auto;
      }

      h4 {
        text-align: center;
        color: #5a5a5a;
      }

      .p-card {
        background-color: #ffffff; 
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .p-card h3 {
        margin-bottom: 15px;
        color: #444;
      }

      .p-card__content {
        margin-bottom: 20px;
      }

      button {
        width: 100%;
        height: 50px;
        margin-bottom: 0; 
        background-color: #ff6b6b; 
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
      }

      button:hover {
        background-color: #ff4f4f;
      }

      button:disabled {
        background-color: #ccc;
        cursor: not-allowed;
      }

      span {
        font-size: 16px;
        padding-top: 5px;
      }

      select {
        width: 100%;
        height: 40px;
        margin-bottom: 20px;
        font-size: 16px;
      }
      
      #file_error {
        color: red;
        font-weight: bold;
        display: none;
      }
    </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <img class="p-logo-section__logo" src="https://auf.edu.ph/images/auf-logo.png" alt="Angeles University Foundation Logo" width="70px" height="100px">
      <div class="center-text">Angeles University Foundation </br><span> Bachelor of Science in Information Technology </span> </div>
      <img class="p-logo-section__logo" src="https://www.auf.edu.ph/home/images/mascot/CCS.png" alt="College of Computing Studies Logo">
    </div>

    <h4><b>File Upload</b></h4>

    <form method="POST" action="uploaded.php" enctype="multipart/form-data">
      <div class="p-card">
        <h3>Select File Type:</h3>
        <select name="file_type" id="file_type" required>
          <option value="">Select File Type</option>
          <option value="image">Image</option>
          <option value="audio">Audio</option>
          <option value="video">Video</option>
          <option value="pdf">PDF</option>
        </select>

        <h3>Upload File:</h3>
        <p class="p-card__content">
          <input type="file" name="file_upload" id="file_upload" required />
        </p>
        <p id="file_error">Selected file type does not match the file extension!</p>
      </div>
      <button type="submit" id="upload_btn">Upload</button>
    </form>
  </div>

  
  <script>
    document.getElementById('file_upload').addEventListener('change', function() {
        const fileInput = this;
        const fileType = document.getElementById('file_type').value;
        const filePath = fileInput.value;
        const fileExt = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();
        const allowedExts = {
            'image': ['jpg', 'jpeg', 'png', 'gif'],
            'audio': ['mp3', 'wav', 'ogg'],
            'video': ['mp4', 'webm', 'ogg'],
            'pdf': ['pdf']
        };
        
        if (fileType && allowedExts[fileType].indexOf(fileExt) === -1) {
            document.getElementById('file_error').style.display = 'block';
            document.getElementById('upload_btn').disabled = true;
        } else {
            document.getElementById('file_error').style.display = 'none';
            document.getElementById('upload_btn').disabled = false;
        }
    });
  </script>
</body>
</html>

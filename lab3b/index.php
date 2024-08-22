<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #2</title>
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
        background-color: #ff4f4f; /* Darker red/pink on hover */
      }

      span{
        font-size: 16px;
        padding-top: 5px;
      }
    </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <img class="p-logo-section__logo auf" src="https://auf.edu.ph/images/auf-logo.png" alt="Angeles University Foundation Logo" width="70px" height="100px">
      <div class="center-text">Angeles University Foundation </br><span> Bachelor of Science in Information Technology </span> </div>
      <img class="p-logo-section__logo" src="https://www.auf.edu.ph/home/images/mascot/CCS.png" alt="College of Computing Studies Logo">
    </div>

    <h4><b>Image-File-Upload</b></h4>

    <form method="POST" action="uploaded.php" enctype="multipart/form-data">
      <div class="p-card">
        <h3>Upload Image File:</h3>
        <p class="p-card__content">
          <input type="file" name="jpg_file" accept="image/*" />
        </p>
      </div>
        <button type="submit">Upload</button>
    </form>
  </div>
</body>
</html>

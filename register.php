<?php
    include('include/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel='stylesheet' href='vendor/bootstrap-3.3.7/dist/css/bootstrap.min.css'>
    <style>
    label {
      display: block;
    }

    li {
      list-style-type: none;
    }
    </style>
    <title>Register</title>
</head>
<body>
<script src="https://www.google.com/recaptcha/api.js"></script>
<center>
<form action="cek_register.php" method="POST" enctype="multipart/form-data" style="width: 30%; margin-top: 10px;">
    <ul>
      <li class="group-form">
          <!-- harusnya sih ada for tiap label for='username' -->
        <label for="nama_depan">First Name : </label>
        <input type="text" name="nama_depan" id="nama_depan" class="form-control" required placeholder="Insert Your First Name">
      </li>
      <li>
        <label for="nama_belakang">Last Name : </label>
        <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" required placeholder="Insert Your Last Name">
      </li>
      <li class="group-form">
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" class="form-control" required placeholder="Insert Your Email/Username">
      </li>
      <li class="group-form">
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" class="form-control" required placeholder="Insert Your Password">
      </li>
      <li class="group-form">
        <label for="tgllahir">Tanggal Lahir : </label>
        <input type="date" name="tgllahir" id="tgllahir" class="form-control" required>
      </li>
      <li>
        <label class="form-check-label" for="gender">Gender : </label>
        <select name="gender" id="gender" required>
          <option value="">--Gender--</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Others">Others</option>
        </select>
      </li>
      <li>
        <label for="profilepicture">Profile Picture</label>
        <input type="file" name="profilepicture" id="profilepicture">
      </li>
      <br>
      <div class="g-recaptcha" data-sitekey="6LccLF0cAAAAAMuywsnn8KevtMgTEyvONoHpKk6L"></div><br>
      <button type="submit" name="register" class="btn btn-success">Sign Up</button>
      <a href="login.php">
        <button type="button" name="back" class="btn btn-info" style="color:black;">Back</button>
      </a>
    </ul>
  </form>
  </center>
</body>
</html>
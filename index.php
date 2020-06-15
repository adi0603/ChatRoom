<?php
include("includes/db.php");
session_start();
if(isset($_POST['generate'])){
    $name = $_POST['name'];
    $code = rand(1000,9999);
    
    $data = [
        'name' => $name,
        'code' => $code
    ];
    $ref = "room_code/";
    $pushData = $database->getReference($ref)->push($data);
    $_SESSION['code']=$code;
    $_SESSION['name']=$name;
    header("Location:chat.php");
}
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $code=$_POST['code'];
  $ref = "room_code";
  $data = $database->getReference($ref)->getValue();
  foreach($data as $key => $data1){
    if($data1['code']==$code)
    {
      $_SESSION['code']=$code;
      $_SESSION['name']=$name;
      header("Location:chat.php");
    }
  }
  ?>
    <script type="text/javascript">
      alert("You entered a wrong room code");
    </script>
  <?php
}
?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="image/logo.jpg"/>
    <title>Guest Login</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <script src="https://kit.fontawesome.com/ab99e84824.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <header class="page-header">
        <nav>
          <h2 class="logo">ChatBox</h2>
          <ul>
            <li>
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="about.html">About</a>
            </li>
          </ul>
          <button class="cta-contact" onClick="location.href='https://aditya-pandey.herokuapp.com/'">Portfolio</button>
        </nav>
      </header>
      
      <main class="page-main">
        <div class="container">
          <table>
            <caption>Enter Or Generate Code</caption>
            <tbody>
            	<form  method="POST" enctype="multipart/form-data">
              <tr>
              	<td>Enter Code:</td>
              	<td data-label="Enter Name">
                  <div class="textbox">
                  	<input type='text' name="name" placeholder="Enter name" class='nice' required>
                  </div>
              	</td>
                <td data-label="Enter Code">
                  <div class="textbox">
                    <input type='number' name="code" placeholder="Enter Code" class='nice' min="1000" required>
                  </div>
                </td>
                <td data-label="Submit Code">
                	<div class="month">
                  		<input type="submit" name="submit" value="Submit">
                  	</div>
                </td>
              </tr>
          </form>
          <form  method="POST" enctype="multipart/form-data">
              <tr>
              	<td>Generate Code:</td>
              	<td data-label="Enter Name">
                  <div class="textbox">
                  	<input type='text' name="name" placeholder="Enter name" class='nice' required>
                  </div>
              	</td>
                <td data-label="Generate Code" colspan="2">
                	<div class="month">
                  		<input type="submit" name="generate" value="Generate Code">
                  	</div>
                </td>
              </tr>
          </form>
            </tbody>
          </table>
        </div>
      </main>
      <footer class="page-footer">
        <small>&copy; Copyright 2020. All rights reserved.</small>
        <ul>
          <li>
            <a href="https://www.instagram.com/_simplethoughts._/?igshid=k93qpcqslcgk" target="_blank"><i class="fab fa-instagram"></i></a>
          </li>
          <li>
            <a href="https://www.linkedin.com/in/aditya-pandey-1375a818a/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
          </li>
          <li>
            <a href="https://github.com/adi0603" target="_blank"><i class="fab fa-github"></i></i></a>
          </li>
          <li>
            <a href="https://www.hackerrank.com/adi_pandey" target="_blank"><i class="fab fa-hackerrank"></i></a>
          </li>
        </ul>
      </footer>
    </div>
  </body>
</html>

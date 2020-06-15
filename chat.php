<?php
  session_start();
  $code=$_SESSION['code'];
  $name=$_SESSION['name'];
  include("includes/db.php");
if(isset($_POST['submit'])){
    $message = $_POST['message'];
    
    $data = [
        'code' => $code,
        'name' => $name,
        'message' => $message
    ];
    $ref = "chat_message/";
    $pushData = $database->getReference($ref)->push($data);
    $message="";
}
?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="image/logo.jpg"/>
    <title>Chat | ChatBox</title>
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
              <a href="connectcode.php">Home</a>
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
            <caption>ChatBox Window</caption>
            <tbody>
            	<th colspan="2">Hi <?php echo $name; ?> Your Chat Room Code is <?php echo $code; ?>&nbsp;<a href="chat.php" title="Refresh"><i class="fas fa-sync-alt"></i> </a></th>
              <?php
                include("includes/db.php");
                $ref = "chat_message";
                $data = $database->getReference($ref)->getValue();
                foreach($data as $key => $data1){
                    if ($data1['code']==$code) {
                      ?>
                      <tr>
                        <?php
                        if ($data1['name']==$name) {
                          ?>
                            <td></td>
                            <td><?php echo $data1['message']; ?></td>
                          <?php
                        }
                        else
                        {
                          ?>
                            <td><?php echo $data1['message']; ?></td>
                            <td></td>
                          <?php
                        }
                        ?>
                      </tr>
                      <?php
                    }
                  ?>
                  <?php
                } 
              ?>
              <form  method="POST" enctype="multipart/form-data">
              <tr>
                <td>
                  <div class="textbox">
                    <input type='text' name="message" placeholder="Write Your Message" class='nice'>
                  </div>
                </td>
                <td>
                  <div class="month">
                    <input type="submit" name="submit" value="Submit">
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
<?php session_start(); 
if(!isset($_SESSION['user_id']))
{
  session_destroy();
  header("location:../Logout.php");    
}?>
<!DOCTYPE html>
<html>
<head>
	<title>User Task Sender</title>
  <style type="text/css">
    body {
      background-image: url('../images/download3.jpg');
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
       background-size: cover;
    }

    .headers{
      position: fixed;
    }

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;

    }

    td {

      text-align: left;
      padding: 8px;
      background-color: #d6cece;
    }

    tr:nth-child(even) {
      background-color: red;
    }
    table tr td:first-child{ border-top-left-radius: 25px;
      border-bottom-left-radius: 5px;}
      table tr td:last-child{ border-top-right-radius: 5px;
        border-bottom-right-radius: 25px;}

        .button {
          border-radius: 8px;
          border: bold 17px Arial;
          text-decoration: none;
          background-color: #EEEEEE;
          color: #333333;
          padding: 2px 6px 2px 6px;
          border-top: 1px solid #CCCCCC;
          border-right: 2px solid #333333;
          border-bottom: 2px solid #333333;
          border-left: 1px solid #CCCCCC;
        }
        .button1 {
          border-radius: 8px;
          border: bold 17px Arial;
          text-decoration: none;
          background-color:#aae87c;
          color: #333333;
          padding: 2px 6px 2px 6px;
          border-top: 1px solid #CCCCCC;
          border-right: 2px solid #333333;
          border-bottom: 2px solid #333333;
          border-left: 1px solid #CCCCCC;
        }
        .button2 {
          border-radius: 8px;
          border: bold 17px Arial;
          text-decoration: none;
          background-color:#da6856;
          color: #333333;
          padding: 2px 6px 2px 6px;
          border-top: 1px solid #CCCCCC;
          border-right: 2px solid #333333;
          border-bottom: 2px solid #333333;
          border-left: 1px solid #CCCCCC;
        }

        div.field {

          width: 540px;
          height: 418px;
          overflow: auto;
        }
      </style>
    </head>
    <body >
     <?php
     include("html/Header.php"); 
     include("html/UserSidebar.html");    

    $myId=$_SESSION['user_id'];  

    //$sql = "SELECT * FROM task INNER JOIN user ON  task_receiver=user_id WHERE task_sender = '".$myId."'";
    $result = $func->select_with_join_condition('*','task','user','INNER JOIN','task_receiver=user_id',"task_sender = '".$myId."'");
  ?>
  <br><br>
  <center><div class="field" id="alltasks">
  <h2 style="color: black;">All Task Sent By Me</h2> 
  

      <?php

      if($result->num_rows > 0) 
      {

        while($row = $result->fetch_assoc()) 
        {   
          ?>
            <table>
      <col width="60">
      <col width="150">
      <col width="150">
      <col width="150">                
          <tr> 
            <td align="center"><img src="<?php echo $row["user_image"];?>" alt="No Profile" width="42" height="42" style=" border-radius: 50%;"></td>
            <td align="center"><?php echo $row["user_fname"]." ".$row["user_lname"]; ?></td>    
            <td align="center"><?php echo $row["task_name"]; ?></td> 
            <td><a href="UserTaskDetails.php?task_id=<?php echo $row["task_id"]; ?>" class="button">SEE DETAILS</a></td>
          </tr><br>          
          <?php       
        } 
      }
      else
      {
        echo "<h2>no task so far</h2>";
      }
      ?>
    </table><br>
  </div></center>

  </body>
  </html>
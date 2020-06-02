<?php 
// error_reporting(-1);
// ini_set('display_errors', 'On');
session_start(); 
if(!isset($_SESSION['admin_id'])) // check admin or not
{
  session_destroy();
  header("location:../Logout.php");    
}?>
<!DOCTYPE html>
<html>
<head>
  <title>Salary Details</title>
  
  <style type="text/css">
    body {
      background-image: url('../images/adminhome.jpg');
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

          width: 730px;
          height: 418px;
          overflow: auto;
        }

        .header {
          overflow: hidden;
          background-color: #f1f1f1;
          padding: 20px 10px;
        }

        .header a {
          float: left;
          color: black;
          text-align: center;
          padding: 12px;
          text-decoration: none;
          font-size: 18px; 
          line-height: 25px;
          border-radius: 4px;
        }

        .header a.logo {
          font-size: 25px;
          font-weight: bold;
        }

        .header a:hover {
          background-color: #ddd;
          color: black;
        }

        .header a.active {
          background-color: dodgerblue;
          color: white;
        }

        .header-right {
          float: right;
        }

        @media screen and (max-width: 500px) {
          .header a {
            float: none;
            display: block;
            text-align: left;
          }

          .header-right {
            float: none;
          }
        }
      </style>
    </head>
    <body >
    <?php
  include("html/AdminHeader.php");
  //require '../Classes/init.php';
  // $func = new Operation();
  ?> 
  <?php
  include("html/Sidebar.html"); // include sidebar file
 ?>
 <?php
  $result1 = $func->select('admin',array(admin_fname,salary));

  while($row = $result->fetch_assoc())
	{       
		$adminFname=$row["admin_fname"];
		$salary=$row["salary"];
	}
  $result2 = $func->select('user',array(user_fname,salary));

  while($row = $result->fetch_assoc())
	{       
		$userFname=$row["user_fname"];
		$salary1=$row["salary"];
	}
	?>
	<div> 
		<div class="updateprofile-layer">
			<h1>Salary Detail for Manager</h1> 

				<div class="header-left-bottom">
					<div class="icon1">
                      <span class="fa fa-user"></span>
                        Manager :<?php echo $adminFname; ?>                           
                    </div>  	

					<div class="icon1">
                    <span class="fa fa-user"></span>
                     salary:<?php echo $salary/12; ?>
                    </div>  	
						

					<div class="bottom">
                        <button class="btn" type="button" name="back"><a href="ctohome.php" style="color: white;">Home</a></button>
                    </div><br>	

					
				</div>
			</div>	
		</div>
		<div class="updateprofile-layer">
			<h1>Salary Detail for Users(Team)</h1> 

				<div class="header-left-bottom">
					<div class="icon1">
                      <span class="fa fa-user"></span>
                        User:<?php echo $userFname; ?>                           
                    </div>  	

					<div class="icon1">
                    <span class="fa fa-user"></span>
                     salary:<?php echo $salary1/12; ?>
                    </div>  	
						

					<div class="bottom">
                        <button class="btn" type="button" name="back"><a href="ctohome.php" style="color: white;">Home</a></button>
                    </div><br>	

					
				</div>
			</div>	
		</div>
	</div>	
	
</body>
</html>
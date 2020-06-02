  <?php
  session_start();  
    if(!isset($_SESSION['cto_id']))
    {       
      header("location:../Logout.php");    
    }
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Manager Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>

  <!-- Custom Theme files -->
  <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
  <!-- //Custom Theme files -->
  <!-- web font -->
  <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
  <!-- //web font -->

</head>
<body>
  <?php 
  
  include("html/AdminHeader.php");

 
  $admin_id=$_REQUEST['admin_id'];
  $result=$func->select_with_condition(array('*'),'admin',"admin_id = '".$admin_id."'");
  while($row = $result->fetch_assoc())
  {
    $fname=$row["admin_fname"];
    $lname=$row["admin_lname"];
    $email=$row["admin_email"];
    $password=$row["admin_password"];         
    $gender=$row["admin_gender"];
    $image=$row["admin_image"];
  }

  ?>       
  <!-- main -->
  <div class="w5layouts-main">    
   <div class="updateprofile-layer">
    <h1 style="color: white;">Manager Details</h1>
    <div class="header-main1">
     <div class="main-icon">
      <img src="<?php echo "$image";?>" class="rounded_img" >
    </div>
    <div class="header-left-bottom">

      <form action="#" method="post">	

        <div class="icon1">
          <span class="fa fa-id-card-o"></span>Email :    
           <input type="email" placeholder="email" name="email" value="<?php echo $email; ?> "required=""/>                          
        </div>

        <div class="icon1">
          <span class="fa fa-user"></span>First Name :
          <input type="text" placeholder="First Name" name="fname" value="<?php echo $fname; ?> "required=""/>
        </div>	

        <div class="icon1">
          <span class="fa fa-user"></span>Last Name :
          <input type="text" placeholder="Last Name" name="lname" value="<?php echo $lname; ?> "required=""/>
        </div>	
        
        <div class="bottom">
          <button class="btn" type="submit" name="updateName" >Update</button>
        </div><br>
        
      </form>	

      <form action="#" method="post">	

      <div class="icon1">
        <span class="fa fa-lock"></span>Password :
        <input type="text" placeholder="Enter New Password" name="password" value="<?php echo $password; ?> "  required>
      </div>
      
      <div class="bottom"> 
        <button class="btn" type="submit" name="updatePassword">Update Password</button>
      </div><br>    
    </form>	

     <div class="bottom">
        <button class="btn" type="button" name="back"><a href="allusers.php" style="color: white">BACK</a></button>
      </div><br>
  </div>	
</div>
</div>
</div>	
<!-- //main -->
<?php
if(isset($_POST['updateName']))
{

 $sql="UPDATE admin set admin_fname='" . $_POST['fname'] . "', admin_lname='" . $_POST['lname'] . "', admin_email='" . $_POST['email'] . "' WHERE admin_id='" . $admin_id . "'"; 
 
 if ($conn->query($sql) === TRUE) 
 {
  ?>
  <form id="myForm" action="manageruserdetails.php" method="post">
    <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $admin_id; ?>">
  </form>   
  <?php 
}
else
{
 echo "Cannot update";
}

}

if(isset($_POST['updatePassword']))
{
  
  $sql="UPDATE admin  set admin_password ='" . $_POST['password'] . "'  WHERE admin_id ='" . $admin_id . "'"; 

  if ($conn->query($sql) === TRUE) 
  {
    ?>
  <form id="myForm" action="manageruserdetails.php" method="post">
    <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $admin_id; ?>">
  </form>       
    <?php        
  }
  else
  {
   echo "Cannot update";
 }      
}

?>
<script type="text/javascript">
  document.getElementById('myForm').submit();
</script>
</body>
</html>
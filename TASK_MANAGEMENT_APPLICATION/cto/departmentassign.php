<?php session_start(); 
if(!isset($_SESSION['cto_id'])) //check admin
{
  session_destroy();
  header("location:../Logout.php");    
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Department Assign</title>

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
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

	<script> 
		//tinymce include for task details
		tinymce.init({
			selector: '#mytextarea'
		});
	</script>

</head>
<body>
	<?php 
	
	include("html/AdminHeader.php"); // include header

	$adminId=$_REQUEST['admin_id']; // getting user_id
  	$myId=$_SESSION['cto_id'];  // getting admin_id

	
    $result = $func->select_with_condition(array('*'),'admin',"admin_id = '".$adminId."'");//query will fetch user details by user_id
	while($row = $result->fetch_assoc())
	{       
		$image=$row["admin_image"];
		$adminFname=$row["admin_fname"];
		$adminLname=$row["admin_lname"];
	}


	$result1 = $func->select_with_condition(array('*'),'cto',"cto_id = '".$myId."'"); // query will fetch admin details by admin_id
	while($row = $result1->fetch_assoc())
	{       
		$myName=$row["cto_fname"];
		$myProfile=$row["cto_image"];
	}

	?>
	<div class="w5layouts-main"> 
		<div class="updateprofile-layer">
			<h1>Assign Department to <?php  echo $adminFname." ".$adminLname ;?></h1> 
			<div class="header-main1">
				<div class="main-icon">
					<img src="<?php echo "$image";?>" class="rounded_img" >
				</div>
				<div class="header-left-bottom">
					<form action="#" method="post">	
						<div class="icon1"> 
							<span class="fa fa-user"></span>
							Department Tittle :<input type="text" placeholder="Enter Tittle" name="department_title" required=""/>
						</div>	

						<div class="icon1">
							<span class="fa fa-user"></span>
							Department Details :<textarea id="mytextarea" name ="department_details" ></textarea>
						</div>	

						<div class="icon1">
							<span class="fa fa-user"></span>
							Department DeadLine :<input type="datetime-local" placeholder="Dead Line" name="deadline" required=""/>
						</div>	

						<div class="icon1">
							<span class="fa fa-user"></span>
							Department : <select name="department" > 
								<?php 
								 //will give all projects in select 
								$result = $func->selectAll('department');    //box(drop down)
								while($row = $result->fetch_assoc())
								{       
									echo "<option value=".$row['department_id'].">".$row['department_name']."</option>";
								}
								?>

							</select>
						</div>	

						 <div class="bottom">
                            <input  type="submit" class="btn" name="assign" value="Assign" />
                         </div>

					</form>			

					<form action="#" method="post">	

						<div class="bottom">
							<button class="btn" type="submit" name="home" >HOME</button>
						</div>
					</form>
				</div>
			</div>	
		</div>
	</div>	
	<!-- //main -->
	<?php

	if(isset($_POST['assign'])) // onset assign button 
	{
		$departmenttitle=$_POST['department_title'];  // getting following details from the form
		$departmentDetail=$_POST['department_details'];
		$departmentDeadLine=$_POST['deadline'] ; 
		$department=$_POST['department'];
		
		// $sql = "INSERT INTO task (task_name,task_details,task_project,dead_line,task_receiver,task_sender,task_sender_name,task_sender_image)
		// VALUES ('$taskName', '$taskDetail','$taskProject','$taskDeadLine','$userId','$myId','$myName','$myProfile')";
       
        $result = $func->insert('department',array('department_title','department_details','department_name','dead_line','department_receiver','department_sender','department_sender_name','department_sender_image'),array("'$departmenttitle'", "'$departmentDetail'","'$department'","'$departmentDeadLine'","'$adminId'","'$myId'","'$myName'","'$myProfile'"));

        
		  // insert above fetched details into task 
		if ($result === TRUE) 
		{
			echo '<meta http-equiv=Refresh content="0;url=allusers.php?reload=1">';       
		}
		else
		{
			echo "Cannot update";
		}
	}
	?>
</body>
</html>
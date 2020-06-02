<?php
session_start(); 
   if(!isset($_SESSION['cto_id']))  // check admin or not
   {
    header("location:../Logout.php");    
}?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Department</title>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>  
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
    <style type="text/css">
    .switch {
       position: relative;
       display: inline-block;
       width: 60px;
       height: 34px;
   }

   .switch input {
       opacity: 0;
       width: 0;
       height: 0;
   }

   .slider {
       position: absolute;
       cursor: pointer;
       top: 0;
       left: 0;
       right: 0;
       bottom: 0;
       background-color: #ccc;
       -webkit-transition: .4s;
       transition: .4s;
   }

   .slider:before {
       position: absolute;
       content: "";
       height: 26px;
       width: 26px;
       left: 4px;
       bottom: 4px;
       background-color: white;
       -webkit-transition: .4s;
       transition: .4s;
   }

   input:checked + .slider {
       background-color: #2196F3;
   }

   input:focus + .slider {
       box-shadow: 0 0 1px #2196F3;
   }

   input:checked + .slider:before {
       -webkit-transform: translateX(26px);
       -ms-transform: translateX(26px);
       transform: translateX(26px);
   }

   /* Rounded sliders */
   .slider.round {
       border-radius: 34px;
   }

   .slider.round:before {
       border-radius: 50%;
   }

    #popup {
 width: 350px;
    height: 46px;
    border-radius: 25px;
    background: #ffb;
    padding: 10px;
    border: 2px solid #999;
    position: absolute;
    top: 151px;
    left: 582px;
}
h1{
 text-shadow: 2px 2px#133443;
}

</style>


</head>
<body>
    <?php
    include("html/AdminHeader.php");  //admin header include
    ?>
    <!-- add project form -->
    <div class="w5layouts-main"> 
        <div class="updateprofile-layer">
            <h1 style="color: white;">Add New Department</h1>
            <div class="header-main1">
               <div class="header-left-bottom">
                      <form  method="POST">
                        <div class="icon1">
                            <span class="fa fa-home"></span>
                            <label for="exampleInputEmail1">Department Name:</label>
                            <input type="text"  name="departmentname" placeholder="Department Name" required>
                        </div>  

                        
                        <label class="switch">
                            <input type="checkbox" name="departmentstatus" value="1">
                            <span class="slider round"></span><br>
                        </label>                   
                     
                      <div class="bottom">
                          <input  type="submit" class="btn" name="submit" id="submit" value="ADD DEPARTMENT" />
                        </div>                      

                   </form>   
                       <div class="bottom">
                        <button class="btn" type="button" name="back"><a href="ctohome.php" style="color: white;">Home</a></button>
                       </div><br>                  
               </div>
           </div>  
       </div>
   </div>  
    <!-- //add project form -->
   <?php
if(isset($_POST['submit'])) //on submit 
{  
   $function = new Operation();
   $departmentName = $_POST['departmentname']; // get above form details in variable
   $departmentStatus = $_POST['departmentstatus'];

   echo "$departmentName";

    if ($_POST['departmentname']==null) // empty field submission check
    {
     echo '<span style="color:red"> First Enter Something<br></span>';
    } 
    
    else
    {
        $result = $func->insert('department',array('department_name','department_status'),array("'$departmentName'","'$departmentStatus'"));

        if ($result === TRUE)  //insert form details in project table
        {
          ?>
                
          <div id="popup">DEPARTMENT SUCCESSFULLY ADDED</div>
          <script>history.pushState({}, "", "")</script>
          <script type="text/javascript">
            $(function() {
             $('#popup').delay(3000).fadeOut();
           });
         </script>
         <?php
       }
       else
       {
         echo "not added";
       }
    }
  
}

?>
</body>
</html>
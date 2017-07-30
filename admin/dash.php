<?php 
//test
 session_start();
 global $now,$expire,$user_id,$fullname;
 if (isset($_SESSION['identification'])){

	/* global  $fullname;*/
       $fname= $_SESSION['fname'];
       $lname= $_SESSION['lname'];
       $fullname =$fname . " " .$lname;
    
       /*$fname= $_SESSION['fname'];*/
      $rev_id= $_SESSION['id'];
       $user_id=$_SESSION['identification'];
     
	   $now = time(); 
	   $expire= $_SESSION['expire'];}
	   
	   ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Application Form</title>
    
   <?php 
    
include ('../includes/head.php');
    
    ?>
    
    <style>
    input[type="text"] {
    height: 35px; 
    }
   /* input[type="submit"] {
    width: 200px;
        
    }
    */
    </style>
</head>
<body>
<?php
    include ('../includes/nav_main.php');
    include ('includes/nav_sub.php');
    
    ?>
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	 
	      <div class="row">
              
	      	<div class="span12">
	      		
	      		<div class="widget">
						
					<!--<div class="widget-header">
						<i class="icon-th-large"></i>
						<h3 style="text-align:right">3rd Line ART Application Form</h3>
                        
					</div>  /widget-header -->
					
					<div class="widget-content">
						
						<div class="pricing-plans plans-3">
                      <?php

include ('includes/delete_user.php');                             
include ('includes/insert_reviewer.php'); 
include ('includes/insert_clinician.php'); 
include ('includes/insert_lab_user.php'); 
include ('includes/insert_sec.php'); 
include ('includes/insert_drug.php'); 
include ('includes/insert_facility.php'); 
include ('includes/insert_affliates.php'); 


 echo ' <div class="span11" style="border-bottom:3px solid #535469; margin:3px 0;">
       <h3>Manage Menu</h3>   
                  <a href="dash.php?man_facility" class="button btn btn-invert btn-large" style="margin:2px">Facility </a>
                  <a href="dash.php?man_drugs" class="button btn btn-invert btn-large" style="margin:2px">Drugs </a>
                  <a href="dash.php?man_affliates" class="button btn btn-invert btn-large" style="margin:2px">Affliates </a>
                  <a href="dash.php?rev" class="button btn btn-invert btn-large" style="margin:2px">Reviewers </a>
                  <a href="dash.php?clin" class="button btn btn-invert btn-large" style="margin:2px">Clinician </a>           
                  <a href="dash.php?lab" class="button btn btn-invert btn-large" style="margin:2px">Lab user </a>
                  <a href="dash.php?sec" class="button btn btn-invert btn-large" style="margin:2px">Secretary </a>

                 
                  <a href="../reports.php" target="_blank" class="button btn btn-primary btn-large" style="margin:2px">Reports </a> </div>

            
					  ';   
    
if(isset($_GET['p'])){ 
echo '<div class="span11" style="padding:200px 50px">
<h1 style="font-size:1000%; color:#efeded">Admin Page</h1>
</div>
';    
}


echo '<div class="span11">';
if(isset($_GET['man_facility'])){ 
 include ('includes/admin_facilities.php');   
}
if(isset($_GET['create_facility'])){ 
 include ('includes/create_facility.php');   
}
if(isset($_GET['man_drugs'])){ 
 include ('includes/man_drugs.php');   
}
if(isset($_GET['create_drug'])){ 
 include ('includes/create_drug.php');   
}
if(isset($_GET['man_affliates'])){ 
 include ('includes/man_affliates.php');   
}
if(isset($_GET['create_affliate'])){ 
 include ('includes/create_affliate.php');   
}
if(isset($_GET['clin'])){ 
 include ('includes/clinician.php');   
}
if(isset($_GET['sec'])){ 
 include ('includes/sec.php');   
}

if(isset($_GET['lab'])){ 
 include ('includes/lab_staff.php');   
}
if(isset($_GET['rev'])){ 
 include ('includes/reviewer.php');   
}

if(isset($_GET['create_clin'])){ 
 include ('includes/create_clin.php');   
}

if(isset($_GET['create_sec'])){ 
 include ('includes/create_sec.php');   
}

if(isset($_GET['create_lab_user'])){ 
 include ('includes/create_lab.php');   
}

if(isset($_GET['reviewer'])){ 
 include ('includes/reviewer_new.php');   
}

if(isset($_GET['rev_edit'])){ 
 include ('includes/reviewer_edit.php');   
}




?>
                            
	
                        </div>
					</div> <!-- /pricing-plans -->
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->					
				
		    </div> <!-- /span12 -->     	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div>
    
</div> <!-- /main -->
    
 <?php /*include ('includes/footer.php');*/ ?>   

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.7.2.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>

  </body>

</html>

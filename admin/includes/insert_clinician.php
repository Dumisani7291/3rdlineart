<?php


if(isset($_POST['register_clinician'])){ 
	
    $clin_art_clinic= mysqli_real_escape_string($bd,$_POST['art_clinic']);
    $username= mysqli_real_escape_string($bd,$_POST['username']);
    $fullname= mysqli_real_escape_string($bd,$_POST['name']);
    $email= mysqli_real_escape_string($bd,$_POST['email']);
    $phone= mysqli_real_escape_string($bd,$_POST['phone']);
    $password= mysqli_real_escape_string($bd,$_POST['password']);
    $password_confirm= mysqli_real_escape_string($bd,$_POST['confirm_pswd']);
   
    $role ='Clinician';
    
    $date_created= date('Y/m/d');
    
    $find_users=mysqli_query($bd, "SELECT * FROM users where username='".encrypt ($username, $key)."'");
    $getusers = mysqli_num_rows ($find_users);
    
    $pswd_size = strlen($password);

    
    if ($password!=$password_confirm){
      echo '<div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p style="color:#f00"><strong>Yoo!</strong> Passwords dont match </p>
                           
                           </div>
   ';
        echo"<meta http-equiv=\"Refresh\" content=\"2; url=dash.php?create_clin\">";  
    }
    
    else {
        
    if ($pswd_size < 6){
     echo '<div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p style="color:#f00"><strong>Ooops!</strong>User creation failed, Password length less than 5 characters </p>
                           
                           </div>
   ';
        
        echo"<meta http-equiv=\"Refresh\" content=\"2; url=dash.php?create_clin\">";     
    }
        else {
    
    if ($getusers > 0){
     echo '<div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p style="color:#f00"><strong>Yoo!</strong> Username already taken </p>
                           
                           </div>
   ';
        
        echo"<meta http-equiv=\"Refresh\" content=\"2; url=dash.php?create_clin\">"; 
    }
    else {
        
    $password= hasword ($password, $salt);
    
    $insert_users=" INSERT  INTO  users
                (username,password,role,date_created)
                VALUES (
                '".encrypt ($username, $key)."', '$password', '".encrypt ($role, $key)."', '$date_created')";

                mysqli_query($bd, $insert_users);
        
    
     $users=mysqli_query($bd, "SELECT * FROM users where username='".encrypt ($username, $key)."'"); 
        $row_users=mysqli_fetch_array($users);
        $user_id =$row_users['id'];
   
    $insert_clinician=" INSERT  INTO  clinician
                (user_id,art_clinic,name,email,phone)
                VALUES (
                '$user_id', '$clin_art_clinic', '$fullname', '$email', '$phone')";

                mysqli_query($bd, $insert_clinician);
        
         echo '							
<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> New User was created.
                           </div>
                           ';
        
            
 include ('includes/send_user_email.php');
        
        echo"<meta http-equiv=\"Refresh\" content=\"2; url=dash.php?clin\">"; 
}
        }
    }
}

?>
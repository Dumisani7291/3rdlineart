

<form id="edit-profile" class="form-horizontal" action="app.php" method="post">
						 

<h2 style="background-color:#e1f408; text-align:center; color:#000000">Reviewed Applications</h2>
                        <hr style=" border: 1px solid #cbe509;" />
                    

<?php    
global $num_forms; 
$form_my_reviews=mysqli_query( $bd,"SELECT * FROM assigned_forms where  rev_id='$rev_id' and status ='Reviewed'"); 
$num_forms = mysqli_num_rows ($form_my_reviews);
echo '<p>Total forms: [ <i>'. $num_forms .'</i> ]</p>';
?>
     <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="text-align:center"> <p><strong>FORM Id</strong></p></th>
                    <th style="text-align:center"> <p><strong>Date Assigned</strong></p></th> 
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                 <?php

    while ($row_form_creation=mysqli_fetch_array($form_my_reviews)){
        
        $form_id =$row_form_creation['form_id'];
        $sec_id =$row_form_creation['sec_id'];
        $status =$row_form_creation['status'];
        $date_assigned =$row_form_creation['date_assigned'];
        
       /* $SQL_clinician = "SELECT * FROM clinician WHERE id=$clinician_id";
                    $clinician = mysqli_query($bd,$SQL_clinician);
                    
                    $row_clinician = mysqli_fetch_array($clinician);
                        $art_clinic = $row_clinician['art_clinic'];*/
                       
        
        echo '
         <tr>
                    <td> <p style="text-align:center"><strong> 3rdLForm#'.$form_id.'</strong></p> </td>
                    <td> <p style="text-align:center"><strong>'.$date_assigned.' </strong></p></td>
                    <td> <p style="text-align:center"><strong><a href="#">View</a></strong></p> </td>
                  </tr> 
        
        ';
       
    }


?>

                    
         </tbody>
    </table>


<form id="edit-profile" class="form-horizontal" action="app.php" method="post">
						 

<h2 style="background-color:#e1f408; text-align:center; color:#000000">New Applications</h2>
                        <hr style=" border: 1px solid #cbe509;" />
                    
     <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                      <th style="text-align:center"><p><strong> App Form ID </strong></p></th>
                      <th style="text-align:center"><p><strong> Date referral Created </strong></p></th>
                      <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                 <?php
global $num_newforms; 
$form_creation=mysql_query("SELECT * FROM form_creation where status='Complete' and complete !='Rejected' ORDER BY `form_creation`.`3rdlineart_form_id` DESC ", $bd); 
$num_newforms = mysql_num_rows ($form_creation);
echo '<p>Total forms: [ <i>'. $num_newforms .'</i> ]</p>';
    while ($row_form_creation=mysql_fetch_array($form_creation)){
        
        $_3rdlineart_form_id =$row_form_creation['3rdlineart_form_id'];
        $clinician_id =$row_form_creation['clinician_id'];
        $patient_id =$row_form_creation['patient_id'];
        $status =$row_form_creation['status'];
        $form_complete =$row_form_creation['complete'];
        $date_created =$row_form_creation['date_created'];
        
        $SQL_clinician = "SELECT * FROM clinician WHERE id=$clinician_id";
                    $clinician = mysql_query($SQL_clinician,$bd);
                    
                    $row_clinician = mysql_fetch_array($clinician);
                        $art_clinic = $row_clinician['art_clinic'];
                       
        
        echo '
         <tr>
                    <td> <p style="text-align:center"><a href="cp_p1.php?view&id='.$_3rdlineart_form_id.'&clin_id='. $clinician_id.'&pat_id='.$patient_id.'"><strong> 3rdLForm#'.$_3rdlineart_form_id.'</strong></a></p> </td>
                    <td> <p style="text-align:center"><strong>'.$date_created.'</strong></p> </td>
                    ';
        if ($form_complete =='Yes'){ echo '
                    <td class="td-actions"><a href="cp_p1.php?assign&id='.$_3rdlineart_form_id.'" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> Assign Reviewers </i></a></td>';
                                   }
        else {
        echo '<td class="td-actions"><a href="#" class="btn btn-small btn-success" disabled="disabled"><i class="btn-icon-only icon-ok"> Assign Reviewers </i></a></td>';
                        
        }
            echo '     </tr> 
        
        ';
       
    }


?>

                    
         </tbody>
    </table>
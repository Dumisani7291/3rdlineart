
    <h2 style="background-color:#e5e5e5; text-align:center; color:#000000">Application with Decision</h2>
 <?php
global $formID,$num_forms;
$formID= $_GET['formid'];
?>     
                <tbody>
                    
                     <?php

$form_creation=mysql_query("SELECT * FROM patient, form_creation, expert_review_consolidate1 WHERE  form_creation.3rdlineart_form_id=expert_review_consolidate1.form_id and form_creation.clinician_id ='$clinicianID' and form_creation.patient_id=patient.id and expert_review_consolidate1.form_id ='$formID' ORDER BY `form_creation`.`3rdlineart_form_id` DESC", $bd); 


$num_forms = mysql_num_rows ($form_creation);

    while ($row_form_creation=mysql_fetch_array($form_creation)){
        
        $_3rdlineart_form_id =$row_form_creation['3rdlineart_form_id'];
        $clinician_id =$row_form_creation['clinician_id'];
        $patient_id =$row_form_creation['patient_id'];
        $genotyping =$row_form_creation['genotyping'];
        $comment_to_clinician =$row_form_creation['comment_to_clinician'];
        $date_reviewed =$row_form_creation['date_reviewed'];
        
        
        $SQL_clinician = "SELECT * FROM clinician WHERE id=$clinician_id";
                    $clinician = mysql_query($SQL_clinician,$bd);
                    
                    $row_clinician = mysql_fetch_array($clinician);
                        $art_clinic = $row_clinician['art_clinic'];
        
         $SQL_patient = "SELECT * FROM patient WHERE id=$patient_id";
                    $patient = mysql_query($SQL_patient,$bd);
                    
                    $row_patient = mysql_fetch_array($patient);
                        $firstname = $row_patient['firstname'];
                        $lastname = $row_patient['lastname'];
                        $art_id_num = $row_patient['art_id_num'];
                        $gender = $row_patient['gender'];
                        $dob = $row_patient['dob'];
        
        $patient_name = $firstname .' '.$lastname;
        /*
         //calculating age of patient 
function GetAge($dob) 
{ 
        $dob=explode("-",$dob); 
        $curMonth = date("m");
        $curDay = date("j");
        $curYear = date("Y");
        $age = $curYear - $dob[0]; 
        if($curMonth<$dob[1] || ($curMonth==$dob[1] && $curDay<$dob[2])) 
                $age--; 
        return $age; 
}


$age =GetAge($dob);
*/
      
    echo '    
         <h4 style="color:#69330c; padding:10px; background-color:#deed6;">3rdLineForm#: '. $formID.'</h4>
    <table style="width:100%; background-color:#f7cf75; padding:5px;" >
    <td><p style="color:#000">Name: <strong>'.$patient_name.'</strong>   ART Number: <strong>'.$art_id_num.' </strong> Gender: <strong>'.$gender.'</strong>
    Dob: '.$dob.' </p>
    </td>
    <td>'; 
        if ($genotyping == 'Yes'){
        echo '
   <a href="app.php?p&sendsample&formid='. $_3rdlineart_form_id.'" style="float:right" class="btn btn-large btn-primary"><i class="btn-icon-only icon-ok"> Dispatch Sample </i></a>';
            
        }
            
            echo '
    </td>
    </tr>
    </table>
    <hr />  
 

                   <table>
                   <tbbody>
         <tr>
                  
                    <td style="width:80%; padding:20px"> 
                    <h4><u>Application Decision</u></h2><hr />
                    '. $comment_to_clinician.'
                    
                    
                    </td>

                     <td class="td-actions">
                     
                     </td>
                  </tr> 
        
        ';
       
    }


?>

                    
  
    </tbody></table>
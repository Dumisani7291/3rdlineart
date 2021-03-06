<?php
global $pat_id;
$form_id= $_GET['id'];
$pat_id= $_GET['pat_id'];
$clinician_id = $_GET['clin_id'];

$SQL_clinician = "SELECT * FROM clinician WHERE id=$clinician_id";
    $clinician = mysqli_query($bd, $SQL_clinician);
                    
                    $row_clinician = mysqli_fetch_array($clinician);
                    $fullname = $row_clinician['name'];
                    $facility = $row_clinician['art_clinic'];
                    $phone = $row_clinician['phone'];
                    $email = $row_clinician['email'];
                       

 $patient=mysqli_query($bd, "SELECT * FROM patient where id='$pat_id' "); 
    $row_pat=mysqli_fetch_array($patient);
        
        $art_id_num =$row_pat['art_id_num'];
        $firstname =$row_pat['firstname'];
        $lastname =$row_pat['lastname'];
        $gender =$row_pat['gender'];
        $dob =$row_pat['dob'];
        $vl_sample_id =$row_pat['vl_sample_id'];

 //calculating age of patient 
function GetAge($dob) 
{ 
        $dob=explode("/",$dob); 
        $curMonth = date("m");
        $curDay = date("j");
        $curYear = date("Y");
        $age = $curYear - $dob[0]; 
        if($curMonth<$dob[1] || ($curMonth==$dob[1] && $curDay<$dob[2])) 
                $age--; 
        return $age; 
}


$age =GetAge($dob);


//clinic status info

$current_clinical_status=mysqli_query($bd, "SELECT * FROM current_clinical_status where patient_id='$pat_id' "); 
    while ($row_clinic_status=mysqli_fetch_array($current_clinical_status)){
        
        $who_stage =$row_clinic_status['who_stage'];
        $curr_who_stage =$row_clinic_status['curr_who_stage'];
        $weight =$row_clinic_status['weight'];
        $height =$row_clinic_status['height'];
        $art_interrup =$row_clinic_status['art_interrup'];
        $ol_6months =$row_clinic_status['ol_6months'];
        $sig_diarrhea_vom =$row_clinic_status['sig_diarrhea_vom'];
        $alco_drug_consump =$row_clinic_status['alco_drug_consump'];
        $trad_med =$row_clinic_status['trad_med'];
        $co_medi =$row_clinic_status['co_medi'];
        $other_curr_problem =$row_clinic_status['other_curr_problem'];
        
        if ($art_interrup=='Yes'){
            
        $art_interruption = mysqli_query($bd, "SELECT * FROM art_interruption where patient_id='$pat_id' "); 
        $row_art_interruption=mysqli_fetch_array($art_interruption);
        
        $interupt_reason =$row_art_interruption['reason'];
        $interup_date =$row_art_interruption['date'];
        
        }
        
        if ($ol_6months=='Yes'){
            
        $ol_6months_details = mysqli_query($bd, "SELECT * FROM ol_6months_details where patient_id='$pat_id' "); 
        $row_ol_6months_details=mysqli_fetch_array($ol_6months_details);
        
        $ol_6months_dign =$row_ol_6months_details['ol_6months_dign'];
        $ol_6months_date =$row_ol_6months_details['ol_6months_date'];
     
        
        }
        

    }
//side effects 
$patient_side_effects=mysqli_query($bd, "SELECT * FROM patient_side_effects where patient_id='$pat_id' "); 
    $row_patient_side_effects=mysqli_fetch_array($patient_side_effects);
        
        $PeripheralNeuropathy =$row_patient_side_effects['PeripheralNeuropathy'];
        $Jaundice =$row_patient_side_effects['Jaundice'];
        $Lipodystrophy =$row_patient_side_effects['Lipodystrophy'];
        $KidneyFailure =$row_patient_side_effects['KidneyFailure'];
        $Psychosis =$row_patient_side_effects['Psychosis'];
        $Gynecomastia =$row_patient_side_effects['Gynecomastia'];
        $Anemia =$row_patient_side_effects['Anemia'];
        $other =$row_patient_side_effects['other'];
        
//side effects details 
$current_clinical_status_details=mysqli_query($bd, "SELECT * FROM current_clinical_status_details where pat_id='$pat_id' "); 
    $row_current_clinical_status_details=mysqli_fetch_array($current_clinical_status_details);
        
        $sig_diarrhea_vom_details =$row_current_clinical_status_details['sig_diarrhea_vom_details'];
        $alco_drug_consump_details =$row_current_clinical_status_details['alco_drug_consump_details'];
        $trad_med_details =$row_current_clinical_status_details['trad_med_details'];
        $co_medi_details =$row_current_clinical_status_details['co_medi_details'];
        $other_curr_problem_details =$row_current_clinical_status_details['other_curr_problem_details'];

   
  //tb_treatment
$tb_treatment=mysqli_query($bd, "SELECT * FROM tb_treatment where pat_id='$pat_id' "); 
    $row_tb_treatment=mysqli_fetch_array($tb_treatment);
        
        $reg1 =$row_tb_treatment['reg1'];
        $reg2 =$row_tb_treatment['reg2'];
        $mdr =$row_tb_treatment['mdr'];
        $tbstart_date =$row_tb_treatment['start_date'];
        $tbstop_date =$row_tb_treatment['stop_date'];
        $reason_o_changes =$row_tb_treatment['reason_o_changes'];

//adherence
$adherence=mysqli_query($bd, "SELECT * FROM adherence where pat_id='$pat_id' "); 
    $row_adherence=mysqli_fetch_array($adherence);
        
        $scheduled_visit_date1 =$row_adherence['scheduled_visit_date1'];
        $actual_visit_date1 =$row_adherence['actual_visit_date1'];
        $pill_count1 =$row_adherence['pill_count1'];

        $scheduled_visit_date2 =$row_adherence['scheduled_visit_date2'];
        $actual_visit_date2 =$row_adherence['actual_visit_date2'];
        $pill_count2 =$row_adherence['pill_count2'];
        
        $scheduled_visit_date3 =$row_adherence['scheduled_visit_date3'];
        $actual_visit_date3 =$row_adherence['actual_visit_date3'];
        $pill_count3 =$row_adherence['pill_count3'];
        
     
 //adherence_questions
$adherence_questions=mysqli_query($bd, "SELECT * FROM adherence_questions where pat_id='$pat_id' "); 
    $row_adherence_questions=mysqli_fetch_array($adherence_questions);
        
        $ever_forget_2_take_meds =$row_adherence_questions['ever_forget_2_take_meds'];
        $careless_taking_meds =$row_adherence_questions['careless_taking_meds'];
        $stop_taking_meds =$row_adherence_questions['stop_taking_meds'];
        $not_taken_meds =$row_adherence_questions['not_taken_meds'];
        $taken_meds_past_weekend =$row_adherence_questions['taken_meds_past_weekend'];
        $_3months_days_not_taken_meds =$row_adherence_questions['3months_days_not_taken_meds'];
     
  //lab
$lab=mysqli_query($bd, "SELECT * FROM lab where pat_id='$pat_id' "); 
    $row_lab=mysqli_fetch_array($lab);
        
        $creatinine =$row_lab['creatinine'];
        $hb =$row_lab['hb'];
        $alt =$row_lab['alt'];
        $bilirubin =$row_lab['bilirubin'];
        $hepbag =$row_lab['hepbag'];
                  
//treatement history
$treatment_history=mysqli_query($bd, "SELECT * FROM treatment_history where pat_id='$pat_id' "); 
    $row_treatment_history=mysqli_fetch_array($treatment_history);
        
        $art_drug =$row_treatment_history['art_drug'];
        $treat_start_date =$row_treatment_history['start_date'];
        $treat_stop_date =$row_treatment_history['stop_date'];
        $treat_reason_for_change =$row_treatment_history['reason_for_change'];

  if  ($gender=='Female' && $age >'10'){                
//pregnacy for females age greater than 10
$pregnancy=mysqli_query($bd, "SELECT * FROM pregnancy where pat_id='$pat_id' "); 
    $row_pregnancy=mysqli_fetch_array($pregnancy);
        
        $pregnant =$row_pregnancy['pregnant'];
        $weeks_o_preg =$row_pregnancy['weeks_o_preg'];
        $breastfeeding =$row_pregnancy['breastfeeding'];
      
     /* echo  $breastfeeding;*/
  }

if  ( $age <='3'){                
//pediatric age < 3
$pediatric=mysqli_query($bd, "SELECT * FROM pediatric where pat_id='$pat_id' "); 
    $row_pediatric=mysqli_fetch_array($pediatric);
        
        $mother_had_single_dose_NVP =$row_pediatric['mother_had_single_dose_NVP'];
        $given_NVP =$row_pediatric['given_NVP'];
        $mother_had_PMTCT =$row_pediatric['mother_had_PMTCT'];
        $swallow_tablets =$row_pediatric['swallow_tablets'];
        
  }

echo '
                      

 <div class="form-actions">
                                                                                                                                                   <div class="span3">             
             <a href="#myModal" role="button" data-toggle="modal" class="btn btn-small btn-danger"><i class="btn-icon-only icon-remove">Form Not Complete </i></a> 
  

                                                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 style="text-align:center">Compose Message</h3>
                                                      </div>
                                                      <div class="modal-body"> 
                                                      <form id="#" action="cp_p1.php?p&notcomplete&form_id='.$form_id.'" method="post">
                                                      <p>To:'.$email.'</p>
                                                      <input type="hidden" name="email_address" Value ="'.$email.'" />
                                                      <h4>Compose Message</h4>
                                                      <textarea style="width:93%" rows="8" name="comment" value="">
                                                      
                                                      </textarea>
                                                       <div style="width:90%; background-color:#f2f2f2; border-radius: 5px; padding:5px; text-align:center; margin:5px;" >
                                                      <button type="submit" name="submit_reject" class="btn btn-warning" style="width:90%;"><i class="btn-icon-only icon-remove" >Form Not Complete </i></button>  
                                                      
                                                
                                                       </div>
                                                      </form>
                                                      
                                                      
                                                     
                                                         </div>
                                                      <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                       
                                                      </div>
                                                    </div>
              
              </div>
                             
                                            <div class="span3" style="float:right">
											<a href="cp_p1.php?p&complete&form_id='.$form_id.'" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> Form Complete</i></a>
                                            </div>
                          </div>	
';
?>
                        

<h1 style="background-color:#f8f7f7; text-align:center; color:#000">3rd Line ART Expert Committee Malawi</h1>
                           <hr style=" border: 2px solid #000;" />
                         <fieldset style="background-color:#f8f7f7;">
                           <table style="width:100%; border-color:#f5f0f0" border="0.5" cellpadding="4px">
                          
                                <tr>
                          <td>
                              <h4>ART Clinic :</h4> 
                        </td>
                          <td>
                              <p style="text-align:center"><strong><?php echo $facility ?></strong></p>
</td>    <td>
                                    
                                    <?php 
                                $date = date ('d-m-Y');
                                $time = date ('h:m:s');

                                    echo "Date <i>".$date. "</i>  Time <i>". $time. "</i>";
                                    ?>
                                    <!--<i>Date: 02-Dec-2016</i>-->
                                    
                                    </td>
                          </tr> 
                               
                        <tr>
                          <td>
                              <h4>Clinician's Name : </h4> 
                        </td>
                          <td>
                              <p style="text-align:center"><strong><?php echo $fullname ?></strong></p>
                          </td>    
                          </tr> 
                             
                          <tr>
                          <td>
                             <h4>Clinician's Tel. Number :</h4>
                        </td>
                          <td>
                              <p style="text-align:center"><strong><?php echo $phone ?></strong></p>
                          </td>    
                    
                          </tr> 
                               <tr>
                          <td>
                             <h4>Clinician's Email Address :</h4>
                        </td>
                          <td>
                              <p style="text-align:center"><strong><?php echo $email ?></strong></p>
                          </td>    
                    
                          </tr> 
                          </table>
                             </fieldset> 

<h3 style="background-color:#111; text-align:center; color:#ffffff">Patient Details</h3>

  <fieldset>                     
                          <table style="width:100%;border-color:#f5f0f0" border="0" cellpadding="4px">
                          <tr>
                          <td><h4>First Name : </h4> 
                              
                        </td>
                          <td>
                               <p style="text-align:center"><strong><?php echo  $firstname; ?></strong></p>
                          </td>    
                          <td><h4>Surname :</h4> 									
</td>    
                          <td>       
                              
                              <p style="text-align:center"><strong><?php echo  $lastname; ?></strong></p>
                             
</td>    
                          </tr> 
                              <tr>
                          <td>
                             <h4>ART-ID Number :</h4>
                        </td>
                          <td>
                                <p style="text-align:center"><strong><?php echo   $art_id_num; ?></strong></p>     
                              
                          </td>    
                          <td>
                              <h4>Gender :</h4>
</td>    
                          <td>
                              
                              <p><?php echo '<p style="text-align:center"><strong>'. $gender. '</strong></p>'; ?></p>
</td>    
                          </tr> 
                          <tr>
                          <td>
                             <h4>VL sample-ID :</h4>
                        </td>
                          <td>
                               <p style="text-align:center"><strong><?php echo  $vl_sample_id; ?></strong></p>     
                          </td>    
                          <td>
                              <h4>Date of Birth :</h4>
</td>    
                          <td>												
                            <p><?php echo '<p style="text-align:center"><strong>'. $dob. '</strong></p>'; ?></p>
</td>    
                          </tr> 
                          </table>
      </fieldset> 
   <h3 style="background-color:#111; text-align:center; color:#ffffff">Current Clinic Status and history</h3>
                         <fieldset>
                          <table style="width:100%; border-color:#f5f0f0; border:0px;" border="1">
                          
                                <tr>
                          <td>
                              <h4>WHO stage at start of Treatment :</h4> 
                        </td>
                          <td>
                              <p style="text-align:center"><strong><?php echo  $who_stage ?></strong></p>
</td>    
                          </tr> 
                               
                        <tr>
                          <td>
                              <h4>Current WHO stage (+defining condition) : </h4> 
                        </td>
                          <td>
                               <p style="text-align:center"><strong><?php echo  $curr_who_stage ?></strong></p>
                             
                          </td>    
                          </tr> 
                             
                          <tr>
                          <td>
                             <h4>Weight :</h4>
                        </td>
                          <td>
                              <p style="text-align:center"><strong><?php echo  $weight ?>Kgs</strong></p>
                          </td>    
                    
                          </tr> 
                               
                              <tr>
                          <td>
                             <h4>Height :</h4>
                        </td>
                          <td>
                               <p style="text-align:center"><strong><?php echo  $height ?>Cm</strong></p>
                          </td>    
                    
                          </tr> 
                               
                              <tr>
                               <td>
                            <h4>ART Interruptions? : </h4>          
                        </td>
                                  <td>
                                      <p style="text-align:center"><strong><i>ART Interruptions*</i> : <?php 
                                         if ($art_interrup=='Yes'){
                                        echo '<u>'. $art_interrup. 'ff</u>'; 
                                    }

else {
echo '<i style="color:#f00">No ART Interruptions</i>';
}
                                          ?></strong></p> 
                              </tr>
                              
                              
                              <tr>
                          <td>  </td>
                          <td>
                              <?php 
                             
                               if ($art_interrup=='Yes'){
            
        $art_interruption = mysqli_query($bd, "SELECT * FROM art_interruption where patient_id='$pat_id' "); 
        $row_art_interruption=mysqli_fetch_array($art_interruption);
        
        $interupt_reason =$row_art_interruption['reason'];
        $interup_date =$row_art_interruption['date'];
                               
                         echo   ' <table>
                    
                              <tr>
                                
                                  <td>if Yes, Date:</td>
                                  <td>    <p style="text-align:center"><strong>'.$interup_date.'</strong></p></td>
                                  </tr>
                                  <tr>
                                  <td>Reason:</td>
                                  <td>
                                    <p style="text-align:center"><strong>'. $interupt_reason .'</strong></p>
                                      </td>
                                  </tr>
                              </table>';
                              
}
else { echo '
                              <table>
                    
                              <tr>
                            <td></td>
                                  </tr>
                              </table>';
      
                               }
?>
       
                          </td>    
                    
                          </tr> 
                        
                              <tr>
                          <td>
                            <h4>History of serious side effects :</h4>
                        </td>
                          <td>
                              <table>
                              <tr>
                       
                                  <td> 
                                    
                                  </td>
                                  </tr>
                              </table>
                          </td>    
                    
                          </tr> 
                               <tr>
                       
                                   <td> </td>
                                  <td> 
                                     <p style="text-align:center"><strong> Peripheral Neuropathy : <?php echo '<u>'. $PeripheralNeuropathy. '</u>'; ?></strong></p>
                                  </td>
                                  </tr>
                              <tr>
                       
                                   <td> </td>
                                  <td> 
                                      <p style="text-align:center"><strong>Jaundice : <?php echo '<u>'. $Jaundice. '</u>'; ?></strong></p>
                                  </td>
                                  </tr>
                              <tr>
                       
                                   <td> </td>
                                  <td> 
                                      <p style="text-align:center"><strong>Lipodystrophy : <?php echo '<u>'. $Lipodystrophy. '</u>'; ?></strong></p>
                        
                                  </td>
                                  </tr>
                              <tr>
                       
                                   <td> </td>
                                  <td> 
                                      <p style="text-align:center"><strong>Kidney Failure : <?php echo '<u>'. $KidneyFailure. '</u>'; ?></strong></p>
                                  </td>
                                  </tr>
                              <tr>
                       
                                   <td> </td>
                                  <td> 
                                      <p style="text-align:center"><strong>Psychosis : <?php echo '<u>'. $Psychosis. '</u>'; ?></strong></p>
                                      
                                  </td>
                                  </tr>
                              <tr>
                       
                                   <td> </td>
                                  <td> 
                                      <p style="text-align:center"><strong>Gynecomastia : <?php echo '<u>'. $Gynecomastia. '</u>'; ?></strong></p>
                                    
                                  </td>
                                  </tr>
                              <tr>
                       
                                   <td> </td>
                                  <td> 
                                      <p style="text-align:center"><strong>Anemia : <?php echo '<u>'. $Anemia. '</u>'; ?></strong></p>
                                      
                                  </td>
                                  </tr> 
                              <tr>
                       
                                   <td> </td>
                                
                                  <td> <p style="text-align:center"><strong>Other  : <?php echo '<u>'. $other. '</u>'; ?></strong></p> </td>
                                  </tr>
                               
                             
                          </table>
</fieldset>
    <fieldset>
   <table style="width:100%; border-color:#f5f0f0; border:0px;" border="1">
                             
                                  <tr>
                          <td>
                           <p style="text-align:left"><strong>Ol in the last 6 month? <?php echo '<u>'. $ol_6months. '</u>'; ?> </strong></p>
                            
</td>    <?php

if ($ol_6months=='Yes'){
            
        $ol_6months_details = mysqli_query($bd, "SELECT * FROM ol_6months_details where patient_id='$pat_id' "); 
        $row_ol_6months_details=mysqli_fetch_array($ol_6months_details);
        
        $ol_6months_dign =$row_ol_6months_details['ol_6months_dign'];
        $ol_6months_date =$row_ol_6months_details['ol_6months_date'];
}

?>
                                      <td>
                              If yes, Date
                          </td>
                          <td>
                            <p style="text-align:center"><strong><?php if ($ol_6months=='Yes'){ echo $ol_6months_date; } echo '<p> N/A</p>';  ?></strong></p>
                          </td> 
                          </tr>
                                <tr>
                                <td></td>
                                    <td>
                              Diagnosis
                          </td>
                          <td>
                              <?php
                            if ($ol_6months=='Yes'){
echo '<p>'. $ol_6months_dign. '</p>'; 
}
else {
echo '<p> N/A</p>';
}     
  ?> 
                              
                          </td> 
                                    
                                </tr>
      
                              
                          </table>
        </fieldset>
    <fieldset>
    
     <table style="width:100%; border-color:#f5f0f0; border:0px;" border="1">
                          
                                <tr>
                         <td> 
                             <p style="text-align:left"><strong>Significant diarrhea or vomiting? <?php echo '<u>'. $sig_diarrhea_vom. '</u>'; ?></strong></p>
                             
                                  </td>
                                    <td>
                                        <?php
                            if ($sig_diarrhea_vom=='Yes'){
echo '<p>Details: '. $sig_diarrhea_vom_details. '</p>'; 
}
else {
echo '<p> N/A</p>';
}     
  ?>
                            
                                    </td>
                           
                          </tr> 
                               
                        <tr>
                          <td> 
                              <p style="text-align:left"><strong>Alcohol or drug consumption? <?php echo '<u>'. $alco_drug_consump. '</u>'; ?></strong></p>
                                  </td>
                             <td>
                            <?php 
if ($alco_drug_consump=='Yes'){
echo '<p>Details: '. $alco_drug_consump_details. '</p>'; 
}
else {
echo '<p> N/A</p>';
}     
  ?>                                  </td>
                          </tr> 
                             
                          <tr>
                         <td> 
                             <p style="text-align:left"><strong>Traditional medicine? <?php echo '<u>'. $trad_med. '</u>'; ?></strong></p>
                                  </td>
                         <td>
                            
                            <?php 
if ($trad_med=='Yes'){
echo '<p>Details: '. $trad_med_details. '</p>'; 
}
else {
echo '<p> N/A</p>';
}
                
?>                          
                              </td>
         </tr> 
                               <tr>
                        <td> 
                            <p style="text-align:left"><strong>Current co-medications (Antiepileptic, Steroids, Warfarin, Statins)? <?php echo '<u>'. $co_medi. '</u>'; ?></strong></p>
                                  </td>
                             <td>
                           <?php 
if ($co_medi=='Yes'){
echo '<p>Details: '. $co_medi_details. '</p>'; 
}
else {
echo '<p> N/A</p>';
}
                
?>                 
                         
                                    </td>
                          </tr> 
         
                        <tr>
                        <td> 
                            <p style="text-align:left"><strong>Other current clinical problems? <?php echo '<u>'. $other_curr_problem. '</u>'; ?></strong></p> 
                                  </td>
                          <td>
                            <?php 
if ($other_curr_problem=='Yes'){
echo '<p>Details: '. $other_curr_problem_details. '</p>'; 
}
else {
echo '<p> N/A</p>';
}
                
?>                 
                                    </td>
                    
                          </tr> 
                          </table>
</fieldset>

<h3 style="background-color:#111; text-align:center; color:#ffffff"> Pregnancy Section</h3>

<fieldset> 
<?php 
if ($gender=='Male' || $age <'10'){
echo '<h3 style="color:#f00">N/A</h3>';

}
else {
?>
                       
                           <table style="width:100%" border="0" cellpadding="2px">
                             
                                  <tr>
                          <td>
                            
                             <p style="text-align:left"><strong>Is the patient currently pregnant? <?php if  ($gender=='Female' && $age >'10'){ echo '<u>'. $pregnant. '</u>'; }?></strong></p>
</td>    
                                </tr>
                                <tr>
                                <td> <p style="text-align:left"><strong>If Yes, week of pregnancy? <?php if  ($gender=='Female' && $age >'10'){   echo '<u>'. $weeks_o_preg. '</u>'; }?></strong></p></td>
                                </tr>
                          
                          <tr>
                                
                               
                          <td>
                            
                              <p style="text-align:left"><strong>Is the patient breastfeeding? <?php if  ($gender=='Female' && $age >'10'){  echo '<u>'. $breastfeeding. '</u>'; }?></strong></p>
</td>    
                                      
                         
                          </tr>
                          </table>


<?php } ?>
</fieldset> 

<h3 style="background-color:#111; text-align:center; color:#ffffff">Pediatric Section</h3>
<fieldset>
 <?php 
if ($age >'3'){
echo '<h3 style="color:#f00">N/A</h3>';

}
else {
?>                     
                              <table style="width:100%; border:0px;" border="0" cellpadding="2px">
                              <tr> 
                          <td>
             <p style="text-align:left"><strong>Has mother had single dose NVP? <?php echo '<u>'. $mother_had_single_dose_NVP. '</u>'; ?></strong></p>
                              
</td>    
                          </tr>  
                              <tr> 
                          <td>
             <p style="text-align:left"><strong>Has Mother had PMTCT? <?php echo '<u>'. $mother_had_PMTCT. '</u>'; ?></strong></p>
                              
</td>    
                          </tr>  
                                   <tr> 
                          <td>
             <p style="text-align:left"><strong>Was baby given NVP? <?php echo '<u>'. $given_NVP. '</u>'; ?></strong></p>
                              
</td>    
                          </tr>  
                              <tr> 
                          <td>
             <p style="text-align:left"><strong>Is the child able to swallow tablets? <?php echo '<u>'. $swallow_tablets. '</u>'; ?></strong></p>
                              
</td>    
                          </tr>  
                        
    </table>
<?php } ?>
</fieldset>   
<h3 style="background-color:#111; text-align:center; color:#ffffff"> Treatment History</h2>
     <fieldset>                      
                            <table style="width:100%; border:0px;" border="1" cellpadding="2px">
                <thead>
                  <tr style="background-color:#eee">
                    <th> ART Drugs</th>
                    <th> Start Date</th>
                    <th> Stop Date</th>
                    <th> Reason for changes (toxicities?)</th>
                   
                  </tr>
                </thead>
                <tbody>
                    <?php

//treatement history
$treatment_history=mysqli_query($bd, "SELECT * FROM treatment_history where pat_id='$pat_id' "); 
      while ($row_treatment_history=mysqli_fetch_array($treatment_history)){
        
        $art_drug =$row_treatment_history['art_drug'];
        $treat_start_date =$row_treatment_history['start_date'];
        $treat_stop_date =$row_treatment_history['stop_date'];
        $treat_reason_for_change =$row_treatment_history['reason_for_change'];
          
          echo ' <tr>
          <td>  
                      <p style="text-align:center"><strong>'.$art_drug.'</strong></p>
                     
                        ';
        /*       
        $retrieve_drugs ="SELECT * FROM drugs";

     $drugs = mysqli_query($retrieve_drugs);
	       
while($drug_row = mysqli_fetch_array($drugs)) {
    
    
	$drug_name = $drug_row['drug_name'];
    echo '<option value='.$drug_name.'>'.$drug_name.'</option>';
    
}
*/
                       
          
          echo '        
                     </td>
                    <td>   
                     <p style="text-align:center"><strong>'.$treat_start_date.'</strong></p>
                    </td>
                    <td>   
                     <p style="text-align:center"><strong>'.$treat_stop_date.'</strong></p>
                    </td> 
                    <td>   
                     <p style="text-align:center"><strong>'.$treat_reason_for_change.'</strong></p>
                    </td>
                   
                  </tr> 
             ';       
                   
        } ?>
                    
         </tbody>
    </table>
<br />
</fieldset>
    <h3 style="background-color:#111; text-align:center; color:#ffffff">Monitoring</h3>
 <fieldset>
    <table style="width:100%; border:0px;" border="1" cellpadding="2px">
                <thead>
                  <tr style="background-color:#eee">
                    <th> Monitoring Date</th>
                    <th> CD4</th>
                    <th> VL</th> 
                    <th> Reason for detectable VL (Non-adherence, treatment break)</th>
                    <th> Weight (kg)</th>
                   
                  </tr>
                </thead>
                <tbody>
                    <?php
    //monitoring
$monitoring=mysqli_query($bd, "SELECT * FROM monitoring where pat_id='$pat_id' "); 
    while ( $row_monitoring=mysqli_fetch_array($monitoring)){
        
        $monito_date =$row_monitoring['monito_date'];
        $cd4 =$row_monitoring['cd4'];
        $vl =$row_monitoring['vl'];
        $reason_4_detectable_vl =$row_monitoring['reason_4_detectable_vl'];
        $weight =$row_monitoring['weight'];
        
        echo '
                 <tr> 
                  <td>   <p style="text-align:center"><strong>'.$monito_date.'</strong></p>  </td>
                  <td>   <p style="text-align:center"><strong>'.$cd4.'</strong></p>  </td>
                  <td>   <p style="text-align:center"><strong>'.$vl.'</strong></p>  </td>
                  <td>   <p style="text-align:center"><strong>'.$reason_4_detectable_vl.'</strong></p>  </td>
                  <td>   <p style="text-align:center"><strong>'.$weight.'</strong></p>  </td>
                    
                  </tr>  
                     '; 
     }
                    
                    ?>
                       
                    
        </tbody>
    </table>
 <br />
</fieldset>
    <h3 style="background-color:#111; text-align:center; color:#ffffff">TB Treatment</h3>
 <fieldset>
    <table style="width:100%" border="0" cellpadding="2px">
               
                <tbody>
                   <?php

//tb_treatment
$tb_treat =mysqli_query($bd, "SELECT * FROM tb_treat where pat_id='$pat_id' "); 
    $row_tb_treat=mysqli_fetch_array($tb_treat);
        
        $tb_tb_treatment =$row_tb_treat['tb_treatment'];
if ($tb_tb_treatment=='Yes') {

    //tb_treat_regimen1
$tb_treat_regimen1=mysqli_query($bd, "SELECT * FROM tb_treat_regimen1 where pat_id='$pat_id' "); 
    while ( $row_tb_treat_regimen1=mysqli_fetch_array($tb_treat_regimen1)){
        
        $reg_name =$row_tb_treat_regimen1['reg_name'];
        $start_date =$row_tb_treat_regimen1['start_date'];
        $stop_date =$row_tb_treat_regimen1['stop_date'];
        $reason_for_change =$row_tb_treat_regimen1['reason_for_change'];
        
        echo '
        <tr>
                    <td> <p style="text-align:center"><strong> Reg. 1 </strong></p></td>
                    <td> 
                    <p style="text-align:center"><strong>'.$reg_name.'</strong></p>
                    </td>
                    <td> 
                     <p style="text-align:center"><strong>'.$start_date.'</strong></p>
                   </td>
                   <td> 
                     <p style="text-align:center"><strong>'.$stop_date.'</strong></p>
                   </td>
                   <td> 
                     <p style="text-align:center"><strong>'.$reason_for_change.'</strong></p>
                   </td>
                    </tr>
        
        ';
    }

//tb_treat_regimen2
$tb_treat_regimen2=mysqli_query($bd, "SELECT * FROM tb_treat_regimen2 where pat_id='$pat_id' "); 
    while ( $row_tb_treat_regimen2=mysqli_fetch_array($tb_treat_regimen2)){
        
        $reg_name =$row_tb_treat_regimen2['reg_name'];
        $start_date =$row_tb_treat_regimen2['start_date'];
        $stop_date =$row_tb_treat_regimen2['stop_date'];
        $reason_for_change =$row_tb_treat_regimen2['reason_for_change'];
        
        echo '
        <tr>
                    <td> <p style="text-align:center"><strong> Reg. 2 </strong></p></td>
                    <td> <p style="text-align:center"><strong>'. $reg_name .'</strong></p></td>
                    <td> <p style="text-align:center"><strong>'. $start_date .'</strong></p></td>
                    <td> <p style="text-align:center"><strong>'. $start_date .'</strong></p></td>
                    <td> <p style="text-align:center"><strong>'. $reason_for_change .'</strong></p></td>
                       
                    </tr>
        
        ';
    }

//tb_treat_MDR
$tb_treat_mdr=mysqli_query($bd, "SELECT * FROM tb_treat_mdr where pat_id='$pat_id' "); 
    while ( $row_tb_treat_mdr=mysqli_fetch_array($tb_treat_mdr)){
        
        $reg_name =$row_tb_treat_mdr['reg_name'];
        $start_date =$row_tb_treat_mdr['start_date'];
        $stop_date =$row_tb_treat_mdr['stop_date'];
        $reason_for_change =$row_tb_treat_mdr['reason_for_change'];
        
        echo '
        <tr>
                    <td> <p style="text-align:center"><strong> MDR </strong></p></td>
                    <td> <p style="text-align:center"><strong>'. $reg_name .'</strong></p></td>
                    <td> <p style="text-align:center"><strong>'. $start_date .'</strong></p></td>
                    <td> <p style="text-align:center"><strong>'. $start_date .'</strong></p></td>
                    <td> <p style="text-align:center"><strong>'. $reason_for_change .'</strong></p></td>
                       
                    </tr>
        
        ';
    }
}
else {
echo '<h3 style="color:#f00">No TB treatment</h3>';
}

?>
                    
        </tbody>
    </table>
</fieldset>
           
<h3 style="background-color:#111; text-align:center; color:#ffffff"> Adherence</h2>
                        
    <fieldset>                         
    <h3>Adherence Section <i>(Patient adherence in the last 3 visits)</i></h3>
    <table style="width:100%" border="0">
                <tbody>
                    
                  <tr>
                    <td> Schedule visit date: </td>
                    <td>    
                        <p style="text-align:center"><strong><?php echo  $scheduled_visit_date1; ?></strong></p> 
                         </td>
                    <td> Actual visit date </td>
                    <td>    
                        <p style="text-align:center"><strong><?php echo  $actual_visit_date1; ?></strong></p> 
                        <?php /*echo '<p style="text-align:center"><strong>'. $actual_visit_date1. '</strong></p>';*/ ?> </td>
                    <td> Pill Count </td>
                    <td>    
                        <p style="text-align:center"><strong><?php echo  $pill_count1; ?> %</strong></p> 
                        <?php /*echo '<p style="text-align:center"><strong>'. $pill_count1. '%</strong></p>';*/ ?> </td>
                  
                  </tr> 
                    <tr>
                    <td> Schedule visit date: </td>
                    <td>    
                        <p style="text-align:center"><strong><?php echo  $scheduled_visit_date2; ?></strong></p> 
                        <?php /*echo '<p style="text-align:center"><strong>'. $scheduled_visit_date2. '</strong></p>';*/ ?> </td>
                    <td> Actual visit date </td>
                    <td>    
                        <p style="text-align:center"><strong><?php echo  $actual_visit_date2; ?></strong></p> 
                        <?php /*echo '<p style="text-align:center"><strong>'. $actual_visit_date2. '</strong></p>';*/ ?> </td>
                    <td> Pill Count </td>
                    <td>    
                        <p style="text-align:center"><strong><?php echo  $pill_count2; ?> %</strong></p> 
                        <?php /*echo '<p style="text-align:center"><strong>'. $pill_count2. '%</strong></p>'; */?> </td>
                  
                  </tr> 
                      <tr>
                    <td> Schedule visit date: </td>
                    <td>    
                        <p style="text-align:center"><strong><?php echo  $scheduled_visit_date3; ?></strong></p> 
                        <?php /*echo '<p style="text-align:center"><strong>'. $scheduled_visit_date3. '</strong></p>';*/ ?> </td>
                    <td> Actual visit date </td>
                    <td>    
                        <p style="text-align:center"><strong><?php echo  $actual_visit_date3; ?></strong></p> 
                        <?php /*echo '<p style="text-align:center"><strong>'. $actual_visit_date3. '</strong></p>';*/ ?> </td>
                    <td> Pill Count </td>
                    <td>    
                        <p style="text-align:center"><strong><?php echo  $pill_count3; ?> %</strong></p> 
                        <?php /*echo '<p style="text-align:center"><strong>'. $pill_count3. '%</strong></p>';*/ ?> </td>
                  
                  </tr> 
                    
        </tbody>
    </table>
</fieldset>
 <fieldset>
    <h3>Adherence questions <i>(circle answer)</i></h3>
    
    <table style="width:100%" border="0" cellpadding="5px">
      <tr>     <td>Do you ever forget to take your medicine?</td>    
               <td> 
                   <?php echo '<p><u>'. $ever_forget_2_take_meds. '</u></p>'; ?>
                  </td>
                  </tr>
        <tr>     <td>Are you careless at times about taking your medicine?</td>    
               <td> 
                   <?php echo '<p><u>'. $careless_taking_meds. '</u></p>'; ?>
                  </td>
                  </tr>
        <tr>     <td>Sometimes if you feel worse, do you stop taking your medicine?</td>    
               <td> 
                  <?php echo '<p><u>'. $stop_taking_meds. '</u></p>'; ?>
                  </td>
                  </tr>
        <tr>     <td>Thinking about the last week. How often have you not taken your medicine</td>    
               <td> 
                   <?php echo '<p><u>'. $not_taken_meds. '</u></p>'; ?>
                  </td>
                  </tr>
         <tr>     <td>Did you not take any of your medicine over the past weekend?</td>    
               <td> 
                   <?php echo '<p><u>'. $taken_meds_past_weekend. '</u></p>'; ?>
                  </td>
                  </tr>
        <tr>     <td>Over the past 3 months, how many days have you not taken any medicine at all?</td>    
               <td> 
                   <?php echo '<p><u>'. $_3months_days_not_taken_meds. '</u></p>'; ?>
                  </td>
                  </tr>
    
    
    
    </table>
</fieldset>
 <fieldset>
      <h3>Laboratory Section <i>(compulsory)</i></h3>
    <table style="width:100%" border="0" cellpadding="5px">
                <tbody>
                    <tr>
                    <td> Hb: </td>
                    <td>  <?php echo '<p style="text-align:center"><strong>'. $hb. '</strong><i>*g/dl</i></p>'; ?></td>
                    </tr>
                    <tr>
                    <td> ALT: </td>
                    <td>  <?php echo '<p style="text-align:center"><strong>'. $alt. '</strong><i>	
*U/l</i> </p>'; ?></td>
                    </tr>
                    <tr>
                   
                    <td> Bilirubin </td>
                    <td>  <?php echo '<p style="text-align:center"><strong>'. $bilirubin. '</strong><i>	
*mg/dl</i></p>'; ?> </td>
                  
                  </tr>   
                  <tr>
                    <td> Creatinine: </td>
                    <td>  <?php echo '<p style="text-align:center"><strong>'. $creatinine. '</strong><i>	
*mg/dl</i></p>'; ?> </td>
                    </tr>
                    <tr>
                      <td>HepB Ag</td>
                     <td> 
                   <?php echo '<p style="text-align:center"><strong>'. $hepbag. '</strong></p>'; ?>
                  </td>
                  
                  </tr> 
        </tbody>
     </table> </fieldset>
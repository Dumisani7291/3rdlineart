<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="Yes"){
            $(".box").not(".yes").hide();
            $(".yes").show();
        }
        if($(this).attr("value")=="No"){
            $(".box").not(".no").hide();
            $(".no").show();
        }
        
    });
});
</script>
<?php
if(isset($_GET['formID'])){
    $sampleid =$_GET ['sample'];
    $formid =$_GET ['formID'];
$today = date ('Y/m/d');
   

 $patient=mysql_query("SELECT * FROM patient,form_creation where patient.id=form_creation.patient_id and form_creation.3rdlineart_form_id='$formid' ", $bd); 
    $row_pat=mysql_fetch_array($patient);
        
        $art_id_num =$row_pat['art_id_num'];
        $patientName =$row_pat['firstname'].'  ' .$row_pat['lastname'];
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
   

}
   /* //patient 
$sample=mysql_query("SELECT * FROM sample ", $bd); 
    while ( $row_sample=mysql_fetch_array($sample)){
        
        $sample_id =$row_sample['id'];
        $form_id =$row_sample['form_id'];
        $clinician_id =$row_sample['clinician_id'];
        $status =$row_sample['status'];
        
            $clinician=mysql_query("SELECT * FROM clinician where id='$clinician_id'", $bd); 
                $row_clinician=mysql_fetch_array($clinician);
                    $art_clinic =$row_clinician['art_clinic'];*/
        
?>


<form id="edit-profile" class="form-horizontal" action="app.php" method="post">

<h2 style="background-color:#f8f7f7; text-align:center">Patient Details</h2>
                          <hr style=" border: 1.5px solid #b49308;" />
                          <table style="width:100%; background-color:#f7cf75; " border="0" cellpadding ="5">
                          <tr>
                          <td><p>Patient Name</p> 
                              
                        </td>
                          <td>
                            <h4> <?php echo $patientName ?></h4>
                          </td>    
                          <td><p>Form#:</p> 									
</td>    
                          <td><span></span>												
                              <h4><?php echo $formid ?></h4>
</td>    
                          </tr> 
                              <tr>
                          <td>
                             <p>ART-ID Number</p>
                        </td>
                          <td>
                              <h4><?php echo $art_id_num ?></h4>
                          </td>    
                          <td>
                              <p>Gender</p>
</td>    
                          <td>
                              <h4><?php echo $gender ?></h4>
</td>    
                          </tr> 
                          <tr>
                          <td>
                             <p>VL sample-ID</p>
                        </td>
                          <td>
                              <h4><?php echo $vl_sample_id ?></h4>
                          </td>    
                          <td>
                              <p>Age</p>
</td>    
                          <td>
                              <h4> <?php echo $age ?></h4>
</td>    
                          </tr> 
                              
                          </table>
    
        
    
                           
</form>

<?php
            if(isset($_GET['vl_done'])){
           include ('includes/lab_vl_done.php'); 
        }

else {
            
            ?>
<form id="edit-profile" class="form-horizontal" action="<?php echo 'pih_p1.php?formID='.$formid.'&sample='.$sampleid .'&vl_done' ?>" method="post" style="background-color:#ede9e9; padding:20px">

<h2 style="background-color:#f5ec10; text-align:center">VL Repeat</h2>
                          <hr style=" border: 1.5px solid #b49308;" />
    <h1><I>SampleID</I>: <span style="color:#f00"><?php echo $formid ?></span></h1>
   
<script type="text/javascript">
      jQuery(document).ready(function ($) {
    $('input[name="art_interrup"]').on('click', function () {
        if ($(this).val() === 'Yes') {
            $('#datepicker,#art_interupt_reason').prop("disabled", false);
        } else {
            $('#datepicker,#art_interupt_reason').prop("disabled", "disabled");
        }
    });
});
</script> 
    
    <script>
  $( function() {
    $( "#datepicker8" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                     <script>
  $( function() {
    $( "#datepicker9" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>  
    
     <script>
  $( function() {
    $( "#datepicker10" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                     <script>
  $( function() {
    $( "#datepicker11" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
                      
                     <div style="width:300px; float:left" class="radio_sty">
    <input type="radio" id="f-vl"    name="vl" value="Yes" required>
    <label for="f-vl">< 5000 Copies</label>
    
    <div class="check">
		</div>
  </div>
    <div style="width:300px; float:left" class="radio_sty">
    <input type="radio" id="n-vl" name="vl" value="No"  >
    <label for="n-vl">> 5000 Copies</label>
    
    <div class="check">
		</div>
  </div>
       <table style="width:100%" border="0" style="padding:100px">
    
           
     <tr class="no box">
                               <td>
                                   <p><strong> *Receive Date</strong></p>
                                   <br />
                        </td>
         
                                  <td>
                                      
                                       <input type="text" name="receive_date" value="<?php echo $today ?>" id="datepicker8" style="font-size:120%" />
                                       <input type="hidden" name="sampleid" value="<?php echo $sampleid ?>" style="font-size:120%" />
                                      <br />
                            
         </td>
          <td>
                            <p><strong> *Enter Dispatch date</strong></p>
                                   <br />
                        </td>
         <td>
                                      
                                       <input type="text" name="dispatch_date" value="<?php echo $today ?>" id="datepicker9" style="font-size:120%" />
                                      <br />
                            
         </td>   
                              </tr>
                             <tr class="no box">
                               <td>
                                   <p><strong>   *VL result (Current)</strong></p>
                                   <br />
                        </td>
                                  <td>
                                      
                                       <input type="number" name="vl_result" style="font-size:120%" required />
                                      <br />
                                    
         </td> 
                                  <td>
                                      <p><strong>  *Expected Receive date at NHLS</strong></p>
                                   <br />
                        </td>
                                 <td>
                                      
                                       <input type="text" name="nhls_receive_date" id="datepicker11" style="font-size:120%" />
                                      <br />
                                    
         </td>   
                              </tr>
                                 
                              </table>
                           <h4>Result</h4>
                                      
                                    <p>* VL repeated and if  "> 5000" the sample should be shipped to NHLS. </p>
                                    <p>* VL repeated and if  " 5000" SEND message to 3rd line sectretary. </p>
                        
                          
                                                                                                                                                   <div class="form-actions no box">
                                                                                                                                                   <div class="span3">
               <button class="btn" style="padding:10px; font-size:180%"><a href="pih_p1.php?p">Cancel</a></button>                                                                                                                                    </div>
                                                                                                                                                   <div class="span3"><!--
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.
											
                                            </div>
                                            
                                            <div class="span3">
											<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="submit_vl_done">VL Done</button> 
                                            </div>
                          </div>
                         
                          <div class="form-actions yes box">
                                                                                                                                                   <div class="span3">
                                                                                                                                                   <button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="submit_vl_done">VL Done</button> 
                                                                                                                                               </div>
                                                                                                                                                   <div class="span3"><!--
											<button type="submit" class="btn btn-primary" style="padding:10px; font-size:180%">Save</button> -->.
											
                                            </div>
                                            
                                            <div class="span3">
											 <button class="btn" style="padding:10px; font-size:180%"><a href="pih_p1.php?p">Cancel</a></button>   
                                            </div>
                          </div>
    
    
                           
</form>

                                        <?php 
}
                                        
                                        ?>
                                        
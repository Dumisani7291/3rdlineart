<?php

if(isset($_POST['submit_treatment3'])){ 
	
    $patient_id= mysql_real_escape_string(htmlspecialchars($_GET['pat_id']));
    $tb_treat= mysql_real_escape_string(htmlspecialchars($_POST['tb_treat']));
    
     $insert_tb_treat=" INSERT  INTO  tb_treat (tb_treatment,pat_id)
                VALUES ('$tb_treat', '$patient_id')";

                mysql_query($insert_tb_treat, $bd);	

    
    if ($tb_treat=='Yes'){
        
        if(isset($_POST['regimen1_checked'])){ 
     
                $reg_name1= mysql_real_escape_string(htmlspecialchars($_POST['reg1']));
                $tbstart_date1=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date1'])); 
                $tbstop_date1=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date1'])); 
                $reason_o_changes1=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes1'])); 
            
                $reg_name12= mysql_real_escape_string(htmlspecialchars($_POST['reg12']));
                $tbstart_date12=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date12'])); 
                $tbstop_date12=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date12'])); 
                $reason_o_changes12=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes12'])); 
              
                $reg_name13= mysql_real_escape_string(htmlspecialchars($_POST['reg13']));
                $tbstart_date13=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date13'])); 
                $tbstop_date13=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date13'])); 
                $reason_o_changes13=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes13'])); 
              
                $reg_name14= mysql_real_escape_string(htmlspecialchars($_POST['reg14']));
                $tbstart_date14=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date14'])); 
                $tbstop_date14=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date14'])); 
                $reason_o_changes14=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes14'])); 
              
                $reg_name15= mysql_real_escape_string(htmlspecialchars($_POST['reg15']));
                $tbstart_date15=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date15'])); 
                $tbstop_date15=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date15'])); 
                $reason_o_changes15=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes15'])); 
              
            $insert_tb_treat_regimen1=" INSERT  INTO  tb_treat_regimen1
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name1', '$tbstart_date1', '$tbstop_date1', '$reason_o_changes1')";

                mysql_query($insert_tb_treat_regimen1, $bd);
            
            if ($reg_name12 !='' and $tbstart_date12 != '' and  $tbstop_date12 != ''){
                
            $insert_tb_treat_regimen12=" INSERT  INTO  tb_treat_regimen1
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name12', '$tbstart_date12', '$tbstop_date12', '$reason_o_changes12')";

                mysql_query($insert_tb_treat_regimen12, $bd);	
            }
            
            if ($reg_name13 !='' and $tbstart_date13 != '' and  $tbstop_date13 != ''){
                
            $insert_tb_treat_regimen13=" INSERT  INTO  tb_treat_regimen1
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name13', '$tbstart_date13', '$tbstop_date13', '$reason_o_changes13')";

                mysql_query($insert_tb_treat_regimen13, $bd);	
            }
            
            if ($reg_name14 !='' and $tbstart_date14 != '' and  $tbstop_date14 != ''){
                
            $insert_tb_treat_regimen14=" INSERT  INTO  tb_treat_regimen1
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name14', '$tbstart_date14', '$tbstop_date14', '$reason_o_changes14')";

                mysql_query($insert_tb_treat_regimen14, $bd);	
            }
            
            if ($reg_name15 !='' and $tbstart_date15 != '' and  $tbstop_date15 != ''){
                
            $insert_tb_treat_regimen15=" INSERT  INTO  tb_treat_regimen1
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name15', '$tbstart_date15', '$tbstop_date15', '$reason_o_changes15')";

                mysql_query($insert_tb_treat_regimen15, $bd);	
            }
           

    }
        if(isset($_POST['regimen2_checked'])){ 
     
                $reg_name2= mysql_real_escape_string(htmlspecialchars($_POST['reg2']));
                $tbstart_date2=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date2'])); 
                $tbstop_date2=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date2'])); 
                $reason_o_changes2=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes2']));
            
                $reg_name22= mysql_real_escape_string(htmlspecialchars($_POST['reg22']));
                $tbstart_date22=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date22'])); 
                $tbstop_date22=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date22'])); 
                $reason_o_changes22=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes22']));
            
                $reg_name23= mysql_real_escape_string(htmlspecialchars($_POST['reg23']));
                $tbstart_date23=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date23'])); 
                $tbstop_date23=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date23'])); 
                $reason_o_changes23=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes23']));
            
                $reg_name24= mysql_real_escape_string(htmlspecialchars($_POST['reg24']));
                $tbstart_date24=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date24'])); 
                $tbstop_date24=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date24'])); 
                $reason_o_changes24=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes24']));
            
                $reg_name25= mysql_real_escape_string(htmlspecialchars($_POST['reg25']));
                $tbstart_date25=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date25'])); 
                $tbstop_date25=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date25'])); 
                $reason_o_changes25=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes25']));
            
            $insert_tb_treat_regimen2=" INSERT  INTO  tb_treat_regimen2
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name2', '$tbstart_date2', '$tbstop_date2', '$reason_o_changes2')";

                mysql_query($insert_tb_treat_regimen2, $bd);
            
             if ($reg_name22 !='' and $tbstart_date22 != '' and  $tbstop_date22 != ''){
            
            $insert_tb_treat_regimen22=" INSERT  INTO  tb_treat_regimen2
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name22', '$tbstart_date22', '$tbstop_date22', '$reason_o_changes22')";

                mysql_query($insert_tb_treat_regimen22, $bd);
             } 
             if ($reg_name23 !='' and $tbstart_date23 != '' and  $tbstop_date23 != ''){
            
            $insert_tb_treat_regimen23=" INSERT  INTO  tb_treat_regimen2
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name23', '$tbstart_date23', '$tbstop_date23', '$reason_o_changes23')";

                mysql_query($insert_tb_treat_regimen23, $bd);
             } 
             if ($reg_name24 !='' and $tbstart_date24 != '' and  $tbstop_date24 != ''){
            
            $insert_tb_treat_regimen24=" INSERT  INTO  tb_treat_regimen2
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name24', '$tbstart_date24', '$tbstop_date24', '$reason_o_changes24')";

                mysql_query($insert_tb_treat_regimen24, $bd);
             } 
             if ($reg_name25 !='' and $tbstart_date25 != '' and  $tbstop_date25 != ''){
            
            $insert_tb_treat_regimen25=" INSERT  INTO  tb_treat_regimen2
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$reg_name25', '$tbstart_date25', '$tbstop_date25', '$reason_o_changes25')";

                mysql_query($insert_tb_treat_regimen25, $bd);
             }
            
    }
        if(isset($_POST['mdr_checked'])){ 
     
                $mdr= mysql_real_escape_string(htmlspecialchars($_POST['mdr']));
                $tbstart_date_mdr=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date_mdr'])); 
                $tbstop_date_mdr=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date_mdr'])); 
                $reason_o_changes_mdr=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes_mdr']));
             
                $mdr2= mysql_real_escape_string(htmlspecialchars($_POST['mdr2']));
                $tbstart_date_mdr2=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date_mdr2'])); 
                $tbstop_date_mdr2=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date_mdr2'])); 
                $reason_o_changes_mdr2=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes_mdr2']));
            
                $mdr3= mysql_real_escape_string(htmlspecialchars($_POST['mdr3']));
                $tbstart_date_mdr3=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date_mdr3'])); 
                $tbstop_date_mdr3=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date_mdr3'])); 
                $reason_o_changes_mdr3=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes_mdr3']));
            
                $mdr4= mysql_real_escape_string(htmlspecialchars($_POST['mdr4']));
                $tbstart_date_mdr4=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date_mdr4'])); 
                $tbstop_date_mdr4=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date_mdr4'])); 
                $reason_o_changes_mdr4=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes_mdr4']));
            
                $mdr5= mysql_real_escape_string(htmlspecialchars($_POST['mdr5']));
                $tbstart_date_mdr5=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date_mdr5'])); 
                $tbstop_date_mdr5=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date_mdr5'])); 
                $reason_o_changes_mdr5=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes_mdr5']));
            
            $insert_tb_treat_mdr=" INSERT  INTO  tb_treat_mdr
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$mdr', '$tbstart_date_mdr', '$tbstop_date_mdr', '$reason_o_changes_mdr')";

                mysql_query($insert_tb_treat_mdr, $bd);
            
             if ($mdr2 !='' and $tbstart_date_mdr2 != '' and  $tbstop_date_mdr2 != ''){
             
            $insert_tb_treat_mdr2=" INSERT  INTO  tb_treat_mdr
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$mdr2', '$tbstart_date_mdr2', '$tbstop_date_mdr2', '$reason_o_changes_mdr2')";

                mysql_query($insert_tb_treat_mdr2, $bd);
             
             }
      
             if ($mdr3 !='' and $tbstart_date_mdr3 != '' and  $tbstop_date_mdr3 != ''){
             
            $insert_tb_treat_mdr3=" INSERT  INTO  tb_treat_mdr
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$mdr3', '$tbstart_date_mdr3', '$tbstop_date_mdr3', '$reason_o_changes_mdr3')";

                mysql_query($insert_tb_treat_mdr3, $bd);
             
             }
      
             if ($mdr4 !='' and $tbstart_date_mdr4 != '' and  $tbstop_date_mdr4 != ''){
             
            $insert_tb_treat_mdr4=" INSERT  INTO  tb_treat_mdr
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$mdr4', '$tbstart_date_mdr4', '$tbstop_date_mdr4', '$reason_o_changes_mdr4')";

                mysql_query($insert_tb_treat_mdr4, $bd);
             
             }
      
             if ($mdr5 !='' and $tbstart_date_mdr5 != '' and  $tbstop_date_mdr5 != ''){
             
            $insert_tb_treat_mdr5=" INSERT  INTO  tb_treat_mdr
                (pat_id,reg_name,start_date,stop_date,reason_for_change)
                VALUES (
                '$patient_id', '$mdr5', '$tbstart_date_mdr5', '$tbstop_date_mdr5', '$reason_o_changes_mdr5')";

                mysql_query($insert_tb_treat_mdr5, $bd);
             
             }
    
    }
  
    /* $reg11= mysql_real_escape_string(htmlspecialchars($_POST['reg11']));
 	$reg21= mysql_real_escape_string(htmlspecialchars($_POST['reg21']));
	$mdr1=mysql_real_escape_string(htmlspecialchars($_POST['mdr1']));
	$tbstart_date1=mysql_real_escape_string(htmlspecialchars($_POST['tbstart_date1'])); 
	$tbstop_date1=mysql_real_escape_string(htmlspecialchars($_POST['tbstop_date1'])); 
	$reason_o_changes1=mysql_real_escape_string(htmlspecialchars($_POST['reason_o_changes1'])); 
    
  
$insert_tb_treatment=" INSERT  INTO  tb_treatment (pat_id,reg1,reg2,mdr,start_date,stop_date,reason_o_changes)
VALUES (
'$patient_id', '$reg11', '$reg21', '$mdr1', '$tbstart_date1', '$tbstop_date1', '$reason_o_changes1')";

mysql_query($insert_tb_treatment, $bd);	*/
        
    }
    
  
  
}

?>
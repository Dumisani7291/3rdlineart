<?php 

if(isset($_GET['lead'])){ 
	$rev_id = $_GET ['lead'];
	$form_id = $_GET ['formid'];

	$SQL_reviewer = "SELECT * FROM reviewer WHERE id=$rev_id";
	$reviewer = mysqli_query($bd,$SQL_reviewer);

	$row_reviewer = mysqli_fetch_array($reviewer);
	$rev_email_address = $row_reviewer['email'];
	$rev_title = $row_reviewer['title'];
	$rev_lname = $row_reviewer['lname'];


	echo '							
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p style="color:#30af0a"><strong>Notification Send!</strong> Reviews sent for Consolidation.</p>

	</div>';

	echo"<meta http-equiv=\"Refresh\" content=\"6; url=cp_p1.php?rev\">";   
}

?>

<form id="edit-profile" class="form-horizontal" action="#" method="post">

	<h2 style="background-color:#0eaff7; text-align:center; color:#000000">3rd Line Forms Under Review</h2>
	<hr style=" border: 1px solid #cbe509;" />

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th style="text-align:center"> <p><strong>FORM Id</strong></p></th>
				<th style="text-align:center"> <p><strong>Date Assigned</strong></p></th>   
				<th class="td-actions" style="text-align:center"><p><strong>Reviewer 1</strong></p> </th>
				<th class="td-actions" style="text-align:center"><p><strong>Reviewer 2</strong></p> </th>
				<th class="td-actions" style="text-align:center"><p><strong>Reviewer 3</strong></p> </th>
				<th class="td-actions" style="text-align:center"><p><strong>Team Lead</strong></p> </th>

			</tr>
		</thead>
		<tbody>

			<?php

			$assigned_forms=mysqli_query( $bd,"SELECT distinct form_id,date_assigned FROM assigned_forms WHERE form_id not in (select form_id from expert_review_consolidate1) ORDER BY `assigned_forms`.`form_id` DESC"); 

			while ($row_assigned_forms=mysqli_fetch_array($assigned_forms)) {
				$form_id =$row_assigned_forms['form_id'];
				$date_assigned =$row_assigned_forms['date_assigned'];

				echo '
				<tr>
					<td> <p style="text-align:center"><strong> 3rdLForm#'.$form_id.'</strong></p> </td>
					<td> <p style="text-align:center"><strong>'.$date_assigned.'</strong></p> </td>
					';

					$assigned=mysqli_query( $bd,"SELECT rev_id, status FROM assigned_forms where form_id='$form_id'"); 

					$assigned_count=mysqli_query( $bd,"SELECT rev_id, status FROM assigned_forms where form_id='$form_id' and status ='Reviewed'");

					$complete_review = mysqli_num_rows ($assigned_count);

					$select_team_lead=mysqli_query( $bd,"SELECT reviewer_team_lead.rev_id, reviewer.title, reviewer.fname, reviewer.lname FROM reviewer_team_lead, reviewer where reviewer_team_lead.form_id='$form_id' and reviewer_team_lead.rev_id =reviewer.id");
					$row_team_lead=mysqli_fetch_array($select_team_lead);

					$team_leader_id = $row_team_lead ['0'];
					$team_leader_name = $row_team_lead ['1'].'. '.$row_team_lead ['2'].' '.$row_team_lead ['3'] ;

					while ($row_assigned=mysqli_fetch_array($assigned)){
						$rev_id =$row_assigned['rev_id']; 
						$rev_status =$row_assigned['status']; 

						$select_reviewer=mysqli_query( $bd,"SELECT * FROM reviewer where id='$rev_id'"); 
						$row_select_reviewer=mysqli_fetch_array($select_reviewer);

						$rev_fname =$row_select_reviewer['fname']; 
						$rev_lname =$row_select_reviewer['lname']; 
						$rev_title =$row_select_reviewer['title']; 

						$rev_fullname = $rev_title.'.  '.$rev_fname.' '.$rev_lname;

						if ($rev_status=='Not Reviewed'){
							echo '
							<td class="td-actions" > <p><u>'.$rev_fullname.'</u></p><a href="#" class="btn btn-small btn-warning" disabled="disabled"><i class="btn-icon-only icon-ok"> Not Reviewed </i></a></td>
							';
						}

						else {
							echo '
							<td class="td-actions"> <p><u>'.$rev_fullname.'</u></p><a href="#" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> Reviewed </i></a></td>
							';
						}
					}

					if ($complete_review >='3'){
						echo ' 
						<td class="td-actions"><a href="cp_p1.php?rev&lead='.$team_leader_id.'&formid='.$form_id.'" class="btn btn-large btn-invert" style="color:#f00"><i class="btn-icon-only icon-ok"> '. $team_leader_id.'Notify Lead Expert </i></a></td>
					</tr>';
				}

				else {
					echo ' <td class="td-actions"> <h4>'.$team_leader_name.'</h4>   </td>';   
				}
			}
			?>
		</tbody>
	</table>
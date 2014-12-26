<div class="panel panel-default">
  <div class="panel-heading"><h3>Borrower Information</h3></div>
  <div class="panel-heading">
  	<a href="#" class="fa fa-fw fa-refresh" onclick="window.location.reload( true );" data-toggle="tooltip" data-placement="bottom" title="Refresh"></a>
  	<a href="<?php echo base_url().'borrower/edit/'.$borrower[0]['borrower_id']; ?>" class="fa fa-fw fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit Borrower"></a>
	<a href="<?php echo base_url().'loan/index/'.$borrower[0]['borrower_id']; ?>" class="fa fa-fw fa-folder-open-o" data-toggle="tooltip" data-placement="bottom" title="Start Loan"></a>

  </div>
  <div class="panel-body">
	<div class="box">
	    <div class="box-body table-responsive">
			<table id='tab1' class='table table-bordered table-striped'>
				<thead>
					<tr>
					  	<th>Borrower Id</th>
					  	<th>First Name</th>
					  	<th>Last Name</th>
					  	<th>Date of birth</th>
					  	<th>Mobile</th>
					  	<th>Email</th>
					  	<th>Address</th>
					  	<th>City</th>
					  	<th>Gender</th>						  			
					</tr>
				</thead>
				<tbody>
					<?php
						if(!isset($borrower)):
							echo "<tr><td colspan='11' align='center'>No Record Found!</td></tr>";
						else :
						foreach ($borrower as $row)
						{
					?>					
					<tr>
					  	<td><?php echo "B00".$row['borrower_id']; ?></td>
					  	<td><?php echo $row['firstname']; ?></td>
					  	<td><?php echo $row['lastname']; ?></td>
					  	<td><?php echo $row['dob']; ?></td>
					  	<td><?php echo $row['mobile']; ?></td>
					  	<td><?php echo $row['email']; ?></td>
					  	<td><?php echo $row['address']; ?></td>
					  	<td><?php echo $row['city']; ?></td>
					  	<td><?php echo $row['gender']; ?></td>				  	
					</tr>		
					<?php } endif; ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- .loan list-->
	<div class="box">
	    <div class="box-header">
	        <h3 class="box-title">Taken Loan List</h3>
	    </div><!-- /.box-header -->
	    <div class="box-body table-responsive">
			<table id='tab1' class='table table-bordered table-striped'>
				<thead>
					<tr>
					  	<th>Loan Id</th>
					  	<th>Borrorwer Id</th>
					  	<th>Loan Amount</th>
					  	<th>Rate</th>
					  	<th>Start Date</th>
					  	<th>Installment Duration(days)</th>
					  	<th>Note</th>
					  	<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if(!isset($takenloan)):
							echo "<tr><td colspan='11' align='center'>No Record Found!</td></tr>";
						else :
						foreach ($takenloan as $tloan)
						{
					?>					
					<tr>
					  	<td><?php echo "L00".$tloan['loan_id']; ?></td>
					  	<td><?php echo "B00".$tloan['borrower_id']; ?></td>
					  	<td><?php echo $tloan['amount']; ?></td>
					  	<td><?php echo $tloan['rate']; ?></td>
					  	<td><?php echo $tloan['start_date']; ?></td>
					  	<td><?php echo $tloan['installment_duration']; ?></td>
					  	<td><?php echo $tloan['note']; ?></td>
						<td>
							<?php 
								if($tloan['status']=="1") {
									echo '<span class="label label-success">Active</span>';
								}
								else {
									echo '<span class="label label-danger">Deactive</span>';
								}
							?>
						</td>				  	
					</tr>		
					<?php } endif; ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /.loan list-->	

	<!-- .installment list-->
	<div class="box">
	    <div class="box-header">
	        <h3 class="box-title">Installment List</h3>
	    </div><!-- /.box-header -->
	    <div class="box-body table-responsive">
			<table id='tab1' class='table table-bordered table-striped'>
				<thead>
					<tr>
					  	<th>Installment Id</th>
					  	<th>Loan Id</th>
					  	<th>Borrorwer Id</th>
					  	<th>Pay Amount</th>
					  	<th>Paid Amount</th>
					  	<th>Paid Date</th>
					</tr>
				</thead>
				<tbody>
				<?php
					if(empty($installment)):
						echo "<tr><td colspan='7' align='center'>No Record Found!</td></tr>";
					else :
					foreach ($installment as $insta)
					{
				?>
				<tr>
				  	<td><?php echo "I00".$insta['insta_id'];?></td>
				  	<td><?php echo "L00".$insta['loan_id'];?></td>
				  	<td><?php echo "B00".$insta['borrower_id'];?></td>
				  	<td><?php echo $insta['pay_amount'];?></td>
				  	<td><?php echo $insta['paid_amount'];?></td>
				  	<td><?php echo $insta['paid_date'];?></td>
				</tr>
				<?php } endif; ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /.installment list-->
	<!-- .loan transaction list-->
	<div class="box">
	    <div class="box-header">
	        <h3 class="box-title">Loan Transaction List</h3>
	    </div><!-- /.box-header -->
	    <div class="box-body table-responsive">
			<table id='tab1' class='table table-bordered table-striped'>
				<thead>
					<tr>
					    <th>Transaction Id</th>
					  	<th>Installment Id</th>
					  	<th>Loan Id</th>
					  	<th>Borrorwer Id</th>
					  	<th>Amount</th>
					  	<th>Final Amount</th>
					  	<th>Reason</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if(empty($ltxn)):
							echo "<tr><td colspan='7' align='center'>No Record Found!</td></tr>";
						else :
						foreach ($ltxn as $loanxn)
						{
					?>
					<tr>
					  	<td><?php echo "T00".$loanxn['lt_id'];?></td>
					  	<td><?php echo "I00".$loanxn['insta_id'];?></td>
					  	<td><?php echo "L00".$loanxn['loan_id'];?></td>
					  	<td><?php echo "B00".$loanxn['borrower_id'];?></td>
					  	<td><?php echo $loanxn['amount'];?></td>
					  	<td><?php echo $loanxn['final_amount'];?></td>
					  	<td><?php echo $loanxn['reason'];?></td>
					</tr>
					<?php } endif; ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /.loan transaction list-->	
  </div>
</div>
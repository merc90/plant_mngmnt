<style type="text/css">
	#btnIcon {
		width: 50px;
		padding: 2px;
		margin: 0px;
	}
</style>
<div id="page-wrapper">
<div id="myTabContent" class="tab-content">
<div class="">
<div class="pull-left">
	<h2>Party</h2>
</div>

<div class="pull-right">
		<a id="add-party" href="#modal-add-party" role="button" data-toggle="modal"><button type="button" class="btn btn-outline btn-lg btn-maroon ">Add New Party</button></a>
</div>
</div>

<table id="party_list_table" class="display table table-striped table-hover">
	 <thead>
		  <tr>
				<th>Party Name</th>
				<th>Phone Number</th>
				<th>Email ID</th>
				<th>Address</th>
				<th>Tin Vat</th>
				<th>Action</th>
		  </tr>
	 </thead>
	 <tbody>
	 <?php foreach($partyList as $party) { ?>
		  <tr>
				<td><?php echo $party['partyName']; ?></td>
				<td><?php echo $party['phoneNo']; ?></td>
				<td><?php echo $party['emailID']; ?></td>
				<td><?php echo $party['address']; ?></td>
				<td><?php echo $party['tinVat']; ?></td>
				<td width="25%">
				<!-- <div class="btn-group">
	                    <a id="edit-party-<?php echo $party['partyID'];?>" href="#modal-edit-party" role="button" class="edit-admin"  data-idvalue="<?php echo $party['partyID'];?>" data-toggle="modal">
								Edit
							</a>
	                    
	                
	            </div> -->
	            <div class="btn-group">
	                <button type="button" id="btnIcon" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
	                <i class="fa fa-ellipsis-h"></i>
	                </button>
	                <ul class="dropdown-menu pull-right" role="menu">
	                    <li>
	                    	<a id="edit-party-<?php echo $party['partyID'];?>" href="#modal-edit-party" role="button" class="edit-admin"  data-idvalue="<?php echo $party['partyID'];?>" data-toggle="modal">
								Edit
							</a>
	                    </li>
	                    <li>
	                    	<a id="edit-party-<?php echo $party['partyID'];?>" href="<?php echo base_url(); ?>reports_party/index/<?php echo $party['partyID'];?>" role="button" class="edit-admin"  data-idvalue="<?php echo $party['partyID'];?>" data-toggle="modal">
								View Report
							</a>
	                    </li>
	                </ul>
	            </div>
				</td>
		 </tr>
	 <?php } ?>

	 </tbody>
</table>

<br /><br /><br />


<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>datatable/media/css/jquery.dataTables.css" />



<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>datatable/media/js/jquery.dataTables.js"></script>


<script>
$(document).ready( function () {
	 $('#party_list_table').DataTable();

} );

</script>

</div>
</div>

<!-- ######## Add party Section #############-->


<div class="modal fade" id="modal-add-party" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content " id="add_party_modal">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h3 class="modal-title" id="myModalLabel">
								Add New Party
							</h3>
						</div>
						<div class="modal-body"  id="Add_party_body">
							<div class="container-fluid">
				<?php
					$attributes = array('class' => 'form-horizontal','role' => 'form', 'id' => 'addPartyForm');
					echo form_open('/manage_party/addParty/', $attributes);
				?>

									<div class="form-group">
										<label for="partyName" class="col-sm-3 control-label">Party Name</label>
										<div class="col-md-8">
											 <input class="form-control" id="partyName" type="text" name="partyName" required="required" />
										</div>
									</div>
									<div class="form-group">
										<label for="phoneNo" class="col-sm-3 control-label">Phone Number</label>
										<div class="col-md-8">
										<input class="form-control" id="phoneNo" type="text" name="phoneNo" required="required" />
										</div>
									</div>
									<div class="form-group">
										<label for="emailID" class="col-sm-3 control-label">Email ID</label>
										<div class="col-md-8">
										<input class="form-control" id="emailID" type="text" name="emailID" required="required" />
										</div>
									</div>
									<div class="form-group">
										<label for="address" class="col-sm-3 control-label">Address</label>
										<div class="col-md-8">
										<input class="form-control" id="address" type="text" name="address" required="required" />
										</div>
									</div>
									<div class="form-group">
										<label for="tinVat" class="col-sm-3 control-label">Tin Vat</label>
										<div class="col-md-8">
										<input class="form-control" id="tinVat" type="text" name="tinVat" required="required" />
										</div>
									</div>
									<div class="form-group">
										 <label for="adminRole" class="col-sm-3 control-label"></label>
										 <div class="col-md-8">
											<button type="submit" class="btn btn-maroon pull-right">Submit</button>
										 </div>
									</div>
							<?php
								echo form_close();
							?>
							</div>
						</div>

					</div>

				</div>

</div>

<!--######### Add Party Section Over ##################-->



<!--####### Edit Party Section ######################-->

<div class="modal fade" id="modal-edit-party" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content " id="edit_party_modal">
			<div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">
					Edit Party
				</h3>
			</div>
			<div class="modal-body">
				<div class="col-md-6 column">
					<iframe id="edit_party_frame" name="edit_party_frame" src="" width="520" height="280" frameborder="no" ></iframe>
				</div>
			</div>
		</div>
	</div>

</div>
<!--############## Edit Party Section Over ###############-->
</div>

<script>


$( document ).ready(function() {

	$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})


	$('.close').click(function () {
	    window.location.href = "manage_party";
	});


	$(".edit-admin").click(function(){
		partyID = $(this).data("idvalue")
		document.getElementById("edit_party_frame").src = "<?php echo site_url(); ?>/edit_party/index/"+partyID;
	});



});

</script>
<style type="text/css">
	#add_party_modal {
		height : 380px;
	}
	#edit_party_modal {
		height : 400px;
	}
</style>

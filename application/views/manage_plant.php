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
	<h2>Manufacturing Plant</h2>
</div>

<div class="pull-right">
		<a id="add-plant" href="#modal-add-plant" role="button" data-toggle="modal"><button type="button" class="btn btn-outline btn-lg btn-maroon ">Add New Plant</button></a>
</div>
</div>

<table id="plant_list_table" class="display table table-striped table-hover">
	 <thead>
		  <tr>
				<th>Plant Name</th>
				<th>Contact Number</th>
				<th>Plant Description</th>
				<th>Plant Address</th>
				<th>Plant Location</th>
				<th>Action</th>
		  </tr>
	 </thead>
	 <tbody>
	 <?php foreach($plantList as $plant) { ?>
		  <tr>
				<td><?php echo $plant['plantName']; ?></td>
				<td><?php echo $plant['contactNo']; ?></td>
				<td><?php echo $plant['plantDescription']; ?></td>
				<td><?php echo $plant['plantAddress']; ?></td>
				<td><?php echo $plant['plantLocation']; ?></td>
			<td width="25%">
				<div class="btn-group">
	                    <a id="edit-plant-<?php echo $plant['plantID'];?>" href="#modal-edit-plant" role="button" class="edit-admin"  data-idvalue="<?php echo $plant['plantID'];?>" data-toggle="modal">
								Edit
							</a>
	                    
	                
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
	 $('#plant_list_table').DataTable();

} );

</script>

</div>
</div>

<!-- ######## Add plant Section #############-->


<div class="modal fade" id="modal-add-plant" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content " id="add_plant_modal">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h3 class="modal-title" id="myModalLabel">
								Add New Plant
							</h3>
						</div>
						<div class="modal-body"  id="Add_plant_body">
							<div class="container-fluid">
				<?php
					$attributes = array('class' => 'form-horizontal','role' => 'form', 'id' => 'addPlantForm');
					echo form_open('/manage_plant/addPlant/', $attributes);
				?>

									<div class="form-group">
										<label for="plantName" class="col-sm-3 control-label">Plant Name</label>
										<div class="col-md-8">
											 <input class="form-control" id="plantName" type="text" name="plantName" required="required" />
										</div>
									</div>
									<div class="form-group">
										<label for="contactNo" class="col-sm-3 control-label">Contact Number</label>
										<div class="col-md-8">
										<input class="form-control" id="contactNo" type="text" name="contactNo" required="required" />
										</div>
									</div>
									<div class="form-group">
										<label for="plantDescription" class="col-sm-3 control-label">Plant Description</label>
										<div class="col-md-8">
										<input class="form-control" id="plantDescription" type="text" name="plantDescription" required="required" />
										</div>
									</div>
									<div class="form-group">
										<label for="plantAddress" class="col-sm-3 control-label">Plant Address</label>
										<div class="col-md-8">
										<input class="form-control" id="plantAddress" type="text" name="plantAddress" required="required" />
										</div>
									</div>
									<div class="form-group">
										<label for="plantLocation" class="col-sm-3 control-label">Plant Location</label>
										<div class="col-md-8">
										<input class="form-control" id="plantLocation" type="text" name="plantLocation" required="required" />
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

<!--######### Add Plant Section Over ##################-->



<!--####### Edit Plant Section ######################-->

<div class="modal fade" id="modal-edit-plant" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content " id="edit_plant_modal">
			<div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">
					Edit Plant
				</h3>
			</div>
			<div class="modal-body">
				<div class="col-md-6 column">
					<iframe id="edit_plant_frame" name="edit_plant_frame" src="" width="520" height="280" frameborder="no" ></iframe>
				</div>
			</div>
		</div>
	</div>

</div>
<!--############## Edit Plant Section Over ###############-->
</div>

<script>


$( document ).ready(function() {

	$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})


	$('.close').click(function () {
	    window.location.href = "manage_plant";
	});


	$(".edit-admin").click(function(){
		plantID = $(this).data("idvalue")
		document.getElementById("edit_plant_frame").src = "<?php echo site_url(); ?>/edit_plant/index/"+plantID;
	});



});

</script>
<style type="text/css">
	#add_plant_modal {
		height : 380px;
	}
	#edit_plant_modal {
		height : 400px;
	}
</style>

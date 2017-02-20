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
	<h2>Admins</h2>
</div>

<div class="pull-right">
		<a id="add-admin" href="#modal-add-admin" role="button" data-toggle="modal"><button type="button" class="btn btn-outline btn-lg btn-maroon ">Add New Admin</button></a>
</div>
</div>

<table id="admin_user_list_table" class="display table table-striped table-hover">
	 <thead>
		  <tr>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Actions</th>
		  </tr>
	 </thead>
	 <tbody>
	 <?php foreach($all_admins as $admin) { ?>
	  	<tr>
			<td><?php echo $admin['adminName']; ?></td>
			<td><?php echo $admin['adminEmail']; ?></td>
			<td><?php echo $admin['adminRole']; ?></td>
			<td width="25%">
				<div class="btn-group">
	                <button type="button" id="btnIcon" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
	                <i class="fa fa-ellipsis-h"></i>
	                </button>
	                <ul class="dropdown-menu pull-right" role="menu">
	                    <li><a id="edit-admin-<?php echo $admin['adminID'];?>" href="#modal-edit-admin" role="button" class="edit-admin"  data-idvalue="<?php echo $admin['adminID'];?>" data-toggle="modal">
								Edit
							</a>
	                    </li>
	                    <li><a id="reset-pass-<?php echo $admin['adminID'];?>" href="javascript:void(0);" role="button" class="admin-reset-password"  data-idvalue="<?php echo $admin['adminID'];?>">
								Reset Password
							</a>
	                    </li>
	                    <?php if($admin['isBlocked'] == 0) { ?>
							<li><a id="block-admin-user-<?php echo $admin['adminID'];?>" href="javascript:void(0);" role="button" class="block-admin-user"  data-idvalue="<?php echo $admin['adminID'];?>">
									Block
								</a>
							</li>
						<?php } else { ?>
							<li><a id="unblock-admin-user-<?php echo $admin['adminID'];?>" href="javascript:void(0);" role="button" class="unblock-admin-user"  data-idvalue="<?php echo $admin['adminID'];?>">
									UnBlock
								</a>
							</li>
						<?php } ?>
						<?php if($admin['adminRole'] == "Salesman") { ?>
							<li><a id="edit-limit-<?php echo $admin['adminID'];?>" href="#modal-edit-limit" role="button" class="edit-limit"  data-idvalue="<?php echo $admin['adminID'];?>" data-toggle="modal">
									Edit Limit
								</a>
							</li>
						<?php } ?>
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
	 $('#admin_user_list_table').DataTable();

	 $('#adminRole').change(function (e) {
        var target = document.getElementById("adminRole");
        var adminID = target.options[target.selectedIndex].text;
        $("#adminStock").show();
        $("#adminOrder").show();
        if(adminID=="ADMIN" || adminID=="SUPER_ADMIN")
        {
        	$("#adminStockY").prop( "checked", true );
    	    $("#adminOrderY").prop( "checked", true );
    	    $("#adminStockN").prop( "checked", false );
      	    $("#adminOrderN").prop( "checked", false );
        }
        else
        if(adminID=="Salesman" || adminID=="Compliance")
        {
        	$("#adminStockY").prop( "checked", false );
    	    $("#adminOrderY").prop( "checked", false );
    	    $("#adminStockN").prop( "checked", true );
      	    $("#adminOrderN").prop( "checked", true );
        }	
      });
} );

</script>

</div>
</div>




<!-- ######## Add Admin Section #############-->


<div class="modal fade" id="modal-add-admin" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content add-admin-content" id="add_admin_modal">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h3 class="modal-title" id="myModalLabel">
								Add New Admin
							</h3>
						</div>
						<div class="modal-body"  id="Add_admin_body">
							<div class="container-fluid">

				<?php
					$attributes = array('class' => 'form-horizontal','role' => 'form', 'id' => 'addAdminForm');
					echo form_open('', $attributes);
				?>

									<div class="form-group">
										<label for="adminName" class="col-sm-3 control-label">Name</label>
										<div class="col-md-8">
											 <input class="form-control" id="adminName" type="text" name="adminName" required="required" />
										</div>
									</div>
									<div class="form-group">
										<label for="adminEmail" class="col-sm-3 control-label">Email address</label>
										<div class="col-md-8">
										<input class="form-control" id="adminEmail" type="email" name="adminEmail" required="required" />
											<span class="error alert-error" id="email_error"></span>
										</div>
									</div>
									<div class="form-group">
										<label for="address" class="col-sm-3 control-label">Address</label>
										<div class="col-md-8">
										<input class="form-control" id="address" type="text" name="address" required="required" />
										</div>
									</div>
									<div class="form-group">
										<label for="mobileNo" class="col-sm-3 control-label">Phone number</label>
										<div class="col-md-8">
										<input class="form-control" id="mobileNo" type="tel" name="mobileNo" required="required" />
										</div>
									</div>

									<div class="form-group">
										<label for="adminRole" class="col-sm-3 control-label">Role</label>
										<div class="col-md-8">
										<select name="adminRole" id="adminRole" class="selectpicker" style="width:100%;">
											<option value="Select">Select</option>
											<?php foreach($adminRolesList as $roles) { ?>
											 <option value="<?php echo $roles['roleID']; ?>"><?php echo $roles['role']; ?></option>
											 <?php } ?>
										  </select>
										</div>
									</div>
									<div class="form-group" id="adminOrder" hidden>
										<label for="adminOrder" class="col-sm-3 control-label">Order placing rights</label>
										<div class="col-md-8">
											<input type="radio" id="adminOrderY" name="adminOrder" value="Yes" disabled> YES &nbsp;&nbsp;
											<input type="radio" id="adminOrderN" name="adminOrder" value="No" disabled> NO<br>
										<!-- <input class="form-control" id="adminOrder" type="tel" name="adminOrder" required="required" /> -->
										</div>
									</div>
									<div class="form-group" id="adminStock" hidden>
										<label for="adminStock" class="col-sm-3 control-label">Stock maintainance rights</label>
										<div class="col-md-8">
											<input type="radio" id="adminStockY" name="adminStock" value="Yes" disabled> YES &nbsp;&nbsp;
											<input type="radio" id="adminStockN" name="adminStock" value="No" disabled> NO<br>
										<!-- <input class="form-control" id="adminStock" type="tel" name="adminStock" required="required" /> -->
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

<!--######### Add Admin Section Over ##################-->



<!--####### Edit Admin Section ######################-->

<div class="modal fade" id="modal-edit-admin" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content add-admin-content" id="edit_admin_modal">
			<div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">
					Edit Admin
				</h3>
			</div>
			<div class="modal-body">
				<div class="col-md-6 column">
					<iframe id="edit_admin_frame" name="edit_admin_frame" src="" width="520" height="280" frameborder="no" ></iframe>
				</div>
			</div>
		</div>
	</div>

</div>
<!--############## Edit Admin Section Over ###############-->

<!--############ Edit Limit Section ######################-->

<div class="modal fade" id="modal-edit-limit" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content add-admin-content" id="edit_limit_modal">
			<div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">
					Edit Limit
				</h3>
			</div>
			<div class="modal-body">
				<div class="col-md-6 column">
					<iframe id="edit_limit_frame" name="edit_limit_frame" src="" width="520" height="280" frameborder="no" ></iframe>
				</div>
			</div>
		</div>
	</div>

</div>
<!--############## Edit Limit Section Over ###############-->
</div>



<script>


$( document ).ready(function() {

	$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})


	$('.close').click(function () {
	    window.location.href = "manage_admins";
	});


	$(".edit-admin").click(function(){
		adminID = $(this).data("idvalue")
		document.getElementById("edit_admin_frame").src = "<?php echo site_url(); ?>/edit_admin/editAdmin/"+adminID;
	});

	$(".edit-limit").click(function(){
		adminID = $(this).data("idvalue")
		document.getElementById("edit_limit_frame").src = "<?php echo site_url(); ?>/edit_admin/editLimit/"+adminID;
	});



});

</script>
<style type="text/css">
	#add_admin_modal {
		height : 525px;
	}
	#edit_admin_modal {
		height : 400px;
	}
	#edit_limit_modal {
		height : 400px;
	}
</style>

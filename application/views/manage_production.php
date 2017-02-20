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
	<h2>Production</h2>
</div>

<div class="pull-right">
		<a id="add-production" href="#modal-add-production" role="button" data-toggle="modal"><button type="button" class="btn btn-outline btn-lg btn-maroon ">Add New Production</button></a>
</div>
</div>

<table id="order_list_table" class="display table table-striped table-hover">
	 <thead>
		  <tr>
				<th>Plant Name</th>
				<th>Date From</th>
				<th>Date To</th>
				<th>Target Of Production</th>
				<th>Produced Amount</th>
				<th>Deviation</th>
				<th>Rate of Target Production Per Day</th>
				<th>Rate of Produced Amount Per Day</th>
				<th>Deviation Per Day</th>
				<th></th>
		  </tr>
	 </thead>
	 <tbody>
	 <?php $i=1; foreach($productionList as $production) { ?>
		  <tr>
				<td id="plantID<?php echo $i; ?>"><?php echo $production['plantName']; ?></td>
				<td id="dateFrom<?php echo $i; ?>"><?php echo $production['dateFrom']; ?></td>
				<td id="dateTo<?php echo $i; ?>"><?php if($production['dateTo']=="0000-00-00")echo " - - ";else echo $production['dateTo']; ?></td>
				<td id="targetOfProduction<?php echo $i; ?>"><?php echo $production['targetOfProduction']; ?></td>
				<td id="producedAmount<?php echo $i; ?>"><?php echo $production['producedAmount']; ?></td>
				<td id="deviation<?php echo $i; ?>"><?php echo $production['deviation']; ?></td>
				<td id="rateOfTPPerDay<?php echo $i; ?>"><?php echo $production['rateOfTPPerDay']; ?></td>
				<td id="rateOfPAPerDay<?php echo $i; ?>"><?php echo $production['rateOfPAPerDay']; ?></td>
				<td id="rateOfDeviationPerDay<?php echo $i; $i++;?>"><?php echo $production['rateOfDeviationPerDay']; ?></td>
			<td >
			<div class="btn-group">
	                <button type="button" id="btnIcon" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
	                <i class="fa fa-ellipsis-h"></i>
	                </button>
	                <ul class="dropdown-menu pull-right" role="menu">
	                    <li>
	                    	<a id="edit-target-<?php echo $production['mproductID'];?>" href="#modal-edit-target" role="button" class="edit-target"  data-idvalue="<?php echo $production['mproductID'];?>" data-toggle="modal">
								Edit Target
						</a>
	                    </li>
	                    <li>
	                    	<a id="edit-production-<?php echo $production['mproductID'];?>" href="#modal-edit-production" role="button" class="edit-production"  data-idvalue="<?php echo $production['mproductID'];?>" data-toggle="modal">
								Edit Production
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
	$('#order_list_table').DataTable();
	
	var di=0;
	var countProduct=<?php echo count($productList); ?>;
	function divCheck(){
		if(di>=countProduct)
		{
			$("#addProductDiv").hide();
		}
	}
	divCheck();
	
	$('#order_list_table').DataTable();
	$("#addProduct").click(function(){
	 	di++;
	 	var d='<div class="form-group">'+
										'<label for="product'+di+'" class="col-sm-3 control-label">Product</label>'+
										'<div class="col-md-8">'+
										'<select name="product'+di+'" id="product'+di+'" class="selectpicker" style="width:100%;">'+
											'<option value="Select">Select</option>'+
											'<?php $i=0; foreach($productList as $product) { ?>'+
											 '<option id="<?php echo $i; ?>" value="<?php echo $product["productID"]; ?>"><?php echo $product["productName"]; ?></option>'+
											 '<?php $i++;} ?>'+
										  	'</select>'+
										'</div>'+
									'</div><div class="form-group">'+
										'<label for="quantity'+di+'" class="col-sm-3 control-label">Quantity</label>'+
										'<div class="col-md-8">'+
										'<input class="form-control quan" id="quantity'+di+'" placeholder="" type="text" name="quantity'+di+'" required="required" />'+
										'</div>'+
									'</div>';
	 	$("#productDiv").append(d);
	 	$("#totalProducts").val(di);
	 	$("#add_production_modal").height($("#add_production_modal").height()+95);
	 	divCheck();
	 });
$('.quan').change(function(){
		alert("Harshad");
	});
} );

</script>

</div>
</div>

<!-- ######## Add production Section #############-->


<div class="modal fade" id="modal-add-production" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content " id="add_production_modal">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h3 class="modal-title" id="myModalLabel">
								Add New Production
							</h3>
						</div>
						<div class="modal-body"  id="Add_production_body">
							<div class="container-fluid">
				<?php
					$attributes = array('class' => 'form-horizontal','role' => 'form', 'id' => 'addProductionForm');
					echo form_open('/manage_production/addProduction/', $attributes);
				?>

									<div class="form-group">
										<label for="plantID" class="col-sm-3 control-label">Plant Name</label>
										<div class="col-md-8">
											<select name="plantID" id="plantID" class="selectpicker" style="width:100%;">
											<option value="Select">Select</option>
											<?php $i=0; foreach($plantList as $plant) { ?>
											 <option id="<?php echo $i; $i++; ?>" value="<?php echo $plant['plantID']; ?>"><?php echo $plant['plantName']; ?></option>
											 <?php } ?>
										  	</select>
										</div>
									</div>
									<div class="form-group">
										<label for="dateFrom" class="col-sm-3 control-label">Date From</label>
										<div class="col-md-8">
										<input class="form-control" id="dateFrom" type="date" name="dateFrom"  required="required" />
										</div>
									</div>
									
									<div class="form-group">
										<label for="targetOfProduction" class="col-sm-3 control-label">Total Target Of Production</label>
										<div class="col-md-8">
										<input class="form-control" id="targetOfProduction" type="text" placeholder="" name="targetOfProduction"  required="required" />
										</div>
									</div>
									<div class="form-group" hidden>
										<label for="totalProducts" class="col-sm-3 control-label">Total Products</label>
										<div class="col-md-8">
										<input class="form-control" id="totalProducts" type="text" name="totalProducts" required="required" />
										</div>
									</div>
									<div id="productDiv">
									</div>
									<div id="addProductDiv">
										<a id="addProduct" style="float:right;">Add Product</a>
										
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

<!--######### Add Production Section Over ##################-->



<!--####### Edit Production Section ######################-->

<div class="modal fade" id="modal-edit-production" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content " id="edit_production_modal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">
					Edit Production
				</h3>
			</div>
			<div class="modal-body">
				<div class="col-md-6 column">
					<iframe id="edit_production_frame" name="edit_production_frame" src="" width="520" height="280" frameborder="no" ></iframe>
				</div>
			</div>
		</div>
	</div>

</div>
<!--############## Edit production Section Over ###############-->


<!--####### Edit Target Section ######################-->

<div class="modal fade" id="modal-edit-target" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content " id="edit_target_modal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">
					Edit Target
				</h3>
			</div>
			<div class="modal-body">
				<div class="col-md-6 column">
					<iframe id="edit_target_frame" name="edit_target_frame" src="" width="520" height="280" frameborder="no" ></iframe>
				</div>
			</div>
		</div>
	</div>

</div>
<!--############## Edit Target Section Over ###############-->

</div>

<script>


$( document ).ready(function() {

	$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})


	$('.close').click(function () {
	    window.location.href = "manage_production";
	});


	$(".edit-target").click(function(){
		productionID = $(this).data("idvalue");
		document.getElementById("edit_target_frame").src = "<?php echo site_url(); ?>/edit_production/editTarget/"+productionID;
	});


	$(".edit-production").click(function(){
		productionID = $(this).data("idvalue");
		document.getElementById("edit_production_frame").src = "<?php echo site_url(); ?>/edit_production/editProduction/"+productionID;
	});



});

</script>
<style type="text/css">
	#add_production_modal {
		height : 400px;
	}
	#edit_production_modal {
		height : 400px;
	}
	#edit_target_modal {
		height : 400px;
	}
</style>

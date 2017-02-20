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
	<h2>Current Orders</h2>
</div>

<div class="pull-right">
		<a id="add-order" href="#modal-add-order" role="button" data-toggle="modal"><button type="button" class="btn btn-outline btn-lg btn-maroon ">Add New Order</button></a>
</div>
</div>

<table id="order_list_table_current" class="display table table-striped table-hover">
	 <thead>
		  <tr>
				<th>Order Id</th>
				<th>Date Of Order</th>
				<th>Party Name</th>
				<th>Destination</th>
				<th>Full Delivery Address</th>
				<th>Status</th>
				<th>Passed By</th>
				<th>Total Quantity</th>
				<th>Action</th>
		  </tr>
	 </thead>
	 <tbody>
	 	
	 <?php foreach($orderCurrentList as $order) { ?>
		<tr>
			<td><?php echo $order['orderID']; ?></td>
			<td><?php echo $order['dateOfOrder']; ?></td>
			<td><?php echo $order['partyID']; ?></td>
			<td><?php echo $order['destination']; ?></td>
			<td><?php echo $order['fullDeliveryAddress']; ?></td>
			<td><?php echo $order['statusID']; ?></td>
			<td><?php echo $order['adminID']; ?></td>
			<td><?php echo $order['totalQuantity']; ?></td>
			<td>
				<div class="btn-group">
	                <button type="button" id="btnIcon" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
	                <i class="fa fa-ellipsis-h"></i>
	                </button>
	                <ul class="dropdown-menu pull-right" role="menu">
	                    <li>
	                    	<a id="edit-order-<?php echo $order['orderID'];?>" href="#modal-edit-order" role="button" class="edit-admin"  data-idvalue="<?php echo $order['orderID'];?>" data-toggle="modal">
								Edit Order
							</a>
	                    </li>
	                    <li>
	                    	<a id="edit-rate-<?php echo $order['orderID'];?>" href="#modal-edit-rate" role="button" class="edit-rate"  data-idvalue="<?php echo $order['orderID'];?>" data-toggle="modal">
								Edit Rate
							</a>
	                    </li>
	                    
	                    <li>
	                    	<a id="edit-product-<?php echo $order['orderID'];?>" href="#modal-edit-product" role="button" class="edit-product"  data-idvalue="<?php echo $order['orderID'];?>" data-toggle="modal">
								Edit Product
							</a>
	                    </li>
	                    <li>
	                    	<a id="edit-pricing-<?php echo $order['orderID'];?>" href="#modal-edit-pricing" role="button" class="edit-pricing"  data-idvalue="<?php echo $order['orderID'];?>" data-toggle="modal">
								Edit Pricing
							</a>
	                    </li>
	                    <li>
	                    	<a id="edit-dispatch-<?php echo $order['orderID'];?>" href="#modal-edit-dispatch" role="button" class="edit-dispatch"  data-idvalue="<?php echo $order['orderID'];?>" data-toggle="modal">
								Edit Dispatch
							</a>
	                    </li>
	                </ul>
	            </div>
			</td>
		</tr>
	 <?php } ?>

	 </tbody>
</table>

	 <br/><br/>
	 <hr>

<div class="pull-left">
	<h2>Past Orders</h2>
</div>

<div class="pull-right">
		<a id="add-order" href="#modal-add-order" role="button" data-toggle="modal"><button type="button" class="btn btn-outline btn-lg btn-maroon ">Add New Order</button></a>
</div>
</div>

<table id="order_list_table_past" class="display table table-striped table-hover">
	 <thead>
		  <tr>
				<th>Order Id</th>
				<th>Date Of Order</th>
				<th>Party Name</th>
				<th>Destination</th>
				<th>Full Delivery Address</th>
				<th>Status</th>
				<th>Passed By</th>
				<th>Total Quantity</th>
				<th>Action</th>
		  </tr>
	 </thead>
	 <tbody>
	 <?php foreach($orderPastList as $order) { ?>
		<tr>
			<td><?php echo $order['orderID']; ?></td>
			<td><?php echo $order['dateOfOrder']; ?></td>
			<td><?php echo $order['partyID']; ?></td>
			<td><?php echo $order['destination']; ?></td>
			<td><?php echo $order['fullDeliveryAddress']; ?></td>
			<td><?php echo $order['statusID']; ?></td>
			<td><?php echo $order['adminID']; ?></td>
			<td><?php echo $order['totalQuantity']; ?></td>
			<td>
				<div class="btn-group">
	                <button type="button" id="btnIcon" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
	                <i class="fa fa-ellipsis-h"></i>
	                </button>
	                <ul class="dropdown-menu pull-right" role="menu">
	                    <li>
	                    	<a id="edit-order-<?php echo $order['orderID'];?>" href="#modal-edit-order" role="button" class="edit-admin"  data-idvalue="<?php echo $order['orderID'];?>" data-toggle="modal">
								Edit Order
							</a>
	                    </li>
	                    <li>
	                    	<a id="edit-rate-<?php echo $order['orderID'];?>" href="#modal-edit-rate" role="button" class="edit-rate"  data-idvalue="<?php echo $order['orderID'];?>" data-toggle="modal">
								Edit Rate
							</a>
	                    </li>
	                    
	                    <li>
	                    	<a id="edit-product-<?php echo $order['orderID'];?>" href="#modal-edit-product" role="button" class="edit-product"  data-idvalue="<?php echo $order['orderID'];?>" data-toggle="modal">
								Edit Product
							</a>
	                    </li>
	                    <li>
	                    	<a id="edit-pricing-<?php echo $order['orderID'];?>" href="#modal-edit-pricing" role="button" class="edit-pricing"  data-idvalue="<?php echo $order['orderID'];?>" data-toggle="modal">
								Edit Pricing
							</a>
	                    </li>
	                    <li>
	                    	<a id="edit-dispatch-<?php echo $order['orderID'];?>" href="#modal-edit-dispatch" role="button" class="edit-dispatch"  data-idvalue="<?php echo $order['orderID'];?>" data-toggle="modal">
								Edit Dispatch
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
	var di=0;
	var countProduct=<?php echo count($productList); ?>;
	function divCheck(){
		if(di>=countProduct)
		{
			$("#addProductDiv").hide();
		}
	}
	divCheck();
	 $('#order_list_table_current').DataTable();
	 $('#order_list_table_past').DataTable();
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
										'<label for="quantity'+di+'" class="col-sm-3 control-label">Percentage Of Order</label>'+
										'<div class="col-md-8">'+
										'<input class="form-control" id="quantity'+di+'" placeholder="" type="text" name="quantity'+di+'" required="required" />'+
										'</div>'+
									'</div>';
	 	$("#productDiv").append(d);
	 	$("#totalProducts").val(di);
	 	$("#add_order_modal").height($("#add_order_modal").height()+97);
	 	divCheck();
	 });
} );

</script>

</div>
</div>

<!-- ######## Add order Section #############-->


<div class="modal fade" id="modal-add-order" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content " id="add_order_modal">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h3 class="modal-title" id="myModalLabel">
								Add New Order
							</h3>
						</div>
						<div class="modal-body"  id="Add_order_body">
							<div class="container-fluid">
				<?php
					$attributes = array('class' => 'form-horizontal','role' => 'form', 'id' => 'addOrderForm');
					echo form_open('/manage_order/addOrder/', $attributes);
				?>

									<div class="form-group">
										<label for="partyID" class="col-sm-3 control-label">Party Name</label>
										<div class="col-md-8">
											<select name="partyID" id="partyID" class="selectpicker" style="width:100%;">
											<option value="Select">Select</option>
											<?php foreach($partyList as $party) { ?>
											 <option value="<?php echo $party['partyID']; ?>"><?php echo $party['partyName']; ?></option>
											 <?php } ?>
										  	</select>
										</div>
									</div>
									<div class="form-group">
										<label for="destination" class="col-sm-3 control-label">Destination</label>
										<div class="col-md-8">
										<input class="form-control" id="destination" type="text" name="destination" required="required" />
										</div>
									</div>
									<div class="form-group">
										<label for="fullDeliveryAddress" class="col-sm-3 control-label">Full Delivery Address</label>
										<div class="col-md-8">
										<input class="form-control" id="fullDeliveryAddress" type="text" name="fullDeliveryAddress" required="required" />
										</div>
									</div>
									<div class="form-group">
										<label for="totalQuantity" class="col-sm-3 control-label">Total Quantity</label>
										<div class="col-md-8">
										<input class="form-control" id="totalQuantity" type="text" name="totalQuantity" required="required" />
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

<!--######### Add Order Section Over ##################-->



<!--######### Edit Order Section ######################-->

<div class="modal fade" id="modal-edit-order" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content " id="edit_order_modal">
			<div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">
					Edit Order
				</h3>
			</div>
			<div class="modal-body">
				<div class="col-md-6 column">
					<iframe id="edit_order_frame" name="edit_order_frame" src="" width="520" height="280" frameborder="no" ></iframe>
				</div>
			</div>
		</div>
	</div>

</div>
<!--############## Edit Order Section Over ###############-->

<!--############# Edit Rate Section ######################-->

<div class="modal fade" id="modal-edit-rate" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content " id="edit_rate_modal">
			<div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">
					Edit Rate
				</h3>
			</div>
			<div class="modal-body">
				<div class="col-md-6 column">
					<iframe id="edit_rate_frame" name="edit_rate_frame" src="" width="520" height="280" frameborder="no" ></iframe>
				</div>
			</div>
		</div>
	</div>

</div>
<!--############## Edit Rate Section Over ###############-->

<!--######## Edit Dispatch Section ######################-->

<div class="modal fade" id="modal-edit-dispatch" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content " id="edit_dispatch_modal">
			<div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">
					Edit Dispatch
				</h3>
			</div>
			<div class="modal-body">
				<div class="col-md-6 column">
					<iframe id="edit_dispatch_frame" name="edit_dispatch_frame" src="" width="520" height="280" frameborder="no" ></iframe>
				</div>
			</div>
		</div>
	</div>

</div>
<!--############## Edit Dispatch Section Over ###############-->

<!--############# Edit Product Section ######################-->

<div class="modal fade" id="modal-edit-product" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content " id="edit_product_modal">
			<div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">
					Edit Product
				</h3>
			</div>
			<div class="modal-body">
				<div class="col-md-6 column">
					<iframe id="edit_product_frame" name="edit_product_frame" src="" width="520" height="280" frameborder="no" ></iframe>
				</div>
			</div>
		</div>
	</div>

</div>
<!--############## Edit Product Section Over ###############-->

<!--############## Edit Pricing Section ####################-->

<div class="modal fade" id="modal-edit-pricing" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content " id="edit_pricing_modal">
			<div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">
					Edit Pricing
				</h3>
			</div>
			<div class="modal-body">
				<div class="col-md-6 column">
					<iframe id="edit_pricing_frame" name="edit_pricing_frame" src="" width="520" height="280" frameborder="no" ></iframe>
				</div>
			</div>
		</div>
	</div>

</div>
<!--############## Edit Product Section Over ###############-->
</div>

<script>


$( document ).ready(function() {

	$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})


	$('.close').click(function () {
	    window.location.href = "manage_order";
	});


	$(".edit-admin").click(function(){
		orderID = $(this).data("idvalue")
		document.getElementById("edit_order_frame").src = "<?php echo site_url(); ?>/edit_order/editOrder/"+orderID;
	});

	$(".edit-rate").click(function(){
		orderID = $(this).data("idvalue")
		document.getElementById("edit_rate_frame").src = "<?php echo site_url(); ?>/edit_order/editRate/"+orderID;
	});

	$(".edit-dispatch").click(function(){
		orderID = $(this).data("idvalue")
		document.getElementById("edit_dispatch_frame").src = "<?php echo site_url(); ?>/edit_order/editDispatch/"+orderID;
	});

	$(".edit-product").click(function(){
		orderID = $(this).data("idvalue")
		document.getElementById("edit_product_frame").src = "<?php echo site_url(); ?>/edit_order/editProduct/"+orderID;
	});

	$(".edit-pricing").click(function(){
		orderID = $(this).data("idvalue")
		document.getElementById("edit_pricing_frame").src = "<?php echo site_url(); ?>/edit_order/editPricing/"+orderID;
	});

});

</script>
<style type="text/css">
	#add_order_modal {
		height : 380px;
	}
	#edit_order_modal {
		height : 400px;
	}
	#edit_rate_modal {
		height : 400px;
	}
	#edit_dispatch_modal {
		height : 400px;
	}

	#edit_product_modal {
		height : 400px;
	}

	#edit_pricing_modal {
		height : 400px;
	}
</style>

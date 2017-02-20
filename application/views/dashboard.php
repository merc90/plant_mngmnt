<style type="text/css">
	#btnIcon {
		width: 50px;
		padding: 2px;
		margin: 0px;
	}
</style>
<div id="page-wrapper">
<div id="myTabContent" class="tab-content">
<div class="pull-left">
	<h3>Penidng order confirmations</h3>
</div>

<table id="order_list_tableConfirmation" class="display table table-striped table-hover">
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
	 <?php foreach($orderList as $order) { ?>
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
	                    	<a id="edit-order-<?php echo $order['orderID'];?>" href="#modal-edit-order" role="button" class="edit-admin"  data-idvalue="<?php echo $order['orderID'];?>" data-toggle="modal">
								Edit Order
							</a>
	                    
	            </div>
			</td>
		</tr>
	 <?php } ?>

	 </tbody>
</table>

<div class="pull-left">
	<h3>Pending payments</h3>
</div>

<table id="order_list_tablePayment" class="display table table-striped table-hover">
	 <thead>
		  <tr>
				<th>Order Id</th>
				<th>Party Name</th>
				<th>Fees Of Delivery</th>
				<th>Ex Factory Price</th>
				<th>Total Price</th>
				<th>Advance Amount</th>
				<th>Credit Amount</th>
				<th>Date Of Order</th>
				<th>Date Of Credit</th>
				<th>Action</th>
		  </tr>
	 </thead>
	 <tbody>
	 <?php foreach($pricingList as $pricing) { ?>
		  <tr>
				<td><?php echo $pricing['orderID']; ?></td>
				<td><?php echo $pricing['partyName']; ?></td>
				<td><?php echo $pricing['feesOfDelivery']; ?></td>
				<td><?php echo $pricing['exFactoryPrice']; ?></td>
				<td><?php echo $pricing['totalPrice']; ?></td>
				<td><?php echo $pricing['advanceAmount']; ?></td>
				<td><?php echo $pricing['creditAmount']; ?></td>
				<td><?php echo $pricing['dateOfOrder']; ?></td>
				<td><?php echo $pricing['daysOfCredit']; ?></td>
			<td>
				<div class="btn-group">
	                    <a id="edit-pricing-<?php echo $pricing['orderID'];?>" href="#modal-edit-pricing" role="button" class="edit-pricing"  data-idvalue="<?php echo $pricing['orderID'];?>" data-toggle="modal">
								Edit
							</a>
	                
	            </div>
			</td>
		 </tr>
	 <?php } ?>

	 </tbody>
</table>


<div class="pull-left">
	<h3>Stocks</h3>
</div>

<table id="order_list_tableStock" class="display table table-striped table-hover">
	 <thead>
		  <tr>
				<th>Product Name</th>
				<th>Required Quantity</th>
				<th>Produced Quantity</th>
				<th>Deviation</th>
		  </tr>
	 </thead>
	 <tbody>
	 <?php foreach($stockList as $stock) { ?>
		<tr>
				<td><?php echo $stock['productName']; ?></td>
				<td><?php echo $stock['requiredQuantity']; ?></td>
				<td><?php echo $stock['producedQuantity']; ?></td>
				<td><?php echo $stock['producedQuantity']-$stock['requiredQuantity']; ?></td>
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
	$('#order_list_tableConfirmation').DataTable();
	$('#order_list_tablePayment').DataTable();
	$('#order_list_tableStock').DataTable();
} );
</script>
</div>
</div>



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

<!--####### Edit pricing Section ######################-->

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
<!--############## Edit pricing Section Over ###############-->
</div>

<script>


$( document ).ready(function() {

	$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})


	$('.close').click(function () {
	    window.location.href = "dashboard";
	});


	$(".edit-admin").click(function(){
		orderID = $(this).data("idvalue")
		document.getElementById("edit_order_frame").src = "<?php echo site_url(); ?>/edit_order/editOrder/"+orderID;
	});

	$(".edit-pricing").click(function(){
		orderID = $(this).data("idvalue")
		document.getElementById("edit_pricing_frame").src = "<?php echo site_url(); ?>/edit_pricing/editPricing/"+orderID;
	});


});

</script>
<style type="text/css">
	#edit_pricing_modal {
		height : 400px;
	}
	#edit_order_modal {
		height : 400px;
	}
</style>

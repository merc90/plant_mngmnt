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
	<h2>Current Pricings</h2>
</div>

</div>

<table id="pricing_list_table_current" class="display table table-striped table-hover">
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
				<th></th>
		  </tr>
	 </thead>
	 <tbody>
	 <?php foreach($pricingListCurrent as $pricing) { ?>
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
	                    <a id="edit-pricing-<?php echo $pricing['orderID'];?>" href="#modal-edit-pricing" role="button" class="edit-admin"  data-idvalue="<?php echo $pricing['orderID'];?>" data-toggle="modal">
								Edit
							</a>
	                
	            </div>
			</td>
		 </tr>
	 <?php } ?>

	 </tbody>
</table>

<br><br>
<hr>

<div class="pull-left">
	<h2>Past Pricings</h2>
</div>

</div>

<table id="pricing_list_table_past" class="display table table-striped table-hover">
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
				<th></th>
		  </tr>
	 </thead>
	 <tbody>
	 <?php foreach($pricingListPast as $pricing) { ?>
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
	                    <a id="edit-pricing-<?php echo $pricing['orderID'];?>" href="#modal-edit-pricing" role="button" class="edit-admin"  data-idvalue="<?php echo $pricing['orderID'];?>" data-toggle="modal">
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


</div>
</div>


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

	$('#pricing_list_table_current').DataTable();
	$('#pricing_list_table_past').DataTable();

	$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})

	$('.close').click(function () {
	    window.location.href = "manage_pricing";
	});


	$(".edit-admin").click(function(){
		orderID = $(this).data("idvalue")
		document.getElementById("edit_pricing_frame").src = "<?php echo site_url(); ?>/edit_pricing/editPricing/"+orderID;
	});



});

</script>
<style type="text/css">
	#edit_pricing_modal {
		height : 400px;
	}
</style>

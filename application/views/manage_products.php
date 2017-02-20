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
	<h2>Products</h2>
</div>

<div class="pull-right">
		<a id="add-product" href="#modal-add-product" role="button" data-toggle="modal"><button type="button" class="btn btn-outline btn-lg btn-maroon ">Add New Product</button></a>
</div>
</div>

<table id="product_list_table" class="display table table-striped table-hover">
	 <thead>
		  <tr>
				<th>Product Name</th>
				<th>Percentage Of Order</th>
				<th>Basic Rate</th>
				<th>Action</th>
		  </tr>
	 </thead>
	 <tbody>
	 <?php foreach($productList as $product) { ?>
		  <tr>
				<td><?php echo $product['productName']; ?></td>
				<td><?php echo $product['percentageOfOrder']; ?></td>
				<td><?php echo $product['basicRate']; ?></td>
			<td width="25%">
				<div class="btn-group">
	                    <a id="edit-product-<?php echo $product['productID'];?>" href="#modal-edit-product" role="button" class="edit-admin"  data-idvalue="<?php echo $product['productID'];?>" data-toggle="modal">
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
	 $('#product_list_table').DataTable();

} );

</script>

</div>
</div>




<!-- ######## Add product Section #############-->


<div class="modal fade" id="modal-add-product" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content " id="add_product_modal">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h3 class="modal-title" id="myModalLabel">
								Add New Product
							</h3>
						</div>
						<div class="modal-body"  id="Add_product_body">
							<div class="container-fluid">

				<?php
					$attributes = array('class' => 'form-horizontal','role' => 'form', 'id' => 'addProductForm');
					echo form_open('/manage_products/addProduct/', $attributes);
				?>

									<div class="form-group">
										<label for="productName" class="col-sm-3 control-label">Product Name</label>
										<div class="col-md-8">
											 <input class="form-control" id="productName" type="text" name="productName" required="required" />
										</div>
									</div>
									<div class="form-group">
										<label for="percentageOfOrder" class="col-sm-3 control-label">Percentage Of Order</label>
										<div class="col-md-8">
										<input class="form-control" id="percentageOfOrder" type="text" name="percentageOfOrder" required="required" />
										</div>
									</div>
									<div class="form-group">
										<label for="basicRate" class="col-sm-3 control-label">Basic Rate</label>
										<div class="col-md-8">
										<input class="form-control" id="basicRate" type="text" name="basicRate" required="required" />
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

<!--######### Add Product Section Over ##################-->



<!--####### Edit Product Section ######################-->

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
</div>



<script>


$( document ).ready(function() {

	$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})


	$('.close').click(function () {
	    window.location.href = "manage_products";
	});


	$(".edit-admin").click(function(){
		productID = $(this).data("idvalue")
		document.getElementById("edit_product_frame").src = "<?php echo site_url(); ?>/edit_products/index/"+productID;
	});



});

</script>
<style type="text/css">
	#add_product_modal {
		height : 300px;
	}
	#edit_product_modal {
		height : 400px;
	}
</style>

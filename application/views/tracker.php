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

</div>

<table id="admin_user_list_table" class="display table table-striped table-hover">
   <thead>
      <tr>
        <th>Name</th>
        <th>Role</th>
        <th>Actions</th>
      </tr>
   </thead>
   <tbody>
   <?php foreach($all_admins as $admin) { ?>
      <tr>
      <td><?php echo $admin['adminName']; ?></td>
      <td><?php echo $admin['adminRole']; ?></td>
      <td width="25%">
        <div class="btn-group">
                  <ul class="pull-right">
                      <button id="edit-admin-<?php echo $admin['adminID'];?>" class="edit-admin"  role="button" data-idvalue="<?php echo $admin['adminID'];?>">
                Track
              </button></ul>
              </div>
      </td>
    </tr>
   <?php } ?>

   </tbody>
</table>

<hr>

<div class="pull-left">
  <h3>Location</h3>
</div>

<table id="location_list_table" class="display table table-striped table-hover">
   <thead>
      <tr>
        <th>Employee Name</th>
        <th>Time</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Action</th>
      </tr>
   </thead>
   <tbody>
   <?php foreach($locationList as $location) { ?>
      <tr>
        <td><?php echo $location['employeeName']; ?></td>
        <td><?php echo $location['time']; ?></td>
        <td><?php echo $location['latitude']; ?></td>
        <td><?php echo $location['longitude']; ?></td>
      <td>
        <div class="btn-group">
                      <a id="location-<?php echo $location['locationID'];?>" role="button" class="edit-pricing"  data-idvalue="<?php echo $location['locationID'];?>">
                View on map
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


</div>



<script>


$( document ).ready(function() {

  $('#myTab a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  })



  $(".edit-admin").click(function(){
    adminID = $(this).data("idvalue")
    window.location.href = "../satyam/tracker/index/"+adminID;
  });

  $('#admin_user_list_table').DataTable();
  $('#location_list_table').DataTable();


});

</script>

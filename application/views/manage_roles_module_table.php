<form id="module_permission_form" method="post" action="<?php echo site_url().'/manage_roles/saveModulePermissions/';?>" >
  <input type="hidden" name="roleID" value="<?php echo $roleID; ?>" />

  <table class="display table-hover table table-striped">
    <thead>
      <tr>
        <th>Module</th>
        <th>Module Display Name</th>
        <th>Order Number</th>
        <th>Read</th>
        <th>Write</th>
      </tr>
    </thead>
      <?php $wid= $rid = 1; ?>
    <tbody>
        <?php foreach ($modulePermissions as $row): ?>

          <tr id="module_row">
            <input type="hidden" name="id[]" value="<?php echo $row['_ID']; ?>" />
            <td>
              <?php echo $row['_NAME']; ?>
            </td>
            <td>
              <?php echo $row['_DISPLAYName'];?>
            </td>
            <td>
              <?php echo $row['_ORDER'];?>
            </td>
            <td>
              <input type="checkbox" id= "read_checkbox" data-rval="<?php echo $wid++ ?>" name = "read[<?php echo $row['_ID']; ?>]" <?php if($row['_R'] == 1) echo "checked";?> />
            </td>
            <td>
              <input type="checkbox" id= "write_checkbox" data-wval="<?php echo $rid++ ?>" name = "write[<?php echo $row['_ID']; ?>]" <?php if($row['_W'] == 1) echo "checked";?> />
            </td>
          </tr>
        <?php endforeach ?>
    </tbody>
  </table>
</form>


<script type="text/javascript">
jQuery(document).ready(function() {
    $("#module_permission_form #write_checkbox").click(function() {
        var wid = $(this).data('wval');
          $("#module_permission_form #read_checkbox").filter(function() {
              
              if($(this).data('rval')== wid) {
                  $(this).prop('checked',true);
              }

          }); 
    });           
});

</script>

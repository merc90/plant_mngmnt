<div id="page-wrapper">
<div id="myTabContent" class="tab-content">
<div class="row clearfix">
  &nbsp;
</div>
<div class="row">
      <div class="col-md-10 column">
	<h4>Access Permission</h4>
</div>
</div>
<div class="row">
<div class="container-fluid">

	<table id= "access_rights_list" class="table">
		<thead>
			<tr>
				<th>User</th>
				<th>Access Rights</th>
			</tr>
		</thead> 

		<tbody>
			<tr>
				<td>Customer Service</td>
				<td>Read only</td>
			</tr>
			<tr>
				<td>Trading Operator</td>
				<td>'R/W' for all tabs except 'Manage Users'</td>
			</tr>
			<tr>
				<td>Admin</td>
				<td>'R/W' for all tabs except 'Manage Users'</td>
			</tr>
			<tr>
				<td>Super Admin </td>
				<td>'R/W' for 'Manage Users' Tab<br />
					'Read only' for all other tabs</td>
			</tr>
			<tr>
				<td>Compliance </td>
				<td>Read only</td>
			</tr>
		</tbody>
	</table>

<p><i>Last Updated: 2015 Feb 11</i></p>
<div class="row">
      <div class="col-md-10 column">
	<h4>Client Status</h4>
</div>
</div>
<table id= "access_rights_list" class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Status Name</th>
			</tr>
		</thead> 
		<tbody>
			<?php 


            foreach ($userStatus as $status) {
            	?>
            	<tr>
            		<td><?php echo $status['userStatusID']; ?></td>
                     <td><?php echo $status['userStatus']; ?></td>
            	</tr>
            	<?php
            }

			?>

		</tbody>
		</table>
		<p><i>Last Updated: 2017 Feb 11</i></p>

</div>
</div>
</div>
</div>
</div>
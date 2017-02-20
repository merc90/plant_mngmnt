<!DOCTYPE HTML>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		
	</head>
<body>
	<div style="width:100%;height:50px;">
		<img src="{{ BASE URL }}img/Satyam_logo.png" style="max-height:50px; margin-top:-5px;">
	</div>
	
	<div style="width:1000px;">
			<p>
				Hi <span class="colorText username" style="color:#bc2026;text-transform:capitalize;">{{ NAME }}</span>,
			</p>
			<p>
					Your password has been changed successfully.
			</p>

			<p>
					Your Role, Email and New Password has mentioned below
			</p>
			<p>
					Role : <b>{{ ROLE }}</b><br />
					Email : <b>{{ EMAIL ADDRESS }}</b><br />
					Password : <b>{{ PASSWORD }}</b>
			</p>
	</div>
</body>
</html>
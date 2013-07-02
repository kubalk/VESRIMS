<script type='text/javascript'>

</script>
<table id='layoutTable' cellpadding='0' cellspacing='0' border='0'>
	<tr>
		<td id='tdNav' class='layoutTable'>
			<h3><img src='/images/user.png' />User Management</h3>
			<ul>
				<li><div id='adduserimg' class='noDisplay'></div><img src='/images/plus.png' /><a href='?view=adduser'>Add User</a></li>
				<li><div id='retireuserimg' class='noDisplay'/></div><img src='/images/trash.png' /><a href='?view=retireuser'>Retire User</a></li>
				<li><div id='manageuserimg' class='noDisplay'/></div><img src='/images/file3.png' /><a href='?view=manageuser'>Manage User</a></li>
			</ul>
			<hr />
			<h3><img src='/images/bag.png' />Invt. Management</h3>
			<ul>
				<li><div id='additemimg' class='noDisplay'></div><img src='/images/plus.png' /><a href='?view=additem'>Add Item</a></li>
				<li><div id='retireitemimg' class='noDisplay'></div><img src='/images/trash.png' /><a href='?view=retireitem'>Retire Item</a></li>
				<li><div id='manageitemimg' class='noDisplay'></div><img src='/images/file3.png' /><a href='?view=manageitem'>Manage Item</a></li>
			</ul>
			<hr />
			<h3><img src='/images/stats2.png' />Reports</h3>
			<ul>
				<li><a href='?view=eotEU'>EOT End-User Report</a></li>
				<li><a href='?view=eoyEU'>EOY End-User Report</a></li>
				<li><a href='?view=eotMR'>EOT Management Report</a></li>
				<li><a href='?view=eoyMR'>EOY Management Report</a></li>
				<li>&nbsp;</li>
				<li><a href=''>Custom Report</a></li>
			</ul>
			<br />
			<br />
			<br />
			<h3 class='logout' onclick='logout()'>Log Out</h3>
			<form action='' method='POST'>
				<input type='submit' name='logout' id='logout' style='display: none;' />
			</form>
		</td>
		<td id='tdMain' align='center' class='layoutTable'>

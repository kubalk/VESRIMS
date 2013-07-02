		<h2>Add User</h2>
		<form style='padding: 20px; background: #eee; border: 1px solid #333;' id='addUser' method="POST" action="?adduser">    
			<b style='color: #333;'>First Name:</b><br /><input type="text" class='text' name='fname' /><br /><br/>
			<b style='color: #333;'>Last Name:</b><input type="text" class='text' name='lname' /><br /><br />
			<b style='color: #333;'>Room Number:</b><input type="text" class='text' name='room' /><br /><br />
			<b style='color: #333;'>Password:</b><input type="text" class="text" name='password' /><br/><br />
			<b style='color: #333;'>Admin:</b><input type='checkbox' name='admin'/><br /><br />
			<img src='/images/user2.png' width='30px'/><img src='/images/adduser.png' class='button' style='width: 222px; margin: 20px 0px -5px 6px' onclick='addUser();'/>
			<input type="submit" id="adduser" name="adduser" value="adduser" style='display: none;'/>
		</form>

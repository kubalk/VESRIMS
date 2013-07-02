<?php
$users = $UserDB->getUsers();
$table = '<h2>Retire User</h2><table cellpadding=\'4\' cellspacing=\'0\'><tr><th>Name</th><th>Username</th><th>Room Number</th><th>User Type</th><th>Active</th><th>Retire</th></tr>';
$counter = 0;
foreach($users as $user)
{
	$table .= "<tr style='" . ($counter % 2 == 0 ? "background: #eee;" : "") . ($user['UActive'] ? "'" : "color: #999999;'")."><td>".$user['UFName']. " " . $user['ULName'] ."<td>" . $user["Username"] . "</td></td><td>" . $user['URoomNum'] . "</td><td>" . ($user['UType'] ? 'Admin' : 'User') . "</td><td>" . ($user['UActive'] ? 'Active' : 'Inactive') . "</td><td><a href='#'" . ($user['UActive'] ? " onclick='updateUserStatus(". $user['UserID'] .", 0)'>Retire" : " onclick='updateUserStatus(". $user['UserID'] .", 1)'>Activate"). "</a></td></tr>";
    $counter++;
}
$table .= '</table><form id=\'updateUserForm\' action=\'?view=retireuser\' method=\'POST\'><input type=\'hidden\' name=\'User\' id=\'User\'><input type=\'hidden\' name=\'userStatus\' id=\'userStatus\' /></form>';
echo $table;
?>


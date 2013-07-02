<h2>Add Item</h2>
<form style='padding: 20px; background: #eee; border: 1px solid #333; width: 700px;' action='?view=additem' method='POST'>
<table cellpadding='0' cellspacing='0' border='0' width='100%' class='noborder' style='position: relative;'>
<tr valign='top'>
<td>
<h2>Manually</h2>
<b style='color: #333;'>Title: </b><br /><input id='title' name='title' type='text' class='text' ><br /><br/>
<b style='color: #333;'>Author First Name: </b><br /><input id='authFirst' name='authFirst' type='text' class='text'><br /><br />
<b style='color: #333;'>Author Last Name: </b><br /><input id='authLast' name='authLast' type='text' class='text'><br /><br />
<b style='color: #333;'>Publisher: </b><br /><input id='publisher' name='publisher' type='text' class='text'><br /><br />
<b style='color: #333;'>ISBN (opt): </b><br /><input id='ISBN1' name='ISBN1' type='text' class='text'><br /><br />
<b style='color: #333;'>Qty: </b><br /><input name='qty' type='txt' class='text' style='width: 50px;' value='1'><br /><br />
<center><img src='/images/additem.png' class='button' style='width: 222px' onclick='addItem();'/></center>
<input type='submit' name='additem' id='additem' style='display: none;' />
</td>
<td valign='middle' width='100px'><h2>OR</h2></td>
<td style='text-align: center;'>
<h2>Search ISBN Database</h2>
<img src='/images/magnifying.png'/><br /><br />
<b style='color: #333;'>ISBN: </b><br /><input type="text" id='ISBN' name='ISBN' class='text'><br /><br />
<img src='/images/search.png' id='submitISBN' class='button' onclick='searchISBN();'/>
</td>
</tr>
</table>                
</form>
<div id='divISBNData'></div>

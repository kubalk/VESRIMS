<?php
require_once '../db/ItemDB.php';
$ItemDB = new ItemDB();

$items = $ItemDB->getActive();
$table = '<h2>Retire Item</h2><table cellpadding=\'4\' cellspacing=\'0\'><tr><th>Item</th><th>Author</th><th>Qty</th><th>ISBN/UAI</th><th>Retire</th></tr>';
$counter = 0;
foreach($items as $item)
{
	$table .= "<tr style='" . ($counter % 2 == 0 ? "background: #eee;" : "") . ($item['IQty'] > 0 ? "'" : "color: #999999;'") . "><td>" . $item['IBookTitle'] . "</td><td>" . $item['AFName'] . " " . $item['ALName'] . "</td><td>" . $item['IQty'] . "</td><td>" . $item['IISBN'] . "</td><td><a href='#' onclick='retireItem(". $item['ItemID'] .")'>Retire</a></td></tr>";
	$counter++;
}
$table .= '</table><form id=\'retireForm\' action=\'?view=retireitem\' method=\'POST\'><input type=\'hidden\' name=\'retireItem\' id=\'retireItem\'></form>';
echo $table;
?>

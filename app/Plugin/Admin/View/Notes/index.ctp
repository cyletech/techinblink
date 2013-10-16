<table>
<tr>
<td>From</td><td>Note</td><td>time</td></tr>
<?php
foreach($notes as $note) {
	echo '<tr>';
	echo '<td>',$note['Note']['from'],'</td><td>',$note['Note']['note'],'</td><td>',$note['Note']['time'],'</td>';
	echo '</tr>';
}
?>
</table>
<?php
    include 'class/winnscriptatype.php';
	$w = new WinnScriptatype();
?>
<script type="text/javascript" src="js/prototypejs.js"></script>
<script type="text/javascript" src="js/scriptaculous.js"></script>
<h2 id="puffid" style="display:none;">Good job!</h2>
<table>
	<tr id="thisrow" style="background:#333; color:#fff;">
		<td><?=$w->textlink_do_pulsate_then_fade('thisrow', '[x]', 'sample_script.php', array('method' => 'approve','test' => '1')); ?> This is my test.</td>
	</tr>
</table>

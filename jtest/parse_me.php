<?php
exec('tail /xampp/apache/logs/error_log', $output);
?>
<Table border="1">
    <tr>
        <th>Date</th>
        <th>Type</th>
        <th>Client</th>
        <th>Message</th>
    </tr>
<?
    foreach($output as $line) {
    	// sample line: [Wed Oct 01 15:07:23 2008] [error] [client 76.246.51.127] PHP 99. Debugger->handleError() /home/gsmcms/public_html/central/cake/libs/debugger.php:0
    	preg_match('~^\[(.*?)\]~', $line, $date);
    	if(empty($date[1])) {
    		continue;
    	}
    	preg_match('~\] \[([a-z]*?)\] \[~', $line, $type);
    	preg_match('~\] \[client ([0-9\.]*)\]~', $line, $client);
    	preg_match('~\] (.*)$~', $line, $message);
    	?>
    <tr>
        <td><?=$date[1]?></td>
        <td><?=$type[1]?></td>
        <td><?=$client[1]?></td>
        <td><?=$message[1]?></td>
    </tr>
    	<?
    }
?>
</table>

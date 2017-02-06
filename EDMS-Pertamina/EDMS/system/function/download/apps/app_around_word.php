<?php

/* 
 * Dedicated to PERTAMINA                                        
 * Web Application
 * Creator by Agis Laksamana
 * Copyright © 2015 IBeEs; Licensed
 * IBeES (Information Based Electronic System)
 */

require_once ('../../../definer.php');
require_once ('../../../'.'config.php');
require_once ('../../../'.APP_SYSTEM_CLASS . 'Active_record_class.php');
require_once ('../../../'.APP_SYSTEM_FUNCTION . 'General_function.php');
// New Object From Classes
$DBCon  = New ConnectDB();
$ARSql  = New Active_record();
$now    = date("Y-m-d");
$tgl    = tanggal($now);
header("Cache-control: no-cache, no-store,must-revalidate");
header("Content-type: application/octet-stream");
header("Content-type=appalication/vnd.ms-word");
header("content-disposition:attachment;filename=Turn Around-$tgl.doc");
?>
<style>
body {
    font-family: 'arial';
}
</style>
<center><h2>DATA TURN AROUND</h2></center>
<table style="padding: 10px" cellpadding="0" cellspacing="0" border="1" align="center">
    <tr style="background: #ecb3de; color: #000;">
     <th width="4%">No.</th>
     <th data-priority="1">No. Turn Around</th>
     <th data-priority="3">Tanggal</th>
     <th data-priority="1">Kepada</th>
     <th data-priority="3">Tembusan</th>
     <th data-priority="3">Perihal</th>
     <th data-priority="6">Tindak Lanjut</th>
   </tr>
<tbody>
<?php
$no = 1;
$aSkpiList = $ARSql->getAll('around');
while ( $rSkpiList = $ARSql->mf_object($aSkpiList)) {
    if($no%2=='0') {
        $bg= "style='background:#f5f5f5'";
    }else{
     $bg= "style='background:#fff'";    
    }
echo "<tr $bg>
        <td>$no.</td>
        <td>$rSkpiList->no</td>
        <td>$rSkpiList->tgl</td>
        <td>$rSkpiList->kepada</td>
        <td>$rSkpiList->tembusan</td>
        <td>".html_entity_decode($rSkpiList->perihal)."</td>
        <td>$rSkpiList->t_lanjut</td>

</tr>";
$no++;
}
?>
</tbody>
</table>

  
                                      


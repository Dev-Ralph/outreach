<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-disposition: attachment; filename='.date('Y/m/d').'.xls');
echo $_GET["data"];
?>

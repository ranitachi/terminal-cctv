<?php
$time=file_get_contents('C:\xampp\htdocs\TERMINALKU\assets\Converter\test.txt');
$time.="\n".date('Y-m-d H:i:s');
// $time.="\n";
$kmrin=date('Y-m-d', strtotime('-1 days'));
$time.=' Kemarin : '.$kmrin;
file_put_contents('C:\xampp\htdocs\TERMINALKU\assets\Converter\test.txt', $time);
?>
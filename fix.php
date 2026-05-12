<?php
include 'C:\Users\Mihriban\Desktop\mihri\htdocs\event2\baglan.php';

$db->exec("UPDATE bilet SET tip='Öğrenci Girişi' WHERE id=3");
$db->exec("UPDATE bilet SET tip='Genel Giriş' WHERE id=4");
echo "Done";
?>

<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=event2_db;charset=utf8mb4', 'root', '');
    $sifre = hash('sha256', '123456');
    $db->exec("INSERT IGNORE INTO kullanici (id, ad_soyad, eposta, sifre_hash) VALUES 
        (1, 'Admin Yetkilisi', 'admin@event.com', '$sifre'),
        (2, 'Test Ogrencisi', 'ogrenci@event.com', '$sifre')");
    $db->exec("INSERT IGNORE INTO ogrenci (kullanici_id, ogrenci_no, bolum) VALUES 
        (2, '2026123456', 'Bilgisayar')");
    echo "OK";
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

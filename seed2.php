<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=event2_db;charset=utf8mb4', 'root', '');
    $db->exec("INSERT INTO etkinlik (baslik, tarih, mekan_id, kategori_id, resim_url) VALUES 
        ('Rock Müzik Gecesi', '2026-06-20 21:00:00', 1, 1, 'img/konser.jpg'), 
        ('Klasik Müzik Dinletisi', '2026-07-01 19:00:00', 2, 1, 'img/konser.jpg'), 
        ('Girişimcilik Zirvesi', '2026-05-25 13:00:00', 2, 2, 'img/seminer.jpg'), 
        ('Siber Güvenlik Temelleri', '2026-06-05 14:00:00', 3, 2, 'img/seminer.jpg'), 
        ('Tiyatro Kulübü Tanışma Toplantısı', '2026-05-28 17:00:00', 2, 3, 'img/kamp.jpg'), 
        ('IEEE Kodlama Şenliği', '2026-06-10 10:00:00', 3, 3, 'img/kamp.jpg'), 
        ('İleri Seviye Python Kursu', '2026-07-15 09:00:00', 3, 4, 'img/seminer.jpg'), 
        ('Diksiyon ve Hitabet Kursu', '2026-08-01 15:00:00', 2, 4, 'img/seminer.jpg')
    ");
    echo "OK";
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

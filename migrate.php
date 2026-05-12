<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=event2_db;charset=utf8mb4', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // 1. Create kulup table
    $db->exec("CREATE TABLE IF NOT EXISTS kulup (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ad VARCHAR(255) NOT NULL
    )");
    
    // 2. Add kulup_id to etkinlik
    $result = $db->query("SHOW COLUMNS FROM etkinlik LIKE 'kulup_id'");
    if ($result->rowCount() == 0) {
        $db->exec("ALTER TABLE etkinlik ADD COLUMN kulup_id INT");
        $db->exec("ALTER TABLE etkinlik ADD FOREIGN KEY (kulup_id) REFERENCES kulup(id) ON DELETE SET NULL");
    }
    
    // 3. Insert some clubs
    $db->exec("INSERT IGNORE INTO kulup (id, ad) VALUES (1, 'Tiyatro Kulübü'), (2, 'IEEE Kulübü'), (3, 'Doğa ve Kampçılık Kulübü')");
    
    // 4. Update existing club events
    $db->exec("UPDATE etkinlik SET kulup_id = 1 WHERE baslik LIKE '%Tiyatro%'");
    $db->exec("UPDATE etkinlik SET kulup_id = 2 WHERE baslik LIKE '%IEEE%'");
    $db->exec("UPDATE etkinlik SET kulup_id = 3 WHERE baslik LIKE '%Doğa%' OR baslik LIKE '%Kamp%'");
    
    echo "OK";
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<?php
if (session_status() === PHP_SESSION_NONE) session_start();

// Yetki kontrolü
if(!isset($_SESSION['user']) || $_SESSION['user']['rol'] !== 'Yönetici') {
    header('Location: index.php');
    exit;
}

// Kulüp verileri session'da tutulacak (demo amaçlı)
if(!isset($_SESSION['kulupler'])) {
    $_SESSION['kulupler'] = [
        ['ad' => 'Teknofest Kulübü', 'baskan' => 'Ayşe Demir'],
        ['ad' => 'IEEE Kulübü', 'baskan' => 'Mehmet Öz'],
        ['ad' => 'Bilimtey Kulübü', 'baskan' => 'Zeynep Kara'],
        ['ad' => 'TEMA Kulübü', 'baskan' => 'Ahmet Yıldız'],
        ['ad' => 'Genç Girişimciler', 'baskan' => 'Fatma Aksoy'],
    ];
}

// Kulüp silme
if(isset($_GET['sil'])) {
    $idx = (int)$_GET['sil'];
    if(isset($_SESSION['kulupler'][$idx])) {
        $silinen = $_SESSION['kulupler'][$idx]['ad'];
        array_splice($_SESSION['kulupler'], $idx, 1);
        $basari = '"' . $silinen . '" kulübü sistemden çıkartıldı!';
    }
    header('Location: admin_panel.php' . (isset($basari) ? '?msg=' . urlencode($basari) : ''));
    exit;
}

// Kulüp ekleme
$hata = '';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ad     = trim($_POST['ad']     ?? '');
    $baskan = trim($_POST['baskan'] ?? '');

    if(empty($ad)) {
        $hata = 'Kulüp adı zorunludur!';
    } else {
        if(empty($baskan)) $baskan = 'Atanmadı';
        $_SESSION['kulupler'][] = ['ad' => $ad, 'baskan' => $baskan];
        header('Location: admin_panel.php?msg=' . urlencode('"' . $ad . '" kulübü başarıyla eklendi!'));
        exit;
    }
}
?>
<?php include 'header.php'; ?>

<div class="view-section" style="display:block;">
    <div style="max-width:1100px; margin:0 auto;">
        <a href="index.php" class="back-btn">← Ana Sayfaya Dön</a>
        <h2 style="color:white; margin-bottom:8px; font-size:2.2rem;">🛡️ Yönetici Paneli</h2>
        <p style="color:#aaa; margin-bottom:40px;">Sistem Yöneticisi: <strong style="color:white;"><?= htmlspecialchars($_SESSION['user']['ad']) ?></strong>. Kulüpleri yönetebilirsin.</p>

        <?php if(isset($_GET['msg'])): ?>
        <div style="background:rgba(39,174,96,0.15); border:1px solid rgba(39,174,96,0.4); color:#2ecc71; padding:14px 20px; border-radius:12px; margin-bottom:25px; font-size:0.95rem;">
            ✅ <?= htmlspecialchars($_GET['msg']) ?>
        </div>
        <?php endif; ?>

        <?php if($hata): ?>
        <div style="background:rgba(230,57,70,0.15); border:1px solid rgba(230,57,70,0.4); color:#e63946; padding:14px 20px; border-radius:12px; margin-bottom:25px;">
            ⚠️ <?= htmlspecialchars($hata) ?>
        </div>
        <?php endif; ?>

        <div style="display:grid; grid-template-columns: 1fr 1.5fr; gap:30px;">
            <!-- KULÜP EKLEME FORMU -->
            <div class="auth-card" style="margin:0; max-width:none;">
                <h3 style="color:white; margin-bottom:20px;">🏢 Yeni Kulüp Ekle</h3>
                <form method="POST">
                    <label style="color:#ccc; font-size:0.85rem; font-weight:600; display:block; margin-bottom:5px;">Kulüp Adı *</label>
                    <input type="text" name="ad" placeholder="Örn: Robotik Kulübü" required>

                    <label style="color:#ccc; font-size:0.85rem; font-weight:600; display:block; margin-bottom:5px;">Kulüp Başkanı (opsiyonel)</label>
                    <input type="text" name="baskan" placeholder="Örn: Ali Veli">

                    <button type="submit" class="btn-primary" style="width:100%; padding:16px; margin-top:10px; font-size:1rem;">🏢 Kulübü Oluştur</button>
                </form>
            </div>

            <!-- KULÜP LİSTESİ -->
            <div class="auth-card" style="margin:0; max-width:none;">
                <h3 style="color:white; margin-bottom:20px;">🛡️ Aktif Kulüpler (<?= count($_SESSION['kulupler']) ?>)</h3>

                <?php if(empty($_SESSION['kulupler'])): ?>
                    <p style="color:#888; text-align:center; padding:30px;">Sistemde kayıtlı kulüp yok.</p>
                <?php else: ?>
                    <?php foreach($_SESSION['kulupler'] as $idx => $kulup): ?>
                    <div style="display:flex; align-items:center; background:rgba(255,255,255,0.05); padding:18px; border-radius:15px; border:1px solid rgba(255,255,255,0.1); margin-bottom:12px; gap:15px;">
                        <div style="width:50px; height:50px; background:linear-gradient(135deg, #e63946, #c1121f); border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:1.4rem; flex-shrink:0;">🏢</div>
                        <div style="flex:1; min-width:0;">
                            <h4 style="color:white; margin:0; font-size:1rem;"><?= htmlspecialchars($kulup['ad']) ?></h4>
                            <p style="color:#888; margin:4px 0 0; font-size:0.8rem;">👤 Başkan: <?= htmlspecialchars($kulup['baskan']) ?></p>
                        </div>
                        <a href="admin_panel.php?sil=<?= $idx ?>" onclick="return confirm('<?= htmlspecialchars($kulup['ad']) ?> kulübünü sistemden çıkartmak istediğine emin misin?')" style="background:#ff4757; color:white; border:none; padding:8px 16px; border-radius:8px; cursor:pointer; font-weight:bold; text-decoration:none; font-size:0.85rem; flex-shrink:0;">🗑 ÇIKART</a>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) session_start();

// Yetki kontrolü
if(!isset($_SESSION['user']) || $_SESSION['user']['rol'] !== 'Kulüp Başkanı') {
    header('Location: index.php');
    exit;
}

// Etkinlik verileri session'da tutulacak (demo amaçlı)
if(!isset($_SESSION['etkinlikler'])) {
    $_SESSION['etkinlikler'] = [
        ['ad' => 'İHA Yapma Eğitimi', 'tarih' => '15 Mayıs 2026', 'yer' => 'Hangar', 'img' => 'https://images.unsplash.com/photo-1508614589041-895b88991e3e?auto=format&fit=crop&w=800&q=80'],
        ['ad' => 'BAYKAR Gezisi', 'tarih' => '16 Mayıs 2026', 'yer' => 'İstanbul', 'img' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80'],
        ['ad' => 'SAP Eğitimi', 'tarih' => '17 Mayıs 2026', 'yer' => 'Lab', 'img' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80'],
    ];
}

// Etkinlik silme
if(isset($_GET['sil'])) {
    $idx = (int)$_GET['sil'];
    if(isset($_SESSION['etkinlikler'][$idx])) {
        $silinen = $_SESSION['etkinlikler'][$idx]['ad'];
        array_splice($_SESSION['etkinlikler'], $idx, 1);
        $basari = '"' . $silinen . '" etkinliği başarıyla silindi!';
    }
    header('Location: kulup_panel.php' . (isset($basari) ? '?msg=' . urlencode($basari) : ''));
    exit;
}

// Etkinlik ekleme
$hata = '';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kulup = trim($_POST['kulup'] ?? '');
    $ad    = trim($_POST['ad']    ?? '');
    $tarih = trim($_POST['tarih'] ?? '');
    $yer   = trim($_POST['yer']   ?? '');
    $img   = trim($_POST['img']   ?? '');

    if(empty($ad) || empty($tarih) || empty($yer) || empty($kulup)) {
        $hata = 'Kulüp adı, etkinlik adı, tarih ve yer zorunludur!';
    } else {
        if(empty($img)) {
            $img = 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=800&q=80';
        }
        $_SESSION['etkinlikler'][] = ['ad' => $ad, 'tarih' => $tarih, 'yer' => $yer, 'img' => $img, 'kulup' => $kulup];
        header('Location: kulup_panel.php?msg=' . urlencode('"' . $ad . '" etkinliği başarıyla eklendi!'));
        exit;
    }
}
?>
<?php include 'header.php'; ?>

<div class="view-section" style="display:block;">
    <div style="max-width:1100px; margin:0 auto;">
        <a href="index.php" class="back-btn">← Ana Sayfaya Dön</a>
        <h2 style="color:white; margin-bottom:8px; font-size:2.2rem;">⚙ Kulüp Başkanı Paneli</h2>
        <p style="color:#aaa; margin-bottom:40px;">Hoş geldin, <strong style="color:white;"><?= htmlspecialchars($_SESSION['user']['ad']) ?></strong>! Etkinlik ekleyebilir veya silebilirsin.</p>

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
            <!-- ETKİNLİK EKLEME FORMU -->
            <div class="auth-card" style="margin:0; max-width:none;">
                <h3 style="color:white; margin-bottom:20px;">✨ Yeni Etkinlik Ekle</h3>
                <form method="POST">
                    <label style="color:#ccc; font-size:0.85rem; font-weight:600; display:block; margin-bottom:5px;">Kulüp Adı *</label>
                    <input type="text" name="kulup" placeholder="Örn: Teknofest Kulübü" required>

                    <label style="color:#ccc; font-size:0.85rem; font-weight:600; display:block; margin-bottom:5px;">Etkinlik Adı *</label>
                    <input type="text" name="ad" placeholder="Örn: Python Eğitimi" required>

                    <label style="color:#ccc; font-size:0.85rem; font-weight:600; display:block; margin-bottom:5px;">Tarih *</label>
                    <input type="text" name="tarih" placeholder="Örn: 25 Mayıs 2026" required>

                    <label style="color:#ccc; font-size:0.85rem; font-weight:600; display:block; margin-bottom:5px;">Yer / Mekan *</label>
                    <input type="text" name="yer" placeholder="Örn: Mühendislik Fakültesi" required>

                    <label style="color:#ccc; font-size:0.85rem; font-weight:600; display:block; margin-bottom:5px;">Görsel URL (boş bırakılabilir)</label>
                    <input type="text" name="img" placeholder="https://... (boş bırakırsan varsayılan resim kullanılır)">

                    <button type="submit" class="btn-primary" style="width:100%; padding:16px; margin-top:10px; font-size:1rem;">💾 Etkinliği Kaydet</button>
                </form>
            </div>

            <!-- ETKİNLİK LİSTESİ -->
            <div class="auth-card" style="margin:0; max-width:none;">
                <h3 style="color:white; margin-bottom:20px;">📅 Mevcut Etkinliklerin (<?= count($_SESSION['etkinlikler']) ?>)</h3>

                <?php if(empty($_SESSION['etkinlikler'])): ?>
                    <p style="color:#888; text-align:center; padding:30px;">Henüz etkinlik eklenmemiş.</p>
                <?php else: ?>
                    <?php foreach($_SESSION['etkinlikler'] as $idx => $etk): ?>
                    <div style="display:flex; align-items:center; background:rgba(255,255,255,0.05); padding:18px; border-radius:15px; border:1px solid rgba(255,255,255,0.1); margin-bottom:12px; gap:15px;">
                        <img src="<?= htmlspecialchars($etk['img']) ?>" style="width:80px; height:55px; object-fit:cover; border-radius:10px; flex-shrink:0;">
                        <div style="flex:1; min-width:0;">
                            <h4 style="color:white; margin:0; font-size:1rem;"><?= htmlspecialchars($etk['ad']) ?></h4>
                            <p style="color:var(--accent-red); margin:2px 0; font-size:0.75rem; font-weight:700;"><?= htmlspecialchars($etk['kulup'] ?? 'Kampüs Etkinliği') ?></p>
                            <p style="color:#888; margin:4px 0 0; font-size:0.8rem;">📅 <?= htmlspecialchars($etk['tarih']) ?> · 📍 <?= htmlspecialchars($etk['yer']) ?></p>
                        </div>
                        <a href="kulup_panel.php?sil=<?= $idx ?>" onclick="return confirm('Bu etkinliği silmek istediğine emin misin?')" style="background:#ff4757; color:white; border:none; padding:8px 16px; border-radius:8px; cursor:pointer; font-weight:bold; text-decoration:none; font-size:0.85rem; flex-shrink:0;">🗑 SİL</a>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

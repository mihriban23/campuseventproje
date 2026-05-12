<?php
include 'header.php';
// Oturum kontrolü (opsiyonel ama öğrenci girmesi mantıklı)
if(!isset($_SESSION['user'])) {
    // Giriş yapmamışsa bile formu doldurabilsin ama giriş yapsa daha iyi olurdu. 
    // Kullanıcı giriş yapmışsa bilgileri otomatik doldurabiliriz.
}

$etkinlik_adi = $_GET['etkinlik'] ?? 'Seçili Etkinlik';
?>

<div class="view-section" style="display:block;">
    <div class="auth-card" style="max-width:650px;">
        <a href="events.php" class="back-btn">← Etkinliklere Dön</a>
        <h2 style="color:white; margin-bottom:10px; text-align:center;">🎟 Bilet Al</h2>
        <p style="text-align:center; color:#888; margin-bottom:35px;">
            Şu etkinlik için bilet alıyorsunuz:<br>
            <strong style="color:var(--accent-red); font-size:1.2rem;"><?= htmlspecialchars($etkinlik_adi) ?></strong>
        </p>

        <form onsubmit="event.preventDefault(); alert('Tebrikler! Biletiniz başarıyla alınmıştır. Kayıtlı e-posta adresinize detaylar gönderildi.'); window.location.href='index.php';">
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px;">
                <div>
                    <label style="color:#ccc; font-size:0.85rem; font-weight:600; display:block; margin-bottom:5px;">Ad Soyad *</label>
                    <input type="text" placeholder="Adınız Soyadınız" value="<?= htmlspecialchars($_SESSION['user']['ad'] ?? '') ?>" required>
                </div>
                <div>
                    <label style="color:#ccc; font-size:0.85rem; font-weight:600; display:block; margin-bottom:5px;">Öğrenci Numarası *</label>
                    <input type="text" placeholder="220xxxxxxx" value="<?= htmlspecialchars($_SESSION['user']['no'] ?? '') ?>" required>
                </div>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px;">
                <div>
                    <label style="color:#ccc; font-size:0.85rem; font-weight:600; display:block; margin-bottom:5px;">Bölüm *</label>
                    <input type="text" placeholder="Örn: Bilgisayar Mühendisliği" required>
                </div>
                <div>
                    <label style="color:#ccc; font-size:0.85rem; font-weight:600; display:block; margin-bottom:5px;">Sınıf *</label>
                    <select required>
                        <option value="" disabled selected>Seçin...</option>
                        <option value="1">1. Sınıf</option>
                        <option value="2">2. Sınıf</option>
                        <option value="3">3. Sınıf</option>
                        <option value="4">4. Sınıf</option>
                        <option value="Lisansüstü">Lisansüstü</option>
                    </select>
                </div>
            </div>

            <label style="color:#ccc; font-size:0.85rem; font-weight:600; display:block; margin-bottom:5px;">Telefon Numarası *</label>
            <input type="tel" placeholder="05xx xxx xx xx" required>

            <label style="color:#ccc; font-size:0.85rem; font-weight:600; display:block; margin-bottom:5px;">E-posta Adresi *</label>
            <input type="email" placeholder="ornek@karabuk.edu.tr" required>

            <div style="background:rgba(255,255,255,0.03); padding:20px; border-radius:15px; border:1px dashed rgba(255,255,255,0.1); margin:20px 0; text-align:center;">
                <p style="color:#aaa; font-size:0.85rem; margin:0;">Bu işlem ücretsizdir. Biletiniz dijital olarak oluşturulacaktır.</p>
            </div>

            <button type="submit" class="btn-primary" style="width:100%; padding:18px; font-size:1.1rem; font-weight:700;">🎫 BİLETİ OLUŞTUR VE TAMAMLA</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>

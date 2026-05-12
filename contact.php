<?php include 'header.php'; ?>

<div class="view-section" style="display:block;">
    <div class="auth-card">
        <h2 style="margin-bottom:10px;">İletişim</h2>
        <p style="color:#aaa; margin-bottom:30px;">Bize mesaj gönderin, en kısa sürede dönüş yapalım.</p>
        
        <form onsubmit="alert('Mesajınız başarıyla gönderildi!'); window.location.href='index.php'; return false;">
            <div style="display:flex; gap:10px;">
                <input type="text" placeholder="Ad Soyad" required>
                <input type="email" placeholder="E-posta" required>
            </div>
            <input type="text" placeholder="Konu" required>
            <textarea placeholder="Mesajınız" style="width:100%; height:150px; background:#111; color:white; border-radius:10px; padding:15px; border:1px solid #333; margin-bottom:15px; font-family:inherit;"></textarea>
            <button type="submit" class="btn-primary" style="width:100%;">Mesajı Gönder</button>
        </form>
        
        <div style="margin-top:30px; text-align:center; color:#666; font-size:0.9rem;">
            📍 Karabük Üniversitesi Kampüsü<br>
            📧 iletisim@campusevent.com
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<?php include 'header.php'; ?>

<div class="view-section" style="display:block;">
    <div class="auth-card">
        <a href="index.php" class="back-btn">← Ana Sayfaya Dön</a>
        <h2 style="margin-bottom:30px; text-align:center;">Kayıt Seçenekleri</h2>
        
        <div id="reg-role-selection">
            <button class="btn-secondary" style="width:100%; margin-bottom:15px; padding:20px;" onclick="openRegForm('Öğrenci')">🎓 Öğrenci Kaydı</button>
            <button class="btn-secondary" style="width:100%; margin-bottom:15px; padding:20px;" onclick="openRegForm('Kulüp Başkanı')">🏢 Kulüp Başkanı Kaydı</button>
            <button class="btn-secondary" style="width:100%; margin-bottom:15px; padding:20px;" onclick="openRegForm('Yönetici')">⚙️ Yönetici Kaydı</button>
            <p style="text-align:center; margin-top:25px;">Zaten üye misin? <a href="login.php" style="color:var(--accent-red); font-weight:700; text-decoration:none;">Giriş Yap</a></p>
        </div>

        <div id="reg-form-area" style="display:none;">
            <button onclick="toggleRegForms()" style="background:none; border:none; color:var(--accent-red); cursor:pointer; margin-bottom:20px;">← Geri</button>
            <h2 id="r-title" style="margin-bottom:25px;">Kayıt</h2>
            <form onsubmit="doRegister(event)">
                <div style="display:flex; gap:10px;"><input type="text" placeholder="Ad" required><input type="text" placeholder="Soyad" required></div>
                <input type="text" placeholder="Öğrenci Numarası / ID" required>
                <input type="email" placeholder="E-posta" required>
                <input type="tel" placeholder="Telefon" required>
                <input type="password" id="r-p" placeholder="Şifre" required>
                <input type="password" id="r-pc" placeholder="Şifre Tekrar" required>
                <button type="submit" class="btn-primary" style="width:100%;">Kaydı Tamamla</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openRegForm(role) {
        document.getElementById('reg-role-selection').style.display = 'none';
        document.getElementById('reg-form-area').style.display = 'block';
        document.getElementById('r-title').innerText = role + ' Kaydı';
    }
    function toggleRegForms() {
        document.getElementById('reg-role-selection').style.display = 'block';
        document.getElementById('reg-form-area').style.display = 'none';
    }
</script>

<?php include 'footer.php'; ?>

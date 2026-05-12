<?php include 'header.php'; ?>

<div class="view-section" style="display:block;">
    <div class="auth-card">
        <a href="index.php" class="back-btn">← Ana Sayfaya Dön</a>
        <h2 style="margin-bottom:30px; text-align:center;">Giriş Seçenekleri</h2>
        
        <div id="role-selection">
            <button class="btn-primary" style="width:100%; margin-bottom:15px; padding:20px;" onclick="openLoginForm('Öğrenci')">🎓 Öğrenci Girişi</button>
            <button class="btn-primary" style="width:100%; margin-bottom:15px; padding:20px;" onclick="openLoginForm('Kulüp Başkanı')">🏢 Kulüp Başkanı Girişi</button>
            <button class="btn-primary" style="width:100%; margin-bottom:15px; padding:20px;" onclick="openLoginForm('Yönetici')">⚙️ Yönetici Girişi</button>
            <p style="text-align:center; margin-top:25px;">Hesabın yok mu? <a href="register.php" style="color:var(--accent-red); font-weight:700; text-decoration:none;">Hemen Kayıt Ol</a></p>
        </div>

        <div id="login-form-area" style="display:none;">
            <button onclick="toggleLoginForms()" style="background:none; border:none; color:var(--accent-red); cursor:pointer; margin-bottom:20px;">← Geri</button>
            <h2 id="l-title" style="margin-bottom:25px;">Giriş</h2>
            <form onsubmit="doLogin(event)">
                <input type="text" id="l-no" placeholder="Öğrenci Numarası / ID" required>
                <input type="password" id="l-pass" placeholder="Şifre" required>
                <button type="submit" class="btn-primary" style="width:100%;">Giriş Yap</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openLoginForm(role) {
        document.getElementById('role-selection').style.display = 'none';
        document.getElementById('login-form-area').style.display = 'block';
        document.getElementById('l-title').innerText = role + ' Girişi';
    }
    function toggleLoginForms() {
        document.getElementById('role-selection').style.display = 'block';
        document.getElementById('login-form-area').style.display = 'none';
    }
</script>

<?php include 'footer.php'; ?>

<?php include 'header.php'; ?>

<!-- ANA SAYFA İÇERİĞİ -->
<div id="home-view" style="display:block; padding-top:100px;">
    <section class="hero">
        <h1>Karabük Üniversitesi</h1>
        <p>Kampüs sosyal ağına katıl, etkinlikleri keşfet ve yerini al.</p>
        <div class="hero-btns">
            <a href="login.php" class="btn-primary" style="text-decoration:none;">GİRİŞ YAP</a>
            <a href="register.php" class="btn-secondary" style="text-decoration:none;">KAYIT OL</a>
        </div>
    </section>

    <!-- KATEGORİLER -->
    <section class="section" id="categories">
        <h2 class="section-title">KATEGORİLER</h2>
        <div class="category-grid">
            <div class="category-card" onclick="openCategory(1, 'Konserler')">
                <img src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?auto=format&fit=crop&w=800&q=80" alt="Konserler">
                <div class="category-overlay"><h3>Konserler</h3><p>Müzik ve Eğlence!</p></div>
            </div>
            <div class="category-card" onclick="openCategory(2, 'Kulüp Faaliyetleri')">
                <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?auto=format&fit=crop&w=800&q=80" alt="Kulüp Faaliyetleri">
                <div class="category-overlay"><h3>Kulüp Faaliyetleri</h3><p>Kampüs Enerjisi!</p></div>
            </div>
            <div class="category-card" onclick="openCategory(3, 'Kurslar ve Workshoplar')">
                <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80" alt="Kurslar">
                <div class="category-overlay"><h3>Kurslar ve Workshoplar</h3><p>Kendini Geliştir!</p></div>
            </div>
        </div>
    </section>

    <!-- POPÜLER ETKİNLİKLER -->
    <section class="section" id="events">
        <h2 class="section-title">POPÜLER ETKİNLİKLER</h2>
        <div id="popular-grid" class="event-grid">
            <!-- script.js dolduracak -->
        </div>
    </section>
</div>

<!-- ALT SAYFA GÖRÜNÜMLERİ (Yine index içinde kalabilir veya ayrımlara devam edebiliriz) -->
<div id="about-view" class="view-section">
    <div class="auth-card">
        <button class="back-btn" onclick="showView('home-view')">← Ana Sayfaya Dön</button>
        <h2>Hakkımızda</h2>
        <p style="color:#ccc; line-height:1.8;">Kampüs hayatını güzelleştirmek için buradayız.</p>
    </div>
</div>

<div id="contact-view" class="view-section">
    <div class="auth-card">
        <button class="back-btn" onclick="showView('home-view')">← Ana Sayfaya Dön</button>
        <h2>İletişim</h2>
        <form onsubmit="alert('Mesajınız alındı!'); showView('home-view')">
            <input type="text" placeholder="Ad Soyad" required>
            <input type="email" placeholder="E-posta" required>
            <textarea placeholder="Mesajınız" style="width:100%; height:100px; background:#111; color:white; border-radius:10px; padding:15px; border:1px solid #333; margin-bottom:15px;"></textarea>
            <button type="submit" class="btn-primary" style="width:100%;">Gönder</button>
        </form>
    </div>
</div>

<div id="all-events-view" class="view-section">
    <div style="max-width:800px; margin:0 auto;">
        <button class="back-btn" onclick="showView('home-view')">← Ana Sayfaya Dön</button>
        <h2 class="category-title">Tüm Etkinlikler</h2>
        <div id="all-events-list" class="event-list-container"></div>
    </div>
</div>

<div id="category-view" class="view-section">
    <div style="max-width:800px; margin:0 auto;">
        <button id="cat-back-btn" class="back-btn">← Ana Sayfaya Dön</button>
        <h2 id="cat-title" class="category-title"></h2>
        <div id="event-list" class="event-list-container"></div>
    </div>
</div>

<?php include 'footer.php'; ?>

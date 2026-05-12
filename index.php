<?php
// require_once 'includes/db.php';
// $events = $pdo->query("SELECT * FROM events LIMIT 4")->fetchAll();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusEvent | Karabük Üniversitesi Etkinlik Bileti</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <div class="logo">Campus<span>Event</span></div>
        <nav>
            <ul>
                <li><a href="#">Ana Sayfa</a></li>
                <li><a href="#">Etkinlikler</a></li>
                <li><a href="#">Hakkımızda</a></li>
                <li><a href="#">İletişim</a></li>
            </ul>
        </nav>
        <button class="btn-login">Giriş Yap</button>
    </header>

    <main>
        <section class="hero">
            <h1>Karabük Üniversitesi</h1>
            <p>ÖĞRENCİLERİ İÇİN ÖZEL ETKİNLİK BİLETLERİ</p>
            <div class="hero-btns">
                <button class="btn-primary">ETKİNLİKLERİ KEŞFET</button>
                <button class="btn-secondary">BİZİ TAKİP EDİN</button>
            </div>
        </section>

        <section class="section">
            <div class="category-grid">
                <div class="category-card" onclick="filterEvents(1)">
                    <img src="assets/images/concerts.png" alt="Konserler">
                    <div class="category-overlay">
                        <h3>Konserler</h3>
                        <p>Sahnede Unutulmaz Geceler!</p>
                    </div>
                </div>
                <div class="category-card" onclick="filterEvents(2)">
                    <img src="assets/images/parties.png" alt="Kulüp Faaliyetleri">
                    <div class="category-overlay">
                        <h3>Kulüp Faaliyetleri</h3>
                        <p>Kulüplerin Enerjisi Kampüste!</p>
                    </div>
                </div>
                <div class="category-card" onclick="filterEvents(3)">
                    <img src="assets/images/workshops.png" alt="Kurslar ve Workshoplar">
                    <div class="category-overlay">
                        <h3>Kurslar ve Workshoplar</h3>
                        <p>Yeni Yetenekler Keşfet!</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="events-section">
            <h2 class="section-title">ETKİNLİKLER</h2>
            <div id="event-list" class="event-list-container">
                <!-- AJAX or Static Events will load here -->
                <div class="event-list-item">
                    <div class="event-list-info">
                        <img src="assets/images/jazz.png" alt="Jazz">
                        <div>
                            <h3>Genç Caz Grubu</h3>
                            <p>20 Mayıs 2026 - Karabük Kampüsü</p>
                        </div>
                    </div>
                    <button class="btn-primary">Bilet Al</button>
                </div>
                <!-- Other events... -->
            </div>
        </section>

        <section class="section" style="background: var(--primary-gradient); border-radius: 20px; text-align: center; margin: 0 10% 80px;">
            <h2 style="font-size: 2rem; margin-bottom: 20px;">ERKEN AL, AVANTAJLI BİLET FIRSATLARINI KAÇIRMA!</h2>
            <button class="btn-login" style="background: white; color: black; font-weight: 700; padding: 15px 40px;">HEMEN SATIN AL</button>
        </section>
    </main>

    <footer>
        <div class="footer-features">
            <div class="feature-item">Güvenli Ödeme</div>
            <div class="feature-item">7/24 Destek</div>
            <div class="feature-item">Öğrenciye Özel Fiyatlar</div>
        </div>
        <div class="social-links">
            <a href="#" class="social-icon">Y</a>
            <a href="#" class="social-icon">T</a>
            <a href="#" class="social-icon">F</a>
            <a href="#" class="social-icon">I</a>
        </div>
    </footer>
    <script src="assets/js/script.js"></script>
</body>
</html>

<!-- header.php -->
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusEvent | Kampüs Yönetim Platformu</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .back-btn { margin-bottom: 25px; display: inline-block; padding: 10px 20px; background: rgba(255,255,255,0.1); border-radius: 8px; cursor: pointer; border: 1px solid rgba(255,255,255,0.1); color: white; text-decoration:none; transition: 0.3s; }
        .back-btn:hover { background: white; color: black; }
        input, select { width: 100%; padding: 14px; margin-bottom: 15px; border-radius: 10px; background: #111; border: 1px solid #333; color: white; }
    </style>
</head>
<body>
    <header>
        <div class="logo"><a href="index.php" style="text-decoration:none; color:inherit;">Campus<span>Event</span></a></div>
        <nav>
            <ul>
                <li><a href="index.php">Ana Sayfa</a></li>
                <li><a href="events.php">Etkinlikler</a></li>
                <li><a href="about.php">Hakkımızda</a></li>
                <li><a href="contact.php">İletişim</a></li>
            </ul>
        </nav>
        <div class="header-btns">
            <a href="login.php" class="btn-login" id="nav-login-btn" style="text-decoration:none;">Giriş Yap</a>
        </div>
    </header>

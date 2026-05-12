document.addEventListener('DOMContentLoaded', () => {
    console.log('CampusEvent Ready');

    // Simple smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Login/Register Modal Logic (Placeholder for UI implementation)
    const loginBtn = document.querySelector('.btn-login');
    loginBtn.addEventListener('click', () => {
        alert('Giriş sistemi hazırlanıyor... (API endpointleri mevcut)');
    });

    // Example AJAX for login (To be integrated with actual forms)
    async function handleLogin(email, password) {
        const formData = new FormData();
        formData.append('email', email);
        formData.append('password', password);

        const response = await fetch('api/auth.php?action=login', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        if (result.success) {
            alert('Hoş geldiniz, ' + result.user);
            window.location.reload();
        } else {
            alert(result.message);
        }
    const eventsData = {
        1: [
            { title: 'Genç Caz Grubu', date: '20 Mayıs 2026', loc: 'Karabük Kampüsü', img: 'assets/images/jazz.png' },
            { title: 'Ateş Eşliğinde Gitar', date: '22 Mayıs 2026', loc: 'Karabük Kampüsü', img: 'assets/images/guitar_fire.png' }
        ],
        2: [
            { title: 'Teknofest Tanıtım', date: '15 Mayıs 2026', loc: 'Konferans Salonu', img: 'assets/images/hero-bg.png' },
            { title: 'IEEE Workshop', date: '16 Mayıs 2026', loc: 'Laboratuvar', img: 'assets/images/concerts.png' },
            { title: 'Bilimtey Bilim Günü', date: '17 Mayıs 2026', loc: 'Rektörlük', img: 'assets/images/parties.png' },
            { title: 'TEMA Doğa Yürüyüşü', date: '18 Mayıs 2026', loc: 'Yenice Ormanları', img: 'assets/images/workshops.png' }
        ],
        3: [
            { title: 'Microsoft Araçları', date: '1 Haziran 2026', loc: 'Online', img: 'assets/images/workshops.png' },
            { title: 'Gitar Öğrenme Kursu', date: '5 Haziran 2026', loc: 'Sanat Atölyesi', img: 'assets/images/hero-bg.png' }
        ]
    };

    window.filterEvents = (categoryId) => {
        const container = document.getElementById('event-list');
        const events = eventsData[categoryId] || [];
        
        container.innerHTML = events.map(event => `
            <div class="event-list-item">
                <div class="event-list-info">
                    <img src="${event.img}" alt="${event.title}">
                    <div>
                        <h3>${event.title}</h3>
                        <p>${event.date} - ${event.loc}</p>
                    </div>
                </div>
                <button class="btn-primary">Bilet Al</button>
            </div>
        `).join('');

        document.getElementById('events-section').scrollIntoView({ behavior: 'smooth' });
    };

    // Initialize with first category
    filterEvents(1);
});


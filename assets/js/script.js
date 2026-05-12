document.addEventListener('DOMContentLoaded', () => {
    console.log('CampusEvent V45 - Smart Navigation & Guitar Course Loaded');

    const eventsData = {
        1: [
            { title: 'Genç Caz Grubu', date: '20 Mayıs 2026', loc: 'Kampüs', img: 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=800&q=80' },
            { title: 'Ateş Eşliğinde Gitar', date: '22 Mayıs 2026', loc: 'Kampüs', img: 'https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?auto=format&fit=crop&w=800&q=80' }
        ],
        2: {
            'Teknofest': [
                { title: 'İHA Yapma Eğitimi', date: '15 Mayıs', loc: 'Hangar', img: 'https://images.unsplash.com/photo-1508614589041-895b88991e3e?auto=format&fit=crop&w=800&q=80' },
                { title: 'BAYKAR Gezisi', date: '16 Mayıs', loc: 'İstanbul', img: 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80' }
            ],
            'IEEE': [{ title: 'SAP Eğitimi', date: '17 Mayıs', loc: 'Lab', img: 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80' }],
            'Bilimtey': [{ title: 'Bilim Fuarı', date: '19 Mayıs', loc: 'Meydan', img: 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=800&q=80' }],
            'TEMA': [{ title: 'SafranKamp', date: '20 Mayıs', loc: 'Doğa', img: 'https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?auto=format&fit=crop&w=800&q=80' }],
            'Genç Girişimciler': [{ title: 'Girişimcilik', date: '21 Mayıs', loc: 'Salon', img: 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=80' }]
        },
        3: [
            { title: 'Microsoft Kursu', date: '1 Haz', loc: 'Lab', img: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80' },
            { title: 'Gitar Öğrenme Kursu', date: '5 Haziran 2026', loc: 'Müzik Atölyesi', img: 'https://images.unsplash.com/photo-1525201548942-d8732f6617a0?auto=format&fit=crop&w=800&q=80' }
        ]
    };

    window.showView = function(id) {
        document.querySelectorAll('#home-view, .view-section').forEach(v => v.style.display = 'none');
        document.getElementById(id).style.display = 'block';
        window.scrollTo(0, 0);
    };

    window.openCategory = function(id, title) {
        showView('category-view');
        const backBtn = document.getElementById('cat-back-btn');
        backBtn.innerText = '← Ana Sayfaya Dön';
        backBtn.onclick = () => showView('home-view');
        
        document.getElementById('cat-title').innerText = title;
        const list = document.getElementById('event-list');
        list.innerHTML = '';

        if (id === 2) {
            list.innerHTML = Object.keys(eventsData[2]).map(n => `
                <div class="event-list-item" style="cursor:pointer; margin-bottom:15px; padding:25px; background:rgba(255,255,255,0.05); border-radius:15px; border:1px solid rgba(255,255,255,0.1);" onclick="showClubEvents('${n}')">
                    <strong style="font-size:1.4rem;">${n} Kulübü</strong>
                    <div style="color:var(--accent-red); margin-top:5px;">Etkinlikleri Gör →</div>
                </div>
            `).join('');
        } else {
            renderEvents(eventsData[id] || [], list);
        }
    };

    window.showClubEvents = function(name) {
        document.getElementById('cat-title').innerText = name + ' Kulübü';
        const backBtn = document.getElementById('cat-back-btn');
        backBtn.innerText = '← Kulüplere Dön';
        backBtn.onclick = () => openCategory(2, 'Kulüp Faaliyetleri'); // Kulüpler listesine geri döner

        renderEvents(eventsData[2][name] || [], document.getElementById('event-list'));
    };

    function renderEvents(data, container) {
        container.innerHTML = data.map(e => `
            <div class="event-list-item" style="display:flex; align-items:center; margin-bottom:20px; background:rgba(255,255,255,0.05); padding:20px; border-radius:20px; border: 1px solid rgba(255,255,255,0.1);">
                <img src="${e.img}" style="width:130px; height:90px; object-fit:cover; border-radius:15px; margin-right:20px;">
                <div style="flex:1;">
                    <h3 style="margin:0;">${e.title}</h3>
                    <p style="margin:5px 0; color:#aaa;">📅 ${e.date} - 📍 ${e.loc}</p>
                </div>
                <button class="btn-primary" onclick="alert('Lütfen önce giriş yapın!')">Bilet Al</button>
            </div>
        `).join('');
    }

    // Popular Grid fill on Home
    const popGrid = document.getElementById('popular-grid');
    if(popGrid) {
        const pops = [eventsData[2]['Teknofest'][0], eventsData[2]['Teknofest'][1], eventsData[2]['IEEE'][0], eventsData[2]['Bilimtey'][0]];
        popGrid.innerHTML = pops.map(e => `
            <div class="event-card">
                <img src="${e.img}" class="event-img">
                <div class="event-content">
                    <span class="event-date">${e.date}</span>
                    <h3 class="event-title">${e.title}</h3>
                    <p class="event-location">${e.loc}</p>
                    <button class="btn-ticket" onclick="alert('Önce giriş yapmalısın!')">BİLET AL</button>
                </div>
            </div>
        `).join('');
    }

    // Common Auth Logics
    window.openLoginForm = (role) => { showView('login-form-view'); document.getElementById('l-title').innerText = role + ' Girişi'; };
    window.openRegisterForm = (role) => { showView('register-form-view'); document.getElementById('r-title').innerText = role + ' Kaydı'; };
    window.doLogin = (e) => { e.preventDefault(); alert('Giriş Başarılı!'); showView('home-view'); };
    window.doRegister = (e) => { e.preventDefault(); alert('Kayıt Başarılı!'); showView('login-view'); };
    window.showAllEvents = () => {
        showView('all-events-view');
        const all = [...eventsData[1], ...eventsData[3]];
        Object.keys(eventsData[2]).forEach(c => eventsData[2][c].forEach(e => all.push(e)));
        renderEvents(all, document.getElementById('all-events-list'));
    };
});

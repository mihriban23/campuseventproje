<?php include 'header.php'; ?>

<div style="padding-top:120px; min-height:100vh; background:#000;">
    <div style="max-width:900px; margin:0 auto; padding:0 20px 80px;">
        
        <a href="index.php" class="back-btn">&#8592; Ana Sayfaya Dön</a>

        <h2 style="color:white; margin-bottom:30px; font-size:2.5rem; font-weight:800;">Tüm Etkinlikler</h2>

        <div style="display:flex; align-items:center; gap:15px;">
            <button id="prev-btn" onclick="prevPage()" style="flex-shrink:0; background:#111; border:1px solid rgba(255,255,255,0.15); color:white; width:55px; height:55px; border-radius:50%; font-size:1.5rem; cursor:pointer; visibility:hidden;">&#10094;</button>
            <div id="event-list" style="flex:1; display:flex; flex-direction:column; gap:15px;"></div>
            <button id="next-btn" onclick="nextPage()" style="flex-shrink:0; background:#111; border:1px solid rgba(255,255,255,0.15); color:white; width:55px; height:55px; border-radius:50%; font-size:1.5rem; cursor:pointer;">&#10095;</button>
        </div>

    </div>
</div>

<script>
var allEvents = [
    { title: 'Genç Caz Grubu',       date: '20 Mayıs 2026',  loc: 'Kampüs',          img: 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=800&q=80' },
    { title: 'Ateş Eşliğinde Gitar', date: '22 Mayıs 2026',  loc: 'Kampüs',          img: 'https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?auto=format&fit=crop&w=800&q=80' },
    { title: 'Microsoft Kursu',       date: '1 Haziran 2026', loc: 'Lab',             img: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80' },
    { title: 'Gitar Öğrenme Kursu',  date: '5 Haziran 2026', loc: 'Müzik Atölyesi', img: 'https://images.unsplash.com/photo-1525201548942-d8732f6617a0?auto=format&fit=crop&w=800&q=80' },
    { title: 'İHA Yapma Eğitimi',    date: '15 Mayıs',       loc: 'Hangar',          img: 'https://images.unsplash.com/photo-1508614589041-895b88991e3e?auto=format&fit=crop&w=800&q=80' },
    { title: 'BAYKAR Gezisi',         date: '16 Mayıs',       loc: 'İstanbul',        img: 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80' },
    { title: 'SAP Eğitimi',           date: '17 Mayıs',       loc: 'Lab',             img: 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80' },
    { title: 'Bilim Fuarı',           date: '19 Mayıs',       loc: 'Meydan',          img: 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=800&q=80' },
    { title: 'SafranKamp',            date: '20 Mayıs',       loc: 'Doğa',            img: 'https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?auto=format&fit=crop&w=800&q=80' },
    { title: 'Girişimcilik',          date: '21 Mayıs',       loc: 'Salon',           img: 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=80' }
];
var PER_PAGE = 3;
var page = 0;

function render() {
    var list = document.getElementById('event-list');
    var start = page * PER_PAGE;
    var slice = allEvents.slice(start, start + PER_PAGE);
    list.innerHTML = slice.map(function(e) {
        return '<div style="display:flex;align-items:center;background:rgba(255,255,255,0.05);padding:20px;border-radius:20px;border:1px solid rgba(255,255,255,0.1);">'
            + '<img src="' + e.img + '" style="width:130px;height:90px;object-fit:cover;border-radius:15px;margin-right:20px;flex-shrink:0;">'
            + '<div style="flex:1;">'
            + '<h3 style="margin:0;color:white;">' + e.title + '</h3>'
            + '<p style="margin:6px 0 0;color:#aaa;">&#128197; ' + e.date + ' &nbsp;&middot;&nbsp; &#128205; ' + e.loc + '</p>'
            + '</div>'
            + '<button class="btn-primary" onclick="alert(\'Lütfen önce giriş yapın!\')">Bilet Al</button>'
            + '</div>';
    }).join('');
    document.getElementById('prev-btn').style.visibility = page > 0 ? 'visible' : 'hidden';
    document.getElementById('next-btn').style.visibility = (start + PER_PAGE) < allEvents.length ? 'visible' : 'hidden';
}
function prevPage() { if (page > 0) { page--; render(); } }
function nextPage() { if ((page + 1) * PER_PAGE < allEvents.length) { page++; render(); } }
render();
</script>

<?php include 'footer.php'; ?>

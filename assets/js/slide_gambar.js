const daftarGambar = [
    "https://images.unsplash.com/photo-1558005530-a7958896ec60?auto=format&fit=crop&w=1200&q=80",
    "https://images.unsplash.com/photo-1502086223501-7ea6ecd79368?auto=format&fit=crop&w=1200&q=80",
    "https://images.unsplash.com/photo-1531662439848-a7ed93c51468?auto=format&fit=crop&w=1200&q=80"
];

let indexSekarang = 0;

const imgMobile = document.getElementById('hero-mobile');
const imgDesktop = document.getElementById('hero-desktop');

// Paksa pasang style transisi halus lewat CSS bawaan browser
if (imgMobile) imgMobile.style.transition = "opacity 0.8s ease-in-out";
if (imgDesktop) imgDesktop.style.transition = "opacity 0.8s ease-in-out";

function gantiGambar() {
    indexSekarang = (indexSekarang + 1) % daftarGambar.length;
    
    // 1. Buat gambar transparan (Fade Out)
    if (imgMobile) imgMobile.style.opacity = "0";
    if (imgDesktop) imgDesktop.style.opacity = "0";

    // 2. Tunggu 800ms sampai menghilang, baru ganti gambarnya
    setTimeout(() => {
        if (imgMobile) imgMobile.src = daftarGambar[indexSekarang];
        if (imgDesktop) imgDesktop.src = daftarGambar[indexSekarang];

        // 3. Munculkan kembali (Fade In ke tingkat opacity semula)
        if (imgMobile) imgMobile.style.opacity = "0.6";
        if (imgDesktop) imgDesktop.style.opacity = "0.6";
    }, 800); 
}

// Ganti gambar setiap 4 detik
setInterval(gantiGambar, 2800);
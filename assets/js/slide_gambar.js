console.log('Slide Hero Loaded');
console.log(daftarGambar);

let indexSekarang = 0;

const imgMobile = document.getElementById('hero-mobile');
const imgDesktop = document.getElementById('hero-desktop');

if (imgMobile) {
    imgMobile.style.transition = "opacity 0.8s ease";
}

if (imgDesktop) {
    imgDesktop.style.transition = "opacity 0.8s ease";
}

function gantiGambar() {
    console.log('Ganti gambar');
    indexSekarang++;

    if (indexSekarang >= daftarGambar.length) {
        indexSekarang = 0;
    }

    if (imgMobile) imgMobile.style.opacity = "0";
    if (imgDesktop) imgDesktop.style.opacity = "0";

    setTimeout(() => {

        if (imgMobile) {
            imgMobile.src = daftarGambar[indexSekarang];
            imgMobile.style.opacity = "0.6";
        }

        if (imgDesktop) {
            imgDesktop.src = daftarGambar[indexSekarang];
            imgDesktop.style.opacity = "0.6";
        }

    }, 800);
}

if (typeof daftarGambar !== 'undefined' && daftarGambar.length > 1) {
    setInterval(gantiGambar, 4000);
}
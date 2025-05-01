document.addEventListener("DOMContentLoaded", () => {

    const images = [
        'medias/commun/MesImages/DLX-Siege-Prime-53.jpg',
        'medias/commun/MesImages/jesus-christ-8168123_1280.webp',
        'medias/commun/MesImages/OIP.jpg',
        'medias/commun/MesImages/Logo.png',
        'medias/commun/MesImages/400e419dad8ccf40e9c104ace840e400.jpg',
        'medias/commun/MesImages/194896e14e327-screenshotUrl 1.jpg',
        'medias/commun/MesImages/BtQxe39TyIl3UERBTrhb--0--m3tx1.jpg',
        'medias/commun/MesImages/death.jpg',
        'medias/commun/MesImages/logo ghost.png',
        'medias/commun/MesImages/OIP (1).jpg',
        'medias/commun/MesImages/tmp_2011adbd-a2d0-47b1-800b-32a6db5b8467.jpeg',
        'medias/commun/MesImages/GpUp5d7ZsxfjXeatKUTB--0--2gllm.jpg',
        'medias/commun/MesImages/dessin robot badass.jpg'
    ];

    const elements = document.querySelectorAll('.item-bg');

    elements.forEach(el => {
        const randomImg = images[Math.floor(Math.random() * images.length)];
        el.style.backgroundImage = `url('${randomImg}')`;
        el.style.backgroundSize = 'contain';
    });
});
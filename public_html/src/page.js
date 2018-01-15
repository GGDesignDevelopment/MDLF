(function() {
    const imgs = document.querySelectorAll('.page-content img');
    const body = document.querySelector('body');
    const photos = document.querySelectorAll('.page-photos img');
    const modal = document.querySelector('#modal-content');
    const modalImg = modal.querySelector('#modal-image');
    const modalClose = modal.querySelector('#modal-close');


    modalClose.addEventListener('click', closeModal);
    body.addEventListener('keydown',escModal);

    for(i=0 ; i<imgs.length ; i++){
        imgs[i].addEventListener('load',resizeImage);
        imgs[i].src = imgs[i].src
    }

    for (var i = 0; i < photos.length; i++) {
        photos[i].addEventListener('click',openModal);
    }

    function resizeImage(event) {
        if (event.target.width >= event.target.height) {
            event.target.classList.add('ancho');
        } else {
            event.target.classList.add('largo');
        }
    }

    function openModal(e) {
        modal.style.display = 'flex';
        modalImg.src = e.target.src;
        body.classList.add('modal-open');
    }

    function escModal(e) {
        if (e.keyCode == 27) {
            closeModal();
        }
    }

    function closeModal() {
        modal.style.display = 'none';
        body.classList.remove('modal-open');
    }
})();

(function() {
    const imgs = document.querySelectorAll('.page-content img');
    const body = document.querySelector('body');
    const photos = document.querySelectorAll('.page-photos img');
    const modal = document.querySelector('#modal-content');
    const modalImages = modal.querySelectorAll('.modal-image');
    const modalClose = modal.querySelector('#modal-close');
    const modalPrev = modal.querySelector('#modal-prev');
    const modalNext = modal.querySelector('#modal-next');

    let slideIndex = 1;

    modalClose.addEventListener('click', closeModal);
    body.addEventListener('keydown', modalControl);
    modalPrev.addEventListener('click', () => moveSlides(-1));
    modalNext.addEventListener('click', () => moveSlides(1));

    for(let i=0 ; i<imgs.length ; i++){
        if (imgs[i].complete) {
            resizeImage(imgs[i]);
        } else {
            imgs[i].addEventListener('load',() => resizeImage(imgs[i]));
        }
    }

    for (let i = 0; i < photos.length; i++) {
        photos[i].addEventListener('click', function(){
            openModal();
            currentSlide(i+1);
        });
    }

    function resizeImage(img) {
        if (img.width >= img.height) {
            img.classList.add('ancho');
        } else {
            img.classList.add('largo');
        }
    }

    function openModal(e) {
        modal.style.display = 'flex';
        body.classList.add('modal-open');
    }

    function modalControl(e) {
        if (e.keyCode == 27) {
            closeModal();
        }
        if (e.keyCode == 37) {
            moveSlides(-1);
        }
        if (e.keyCode == 39) {
            moveSlides(1);
        }
    }

    function closeModal() {
        modal.style.display = 'none';
        body.classList.remove('modal-open');
    }

    function moveSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        if (n > modalImages.length) {slideIndex = 1}
        if (n < 1) {slideIndex = modalImages.length}
        for (let i = 0; i < modalImages.length; i++) {
            modalImages[i].style.display = "none";
        }
        modalImages[slideIndex-1].style.display = "block";
    }
})();

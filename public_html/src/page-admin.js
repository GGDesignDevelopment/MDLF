(function() {
    const imgs = document.querySelectorAll('.page-content img');
    const body = document.querySelector('body');
    const photos = document.querySelectorAll('.page-photos img');
    const modal = document.querySelector('#modal-content');
    const modalImages = modal.querySelectorAll('.modal-image');
    const modalClose = modal.querySelector('#modal-close');
    const modalPrev = modal.querySelector('#modal-prev');
    const modalNext = modal.querySelector('#modal-next');
    const btnNew = document.querySelector('#btnNew');
    const btnDelete = document.querySelector('#btnDelete');
    const btnCancel = document.querySelector('#btnCancel');
    const btnSave = document.querySelector('#btnSave');

    const titulo = document.querySelector("input[name='titulo']");
    const texto = document.querySelector("textarea[name='texto']");
    const padre = document.querySelector("select[name='padre']");

    let slideIndex = 1;

    modalClose.addEventListener('click', closeModal);
    body.addEventListener('keydown', modalControl);
    modalPrev.addEventListener('click', () => moveSlides(-1));
    modalNext.addEventListener('click', () => moveSlides(1));
    btnSave.addEventListener('click', savePage);

    if (btnNew) {
        btnNew.addEventListener('click', newPage);
    }
    if (btnDelete) {
        btnDelete.addEventListener('click', deletePage);
    }
    if (btnCancel) {
        btnCancel.addEventListener('click', () => history.back());
    }
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

    function newPage() {
        let link = btnNew.getAttribute("data-link");
        window.location.href = link;
    }

    function savePage() {
        let actoinSave = btnSave.getAttribute("data-action");
        let formData = new FormData();
        formData.set('titulo',titulo.value);
        formData.set('texto',texto.value);
        formData.set('padre',padre.value);
        // formData.set('imagenPerfil', fileInputs[0].files[0], fileInputs[0].value);
        // formData.set('imagenSobreMi', fileInputs[1].files[0], fileInputs[1].value);
        // formData.set('imagenMiTrabajo', fileInputs[2].files[0], fileInputs[2].value);

        let headers = {
            method: "POST",
            body: formData
        }
        fetch(actoinSave, headers)
            .then(function(a){
                alert("Información guardada con exito!");
                // history.back();
            })
            .catch(() => console.log('error'));
    }

    function deletePage() {
        if (confirm('Si borra esta pagina se perderan todos sus datos. Desea continuar?')) {
            let actionDelete = btnDelete.getAttribute("data-action");
            let headers = {method: "POST"}

            fetch(actionDelete, headers)
                .then(function(a){
                    alert("Información borrada con exito!");
                    // history.back();
                })
                .catch(() => console.log('error'));
        }
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

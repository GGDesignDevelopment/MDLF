(function() {
    const body = document.querySelector('body');
    const photos = document.querySelectorAll('.page-photos img');
    const container = document.querySelector('.page-photos');
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
    const imgPortada = document.querySelector("#imgPortada");
    const images = document.querySelector("input[name='images']");

    let slideIndex = 1;
    let elemDrag = null;

    modalClose.addEventListener('click', closeModal);
    body.addEventListener('keydown', modalControl);
    modalPrev.addEventListener('click', () => moveSlides(-1));
    modalNext.addEventListener('click', () => moveSlides(1));
    btnSave.addEventListener('click', savePage);
    imgPortada.addEventListener("change",loadImage);
    images.addEventListener("change", load_images);

    if (btnNew) {
        btnNew.addEventListener('click', newPage);
    }
    if (btnDelete) {
        btnDelete.addEventListener('click', deletePage);
    }
    if (btnCancel) {
        btnCancel.addEventListener('click', () => history.back());
    }

    // for (let i = 0; i < photos.length; i++) {
    //     photos[i].addEventListener('click', function(){
    //         openModal();
    //         currentSlide(i+1);
    //     });
    //
    // }

    photos.forEach(function(photo, i){
        photo.addEventListener('click', function(){
            openModal();
            currentSlide(i+1);
        });
        photo.addEventListener('dragstart', function (e) {
            e.dataTransfer.effectAllowed = 'move';
            elemDrag = this;
        });
        photo.addEventListener('dragover', function (e) {
            e.preventDefault();
        });
        photo.addEventListener('drop', function (e) {
            console.log(this);
            if (elemDrag != this) {
                container.insertBefore(elemDrag, this);
            }
        });
    });

    function load_images(event) {
        let files = event.target.files;
        let reader;
        let img;
        for (let i = 0; i < files.length; i++) {
            reader = new FileReader();
            reader.onload = function (e) {
                img = document.createElement("img");
                img.src = e.target.result;
                container.appendChild(img);
            }
            reader.readAsDataURL(files[i]);
        }
    }

    function loadImage (event) {
        if (event.target.files[0].size / 1024 > 2048) {
            alert("La imagen no puede ser mayor a 2 MB");
        } else {
            let reader = new FileReader();
            reader.onload = function (e) {
                event.target.closest("div").querySelector("img").src = e.target.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
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
        formData.set('imagenPortada', imgPortada.files[0], imgPortada.value);
        // formData.set('imagenSobreMi', fileInputs[1].files[0], fileInputs[1].value);
        // formData.set('imagenMiTrabajo', fileInputs[2].files[0], fileInputs[2].value);

        let headers = {
            method: "POST",
            body: formData
        }
        fetch(actoinSave, headers)
            .then(function(a){
                console.log(a);
                // if ()
                // alert("Información guardada con exito!");
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

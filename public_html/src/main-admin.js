(function() {
    const carousel = document.querySelector('my-carousel');
    const btnSaveAbout = document.querySelector('#btnSaveAbout');
    const about = document.querySelector('section.about');

    // FormData info
    const telefono = about.querySelector("input[name='telefono']");
    const email = about.querySelector("input[name='email']");
    const tituloSobreMi = about.querySelector("input[name='tituloSobreMi']");
    const textoSobreMi = about.querySelector("textarea[name='textoSobreMi']");
    const tituloMiTrabajo = about.querySelector("input[name='tituloMiTrabajo']");
    const textoMiTrabajo = about.querySelector("textarea[name='textoMiTrabajo']");
    const linkFacebook = about.querySelector("input[name='linkFacebook']");
    const linkTwitter = about.querySelector("input[name='linkTwitter']");
    const linkFlickr = about.querySelector("input[name='linkFlickr']");
    const linkInstagram = about.querySelector("input[name='linkInstagram']");
    const fileInputs = about.querySelectorAll("input[type=file]");

    document.addEventListener('keydown', (e) => {
        (e.key === 'ArrowRight') && carousel.next();
        (e.key === 'ArrowLeft') && carousel.previous();
    });

    btnSaveAbout.addEventListener('click', saveConfig);
    carousel.addEventListener('pagechanged', animateCarouselItems);

    for(i=0 ; i<fileInputs.length ; i++){
        fileInputs[i].addEventListener("change",loadImage);
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

    function saveConfig() {
        let formAction = btnSaveAbout.getAttribute("data-action");
        let formData = new FormData();
        formData.set('telefono',telefono.value);
        formData.set('email',email.value);
        formData.set('tituloSobreMi',tituloSobreMi.value);
        formData.set('textoSobreMi',textoSobreMi.value);
        formData.set('tituloMiTrabajo',tituloMiTrabajo.value);
        formData.set('textoMiTrabajo',textoMiTrabajo.value);
        formData.set('linkFacebook',linkFacebook.value);
        formData.set('linkTwitter',linkTwitter.value);
        formData.set('linkFlickr',linkFlickr.value);
        formData.set('linkInstagram',linkInstagram.value);
        formData.set('imagenPerfil', fileInputs[0].files[0], fileInputs[0].value);
        formData.set('imagenSobreMi', fileInputs[1].files[0], fileInputs[1].value);
        formData.set('imagenMiTrabajo', fileInputs[2].files[0], fileInputs[2].value);

        let headers = {
            method: "POST",
            body: formData
        }
        fetch(formAction, headers)
            .then(() => console.log('then'))
            .catch(() => console.log('error'));
    }


    function translateX(elem, x, transition) {
        elem.style.display = 'block';
        elem.style.transition = transition ? 'transform .4s' : '';
        elem.style.transitionDelay = '.1s';
        elem.style.transform = `translate3d(${x}px, 0, 0)`;
    }

    function translateY(elem, y, transition) {
        elem.style.transition = transition ? 'transform .4s' : '';
        elem.style.transitionDelay = '.1s';
        elem.style.transform = `translate3d(0, ${y}, 0)`;
    }

    function animateCarouselItems(e) {
        let carouselSelected = carousel.selected;

        let title = carouselSelected.querySelector('h1');
        // let description = carouselSelected.querySelector('p');
        let button = carouselSelected.querySelector('button');

        //setting the animation
        translateX(title, -500);
        // translateX(description, -500);
        translateX(button, 800);

        setTimeout(() => {
            //starting the animation
            translateX(title, 0, true);
            // translateX(description, 0, true);
            translateX(button, 0, true);
        }, 200);
    }
})();

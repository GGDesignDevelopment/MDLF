(function() {
    const carousel = document.querySelector('my-carousel');
    const btnSaveAbout = document.querySelector('#btnSaveAbout');
    const about = document.querySelector('section.about');

    // FormData info
    const telefono = about.querySelector("input[name='telefono']");
    const email = about.querySelector("input[name='email']");
    const tituloSobreMi = about.querySelector("inpuxnt[name='tituloSobreMi']");
    const textoSobreMi = about.querySelector("textarea[name='textoSobreMi']");
    const tituloMiTrabajo = about.querySelector("input[name='tituloMiTrabajo']");
    const textoMiTrabajo = about.querySelector("textarea[name='textoMiTrabajo']");

    document.addEventListener('keydown', (e) => {
        (e.key === 'ArrowRight') && carousel.next();
        (e.key === 'ArrowLeft') && carousel.previous();
    });

    btnSaveAbout.addEventListener('click', saveConfig);

    // form.addEventListener('submit', sendFormData);
    carousel.addEventListener('pagechanged', animateCarouselItems);

    function test() {
        e.preventDefault();
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

        let headers = {
            method: "POST",
            body: formData
        }
        fetch(formAction, headers)
            .then(() => console.log('then'))
            .catch(() => console.log('error'));
    }

    function sendFormData(e) {
        // console.log(e);
        let formAction = form.action;
        let formData = new FormData(form);
        if (validateFormData(formData)) {
            let headers = {
                method: "POST",
                body: formData
            }
            fetch(formAction, headers)
                .then(() => console.log('then'))
                .catch(() => console.log('error'));
        }
        e.preventDefault();
    }

    function clearFormData() {

    }

    function validateFormData(formData) {
        for (let field of formData.entries()) {
            console.log(field);
        }
        return true;
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
        let description = carouselSelected.querySelector('p');
        let button = carouselSelected.querySelector('button');

        //setting the animation
        translateX(title, -500);
        translateX(description, -500);
        translateX(button, 800);

        setTimeout(() => {
            //starting the animation
            translateX(title, 0, true);
            translateX(description, 0, true);
            translateX(button, 0, true);
        }, 200);
    }
})();

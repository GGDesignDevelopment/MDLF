(function() {
    const carousel = document.querySelector('my-carousel');
    const modal = document.querySelector('modal-element');
    const contactButton = document.querySelector('.contact-button');
    const closeModal = document.querySelector('.top-bar');
    const form = document.querySelector('form');
    const clearForm = form.querySelector('.cancel');

    closeModal.addEventListener('click', e => modal.toggle());
    contactButton.addEventListener('click', e => modal.toggle());

    document.addEventListener('keydown', (e) => {
        (e.key === 'ArrowRight') && carousel.next();
        (e.key === 'ArrowLeft') && carousel.previous();
    });

    form.addEventListener('submit', sendFormData);
    clearForm.addEventListener('click', clearFormData);

    carousel.addEventListener('pagechanged', animateCarouselItems);

    function sendFormData(e) {
        console.log(e);
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
window.addEventListener('load', () => {

    initOnFormSubmit();

})




function initOnFormSubmit() {

    const form = document.querySelector('#contactUsModal form');


    form.addEventListener('submit', (e) => {

        e.preventDefault();

        sendData(form);

    })


}


function sendData(form) {

    const xhr = new XMLHttpRequest();

    const formData =  new FormData(form);


    xhr.addEventListener('load', () => {

        const newHtml = xhr.response;

        const divElement = document.createElement('div');

        divElement.innerHTML = newHtml;

        const newModalBody = divElement.querySelector("#contactUsModal .modal-body");
        const oldModalBody = document.querySelector("#contactUsModal .modal-body");        

        if(newModalBody) {
           
            oldModalBody.innerHTML = newModalBody.innerHTML;

        } else {

            document.querySelector("#contactUsModal .modal-body").innerHTML = 'Erro Occurred. Please try again later';

        }

        initOnFormSubmit();
b
    })


    xhr.addEventListener('error', () => {
        
        document.querySelector("#contactUsModal .modal-body").innerHTML = 'Erro Occurred. Please try again later';

    })


    xhr.open('POST', form.getAttribute('action'));

    xhr.send(formData);


}
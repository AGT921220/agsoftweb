document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Cargando...',
            text: 'Por favor, espere',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        const formData = new FormData(form);
        const url = form.action;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => response.json())
        .then(data => {
            setTimeout(() => {
                document.querySelectorAll('.form_input').forEach(input => {
                    input.value = '';
                });
                Swal.close();
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: data.message
                });
            }, 500); // Espera de 2 segundos
        })
        .catch(error => {
            setTimeout(() => {
                Swal.close();
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un problema al enviar el formulario'
                });
            }, 500); // Espera de 2 segundos
        });
    });
});



document.addEventListener('DOMContentLoaded', function() {
    const redirectWppElements = document.querySelectorAll('.redirectWpp');

    redirectWppElements.forEach(function(element) {
        element.addEventListener('click', function(event) {
            event.preventDefault();

            fetch('/whatsapp')
                .then(function(response) {
                        window.open('https://wa.me/5216144950659', '_blank');
                    })
                .catch(function(error) {
                    window.open('https://wa.me/5216144950659', '_blank');
                });
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const redirectWppElements = document.querySelectorAll('.redirectFb');

    redirectWppElements.forEach(function(element) {
        element.addEventListener('click', function(event) {
            event.preventDefault();

            fetch('/facebook')
                .then(function(response) {
                        window.open('https://www.facebook.com/Agsoftwebdesarrollo', '_blank');
                    })
                .catch(function(error) {
                    window.open('https://www.facebook.com/Agsoftwebdesarrollo', '_blank');
                });
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const redirectWppElements = document.querySelectorAll('.redirectPhone');

    redirectWppElements.forEach(function(element) {
        element.addEventListener('click', function(event) {
            event.preventDefault();

            fetch('/phone')
                .then(function(response) {
                        window.open('tel:+5216144950659', '_blank');
                    })
                .catch(function(error) {
                    window.open('tel:+5216144950659', '_blank');
                });
        });
    });
});

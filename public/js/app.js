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

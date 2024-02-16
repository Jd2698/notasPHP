const formularios = document.querySelectorAll('[form-note=""]');

formularios.forEach(formulario => {
    formulario.addEventListener('submit', e => {

        e.preventDefault();
        const textArea = formulario.querySelector('[text-note=""]');
        const radios = formulario.querySelectorAll('[name="prioridad"]');

        if (formValidation(textArea, radios)) {
            formulario.submit();
        } else {
            textArea.focus();
            Swal.fire({
                icon: "error",
                title: "Complete todos los campos.",
                showConfirmButton: false,
                timer: 1100
            });
        }

    });
});

const btnsDelete = document.querySelectorAll('.btn-delete');
btnsDelete.forEach(btnDelete => {
    btnDelete.addEventListener('click', e => {
        e.preventDefault();
        Swal.fire({
            title: "¿Eliminar nota?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#595",
            cancelButtonColor: "#b55",
            confirmButtonText: "Si, eliminar"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = e.target.getAttribute('href');
            }
        });
    });
});
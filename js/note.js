const btnNewNote = document.getElementById('btn-new-note');
const btnUpdateNote = document.querySelectorAll('.btn-update-note');

const containerFormNewNote = document.getElementById('container-form-new-note');
const containerFormUpdateNote = document.getElementById('container-form-update-note');

btnNewNote.addEventListener('click', e => {
    containerFormNewNote.classList.remove('hidden');
    document.body.classList.add("overflow-hidden");
    document.getElementById('texto').focus();
})

btnUpdateNote.forEach(btn => {
    btn.addEventListener('click', e => {

        containerFormUpdateNote.classList.remove('hidden');
        document.body.classList.add("overflow-hidden");

        document.getElementById('texto-actualizar').focus();

        let notaId = e.target.getAttribute('note');
        let inputId = document.getElementById('input-form-update-id');
        inputId.value = notaId;

        let item = document.getElementById(`note-${notaId}`);

        let texto = item.querySelector('.note-text').value;
        let prioridad = item.querySelector('.prioridad').textContent;

        let radio1 = document.getElementById('update-prioridad-1');
        let radio2 = document.getElementById('update-prioridad-2');

        if (prioridad == 1) {
            radio1.setAttribute('checked', "true");
            radio2.removeAttribute('checked');
        } else {
            radio2.setAttribute('checked', "true");
            radio1.removeAttribute('checked');
        }

        let textArea = document.getElementById('texto-actualizar');
        textArea.value = texto;
    })
});

document.addEventListener('click', e => {
    if (e.target == containerFormNewNote) {
        containerFormNewNote.classList.remove('animation-container-class');
        containerFormNewNote.classList.add('animation-container-remove-class');

        setTimeout(() => {
            containerFormNewNote.classList.add('hidden');
            document.body.classList.remove("overflow-hidden");

            containerFormNewNote.classList.remove('animation-container-remove-class');
            containerFormNewNote.classList.add('animation-container-class');
        }, 310);

    } else if (e.target == containerFormUpdateNote) {
        containerFormUpdateNote.classList.remove('animation-container-class');
        containerFormUpdateNote.classList.add('animation-container-remove-class');

        setTimeout(() => {
            containerFormUpdateNote.classList.add('hidden');
            document.body.classList.remove("overflow-hidden");

            containerFormUpdateNote.classList.remove('animation-container-remove-class');
            containerFormUpdateNote.classList.add('animation-container-class');
        }, 310);
    }
})

const btnToTop = document.getElementById('btn-subir');

btnToTop.addEventListener('click', e => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

const options = {
    threshold: 0.9
};

const getEntry = (entry) => {
    if (!entry[0].isIntersecting) {
        btnToTop.classList.remove('hidden');
    } else {
        btnToTop.classList.add('hidden');
    }
}
const observer = new IntersectionObserver(getEntry, options);

observer.observe(btnNewNote);
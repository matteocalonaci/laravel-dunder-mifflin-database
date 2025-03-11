import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import Swal from 'sweetalert2';
import.meta.glob([
    '../img/**'
])

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-danger').forEach(button => {
        button.addEventListener('click', function(event) {
        event.preventDefault();
        const form = this.closest('form');

        Swal.fire({
            title: 'Sei sicuro?',
            text: "Non potrai recuperare questo dipendente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sì, elimina!',
            cancelButtonText: 'Annulla'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
});

document.addEventListener('DOMContentLoaded', function() {
    // Rimuove il loader dopo il caricamento iniziale
    document.body.classList.add('loaded');

    // Gestione click su link
    document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function(e) {
            // Controlla se è un dropdown di Bootstrap
            const isDropdownToggle = this.matches('[data-bs-toggle="dropdown"]') ||
                                   this.closest('[data-bs-toggle="dropdown"]');

            if (isDropdownToggle) {
                e.preventDefault();
                e.stopPropagation();
                return;
            }

            if (!this.href.includes(window.location.hostname)) return;
            document.body.classList.remove('loaded');
        });
    });

    // Disabilita il loader per i click sui dropdown
    document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.stopImmediatePropagation();
        });
    });

    // Gestione submit form
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', () => {
            document.body.classList.remove('loaded');
        });
    });

    // Gestione beforeunload
    window.addEventListener('beforeunload', () => {
        document.body.classList.remove('loaded');
    });
});

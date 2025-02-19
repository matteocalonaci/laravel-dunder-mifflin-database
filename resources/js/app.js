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

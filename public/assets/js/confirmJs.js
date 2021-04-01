$(document).on('click', '.excluir', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
        title: 'Tem Certeza?',
        text: 'Esta ação não tem volta e irá excluir a despesa!',
        icon: 'error',
        buttons: ["Cancelar", "Sim, quero excluir!"],

    }).then(function(value) {
        
        if (value) {

            window.location.href = `/despesas/delete/${id}`;

        }

    });
});
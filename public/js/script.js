//Using Jquery
$('#register').click(() => {
    const genre_value = $('#genre').val();
    const route = "/genero";
    const token = $('#token').val();

    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'POST',
        dataType: 'json',
        data: {
            genre: genre_value
        },
        success: () => {
            $("#msj-success").fadeIn();
        },
        error: (err) => {
            $("#msj").html(err.responseJSON.genre[0]);
            $("#msj-error").fadeIn();
        }
    });
});
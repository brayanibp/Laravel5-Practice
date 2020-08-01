//Using Jquery
$('#register').click(() => {
    const genre_value = $('#genre').val();
    const route = "http://172.17.0.2:8000/genero";
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
        }
    });
});
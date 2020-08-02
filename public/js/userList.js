$(document).on('click', '.pagination a', (ev) => {
    ev.preventDefault();
    const page = $(ev.target).attr('href').split('page=')[1];
    const URL = "http://172.17.0.2:8000/usuario/";

    $.ajax({
        url: URL,
        type: 'GET',
        dataType: 'JSON',
        data: { page: page },
        success: (data) => {
            $('.users').html(data);
        }
    });
});
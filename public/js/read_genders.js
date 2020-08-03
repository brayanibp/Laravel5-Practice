$(document).ready(load);

function load() {
    const dataTable = $("#datos");
    const route = "/generos";
    $.ajax({
        url: route,
        type: 'GET',
        dataType: 'JSON',
        success: (data) => {
            dataTable.empty();
            data.forEach(res => {
                dataTable.append(`
                    <tr>
                        <td>${res.genre}</td>
                        <td>
                            <button value="${res.id}" onClick="show(this);" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Editar</button>
                            <button value="${res.id}" onClick="remove(this);" class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                `);
            });
        }
    })
}

function remove(btn) {
    const URL = `/genero/${btn.value}`;
    const token = $("#token").val();
    $.ajax({
        url: URL,
        headers: { 'X-CSRF-TOKEN': token },
        type: 'DELETE',
        dataType: 'JSON',
        success: function () {
            load();
            $("#msj-success").fadeIn();
        }
    });
}

function show(btn) {
    const URL = `/genero/${btn.value}/edit`;
    $.ajax({
        url: URL,
        type: 'GET',
        dataType: 'JSON',
        success: (res) => {
            $("#genre").val(res.genre);
            $("#id").val(res.id);
        }
    });
}

$("#update").click(function () {
    const id = $("#id").val();
    const genre = $("#genre").val();
    const URL = `/genero/${id}`;
    const token = $("#token").val();
    $.ajax({
        url: URL,
        headers: { 'X-CSRF-TOKEN': token },
        type: 'PUT',
        dataType: 'JSON',
        data: { genre: genre },
        success: function () {
            load();
            $("#myModal").modal('toggle');
            $("#msj-success").fadeIn();
        }
    });
});
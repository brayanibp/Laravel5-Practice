<table class="table">
    <thead>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Operación</th>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                {!! link_to_route('usuario.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary']) !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $users->render() !!}
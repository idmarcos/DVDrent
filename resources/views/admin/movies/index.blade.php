<x-app-layout>
    <a href="movies/create" class="btn btn-primary">Añadir</a>

    <table class="table table-secondary table-striped mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Duración</th>
                <th scope="col">Año</th>
                <th scope="col">Género</th>
                <th scope="col">Sinopsis</th>
                <th scope="col">Reparto</th>
                <th scope="col">Edad Recomendada</th>
                <th scope="col">Disponible</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dvds as $dvd)
                <tr>
                    <td>{{$dvd->id}}</td>
                    <td>{{$dvd->title}}</td>
                    <td>{{$dvd->duration}}</td>
                    <td>{{$dvd->year}}</td>
                    <td>{{$dvd->gender}}</td>
                    <td>{{$dvd->synopsis}}</td>
                    <td>{{$dvd->cast}}</td>
                    <td>{{$dvd->age_rating}}</td>
                    <td>
                        @if ($dvd->available)
                            <button type="" class="btn btn-success" disabled>Sí</button>
                        @else
                            <button type="" class="btn btn-danger" disabled>No</button>
                        @endif
                    </td>
                    <td>
                        <form action="{{route('movies.destroy', $dvd->id)}}" method="POST">
                            <a href="/movies/{{$dvd->id}}/edit" class="btn btn-info">Editar</a>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
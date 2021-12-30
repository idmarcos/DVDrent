<x-app-layout>
    <table class="table table-secondary table-striped mt-2">
        <thead>
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Duración</th>
                <th scope="col">Año</th>
                <th scope="col">Género</th>
                <th scope="col">Sinopsis</th>
                <th scope="col">Reparto</th>
                <th scope="col">Edad Recomendada</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($dvds as $dvd)
                <tr>
                    <td>{{$dvd->title}}</td>
                    <td>{{$dvd->duration}}</td>
                    <td>{{$dvd->year}}</td>
                    <td>{{$dvd->gender}}</td>
                    <td>{{$dvd->synopsis}}</td>
                    <td>{{$dvd->cast}}</td>
                    <td>{{$dvd->age_rating}}</td>
                    <td>
                        <form action="{{route('movies.destroy', $dvd->id)}}" method="POST">
                            @if($dvd->available)
                                <a href="/movies/{{$dvd->id}}/edit" class="btn btn-info">Alquilar</a>
                            @else
                                <a href="/movies/{{$dvd->id}}/edit" class="btn btn-danger disabled">No disponible</a>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
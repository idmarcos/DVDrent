<x-app-layout>
    <table class="table table-secondary table-striped mt-2">
        <thead>
            <tr>
                <th scope="col">ID Película</th>
                <th scope="col">Título</th>
                <th scope="col">Cliente</th>
                <th scope="col">Email</th>
                <th scope="col">Fecha alquiler</th>
                <th scope="col">Fecha devolución</th>
                <th scope="col">Destino</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies_returned as $returned)
                <tr>
                    <td>{{$returned->dvd->id}}</td>
                    <td>{{$returned->dvd->title}}</td>
                    <td>{{$returned->user->name}}</td>
                    <td>{{$returned->user->email}}</td>
                    <td>{{$returned->rent_date}}</td>
                    <td>{{$returned->return_date}}</td>
                    <td>{{$returned->address}}, {{$returned->postal_code}}, {{$returned->state}}<br></td>
                    <td>
                        @if($returned->dvd->available)
                            <a href="" class="btn btn-success disabled">Disponible</a>
                        @else
                        <form action="{{route('movies.available', $returned->dvd->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Marcar como disponible</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
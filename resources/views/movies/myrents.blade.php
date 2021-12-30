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
                <th scope="col">Fecha alquiler</th>
                <th scope="col">Dirección</th>
                <th scope="col">Código Postal</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha devolución</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rents as $rent)
                <tr>
                    <td>{{$rent->title}}</td>
                    <td>{{$rent->duration}}</td>
                    <td>{{$rent->year}}</td>
                    <td>{{$rent->gender}}</td>
                    <td>{{$rent->synopsis}}</td>
                    <td>{{$rent->cast}}</td>
                    <td>{{$rent->age_rating}}</td>
                    <td>{{$rent->pivot->rent_date}}</td>
                    <td>{{$rent->pivot->address}}</td>
                    <td>{{$rent->pivot->postal_code}}</td>
                    <td>{{$rent->pivot->state}}</td>
                    <td>
                        @if($rent->pivot->return_date==null)
                            <form action="/rent/{{$rent->pivot->id}}/return" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Devolver</button>
                            </form>
                        @else
                            <a href="" class="btn btn-success disabled">{{$rent->pivot->return_date}}</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
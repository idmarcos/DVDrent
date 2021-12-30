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
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{$sale->dvd->id}}</td>
                    <td>{{$sale->dvd->title}}</td>
                    <td>{{$sale->user->name}}</td>            
                    <td>{{$sale->user->email}}</td>
                    <td>{{$sale->rent_date}}</td>
                    <td>{{$sale->return_date}}</td>
                    <td>{{$sale->address}}, {{$sale->postal_code}}, {{$sale->state}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
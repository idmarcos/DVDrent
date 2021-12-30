<x-app-layout>
    <table class="table table-secondary table-striped mt-2">
        <thead>
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Cliente</th>
                <th scope="col">Email</th>
                <th scope="col">Destino</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{$sale->title}}</td>

                    @foreach($sale->users as $user)
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->pivot->address}}, {{$user->pivot->postal_code}}, {{$user->pivot->state}}<br></td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
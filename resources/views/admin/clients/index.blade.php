<x-app-layout>
    <table class="table table-secondary table-striped mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Películas Alquiladas</th>
                <th scope="col">Destino</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->name}}</td>
                    <td>{{$client->email}}</td>
                    <td>
                        @foreach($client->dvds as $dvd)
                            - {{$dvd->title}}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($client->dvds as $dvd)
                            {{$dvd->pivot->address}}, {{$dvd->pivot->postal_code}}, {{$dvd->pivot->state}}<br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
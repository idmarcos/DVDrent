<x-app-layout>
    <table class="table table-secondary table-striped mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Cliente</th>
                <th scope="col">Email</th>
                <th scope="col">Destino</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies_in_rent as $in_rent)
                <tr>
                    <td>{{$in_rent->dvd->id}}</td>
                    <td>{{$in_rent->dvd->title}}</td>
                    <td>{{$in_rent->user->name}}</td>
                    <td>{{$in_rent->user->email}}</td>
                    <td>{{$in_rent->address}}, {{$in_rent->postal_code}}, {{$in_rent->state}}<br></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
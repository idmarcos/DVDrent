<x-app-layout>
    <h2>Alquilar película</h2>

    <form action="/movies/{{$dvd->id}}/rent" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="" class="form-label">Título</label>
            <input id="title" name="title" type="text" class="form-control" value="{{$dvd->title}}" disabled>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Duración</label>
            <input id="duration" name="duration" type="text" class="form-control" value="{{$dvd->duration}}" disabled>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Año</label>
            <input id="year" name="year" type="text" class="form-control" value="{{$dvd->year}}" disabled>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Género</label>
            <input id="gender" name="gender" type="text" class="form-control" value="{{$dvd->gender}}" disabled>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Sinopsis</label>
            <textarea id="synopsis" name="synopsis" class="form-control" rows="3" disabled>{{$dvd->synopsis}}</textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Reparto</label>
            <input id="cast" name="cast" type="text" class="form-control" value="{{$dvd->cast}}" disabled>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Edad Recomendada</label>
            <input id="age_rating" name="age_rating" type="text" class="form-control" value="{{$dvd->age_rating}}" disabled>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Dirección</label>
            <input id="address" name="address" type="text" class="form-control" value="" required>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Código postal</label>
            <input id="cp" name="cp" type="number" class="form-control" value="" required>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <input id="state" name="state" type="text" class="form-control" value="" required>
        </div>

        <button type="submit" class="btn btn-primary">Alquilar</button>
        <a href="/list/movies" class="btn btn-danger">Cancelar</a>
    </form>  

</x-app-layout>
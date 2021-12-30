<x-app-layout>
    <h2>Editar película</h2>

    <form action="/movies/{{$dvd->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Título</label>
            <input id="title" name="title" type="text" class="form-control" value="{{$dvd->title}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Duración</label>
            <input id="duration" name="duration" type="number" class="form-control" value="{{$dvd->duration}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Año</label>
            <input id="year" name="year" type="number" class="form-control" value="{{$dvd->year}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Género</label>
            <input id="gender" name="gender" type="text" class="form-control" value="{{$dvd->gender}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Sinopsis</label>
            <textarea id="synopsis" name="synopsis" class="form-control" rows="3">{{$dvd->synopsis}}</textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Reparto</label>
            <input id="cast" name="cast" type="text" class="form-control" value="{{$dvd->cast}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Edad Recomendada</label>
            <input id="age_rating" name="age_rating" type="number" class="form-control" value="{{$dvd->age_rating}}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="/movies" class="btn btn-danger">Cancelar</a>
    </form>
</x-app-layout>
         
<x-app-layout>
    <h2>Nueva película</h2>

    <form action="/movies" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Título</label>
            <input id="title" name="title" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Duración</label>
            <input id="duration" name="duration" type="number" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Año</label>
            <input id="year" name="year" type="number" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Género</label>
            <input id="gender" name="gender" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Sinopsis</label>
            <textarea id="synopsis" name="synopsis" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Reparto</label>
            <input id="cast" name="cast" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Edad Recomendada</label>
            <input id="age_rating" name="age_rating" type="number" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="/movies" class="btn btn-danger">Cancelar</a>
    </form>
</x-app-layout>
     
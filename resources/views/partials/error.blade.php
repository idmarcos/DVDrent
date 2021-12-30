@if(Session::has('error'))
  <div class="alert alert-danger danger-dismissable">
    <button type="button" class="btn-close" aria-label="Close"></button>
    <h3>{{Session::get('error')}}</h3>
  </div>
@endif

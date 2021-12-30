@if(Session::has('success'))
  <div class="alert alert-success success-dismissable">
    <button type="button" class="btn-close" aria-label="Close"></button>
    <h3>{{Session::get('success')}}</h3>
  </div>
@endif

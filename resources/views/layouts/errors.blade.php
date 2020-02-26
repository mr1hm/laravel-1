@if ($errors->any())
<div class="row justify-content-center error-box">
  <div class="col-6 alert alert-danger text-center">
    @foreach ($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
  </div>
</div>
@endif

@if(session('error'))
<div class="alert bg-primary fade in">
  <a href="#" class="close" data-dismiss="alert">×</a>
  {{ session('error') }}
</div>
@endif

@if(session('success'))
<div class="alert bg-primary fade in">
  <a href="#" class="close" data-dismiss="alert">×</a>
  {{ session('success') }}
</div>
@endif

@if($errors->any())
  @foreach($errors->all() as $allErrors)
  <div class="alert bg-primary fade in">
    <a href="#" class="close" data-dismiss="alert">×</a>
    {{ $allErrors }}
  </div>
  @endforeach
@endif

<!-- For single error -->
<!-- Not used yet -->
@error('')
<div class="alert bg-primary fade in">
  <a href="#" class="close" data-dismiss="alert">×</a>
  {{ $message }}
</div>
@enderror

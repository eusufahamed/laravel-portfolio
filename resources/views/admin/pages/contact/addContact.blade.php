@extends('admin.layouts.base')

@section('content')
<div class="content">
  <div class="content-header">
    <div class="leftside-content-header">
      <ul class="breadcrumbs">
        <li><i class="fa fa-columns" aria-hidden="true"></i><a href="#">Forms</a></li>
        <li><a>Layouts</a></li>
      </ul>
    </div>
  </div>

  <div class="row animated fadeInUp">
    <div class="col-sm-12 col-md-8 col-md-offset-2">
      @include('admin.layouts.partials.message')
      <div class="panel b-primary bt-md">
        <div class="panel-content">
          <div class="row">
            <div class="col-md-12">

              <form action="{{ route('storeContact') }}" class="form-horizontal" method="post">
                {{ csrf_field() }}
                <h5 class="mb-lg">Contact Add Form!</h5>
                <div class="form-group">
                  <label for="text1" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="text1" name="address">
                  </div>
                </div>

                <div class="form-group">
                  <label for="number1" class="col-sm-2 control-label">Mobile</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="number1" name="mobile">
                  </div>
                </div>

                <div class="form-group">
                  <label for="email1" class="col-sm-2 control-label">E-mail</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email1" name="email">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Add Contact</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

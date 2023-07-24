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
            <div class="col-xs-6"><h5>Service Add Form</h5></div>
            <div class="col-xs-6 text-right">
              <a href="{{ route('serviceLists') }}" class="btn btn-primary">All Services</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">

              <form action="{{ route('storeService') }}" class="form-horizontal" method="post">
                @csrf
                <div class="form-group">
                  <label for="text1" class="col-sm-2 control-label">Service Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="text1" name="serviceName" value="{{ old('serviceName') }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="description1" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="description1" name="serviceDescription">{{ old('serviceDescription') }}</textarea>
                    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                    <script>CKEDITOR.replace('description1');</script>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Add Service</button>
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

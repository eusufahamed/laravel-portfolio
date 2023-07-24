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
            <div class="col-xs-6"><h5>Client Add Form</h5></div>
            <div class="col-xs-6 text-right">
              <a href="{{ route('clientLists') }}" class="btn btn-primary">Client Lists</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">

              <form action="{{ route('storeClient') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="text1" class="col-sm-2 control-label">Client Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="text1" name="clientName" value="{{ old('clientName') }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="url1" class="col-sm-2 control-label">Web URL</label>
                  <div class="col-sm-10">
                    <input type="url" class="form-control" id="url1" name="webUrl" value="{{ old('webUrl') }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="file1" class="col-sm-2 control-label">Client Logo</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="file1" name="clientLogo">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="button" value="Cancel" class="btn btn-primary btn-xs" onClick="window.location='{{ route('clientLists') }}';"/>
                    <input type="submit" value="Add Client" class="btn btn-primary btn-xs">
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

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
            <div class="col-xs-6"><h5>Project Add Form</h5></div>
            <div class="col-xs-6 text-right">
              <a href="{{ route('projectLists') }}" class="btn btn-primary">Project Lists</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">

              <form action="{{ route('storeProject') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="text1" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="text1" name="title" value="{{ old('title') }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="select1" class="col-sm-2 control-label">Category</label>
                  <div class="col-sm-10">
                    <select id="select1" class="form-control" name="category">
                      <option value="0">---Select Category---</option>
                      @foreach(App\Models\Category::get() as $category)
                      <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="select2" class="col-sm-2 control-label">Service</label>
                  <div class="col-sm-10">
                    <select id="select2" class="form-control" name="service">
                      <option value="0">---Select Service---</option>
                      @foreach(App\Models\Service::get() as $service)
                      <option value="{{ $service->id }}">{{ ucwords($service->name) }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="select3" class="col-sm-2 control-label">Client</label>
                  <div class="col-sm-10">
                    <select id="select3" class="form-control" name="client">
                      <option value="0">---Select Client---</option>
                      @foreach(App\Models\ClientInfo::get() as $client)
                      <option value="{{ $client->id }}">{{ ucwords($client->name) }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="select4" class="col-sm-2 control-label">Team Member</label>
                  <div class="col-sm-10">
                    <select id="select4" class="form-control" name="team">
                      <option value="0">---Select Team Member---</option>
                      @foreach(App\Models\Team::get() as $team)
                      <option value="{{ $team->id }}">{{ ucwords($team->name) }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="description1" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="description1" name="description" rows="5">{{ old('description') }}</textarea>
                    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                    <script>CKEDITOR.replace('description1');</script>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="file1">Choose Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="file1" name="images[]" multiple>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="button" value="Cancel" class="btn btn-primary btn-xs" onClick="window.location='{{ route('projectLists') }}';"/>
                    <input type="submit" value="Add Project" class="btn btn-primary btn-xs">
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

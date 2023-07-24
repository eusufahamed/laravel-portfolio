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
            <div class="col-xs-6"><h5>Team Member Edit Form</h5></div>
            <div class="col-xs-6 text-right">
              <a href="{{ route('teamLists') }}" class="btn btn-primary">Team Lists</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">

              <form action="{{ route('updatedTeam', $team->id) }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="text1" class="col-sm-2 control-label">Member Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="text1" name="memberName" value="{{ $team->name }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="text2" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="text2" name="memberTitle" value="{{ $team->title }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="text3" class="col-sm-2 control-label">Designation</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="text3" name="memberdesignation" value="{{ $team->designation }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="text4" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="text4" name="memberAddress" value="{{ $team->address }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="num" class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="num" name="memberPhone" value="{{ $team->phone }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="memberEmail" value="{{ $team->email }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="file1" class="col-sm-2 control-label">Resume</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="file1" name="memberResume">
                  </div>
                </div>

                <div class="form-group">
                  <label for="file2" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="file2" name="memberImage">
                  </div>
                </div>

                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="memberDescription" rows="5">{{ $team->description }}</textarea>
                    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                    <script>CKEDITOR.replace('description');</script>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="button" value="Cancel" class="btn btn-primary btn-xs" onClick="window.location='{{ route('teamLists') }}';"/>
                    <input type="submit" value="Update Team" class="btn btn-primary btn-xs">
                    <a href="{{ route('deleteTeam', $team->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
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

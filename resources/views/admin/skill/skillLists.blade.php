@extends('admin.layouts.base')

@section('content')
<div class="content">
  <div class="content-header">
    <div class="leftside-content-header">
      <ul class="breadcrumbs">
        <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Tables</a></li>
        <li><a>Responsive</a></li>
      </ul>
    </div>
  </div>

  <div class="row animated fadeInRight">
    <div class="col-sm-12 col-md-8 col-md-offset-2">
      @include('admin.layouts.partials.message')
      <div class="panel b-primary bt-md">
        <div class="panel-content">
          <div class="row">
            <div class="col-xs-6"><h5>Skill Lists</h5></div>
            <div class="col-xs-6 text-right">
              <a href="{{ route('addSkill') }}" class="btn btn-primary">Add Member Skill</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                  <th>SL.</th>
                  <th>Member Name</th>
                  <th>Skill Name</th>
                  <th>Percentage (%)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allSkill as $skill)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ ucwords($skill->team->name) }}</td>
                  <td>{{ ucwords($skill->name) }}</td>
                  <td>{{ $skill->percent }}</td>
                  <td>
                    <a href="{{ route('editSkill', $skill->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="{{ route('deleteSkill', $skill->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

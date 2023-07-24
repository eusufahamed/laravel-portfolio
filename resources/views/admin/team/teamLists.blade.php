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
    <div class="col-sm-12">
      @include('admin.layouts.partials.message')
      <div class="panel b-primary bt-md">
        <div class="panel-content">
          <div class="row">
            <div class="col-xs-6"><h5>Team Member Lists</h5></div>
            <div class="col-xs-6 text-right">
              <a href="{{ route('addTeam') }}" class="btn btn-primary">Add Team Member</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                  <th>SL.</th>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Designation</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Resume</th>
                  <th>Description</th>
                  <th>Image</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allTeamMember as $member)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td><a href="{{ route('editTeam', $member->id) }}">{{ ucwords($member->name) }}</a></td>
                  <td>{{ Str::limit($member->title, 25) }}</td>
                  <td>{{ $member->designation }}</td>
                  <td>{{ Str::limit($member->address, 25) }}</td>
                  <td>+880 {{ $member->phone }}</td>
                  <td>{{ $member->email }}</td>
                  @if($member->resume)
                  <td><a href="{{ asset('file/' . $member->resume) }}">View</a></td>
                  @else
                  <td>View</td>
                  @endif
                  <td>{!! Str::limit($member->description, 30) !!}</td>
                  <td><img style="width: 40px; height: 38px;" src="{{ asset('images/team/' . $member->image) }}"></td>
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

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
            <div class="col-xs-6"><h5>Skill Edit Form</h5></div>
            <div class="col-xs-6 text-right">
              <a href="{{ route('skillLists') }}" class="btn btn-primary">All Skills</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">

              <form action="{{ route('updatedSkill', $skill->id) }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="select1" class="col-sm-2 control-label">Member</label>
                  <div class="col-sm-10">
                    <select id="select1" class="form-control" name="member">
                      <option value="0">---Select Member---</option>
                      @foreach($allTeam as $team)
                      <option value="{{ $team->id }}" {{ old('team_id', $skill->team_id) == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="text1" class="col-sm-2 control-label">Skill Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="text1" name="skillName" value="{{ $skill->name }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="num1" class="col-sm-2 control-label">Percentage</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="num1" name="percentage" value="{{ $skill->percent }}">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="button" value="Cancel" class="btn btn-primary btn-xs" onClick="window.location='{{ route('skillLists') }}';"/>
                    <input type="submit" value="Update Skill" class="btn btn-primary btn-xs">
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

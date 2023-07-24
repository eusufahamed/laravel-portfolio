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
            <div class="col-xs-6"><h5>Project Lists</h5></div>
            <div class="col-xs-6 text-right">
              <a href="{{ route('addProject') }}" class="btn btn-primary">Add Project</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                  <th>SL.</th>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Service</th>
                  <th>Client</th>
                  <th>Contributor</th>
                  <th>Status</th>
                  <th>Thumbnail</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allproject as $project)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td><a href="{{ route('editProject', $project->id) }}">{{ ucwords(Str::limit($project->title, 20)) }}</a></td>
                  <td>{{ Str::limit($project->slug, 20) }}</td>
                  <td>{!! Str::limit($project->description, 50) !!}</td>
                  <td>{{ ucwords($project->category->name) }}</td>
                  <td>{{ ucwords($project->service->name) }}</td>
                  <td>{{ ucwords($project->client->name) }}</td>
                  <td>{{ ucwords($project->team->name) }}</td>
                  <td>
                    <input type="checkbox" data-toggle="toggle" data-on="Active" data-off="Inactive" id="projectStatus" data-size="mini" data-id="{{ $project->id }}" {{ $project->status == 1 ? 'checked':'' }}>
                  </td>
                  @if(count($project->images) > 0)
                  <td><img style="width: 50px; height: 30px;" src="{{ asset('images/project/' . $project->images[0]->image) }}"></td>
                  @endif
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

@push('scripts')
<script>
  $('body').on('change', '#projectStatus', function(){
    var id = $(this).attr('data-id');
    if(this.checked){
      var status = 1;
    }
    else{
      var status = 0;
    }

    $.ajax({
      url: 'projectstatus/'+id+'/'+status,
      method: 'get',
      success: function(result){
        console.log(result);
      }
    });
  });
</script>
@endpush

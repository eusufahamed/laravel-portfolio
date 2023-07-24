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
            <div class="col-xs-6"><h5>Category Lists</h5></div>
            <div class="col-xs-6 text-right">
              <a href="{{ route('addCategory') }}" class="btn btn-primary">Add Category</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>SL.</th>
                  <th>Category Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td><a href="{{ route('editCategory', $category->id) }}">{{ $category->name }}</a></td>
                  <td>
                    <a href="{{ route('deleteCategory', $category->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
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

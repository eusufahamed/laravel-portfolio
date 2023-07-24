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
            <div class="col-xs-6"><h5>Category Edit Form</h5></div>
            <div class="col-xs-6 text-right">
              <a href="{{ route('categoryListsView') }}" class="btn btn-primary">All Category</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">

              <form action="{{ route('updatedCategory', $category->id) }}" class="form-horizontal" method="post">
                @csrf
                <div class="form-group">
                  <label for="text1" class="col-sm-2 control-label">Category Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="text1" name="categoryName" value="{{ $category->name }}">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Update Category</button>
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

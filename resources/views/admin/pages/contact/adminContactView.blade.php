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

  @if($contact)

  @else
  <div class="row">
    <div class="col-md-1 col-md-offset-10">
      <button type="submit" onclick="location.href = '{{ route('addContact') }}';" class="btn btn-primary btn-block">Add Contact</button>
    </div>
  </div>
  @endif

  <div class="row animated fadeInRight">
    <div class="col-sm-12 col-md-10 col-md-offset-1">
      @include('admin.layouts.partials.message')
      <div class="panel b-primary bt-md">
        <div class="panel-content">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Address</th>
                  <th>Mobile</th>
                  <th>E-mail</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if($contact)
                <tr>
                  <td>{{ $contact->address }}</td>
                  <td>+880 {{ $contact->mobile }}</td>
                  <td>{{ $contact->email }}</td>
                  <td>
                    <div class="btn-group btn-group-xs">
                      <button type="submit" onclick="location.href = '{{ route('editContact', $contact->id) }}';" class="btn btn-transparent"><i class="fa fa-pencil"></i></button>
                      <button type="submit" onclick="location.href = '{{ route('deletedContact', $contact->id) }}';" class="btn btn-transparent"><i class="fa fa-times"></i></button>
                    </div>
                  </td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

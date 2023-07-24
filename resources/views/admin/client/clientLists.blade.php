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
            <div class="col-xs-6"><h5>Client Lists</h5></div>
            <div class="col-xs-6 text-right">
              <a href="{{ route('addClient') }}" class="btn btn-primary">Add Client</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                  <th>SL.</th>
                  <th>Client Name</th>
                  <th>Web Link</th>
                  <th>Client Logo</th>
                </tr>
              </thead>
              <tbody>
                @foreach($clientInfo as $client)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td><a href="{{ route('editClient', $client->id) }}">{{ $client->name }}</a></td>
                  <td>{{ $client->link }}</td>
                  <td>
                    <img style="width: 35px; height: 30px;" src="{{ asset('images/clientLogo/' . $client->logo) }}" alt="">
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

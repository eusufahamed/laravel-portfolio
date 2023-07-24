@extends('templates.layouts.base')

@section('title')
{{ ucwords($page_title) }} — {{ ucwords($project->title) }}
@endsection

@section('content')
<main class="container">
  <div class="heading">
    <h2 class="head-text">
      <span>{{ $project->title }}</span>
    </h2>
    <ul class="breadcrumb page-transition">
      <li><a href="{{ route('homeView') }}">home</a></li>
      <li><a href="{{ route('projectsView') }}">projects</a></li>
      <li class="current-crumb">{{ ucwords($project->title) }}</li>
    </ul>
  </div>
  <div class="work">
    <div class="line"></div>
    <div class="row">
      <div class="content-box">
        <div class="col-md-12">
          <p>{!! $project->description !!}</p>
        </div>
        <div class="ret col-md-12">
          <div class="controls">
            <div class="controls-navigate">
              <div class="prev">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.5 980" style="enable-background:new 0 0 456.5 980;" xml:space="preserve">
                  <style type="text/css">.st0 {fill: #fff;}</style>
                  <path class="st0" d="M417,980c21.8,0,39.4-17.6,39.5-39.3c0-10.5-4.1-20.6-11.6-28L118.6,586.5c-53.2-53.2-53.2-139.7,0-192.8
                  L444.9,67.4c15.2-15.6,14.9-40.6-0.7-55.8c-15.3-14.9-39.7-14.9-55.1,0L62.9,337.8c-83.9,83.9-83.9,220.4,0,304.3l326.3,326.4
                  C396.6,975.9,406.6,980.1,417,980z" />
                </svg>
              </div>
              <div class="next">
                <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.5 980" style="enable-background:new 0 0 456.5 980;" xml:space="preserve">
                  <style type="text/css">.st0 {fill: #fff;}</style>
                  <path class="st0" d="M39.5,0.1C17.7,0,0,17.6,0,39.4c0,10.5,4.1,20.6,11.6,28l326.3,326.3c53.2,53.2,53.2,139.7,0,192.8L11.6,912.7
                  c-15.6,15.2-15.9,40.2-0.7,55.8s40.2,15.9,55.8,0.7c0.2-0.2,0.5-0.5,0.7-0.7l326.2-326.3c83.9-83.9,83.9-220.4,0-304.3L67.2,11.5
                  C59.9,4.1,49.9,0,39.5,0.1z" />
                </svg>
              </div>
            </div>
          </div>
          <hr>
          <ul class="project-slider">
            @foreach($project->images as $allImage)
            <li>
              <img src="{{ asset('images/project/' . $allImage->image) }}" alt="image description">
            </li>
            @endforeach
          </ul>
        </div>

        <div class="col-md-12"><hr></div>
        <div class="col-md-12 col-sm-12">
          <div class="contact-info">
            <div class="contact-details">
              <div class="col-md-12">
                <span><b>Start Date</b> — </span>
                <span>{{ $project->created_at->format('j F, Y') }}</span>
              </div>
              @if($project->service)
              <div class="col-md-12">
                <span><b>Services</b> — </span>
                <span>{{ ucwords($project->service->name) }}</span>
              </div>
              @endif
              @if($project->client)
              <div class="col-md-12">
                <span><b>Client</b> — </span>
                <span>{{ ucwords($project->client->name) }}</span>
              </div>
              @endif
              <div class="col-md-12">
                <span><b>Contributor</b> — </span>
                <span>{{ ucwords($project->team->name) }}</span>
              </div>
              <div class="col-md-12">
                <span><b>Web</b> — </span>
                @if($project->client->link)
                <span>
                  <a href="{{ $project->client->link }}" target="_blank">View</a>
                </span>
                @else
                <span>Not Deploy Yet!</span>
                @endif
              </div>
            </div>
          </div>
          <ul class="share">
            <li>Share On</li>
            <li><a href="javascript:void(0);"><i class="fa fa-facebook" style="color: #3b5998;"></i></a></li>
            <li><a href="javascript:void(0);"><i class="fa fa-twitter" style="color: #55acee;"></i></a></li>
            <li><a href="javascript:void(0);"><i class="fa fa-pinterest" style="color: #bd081c;"></i></a></li>
          </ul>
        </div>
      </div>

      <!-- <div class="pager col-md-12 page-transition">
        <a href="project-images.html" class="button prev">
          <i class="fa fa-arrow-left"></i>
        </a>
        <a href="works-col-3.html" class="button all">
          <i class="fa fa-th"></i>
        </a>
        <a href="project-video.html" class="button next">
          <i class="fa fa-arrow-right"></i>
        </a>
        <div class="arrow-texts">
          <p class="prev-text">previouse: project images</p>
          <p class="all-text">see all works</p>
          <p class="next-text">next: project video</p>
        </div>
      </div> -->

    </div>
  </div>
</main>
@endsection

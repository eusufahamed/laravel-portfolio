@extends('templates.layouts.base')

@section('title')
{{ $page_title }}
@endsection

@section('content')
<!-- Container -->
<main class="container">
  <div class="home-slider">
    <!-- Slider -->
    <div class="controls">
      <!-- Controls -->
      <div class="controls-navigate">
        <div class="prev">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.5 980" style="enable-background:new 0 0 456.5 980;" xml:space="preserve">
            <style type="text/css">.st0 {fill: #0FBFE6;}</style>
            <path class="st0" d="M417,980c21.8,0,39.4-17.6,39.5-39.3c0-10.5-4.1-20.6-11.6-28L118.6,586.5c-53.2-53.2-53.2-139.7,0-192.8
            L444.9,67.4c15.2-15.6,14.9-40.6-0.7-55.8c-15.3-14.9-39.7-14.9-55.1,0L62.9,337.8c-83.9,83.9-83.9,220.4,0,304.3l326.3,326.4
            C396.6,975.9,406.6,980.1,417,980z" />
          </svg>
        </div>
        <div class="next">
          <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.5 980" style="enable-background:new 0 0 456.5 980;" xml:space="preserve">
            <style type="text/css">.st0 {fill: #0FBFE6;}</style>
            <path class="st0" d="M39.5,0.1C17.7,0,0,17.6,0,39.4c0,10.5,4.1,20.6,11.6,28l326.3,326.3c53.2,53.2,53.2,139.7,0,192.8L11.6,912.7
            c-15.6,15.2-15.9,40.2-0.7,55.8s40.2,15.9,55.8,0.7c0.2-0.2,0.5-0.5,0.7-0.7l326.2-326.3c83.9-83.9,83.9-220.4,0-304.3L67.2,11.5
            C59.9,4.1,49.9,0,39.5,0.1z" />
          </svg>
        </div>
      </div>
      <!-- /Controls -->
    </div>
    <ul class="home-slider-horizontal">
      @foreach($projects as $project)
      <li class="slide">
        <a href="{{ route('projectDetailView', $project->slug) }}">
          @if(count($project->images) > 0)
            <div class="s-bg" style="background-image: url('{{ asset('images/project/' . $project->images[0]->image) }}')"></div>
          @endif
          <div class="slide-desc">
            <h2>{{ $project->status == 1 ? 'Completed':'In Progress' }}</h2>
          </div>
        </a>
      </li>
      @endforeach
    </ul>
    <!-- /Slider -->
  </div>
</main>
<!-- /Container -->
@endsection

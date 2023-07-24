@extends('templates.layouts.base')

@section('title')
{{ ucwords($page_title) }}
@endsection

@section('content')
<!-- Container -->
<main class="container">
  <!-- Header -->
  <div class="heading">
    <h2 class="head-text">
      <span>Projects</span>
    </h2>
    <ul class="breadcrumb page-transition">
      <li><a href="{{ route('homeView') }}">Home</a></li>
      <li class="current-crumb">Projects</li>
    </ul>
  </div>
  <!-- /Header -->

  <!--Works-->
  <div class="works">
    <div class="line"></div>
    <div class="works-content page-transition">
      <!-- <div id="filters">
        <button class="btn-filter current" data-filter="*">show all</button>
        <button class="btn-filter" data-filter=".design">design</button>
        <button class="btn-filter" data-filter=".branding">branding</button>
        <button class="btn-filter" data-filter=".art">art</button>
      </div> -->
      <ul class="grid">
        @foreach($project as $projects)
        <li class="grid-item col-md-6 col-sm-6 col-xs-12 branding">
          <a href="{{ route('projectDetailView', $projects->slug) }}">
            @if(count($projects->images) > 0)
            <img src="{{ asset('images/project/' . $projects->images[0]->image) }}" alt="img-desc">
            @endif
            <div class="grid-overlay">
              <div class="work-text">
                <span class="work-cat">{{ ucwords($projects->category->name) }}</span>
                <div class="work-name">
                  <h3>{{ ucwords($projects->title) }}</h3>
                  <span class="triangle">
                    <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                  </span>
                </div>
              </div>
            </div>
          </a>
        </li>
        @endforeach
        </ul>

        <!-- <div class="more">
          <a href="#" class="button">
            <i class="fa fa-plus"></i>
            <span>Load More</span>
          </a>
        </div> -->

      </div>
    </div>
    <!--/Works-->
  </main>
  <!-- /Container -->
@endsection

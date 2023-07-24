@extends('templates.layouts.base')

@section('title')
{{ ucwords($page_title) }} | {{ ucwords($aboutMe->name) }} — {{ ucwords($aboutMe->title) }}
@endsection

@section('content')
<!-- Container -->
<main class="container">
  <!-- Heading -->
  <div class="heading">
    <h2 class="head-text">
      <span>about me</span>
    </h2>
    <ul class="breadcrumb page-transition">
      <li><a href="{{ route('homeView') }}">Home</a></li>
      <li><a href="{{ route('aboutView') }}">about us</a></li>
      <li class="current-crumb">{{ ucwords($aboutMe->name) }}</li>
    </ul>
  </div>
  <!-- /Heading -->

  <!-- About Me-->
  <div class="about-me">
    <div class="line"></div>
    <div class="row">
      <div class="content-box">
        <div class="team-photo col-md-4 col-sm-12">
          <img src="{{ asset('images/team/' . $aboutMe->image) }}" alt="image description">
        </div>

        <div class="team-info col-md-8 col-sm-12">
          <h2>{{ $aboutMe->name }}</h2>
          <h3>{{ ucwords($aboutMe->title) }}</h3>
          <span>{{ ucwords($aboutMe->designation) }}</span>

          <div class="contact-info">
            <div class="contact-details">
              <div class="col-md-12">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                {{ $aboutMe->address }}
              </div>
              <div class="col-md-12">
                <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                +880 {{ $aboutMe->phone }}
              </div>
              <div class="col-md-12">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                {{ $aboutMe->email }}
              </div>
              @if($aboutMe->resume)
              <div class="col-md-12">
                <i class="fa fa-file" aria-hidden="true"></i>
                <a href="{{ asset('file/' . $aboutMe->resume) }}" target="_blank">Resume</a>
              </div>
              @endif
            </div>
          </div>
          <ul class="share">
            <li><a href="javascript:void(0);"><i class="fa fa-facebook" style="color: #3b5998;"></i></a></li>
            <li><a href="javascript:void(0);"><i class="fa fa-twitter" style="color: #55acee;"></i></a></li>
            <li><a href="javascript:void(0);"><i class="fa fa-dribbble" style="color: #ea4c89;"></i></a></li>
            <li><a href="javascript:void(0);"><i class="fa fa-behance" style="color: #1769FF;"></i></a></li>
            <li><a href="javascript:void(0);"><i class="fa fa-pinterest" style="color: #bd081c;"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="content-box">
        <div class="col-md-12">
          <article class="about-facts col-xs-12 col-md-6">
            <h2>Some fact's about me</h2>
            <p>{!! $aboutMe->description !!}</p>
          </article>
          <div class="about-skills col-xs-12 col-md-6">
            <h2>Skills</h2>
            <div class="skills">
              @foreach($aboutMe->skills as $skill)
              <div class="skill">
                <p class="skill-title">{{ ucwords($skill->name) }}</p>
                <div class="skill-bar" data-bar="{{ $skill->percent }}"><span></span></div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>

      <!-- Pager-->
      <!-- <div class="pager col-md-12 page-transition">
        <a href="about-me.html" class="button prev">
          <i class="fa fa-arrow-left"></i>
        </a>
        <a href="about-us.html" class="button all">
          <i class="fa fa-th"></i>
        </a>
        <a href="about-me.html" class="button next">
          <i class="fa fa-arrow-right"></i>
        </a>
        <div class="arrow-texts">
          <p class="prev-text">previouse: john doe</p>
          <p class="all-text">see all team</p>
          <p class="next-text">next: jonathan doe</p>
        </div>
      </div> -->
      <!-- /Pager-->

    </div>
  </div>
  <!-- /About Me-->
</main>
<!-- /Container -->
@endsection

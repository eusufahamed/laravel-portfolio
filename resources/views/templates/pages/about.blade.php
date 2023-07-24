@extends('templates.layouts.base')

@section('title')
{{ ucwords($page_title) }}
@endsection

@section('content')
<!-- Container -->
<main class="container">
  <!-- Heading -->
  <div class="heading">
    <h2 class="head-text">
      <span>about us</span>
    </h2>
    <ul class="breadcrumb page-transition">
      <li><a href="{{ route('homeView') }}">Home</a></li>
      <li class="current-crumb">About Us</li>
    </ul>
  </div>
  <!-- /Heading -->

  <!-- About Us-->
  <div class="about">
    <div class="line"></div>
    <div class="row">
      <!-- Team Info -->
      <div class="content-box">
        <div class="col-md-12">
          <article class="about-facts col-xs-12 col-md-12">
            <h2>Some fact's about us</h2>
            <p>We are a Futuristic Software / Web Development team. We are reliable and affordable web design and development team to provide Web Application Development, Software Development, ERP, Mobile Apps Development, Networking, Cloud Hosting, SEO, SMO, SEM, SMM, Online Marketing and more. We have done large volume of <a href="{{ route('projectsView') }}">work</a> all around the world. <a href="{{ route('contactView') }}">Give Us A Try</a></p>
          </article>
        </div>
      </div>
      <!-- /Team Info -->

      <!-- Services -->
      <div class="content-box">
        <article class="col-md-12">
          <h2>what we do</h2>
          <p>We are delivers high quality design & develop websites and even develop apps for different types of operating systems. We provide world-class software technologies and implementing innovative solutions that drive long-term value to our customers. Also, build corporate web-based systems to help enterprises automate processes, increase productivity, and facilitate workflow management.</p>
        </article>
        @foreach($services as $service)
        <div class="service-item col-md-4 col-xs-12 col-sm-6">
          <h3><i class="fa fa-cogs"></i>{{ ucwords($service->name) }}</h3>
          <p>{!! $service->description !!}</p>
        </div>
        @endforeach
      </div>
      <!-- /Services -->

      <!-- Our Team -->
      <div class="content-box">
        <article class="col-md-12">
          <h2>who we are</h2>
          <p>We are a team with Eusuf Ahamed and we are passionate about delivering strong, robust software / Web solutions to our clients. We are always here to solve your problems and help your business grow. We are highly skilled developers who have long-term experience across a wide range of technologies and industries. Whether you need specific skills or ongoing support, we have the people to help you.</p>
        </article>
        <ul class="our-team page-transition">
          <!-- Worker -->
          @foreach($teamMember as $team)
          <li class="team-avatar col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <a href="{{ route('aboutDetailView', $team->slug) }}" class="team-info">
              <div class="team-photo">
                <img src="{{ asset('images/team/' . $team->image) }}" alt="image description">
              </div>
              <div class="team-overlay">
                <div class="texts">
                  <h4>{{ ucwords($team->name) }}</h4>
                  <p>{{ ucwords($team->designation) }}</p>
                  <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                </div>
              </div>
            </a>
          </li>
          @endforeach
          <!-- /Worker -->
        </ul>
      </div>
      <!-- /Our Team -->
      <!-- Clients -->
      <div class="content-box">
        <article class="col-xs-12 col-md-12">
          <h2>Clients who love us</h2>
          <p>Our clients love us because we always listen to our clients and act accordingly. Throughout the entire development process, we offer our clients consulting, whether it be in person, by phone, or by email. Also, we enjoy listening and talking about work. We work not only for money but also for Clients satisfactions in our service area. You don't need to worry about any spamming or black hat work.</p>
        </article>
        <ul class="clients col-xs-12 col-md-12">
          @foreach($clients as $client)
          <li class="client col-md-2 col-xs-4">
            <span>
              <img src="{{ asset('images/clientLogo/' . $client->logo) }}" alt="image description">
            </span>
          </li>
          @endforeach
        </ul>
      </div>
      <!-- Clients -->
    </div>
  </div>
  <!-- /About Us-->
</main>
<!-- /Container -->
@endsection

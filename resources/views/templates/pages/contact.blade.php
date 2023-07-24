@extends('templates.layouts.base')

@section('title')
{{ $page_title }}
@endsection

@section('content')
<!-- Container -->
<main class="container">
  <!-- Header -->
  <div class="heading">
    <h2 class="head-text">
      <span>Contact</span>
      <h3>Feel Free To Reach Out Through Any Platforms Bellow</h3>
    </h2>
    <ul class="breadcrumb page-transition">
      <li><a href="{{ route('homeView') }}">home</a></li>
      <li class="current-crumb">Contact</li>
    </ul>
  </div>
  <!-- /Header -->

  <!-- Contact -->
  <div class="contact">
    <div class="line"></div>
    <div class="row">
      <div class="content-box">
        @include('admin.layouts.partials.message')
        @if($contact)
        <div class="contact-info col-sm-12 col-md-6">
          <h2>contact info</h2>
          <p>I'm seeking out opportunities to collaborate with companies / agencies / individuals, not just work for them. lets chat about how we can work together.</p>
          <div class="contact-details">
            <div class="col-md-12">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              {{ $contact->address }}
            </div>
            <div class="col-md-12">
              <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
              +880 {{ $contact->mobile }}
            </div>
            <div class="col-md-12">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              {{ $contact->email }}
            </div>
          </div>
        </div>
        @endif

        <div class="contact-form col-sm-12 col-md-6">
          <h2>get in touch</h2>
          <p>If you wanna get in touch, talk to me about a project collaboration or just say hi, fill up the awesome form below and ~let's talk.</p>
          <form action="{{ route('sentEmail') }}" method="post">
            @csrf
            <div class="form-group control-group col-sm-12 col-md-6">
              <span><i class="fa fa-user"></i></span>
              <input class="form-control" type="text" name="name" placeholder="Name *">
            </div>

            <div class="form-group control-group col-sm-12 col-md-6">
              <span><i class="fa fa-envelope-o"></i></span>
              <input class="form-control" type="email" name="email" placeholder="Email Address *">
            </div>

            <div class="form-group control-group col-sm-12">
              <span><i class="fa fa-pencil"></i></span>
              <textarea class="form-control" name="message" placeholder="Message *"></textarea>
            </div>

            <div class="form-button col-xs-12">
              <button type="submit" name="enter" class="button">
                <i class="fa fa-paper-plane"></i>
                <span>send message</span>
              </button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- /Contact -->
</main>
<!-- /Container -->
@endsection

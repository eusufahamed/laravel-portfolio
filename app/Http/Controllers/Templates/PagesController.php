<?php
namespace App\Http\Controllers\Templates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use App\Models\Project;
use App\Models\Team;
use App\Models\ClientInfo;
use App\Models\Service;
use Mail;

class PagesController extends Controller{
  // Home Page View
  public function homeView(){
    $data['page_title'] = 'Eusuf Ahamed';
    $data['projects'] = Project::orderBy('id', 'desc')->get();
    return view('templates.home')->with($data);
  }


  // About Page View
  public function aboutView(){
    $data['page_title'] = 'about us';
    $data['teamMember'] = Team::get();
    $data['clients'] = ClientInfo::get();
    $data['services'] = Service::get();
    return view('templates.pages.about')->with($data);
  }


  // Detail - About Page View
  public function aboutDetailView($slug){
    $data['page_title'] = 'about';
    $data['aboutMe'] = Team::where('slug', $slug)->first();

    if(! is_null($data['aboutMe'])){
      return view('templates.pages.aboutMe')->with($data);
    }
    else{
      return redirect()->route('aboutView');
    }
  }


  // Contact Page View
  public function contactView(){
    $data['page_title'] = "Let's Talk — Eusuf Ahamed";
    $data['contact'] = ContactInfo::first();
    return view('templates.pages.contact')->with($data);
  }

  public function sentEmail(Request $r){
    //Validation Part
    $r->validate([
      'name' => 'required',
      'email' => 'required|email',
      'message' => 'required',
    ]);

    $data = array(
      'name' => $r->name,
      'email' => $r->email,
      'subject' => 'Test',
      'bodyMessage' => $r->message
    );

    Mail::send('templates.pages.sendEmail', $data, function($e_mail) use($data){
      $e_mail->to('engr.eusufahamed@gmail.com');
      $e_mail->from($data['email'], $data['name']);
      $e_mail->subject($data['subject']);
    });

    // Success message
    session()->flash('success', 'mail sent.');

    return redirect()->route('contactView');
  }
}

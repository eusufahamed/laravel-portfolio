<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactInfo;

class ContactController extends Controller{
  // Auth middleWare
  public function __construct(){
    $this->middleware('auth');
  }


  // Get Contact
  public function adminContactView(){
    $getContact = ContactInfo::first();
    return view('admin.pages.contact.adminContactView')->with('contact', $getContact);
  }


  // Viewing Contact Form to Add Conatct
  public function addContact(){
    return view('admin.pages.contact.addContact');
  }


  // Storing the Contact in the Database
  public function storeContact(Request $request){
    //Validation Part
    $request->validate([
      'address' => 'required',
      'mobile' => 'required|numeric|digits:11',
      'email' => 'required|email',
    ]);

    // Object of ContactInfo Class
    $contact = new ContactInfo;

    $contact->address = $request->address;
    $contact->mobile = $request->mobile;
    $contact->email = $request->email;

    $contact->save();

    // Success message
    session()->flash('success', 'Contact Added Successfully.');

    return redirect()->route('adminContactView');
  }


  // Contact Editing form
  public function editContact($requestId){
    $editContact = ContactInfo::where('id', $requestId)->first();
    return view('admin.pages.contact.editContact')->with('findedContact', $editContact);
  }


  // Updating the Contact in the Database
  public function updatedContact(Request $request, $requestId){
    //Validation Part
    $request->validate([
      'address' => 'required',
      'mobile' => 'required|numeric|digits_between:10,11',
      'email' => 'required|email',
    ]);

    $updateContact = ContactInfo::where('id', $requestId)->first();

    $updateContact->address = $request->address;
    $updateContact->mobile = $request->mobile;
    $updateContact->email = $request->email;

    $updateContact->save();

    // Success message
    session()->flash('success', 'Contact Updated Successfully.');

    return redirect()->route('adminContactView');
  }


  // Delete the Contact
  public function deletedContact($requestId){
    $deleteContact = ContactInfo::where('id', $requestId)->first();

    if(!is_null($deleteContact)){
      $deleteContact->delete();
    }

    return back();
  }
}

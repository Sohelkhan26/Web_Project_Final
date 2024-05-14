<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ContactsController extends Controller
{
    public function updateContacts(CreateContactRequest $request):View
    {
        $contact = Contact::find($request->id);
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->job = $request->job;
        $contact->company = $request->company;
        $contact->address = $request->address;
        $contact->birthdate = $request->birthdate;
        $contact->zip = $request->zip;
        $contact->city = $request->city;
        $contact->division = $request->division;
        $contact->country = $request->country;
        $contact->note = $request->note;
        $contact->save();
        return view('showcontacts' , ['contacts' => Auth::user()->contacts]);
    }
    public function edit($id)
    {
        $contact = Contact::find($id);
//        dd($contact);
        return view('editcontacts', compact('contact'));
    }
    public function store(CreateContactRequest $request)
    {
//        dd($request->all());
        $user_id = Auth::user()->id;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            // Handle case when no image is provided
            $imageName = null;
        }
        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->job = $request->job;
        $contact->company = $request->company;
        $contact->country = $request->country;
        $contact->address = $request->address;
        $contact->birthdate = $request->birthdate;
        $contact->image = $imageName;
        $contact->zip = $request->zip;
        $contact->city = $request->city;
        $contact->division = $request->division;
        $contact->user_id = $user_id;
        $contact->note = $request->note;

        $contact->save();
        return view('showcontacts' , ['contacts' => Auth::user()->contacts]);
    }
    public function showContacts()
    {
        $contacts = auth()->user()->contacts;
        return view('showcontacts', ['contacts' => $contacts]);
    }

}

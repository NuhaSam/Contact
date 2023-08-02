<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactContoller extends Controller
{
   
    public function view(){
        $contacts = Contact::all();
        $success = session('success');
        return view('users.showContacts',compact('contacts','success'));
    }
    public function create(){
        return view('users.addContact');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' =>'required',
            'address' =>'required',
            'phone' =>'required',
            'age' =>'required',
        ]);

       Contact::create($validated);
        // $contact = new Contact($validated);
        // $contact->save();
        return redirect(route('contact.view'));
    }

    public function update(Request $request ,$id){
        $contact = Contact::find($id);
        return view('users.updateContact',compact('contact'));
    }
    public function edit(Request $request ,$id){
        $contact = Contact::find($id);
        $contact->update($request->all());
        return redirect(route('contact.view'));
    }
    public function delete($id){
        // $contact = Contact::find($id);
        Contact::destroy($id);
        return redirect()->back()->with('success','Contact Delete Successfully');
    }
    public function sort(Request $request){
        $success =session('success');
        $contacts = Contact::all()->sortBy($request->get('sortKey'));
        return view('users.showContacts',compact('contacts', 'success'));
    }
}

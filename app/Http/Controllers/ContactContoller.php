<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ContactContoller extends Controller
{

    public function index()
    {
        $user = User::find(Auth::id());
        $contacts = $user->contacts;
        $success = session('success');
        return view('users.showContacts', compact('contacts', 'success'));
    }
    public function create()
    {
        return view('users.addContact');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required | string',
            'address' => 'required | string',
            'phone' => 'required',
            'age' => 'required | integer',
            // 'user_id' =>'required | exists:users,id',
        ]);
        $validated['user_id'] = Auth::id();
        Contact::create($validated);

        return redirect(route('contact.view'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        return view('users.updateContact', compact('contact'));
    }
    public function edit(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'age' => 'required',
        ]);

        $contact = Contact::find($id);
        $contact->update($validated);
        return redirect(route('contact.view'));
    }
    public function destroy(Contact $contact , $id)
    {
        // $contact = Contact::find($id);
        Contact::destroy($id);
        return redirect()->back()->with('success', 'Contact Delete Successfully');
    }
    public function show(){

    }
    public function sort(Request $request)
    {
        $success = session('success');
        $contacts = Contact::all()->sortBy($request->get('sortKey'));
        return view('users.showContacts', compact('contacts', 'success'));
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $contacts = Contact::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%")
             ->orWhere('address', 'like', "%$search%")
             ->orWhere('age', 'like', "%$search%");
        })->get();
        $success = session('success');
        return  view('users.showContacts', compact('contacts', 'success'));
    }
    public function filter(Request $request){
        $name = $request->input('name');
        $contacts =  Contact::where('name','LIKE', "%$name%")->get();
        $success = session('success');
        return  view('users.showContacts', compact('contacts', 'success'));
    }
}

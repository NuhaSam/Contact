@extends('layout/master')
@section('content')
<form action="{{ route('contact.edit',$contact->id) }}" style="width: 50%; margin-left:5%; margin-top:2%" method="post">
@csrf 
<div class="form-group" >
    <label for="exampleInputEmail1">Name</label>
    <input type="text"  name="name" value="{{ $contact->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
    <!-- <small id="emailHelp" class="form-text text-muted"></small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Age</label>
    <input type="text" name="age" value="{{ $contact->age}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter age">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input type="tetx" name="address" value="{{ $contact->address}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter address">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone</label>
    <input type="phone" value="{{ $contact->phone}}" name="phone" class="form-control" id="exampleInputPassword1" >
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
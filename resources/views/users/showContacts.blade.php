@extends('layout/master')
@section('content')
  @if($success)
  <div class="alert alert-success">{{ $success }}</div>
  @endif
  <form method="post" action="{{ route('contact.sort') }}">
    @csrf 
  <select name="sortKey" class="form-select" style="width: 20%;" aria-label="Default select example">
  <option value="name" selected>Name</option>
  <option value="age">Age</option>
  <option value="address">Address</option>
</select>

<button type="submit" class="btn btn-primary">Sort !</button>
</form>
  <table class="table table-striped" style="width: 70%; margin-left:250px; margin-top:30px" >
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Address</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($contacts as $contact)
      <tr>
        <th scope="row">{{ $contact->id }}</th>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->age }}</td>
        <td>{{ $contact->address }}</td>
        <td>
        <form action="{{ route('contact.update', $contact->id); }}" method="post">
            @csrf
            @method('put')
              <button type="submit" name="edit" class="btn btn-primary">Edit</button>
          </form>
        </td>
        <td>
        <form method="post" action="{{ route('contact.delete', $contact->id ); }}">
            @csrf
            @method('delete')
              <button type="submit" name="delete" class="btn btn-danger">Delete</button>
          </form>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>



  @endsection

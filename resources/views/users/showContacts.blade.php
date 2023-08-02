@extends('layout/master')
@section('content')
  @if($success)
  <div class="alert alert-success">{{ $success }}</div>
  @endif

  <div class="d-flex justify-content-between collapse navbar-collapse">
  <form method="post" action="{{ route('contact.sort') }}">
    @csrf 
  <select name="sortKey" class="form-select" aria-label="Default select example">
  <option selected>Sort ASC based on </option>
  <option value="name" >Name</option>
  <option value="age">Age</option>
  <option value="address">Address</option>
</select>

<button type="submit" class="btn btn-primary">Sort !</button>
</form>

</form>
  <!-- <form method="post" action="{{ route('contact.search') }}" >
    <input type="text" name="search" placeholder="Search" required>
    <input type="submit" name="submit" value="Search"/>
  </form> -->

  <form class="form-inline my-2 my-lg-0" method="post" action="{{ route('contact.search') }}" >
  @csrf

      <input  name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
    </form>

</div>
    

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

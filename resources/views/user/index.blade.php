@extends('user.common.master')

@section('content')
<section>
  @if (session('success'))
  <div class="p-3">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Successfull !</strong> {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  </div>
@endif
  @if (session('error'))
  <div class="p-3">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>error !</strong> {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  </div>
@endif
    <div class="container">
      
      <div class="my-3 text-center"><h2>User List </h2></div>
        <table class="table table-striped border">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->mobile}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->address}}</td>
                <td>
                  <a href="{{ Route('user.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                  <a href="{{ Route('user.show',$user->id)}}" class="btn btn-success">View</a>
                  <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick=" confirm('Are you sure you want to delete this user?')">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
         
    </div>
</section>
@endsection
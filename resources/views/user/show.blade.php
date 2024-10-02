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
      <div class="my-3 text-center"><h2>User: {{$user->name}} </h2></div>
        <table class="table table-striped border">
            <thead class="thead-dark">
               <tr> <th scope="col">Id</th>
                <td>{{$user->id}}</td></tr>
               <tr> <th scope="col">Name</th>
                <td>{{$user->name}}</td></tr>
               <tr> <th scope="col">Mobile</th>
                <td>{{$user->mobile}}</td></tr>
               <tr> <th scope="col">Email</th>
                <td>{{$user->email}}</td></tr>
               <tr> <th scope="col">Address</th>
                <td>{{$user->address}}</td></tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
          
         
    </div>
</section>
@endsection
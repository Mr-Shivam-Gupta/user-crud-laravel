@extends('user.common.master')

@section('content')
<section>
    @if (session('success'))
    <div class="p-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfull!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
    @if (session('error'))
    <div class="p-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="container">
        <div class="my-3 text-center"><h2>Edit User</h2></div>

        <!-- The form should now point to the update route -->
        <form method="POST" action="{{ route('user.update', $user->id) }}" class="d-flex justify-content-center">
            @csrf
            @method('PUT') <!-- Use PUT method for update -->
            <div class="row w-75">
                <div class="form-group p-2">
                    <label class="p-1">User Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name (required)" value="{{ old('name', $user->name) }}">
                    @if($errors->has('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>

                <div class="form-group p-2">
                    <label class="p-1">User Mobile Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Number (required)" value="{{ old('mobile', $user->mobile) }}">
                    @if($errors->has('mobile'))
                        <small class="text-danger">{{ $errors->first('mobile') }}</small>
                    @endif
                </div>

                <div class="form-group p-2">
                    <label class="p-1">User Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email (optional)" value="{{ old('email', $user->email) }}">
                    @if($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>

                <div class="form-group p-2">
                    <label class="p-1">User Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="address" placeholder="Enter Address (required)" value="{{ old('address', $user->address) }}">
                    @if($errors->has('address'))
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                    @endif
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

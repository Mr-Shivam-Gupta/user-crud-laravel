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
        <div class="my-3 text-center"><h2>Add User</h2></div>
        
        <form method="POST" action="{{ route('user.store') }}" class="d-flex justify-content-center">
            @csrf
            <div class="row w-75">
                <div class="form-group p-2">
                    <label class="p-1">User Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name (required)" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>

                <div class="form-group p-2">
                    <label class="p-1">User Mobile Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Number (required)" value="{{ old('mobile') }}">
                    @if($errors->has('mobile'))
                        <small class="text-danger">{{ $errors->first('mobile') }}</small>
                    @endif
                </div>

                <div class="form-group p-2">
                    <label class="p-1">User Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email (optional)" value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>

                <div class="form-group p-2">
                    <label class="p-1">User Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="address" placeholder="Enter Address (required)" value="{{ old('address') }}">
                    @if($errors->has('address'))
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                    @endif
                </div>
                <div class="form-group p-2">
                    <label class="p-1">User Image</label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                    @if($errors->has('image'))
                        <small class="text-danger">{{ $errors->first('image') }}</small>
                    @endif
                </div>

                <div class="form-group p-2">
                    <label class="p-1">Image Preview</label>
                    <img id="imagePreview" src="" alt="Image Preview" style="max-width: 200px; max-height: 200px; display: none;">
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Submit</button>   
                </div>
            </div>
        </form>
    </div>
</section>
<script>
    // JavaScript for Image Preview
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection

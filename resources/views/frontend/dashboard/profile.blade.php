@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">

            <div class="row mt-sm-4">

                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card">
                        <form method="post" class="needs-validation" novalidate="" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Update Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <div class="mb-3">
                                            <img width="100px" style="border-radius: 4px;" src="{{asset($user->image)}}" alt="" id="image-preview">
                                        </div>
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control" id="image-upload">

                                    </div>

                                    <div class="form-group col-12">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$user->name}}">

                                    </div>
                                    <div class="form-group col-12">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" value="{{$user->email}}" >

                                    </div>
                                </div>


                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card">

                        <form method="post" class="needs-validation" novalidate="" action="{{route('admin.password.update')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Update Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label>Current Password</label>
                                        <input type="password" name="current_password" class="form-control" >
                                    </div>
                                    <div class="form-group col-12">
                                        <label>New Password</label>
                                        <input type="password" name="password" class="form-control" >
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" >
                                    </div>

                                </div>


                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>

        // on change image
        $(function(){
            $('#image-upload').change(function(){
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
                {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#image-preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                else
                {
                    $('#image-preview').attr('src', '{{asset('default/no_image.jpg')}}');
                }
            });

        });

    </script>

@endpush

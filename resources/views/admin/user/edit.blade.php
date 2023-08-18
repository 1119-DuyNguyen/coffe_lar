@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Manage User</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create User</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.user.update',$user->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{$user->email}}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm password</label>
                                    <input type="password" class="form-control" name="password_confirmation" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Role</label>

                            <select id="inputState" class="form-control" name="role">
                            @foreach($roleList as $role)
                                <option value="{{$role->id}}" {{$role->id==$user->role_id ? 'selected': ""}} >{{$role->name}}</option>
                            @endforeach

                            </select>
                        </div>
                        <button type="submmit" class="btn btn-primary">Create</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection

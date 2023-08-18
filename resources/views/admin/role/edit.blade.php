@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Manage Role</h1>
          </div>

          <div class="section-body container">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Role</h4>

                  </div>
                  <div class="card-body container">
                    <form action="{{route('admin.role.update',$role->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{$role->name}}">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" value="{{$role->description}}">
                        </div>

                        <div class="form-group container">
                            <label for="inputState">Permission</label>
                            <div class="row">
                                @foreach($permissionList as $permission)

                                    <div  class="col-12 col-sm-6 col-lg-4 ">
                                <input type="checkbox" name="permissions[]" value="{{$permission->id}}" {{in_array($permission->id,$roleHasPermission) ? "checked" :""}} > {{$permission->name}}
                                </div>
                                @endforeach

                            </div>

                        </div>
                        <button type="submmit" class="btn btn-primary">Update</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection

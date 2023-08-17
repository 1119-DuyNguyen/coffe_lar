@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Dahsboard
@endsection

@section('content')

    <div class="container-fluid p-4 ">
      <div class="row ">
        <div class="col-12 ">
          <div class="dashboard_content">

              <div class="wsus__dashboard">
              <div class="row justify-content-center">
                <div class="col-6">
                  <a class="wsus__dashboard_item red" href="{{route('user.orders.index')}}">
                    <i class="fas fa-cart-plus"></i>
                    <p>Total Order</p>
                    <h4 style="color:#ffff">{{$totalOrders}}</h4>
                  </a>
                </div>
                <div class="col-6">
                  <a class="wsus__dashboard_item green" href="{{ route('user.orders.index',['status'=>'pending']) }}">
                    <i class="fas fa-cart-plus"></i>
                    <p>Pending Orders</p>
                    <h4 style="color:#ffff">{{$totalPendingOrders}}</h4>
                  </a>
                </div>
                <div class="col-6">
                  <a class="wsus__dashboard_item sky" href="route('user.orders.index',['status'=>"delivered"])">
                    <i class="fas fa-cart-plus"></i>
                    <p>Complete Orders</p>
                    <h4 style="color:#ffff">{{$totalCompleteOrders}}</h4>
                  </a>
                </div>


                <div class="col-6">
                    <a class="wsus__dashboard_item orange" href="{{route('user.profile')}}">
                      <i class="fas fa-user-shield"></i>
                      <p>profile</p>
                      <h4 style="color:#ffff">-</h4>
                    </a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

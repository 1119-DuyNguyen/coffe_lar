<div class="dashboard_sidebar">
    <span class="close_icon">
      <i class="far fa-bars dash_bar"></i>
      <i class="far fa-times dash_close"></i>
    </span>
    <a href="javascript:;" class="dash_logo"><img src="{{asset($logoSetting->logo)}}" alt="logo" class="img-fluid"></a>
    <ul class="dashboard_link">
      <li><a  href="{{route('user.dashboard')}}"><i class="fas fa-tachometer"></i>Dashboard</a></li>

      <li><a  href="{{url('/')}}"><i class="fas fa-home"></i>Go To Home Page</a></li>

      <li><a  href="{{route('user.orders.index')}}"><i class="fas fa-list-ul"></i> Orders</a></li>
      <li><a  href="{{route('user.review.index')}}"><i class="far fa-star"></i> Reviews</a></li>

      <li><a  href="{{route('user.profile')}}"><i class="far fa-user"></i> My Profile</a></li>
      <li><a  href="{{route('user.address.index')}}"><i class="fal fa-gift-card"></i> Addresses</a></li>

      <li>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{route('logout')}}" onclick="event.preventDefault();
            this.closest('form').submit();"><i class="far fa-sign-out-alt"></i> Log out</a>
        </form>
        </li>

    </ul>
  </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                   aria-controls="v-pills-home" aria-selected="true">Home</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                   aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
                   aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                   aria-controls="v-pills-settings" aria-selected="false">Settings</a>
            </div>

        </div>
        <div class="col-9" >
            @yield('datatable')
        </div>
    </div>

</div>

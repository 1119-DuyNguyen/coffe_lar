<div class="container-fluid  pt-4 pb-4">
    <div class="row">
        <div class="col-3">
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
        <div class="col-9" >
           {{$slot}}
        </div>
    </div>

</div>

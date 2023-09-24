<nav class="dashboard-nav mb-10 mb-md-0">
    <div class="list-group list-group-sm list-group-strong list-group-flush-x">
        <a class="list-group-item item_user {{$main == 'info' ? 'active' : ''}}" href="#" data-nav="info" >
        <i class="fa fa-cog" aria-hidden="true"></i>
            Tài khoản
        </a>
        <a class="list-group-item item_user {{$main == 'history' ? 'active' : ''}}"  href="#" data-nav="history">
        <i class="fa fa-history" aria-hidden="true"></i>
            Lịch sử
        </a>
        <a class="list-group-item item_user {{$main == 'wishlist' ? 'active' : ''}}" href="#" data-nav="whishlist">
        <i class="fa fa-heart" aria-hidden="true"></i>
            Yêu thích
        </a>

    </div>
</nav>
<div class="main-sidebar sidebar-style-2">
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">Admin Panel||</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <i
                    class="fas fa-fire"></i>
                <span>Dashboard</span></a>
            <ul class="dropdown-menu">
                <li class=""><a class="nav-link"
                                href="{{ route('admin.dashboard') }}">All</a></li>
                <li class=""><a class="nav-link"
                                href="{{ route('user.dashboard') }}">User</a></li>

            </ul>
        </li>
        <li class="menu-header">Ecommerce</li>

        <li
            class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i>
                <span>Manage Categories</span></a>
            <ul class="dropdown-menu">
                <li class=""><a class="nav-link"
                                href="{{ route('admin.category.index') }}">Category</a></li>
                <li class=""><a class="nav-link"
                                href="{{ route('admin.sub-category.index') }}">Sub Category</a></li>
                <li class=""><a class="nav-link"
                                href="{{ route('admin.child-category.index') }}">Child Category</a></li>

            </ul>
        </li>

        <li
            class="dropdown ">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box"></i>
                <span>Manage Products</span></a>
            <ul class="dropdown-menu">
                <li class=""><a class="nav-link"
                                href="{{ route('admin.brand.index') }}">Brands</a></li>
                <li
                    class="">
                    <a class="nav-link" href="{{ route('admin.products.index') }}">Products</a></li>
                <li class=""><a class="nav-link"
                                href="{{ route('admin.seller-products.index') }}">Seller Products</a></li>
                <li class=""><a class="nav-link"
                                href="{{ route('admin.seller-pending-products.index') }}">Seller Pending Products</a>
                </li>

                <li class=""><a class="nav-link"
                                href="{{ route('admin.reviews.index') }}">Product Reviews</a></li>

            </ul>
        </li>


        <li
            class="dropdown ">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cart-plus"></i>
                <span>Orders</span></a>
            <ul class="dropdown-menu">
                <li class=""><a class="nav-link"
                                href="{{ route('admin.order.index') }}">All Orders</a></li>
            </ul>
        </li>


        <li
            class="dropdown ">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>Ecommerce</span></a>
            <ul class="dropdown-menu">
                <li class=""><a class="nav-link"
                                href="{{ route('admin.flash-sale.index') }}">Flash Sale</a></li>
                <li class=""><a class="nav-link"
                                href="{{ route('admin.coupons.index') }}">Coupons</a></li>

            </ul>
        </li>

        <li
            class="dropdown ">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i> <span>Manage Website</span></a>
            <ul class="dropdown-menu">
                <li class=""><a class="nav-link"
                                href="{{ route('admin.slider.index') }}">Slider</a></li>

         <li class=""><a class="nav-link"
                                href="{{ route('admin.about.index') }}">About page</a></li>
                <li class=""><a class="nav-link"
                                href="{{ route('admin.terms-and-conditions.index') }}">Terms Page</a></li>

            </ul>
        </li>


        <li class="menu-header">Settings & More</li>


        <li
            class="dropdown ">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                    class="fas fa-th-large"></i><span>Footer</span></a>
            <ul class="dropdown-menu">
                <li class=""><a class="nav-link"
                                href="{{ route('admin.footer-info.index') }}">Footer Info</a></li>

                <li class=""><a class="nav-link"
                                href="{{ route('admin.footer-socials.index') }}">Footer Socials</a></li>

                <li class=""><a class="nav-link"
                                href="{{ route('admin.footer-grid-two.index') }}">Footer Grid Two</a></li>

                <li class=""><a class="nav-link"
                                href="{{ route('admin.footer-grid-three.index') }}">Footer Grid Three</a></li>

            </ul>
        </li>
        <li
            class="dropdown ">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
                <span>Users</span></a>
            <ul class="dropdown-menu">

                <li class=""><a class="nav-link"
                                href="{{ route('admin.user.index') }}">User Lists</a></li>

                <li class=""><a class="nav-link"
                                href="{{ route('admin.user.create') }}">Create user</a></li>

            </ul>
        </li>


        <li><a class="nav-link "
               href="{{ route('admin.subscribers.index') }}"><i class="fas fa-user"></i>
                <span>Subscribers</span></a></li>

        <li><a class="nav-link" href="{{ route('admin.settings.index') }}"><i class="fas fa-wrench"></i>
                <span>Settings</span></a></li>

    </ul>

    </aside>
</div>
{{--dynamic sidebar--}}
@push('scripts')
    <script>
        const dynamicSidebar=function (){
            console.log('here')
            // for single sidebar menu
            var url = document.location.protocol + "//" + document.location.hostname + document.location.pathname;

            // multiple
            var navActive = Array.from(document.querySelectorAll('ul.sidebar-menu a')).filter(function (a) {
                return url.includes(a.href);
            });
            navActive.forEach(nav => {
                if(nav.href==url){
                    nav.parentElement.classList.add('active');
                }
                var parent = nav.closest('li.dropdown');
                if (parent)
                    parent.classList.add('active');
            });
        }
        dynamicSidebar()
        // document.querySelector('[data-toggle="sidebar"]').addEventListener('click', (e)=>{
        //     dynamicSidebar();
        // });

    </script>
@endpush


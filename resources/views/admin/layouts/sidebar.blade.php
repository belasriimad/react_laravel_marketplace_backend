<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" aria-current="page" href="{{route('admin.index')}}">
                    <i class="fas fa-dashboard"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.categories.index')) active @endif" aria-current="page" href="{{route('admin.categories.index')}}">
                    <i class="fas fa-bars"></i>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.reviews.index')) active @endif" aria-current="page" href="{{route('admin.reviews.index')}}">
                    <i class="fas fa-star"></i>
                    Reviews
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.pictures.index')) active @endif" aria-current="page" href="{{route('admin.pictures.index')}}">
                    <i class="fas fa-image"></i>
                    Pictures
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.users.index')) active @endif" aria-current="page" href="{{route('admin.users.index')}}">
                    <i class="fas fa-users"></i>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.orders.index')) active @endif" aria-current="page" href="{{route('admin.orders.index')}}">
                    <i class="fas fa-cart-shopping"></i>
                    Orders
                </a>
            </li>
        </ul>
    </div>
</nav>
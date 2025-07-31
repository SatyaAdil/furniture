<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #f4f4f4; border-bottom: 1px solid #cdcbcb;">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold ms-3" style="color: #e4bf45;" href="{{ url('/') }}">Bagus Furniture</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item me-3"><a class="nav-link text-dark" href="{{ url('/') }}">Home</a></li>
        <li class="nav-item me-3"><a class="nav-link text-dark" href="{{ url('/about') }}">About</a></li>
        <li class="nav-item me-3"><a class="nav-link text-dark" href="{{ url('/product') }}">Product</a></li>

        @auth
          @if (Auth::user()->role === 'admin')
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle fw-bold text-primary" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Admin Panel
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('admin_product_add') }}">Manage Products</a></li>
                <li><a class="dropdown-item" href="{{ route('admin_home') }}">Manage Home</a></li>
                <li><a class="dropdown-item" href="{{ route('admin_about') }}">Manage About</a></li>
                <li><a class="dropdown-item" href="{{ route('admin_layanan') }}">Manage Layanan</a></li>
                <li><a class="dropdown-item" href="{{ route('admin_footer') }}">Manage Footer</a></li>
              </ul>
            </li>
          @endif

          <li class="nav-item me-3">
            <a class="nav-link text-danger" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout ({{ Auth::user()->name }})
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        @else
          <li class="nav-item me-3"><a class="nav-link fw-bold" href="{{ route('login') }}">Login</a></li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

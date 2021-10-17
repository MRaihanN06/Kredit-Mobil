<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="background-color: pink">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <i class="bi bi-house-door"></i>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/mobil') ? 'active' : '' }}" href="/dashboard/mobil">
            <span><i class="bi bi-wrench"></i></span>
            Mobil
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/pembeli') ? 'active' : '' }}" href="/dashboard/pembeli">
            <span><i class="bi bi-person-fill"></i></span>
            Pembeli
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/cash') ? 'active' : '' }}" href="/dashboard/cash">
            <span><i class="bi bi-currency-dollar"></i></span>
            Cash
          </a>
        </li>
      </ul>
    </div>
</nav>

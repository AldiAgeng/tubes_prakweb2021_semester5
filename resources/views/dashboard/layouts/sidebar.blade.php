<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link">
                @if(auth()->user()->avatar==null)
                <img style="height: 60px; width: 60px;" class="img-responsive rounded-circle" src="https://i.pravatar.cc/60">
                @else
                <img style="height: 60px; width: 60px;" class="img-responsive rounded-circle" src="{{ asset('storage/' .auth()->user()->avatar) }}">
                @endif
              {{ auth()->user()->name }}
            </a>
          </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/myprofile*') ? 'active' : '' }}" aria-current="page" href="/dashboard/myprofile">
          <span data-feather="user"></span>
          MyProfile
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
          <span data-feather="file-text"></span>
          My Post
        </a>
      </li>
    </ul>

    @can('admin')  
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Administrator</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/all_posts*') ? 'active' : '' }}" href="/dashboard/all_posts">
          <span data-feather="file-text"></span>
          All Post
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
          <span data-feather="grid"></span>
          Categories
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
          <span data-feather="users"></span>
          Users
        </a>
    </ul>

    
    @endcan

  </div>
</nav>
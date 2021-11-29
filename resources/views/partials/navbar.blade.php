<div style="z-index: -999;" class="kotak"></div>
  <nav class="navbar navbar-expand-lg navbar-light shadow-5-strong">
    <div class="container-fluid mt-3 mb-1">
      <a class="navbar-brand" href="/">Logo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('posts*') ? 'active' : '' }}" href="/posts">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('login*') ? 'active' : '' }}" href="/login">Login</a>
          </li>
        </ul>
        <form action="/posts" class="d-flex search">
          
          @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
          @if (request('author'))
          <input type="hidden" name="author" value="{{ request('author') }}">
          @endif

          <input class="form-control rounded-pill bg-dark col-search border border-dark text-light" type="search" placeholder="Search..." aria-label="Search" name="search" value="{{ request('search') }}">
        </form>
      </div>
    </div>
  </nav>
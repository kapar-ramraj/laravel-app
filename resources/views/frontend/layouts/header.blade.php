<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt="">     -->
        <h1 class="sitename">Digital Library</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{url('/')}}" class="{{ request()->path() == '/' ? 'active' : ''}}">Home<br></a></li>
          <li><a href="{{route('page.aboutus')}}" class="{{ request()->path() == 'about-us' ? 'active' : ''}}">About</a></li>
          <li><a href="{{route('page.books')}}" class="{{ request()->path() == 'books-detail' ? 'active' : ''}}">Books</a></li>
          <li><a href="{{route('page.authors')}}" class="{{ request()->path() == 'authors-detail' ? 'active' : ''}}">Authors</a></li>
          <li><a href="{{route('page.events')}}" class="{{ request()->path() == 'events' ? 'active' : ''}}">Events</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="{{route('page.contactus')}}">Contact Us</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="courses.html">Get Started</a>

    </div>
  </header>
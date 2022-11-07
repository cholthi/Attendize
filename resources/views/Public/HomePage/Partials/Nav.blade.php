<nav class="navbar navbar-expand-lg bg-white py-3">

  <div class="container-fluid">
    <div class="d-flex align-items-center position-relative flex-grow-1">

      <div class="site-logo">
        <a href="index.html" class="text-black"><span class="text-primary">
            <img style="width: 150px;" class="logo" alt="Ticketana" src="{{asset('assets/images/logo-dark.png')}}" />
        </a>
      </div>
      <form class="mb-0 mx-auto flex-grow-1 mw-600">
        <div class="position-relative search-control-wrap">
          <i class="input-icon ico-search"></i>
          <input type="text" class="form-control form-control-lg main-search-input" placeholder="Search events" />
        </div>
      </form>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex-grow-0" id="navbarNavDropdown">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Browse Events</a>
          </li>
          <li class="nav-item">
            <a href="/sell-tickets" role="button" class="btn btn-outline-secondary">Sell Tickets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
        </ul>
      </div>

    </div>
  </div>

</nav>
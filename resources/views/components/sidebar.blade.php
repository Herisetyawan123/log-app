<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="/home">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Log Harian</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/mylog">My Log</a></li>
            @if (\App\Models\User::with('bawahan')->where('id', Auth::user()->id)->first()->bawahan->count() != 0)
              <li class="nav-item"> <a class="nav-link" href="/staff">Staff Log</a></li>
            @endif
          </ul>
        </div>
      </li>

     
    </ul>
  </nav>
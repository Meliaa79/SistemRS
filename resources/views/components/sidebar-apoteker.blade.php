<div class="d-flex flex-column flex-shrink-0 p-3  text-white" style="width: 280px; overflow-y: auto; position: fixed; height: 100vh;background:#0A2558;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-light text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4">Dokter Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('dokter.dashboard') }}" class="nav-link {{ request()->routeIs('dokter.dashboard') ? 'active bg-light text-dark' : 'link-light' }}" aria-current="page">            
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('apoteker.obat.tampil') }}" class="nav-link {{ request()->routeIs('apoteker.obat.*') ? 'active bg-light text-dark' : 'link-light' }}" aria-current="page"><i class="fas fa-capsules"></i> Data Obat</a></a>
        </li>
        <li>
            <a href="{{ route('apoteker.resep_obat.tampil') }}" class="nav-link {{ request()->routeIs('apoteker.resep_obat.*') ? 'active bg-light text-dark' : 'link-light' }}" aria-current="page"><i class="fas fa-prescription-bottle-alt"></i> Resep Obat</a></a>
        </li>
        
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://via.placeholder.com/40" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>{{ Auth::user()->name }}</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="/profile">Profile</a></li>
            <li><a class="dropdown-item" href="/settings">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/logout">Sign out</a></li>
        </ul>
    </div>
</div>
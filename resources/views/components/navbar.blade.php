<!-- Right Side Of Navbar -->
<ul class="navbar-nav ms-auto">
    <!-- Authentication Links -->
    @if(!auth()->user())
        @if (Route::has('login.tampil'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login.tampil') }}">{{ __('Login') }}</a>
            </li>
        @endif

        {{-- @if (Route::has('registrasi.tampil'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('registrasi.tampil') }}">{{ __('Register') }}</a>
            </li>
        @endif --}}
    @else
        @if(auth()->user()->role=='pasien')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pasien.jadwal_dokter.index') }}">{{ __('Jadwal Dokter') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pasien.riwayat') }}">{{ __('Riwayat') }}</a>
            </li>
            
        @endif

        <li class="nav-item ">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endif
</ul>
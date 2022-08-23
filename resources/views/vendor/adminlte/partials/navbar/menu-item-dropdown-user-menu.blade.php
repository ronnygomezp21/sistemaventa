@php($logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout'))
@php($profile_url = View::getSection('profile_url') ?? config('adminlte.profile_url', 'logout'))

@if (config('adminlte.usermenu_profile_url', false))
    @php($profile_url = Auth::user()->adminlte_profile_url())
@endif

@if (config('adminlte.use_route_url', false))
    @php($profile_url = $profile_url ? route($profile_url) : '')
    @php($logout_url = $logout_url ? route($logout_url) : '')
@else
    @php($profile_url = $profile_url ? url($profile_url) : '')
    @php($logout_url = $logout_url ? url($logout_url) : '')
@endif

<li class="nav-item dropdown user-menu">

    {{-- User menu toggler --}}
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        @if (config('adminlte.usermenu_image'))
            <img src="{{ Auth::user()->adminlte_image() }}" class="user-image img-circle" alt="{{ Auth::user()->name }}">
        @endif
        <span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline badge badge-primary" @endif>
            {{ Auth::user()->name }} - {{ Auth::user()->adminlte_desc() }}
        </span>
    </a>

    {{-- User menu dropdown --}}
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        <div class="dropdown-header bg-light py-2"><strong>Configuración</strong></div>
        <div class="dropdown-divider"></div>
        @if ($profile_url)
            <a href="{{ $profile_url }}" class="dropdown-item">
                <i class="c-icon mr-2 fas fa-address-card"></i>
                <span class="menu-text">Perfil</span>
            </a>
        @endif
        <div class="dropdown-divider"></div>
        <a class="dropdown-item @if (!$profile_url)  @endif" href=" {{ $logout_url }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="c-icon mr-2 fas fa-sign-out-alt"></i>
            {{ __('Cerrar sesión') }}
        </a>
        <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
            @if (config('adminlte.logout_method'))
                {{ method_field(config('adminlte.logout_method')) }}
            @endif
            {{ csrf_field() }}
        </form>


    </ul>

</li>

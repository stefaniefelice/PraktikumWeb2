<!-- resources/views/partials/navbar.blade.php -->
<nav>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('about') }}">About</a>
    <a href="{{ route('education') }}">Education</a>
    <a href="{{ route('projects.index') }}">Projects</a>
    <a href="{{ route('portfolio.index') }}">Portfolio</a>
    @auth
        @if (Auth::user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        @endif
        <a href="{{ route('profile.saya') }}">Profile Saya</a>
        <span>Halo, {{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endauth

    @guest
        <a href="{{ route('login') }}">Login</a>
    @endguest
</nav>






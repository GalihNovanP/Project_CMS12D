<div class="px-3 py-3 text-white border-bottom" style="border-color: rgba(255,255,255,0.1)">
    @auth
        <div class="d-flex flex-column">
            <span>👋 Halo, {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="mt-2">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">Logout</button>
            </form>
        </div>
    @else
        <a href="{{ route('login') }}" class="btn btn-sm btn-light">Login</a>
    @endauth
</div>

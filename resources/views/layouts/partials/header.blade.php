<h3>Danh muc</h3>
<ul>
    @foreach ($categories as $category)
        <li><a href="{{ route('category', $category->slugs) }}">{{ $category->name }}</a></li>
    @endforeach
</ul>

@if (Route::has('auth.login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            {{-- show name user --}}
            <a href="{{route('me')}}" class="text-sm text-gray-700 underline">{{ Auth::user()->name }}</a>
            {{-- logout --}}
            <form method="POST" action="{{ route('auth.logout') }}">
                @csrf
                <button type="submit" class="text-sm text-gray-700 underline">Logout</button>
            </form>
        @else
            <a href="{{ route('auth.login') }}" class="text-sm text-gray-700 underline">Login</a>

            @if (Route::has('auth.register'))
                <a href="{{ route('auth.register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
        @endauth
    </div>
@endif

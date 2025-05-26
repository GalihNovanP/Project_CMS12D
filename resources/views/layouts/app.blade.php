<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Warteg Senang Senang')</title>
</head>
<body>
    @include('partials.navbar')

    <div class="container" style="padding: 16px;">

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 16px;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Notifikasi error validasi --}}
        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 16px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>

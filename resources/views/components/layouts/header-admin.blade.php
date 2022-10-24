<header class="bg-white border-t-4 border-blue-600 shadow mb-5">
    <nav class="container max-w-7xl mx-auto px-5 lg:px-40 py-5 flex justify-between">
        <ul class="flex space-x-5">
            <li class="font-bold mr-5 font-serif subpixel-antialiased text-xl text-gray-400">Administration</li>
            <li><a href="{{ route('home') }}">Zur Webseite |</a></li>
            <li><a href="#"><span class="font-serif subpixel-antialiased text-sm text-gray-400 text-opacity-90">SUPER DBA</span> Option 1 |</a></li>
            <li><a href="#"><span class="font-serif subpixel-antialiased text-sm text-gray-400 text-opacity-90">SUPER DBA</span> Option 2 |</a></li>
            <li><a href="#"><span class="font-serif subpixel-antialiased text-sm text-gray-400 text-opacity-90">SUPER DBA</span> Option 3 </a></li>
        </ul>
        <ul>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button>Logout</button>
            </form>
        </ul>
    </nav>
</header>

<div id="sidebar">

    <nav class="nav flex-column">
        <ul class="ps-0 text-uppercase">
            @guest
                <li>
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>

                </li>
            @else
                <li>
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>

                </li>
                <li>
                    <a class="nav-link" href="{{ route('admin.projects.index') }}">Projects</a>

                </li>
                <li>
                    <a class="nav-link" href="{{ route('admin.categories.index') }}">Categories</a>

                </li>
            @endguest
        </ul>

    </nav>
</div>

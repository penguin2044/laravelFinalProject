<header>
    <ul>
        <li><a href="/">Jesse's Blog</a></li>
        @auth
            <li>
                <ul>
                    <li>
                        <form action="/search">
                            @csrf
                            <input type="text" name="search" id="search">
                            <button>search</button>
                        </form>
                    </li>
                    @if (Auth::user()->admin)
                        <li><a href="/category"> categoryPanel</a></li>
                        <li><a href="/adminPanel">Admin Panel</a></li>
                    @endif

                    <li><a href="/createPost">Create Post</a></li>
                    <li>
                        <a href="">{{Auth::user()->name}}</a>
                    </li>
                    <li>
                        <a href="/logout">Logout</a>
                    </li>
                </ul>
            </li>
        @else
            <li>
                <ul>
                    <li>
                        <a href="/login">Login</a>
                    </li>
                    <li>
                        <a href="/signUp">Sing Up</a>
                    </li>
                </ul>
            </li>
        @endauth
    </ul>
</header>
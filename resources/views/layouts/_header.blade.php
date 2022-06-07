<header class="header">
    <div class="header_container">
        <div class="logo">
            <h1>
                <a href="{{ route('index') }}">twitter</a>
            </h1>
        </div>

        <nav class="nav">
            <ul class="nav_links">
                <li class="nav_link">
                    <a href="{{ route('index') }}">@lang('messages.home')</a>
                </li>
                <li class="nav_link">
                    <a href="#">@lang('messages.about')</a>
                </li>

                @guest
                <li class="nav_link" id="users">
                    @lang('messages.joun-us') <i class="fa-solid fa-caret-down"></i>

                    <ul class="nav_links-dropMenu">
                        <li class="nav_link-dropMenu">
                            <a href="{{ route('register') }}">@lang('messages.register')</a>
                        </li>
                        <li class="nav_link-dropMenu">
                            <a href="{{ route('session') }}">@lang('messages.login')</a>
                        </li>
                    </ul>
                </li>
                @endguest

                @auth
                @if (auth()->user()->hasRole(['admin']))
                <li class="nav_link" id="users">
                    @lang('messages.posts') <i class="fa-solid fa-caret-down"></i>

                    <ul class="nav_links-dropMenu" id="">
                        <li class="nav_link-dropMenu">
                            <a href="{{ route('allPosts') }}">@lang('messages.dashbourd')</a>
                        </li>

                        <li class="nav_link-dropMenu">
                            <a href="{{ route('publish-post') }}">@lang('messages.publish-post')</a>
                        </li>
                    </ul>
                </li>

                <li class="nav_link" id="users">
                    @lang('messages.categories') <i class="fa-solid fa-caret-down"></i>

                    <ul class="nav_links-dropMenu" id="">
                        <li class="nav_link-dropMenu">
                            <a href="{{ route('allCategories') }}">@lang('messages.categories')</a>
                        </li>

                        <li class="nav_link-dropMenu">
                            <a href="{{ route('publish-category') }}">@lang('messages.publish-category')</a>
                        </li>
                    </ul>
                </li>
                @endif
                @endauth

                <li class="nav_link" id="users">
                    @lang('messages.lang') <i class="fa-solid fa-caret-down"></i>

                    <ul class="nav_links-dropMenu">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="nav_link-dropMenu">
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                @auth
                <li class="nav_link" id="users">
                    {{ auth()->user()->username }} <i class="fa-solid fa-caret-down"></i>

                    <ul class="nav_links-dropMenu" id="">

                        <li class="nav_link-dropMenu">
                            <a href="{{ route('userProfile') }}">@lang('messages.profile')</a>
                        </li>

                        <li class="nav_link-dropMenu">
                            <form action="{{ route('destroy') }}" method="post">
                                @csrf

                                <button type="submit">@lang('messages.logout')</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
        </nav>
    </div>
</header>
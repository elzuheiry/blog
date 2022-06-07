

<div class="home_search">
    <div class="home_search_box">
        <form action="{{ route('index') }}" method="GET" autocomplete="off">
            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}" />
            @elseif(request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}" />
            @endif
            <input type="text" name="search" placeholder="@lang('messages.searchingforwhat')" value="{{ request('search') }}">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
</div>
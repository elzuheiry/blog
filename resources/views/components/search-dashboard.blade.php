

<div class="home_search">
    <div class="home_search_box">
        <form action="{{ route('dashboard') }}" method="GET" autocomplete="off">
            <input type="text" name="search" placeholder="@lang('messages.searchingforwhat')" value="{{ request('search') }}">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
</div>
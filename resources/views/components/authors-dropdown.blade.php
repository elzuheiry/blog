<div class="home_select" id="author_select">
    <span>{{ isset($currentAuthor) ? $currentAuthor->name : 'authors' }}</span>
    <i class="fa-solid fa-caret-down"></i>
</div>

<div class="home_options_list" id="author_options">
    @foreach ($authors as $author)
    <div class="option"><a href="{{ route('index') . '?author=' . $author->username . '&' . http_build_query(request()->except('page')) }}">{{ $author->name }}</a></div>
    @endforeach
</div>
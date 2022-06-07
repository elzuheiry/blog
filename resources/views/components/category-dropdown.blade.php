<div class="home_select" id="category_select">
    <span>{{ isset($currentCategory) ? $currentCategory->name : 'categories'}}</span>
    <i class="fa-solid fa-caret-down"></i>
</div>

<div class="home_options_list" id="category_options">
    @foreach ($categories as $category)
    <div class="option"><a class="{{ isset($currentCategory) && $currentCategory->is($category) ? 'active' : '' }}" href="{{ route('index') . '?category=' . $category->slug . '&' . http_build_query(request()->except('page')) }}">{{ $category->name }}</a></div>
    @endforeach
</div>
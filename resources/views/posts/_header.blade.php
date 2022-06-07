<div class="home_header">
    <div class="home_header-boxs">

        <div class="home_header-box">
            <div class="home_header-box-icon">
                <i class="fa-solid fa-blog"></i>
            </div>

            <div class="home_header-box-header">
                <h1>@lang('messages.posts')</h1>
            </div>

            <div class="home_header-box-number">
                <h1>{{ App\Models\Post::count() }}</h1>
            </div>
        </div>

        <div class="home_header-box">
            <div class="home_header-box-icon">
                <i class="fa-solid fa-layer-group"></i>
            </div>

            <div class="home_header-box-header">
                <h1>@lang('messages.categories')</h1>
            </div>

            <div class="home_header-box-number">
                <h1>{{ App\Models\Category::count() }}</h1>
            </div>
        </div>

        <div class="home_header-box">
            <div class="home_header-box-icon">
                <i class="fa-solid fa-users"></i>
            </div>

            <div class="home_header-box-header">
                <h1>@lang('messages.authors')</h1>
            </div>

            <div class="home_header-box-number">
                <h1>{{ App\Models\User::count() }}</h1>
            </div>
        </div>
    </div>
</div>


<x-layout>
    <section class="section home">
        <x-home-header />
    
        <x-search-header />
        
        <div class="home_menus">
            <div class="home_select_menu">
                <x-authors-dropdown />
            </div>
    
            <div class="home_select_menu">
                <x-category-dropdown />
            </div>
        </div>
    
        <div class="home_posts">

            @if ($posts->count())
            <div class="row">
                <div class="card_box">
                    <x-post-featured-card :post='$posts[0]'/>
                </div>
            </div>
    
            <div class="row">
                <div class="card_box lg-grid lg-grid-col-3">
                    @foreach ($posts->skip(1) as $post)
                    <x-post-card :post='$post' class="" />
                    @endforeach
                </div>
            </div>
            
            {{ $posts->links() }}
            
            @else
                <p>no posts yet. please check back later.</p>
            @endif
        </div>
    </section>
</x-layout>
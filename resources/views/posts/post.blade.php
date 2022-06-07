
<x-layout>
    <section class="section home">
        <div class="home_posts">
            <div class="row">
                <div class="card_box">
                    <x-post-show-card :post='$post' />
                </div>
            </div>
        </div>
    </section>
</x-layout>
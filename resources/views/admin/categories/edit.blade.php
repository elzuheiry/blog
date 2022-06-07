

<x-layout>
    <section class="section publish-post">
        <div class="publish-post_container">
            <div class="publish-post_links">
                <h2>@lang('messages.links')</h2>

                <span>
                    <a href="{{ route('allCategories') }}">@lang('messages.all-categories')</a>
                </span>
            </div>
            
            <div class="publish-post_form">

                <div class="publish-post_header">
                    <h2>@lang('messages.edit-category')</h2>
                </div>


                <form action="{{ route('update-category', $category->slug ) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
        
                    @foreach (config('translatable.locales') as $locale)
                    <div class="row">
                        <div class="box-input">
                            <input type="text" 
                                id="name" 
                                placeholder="@lang('messages.name-' . $locale)"
                                name="{{ $locale . '[name]' }}" 
                                value="{{ $category->translate($locale)->name }}" 
                                class="thumbnail-input"
                            >
                        </div>
                        <div class="box-input-error">
                            @error($locale . '.name')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @endforeach
        
                    <div class="row">
                        <div class="box-input">
                            <input type="text" id="slug" placeholder="@lang('messages.slug')" name="slug" value="{{ $category->slug }}" >
                        </div>
                        <div class="box-input-error">
                            @error('slug')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="box-submit">
                            <button type="submit">@lang('messages.update')!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>
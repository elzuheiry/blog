

<x-layout>
    <section class="section publish-post">
        <div class="publish-post_container">
            <div class="publish-post_links">
                <h2>@lang('messages.links')</h2>

                <span>
                    <a href="{{ route('allPosts') }}">@lang('messages.all-posts')</a>
                </span>

                <span>
                    @lang('messages.edit-post')
                </span>
            </div>
            
            <div class="publish-post_form">

                <div class="publish-post_header">
                    <h2>@lang('messages.edit-post')</h2>
                </div>


                <form action="{{ route('update-post', $post->slug ) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="box-input">
                            <input type="file" name="thumbnail" class="thumbnail-input">
                            <img class="thumbnail" src="{{ asset('pictures-upload/posts/' . $post->thumbnail) }}" alt="">
                        </div>

                        <div class="box-input-error">
                            @error('thumbnail')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
        
                    @foreach (config('translatable.locales') as $locale)
                    <div class="row">
                        <div class="box-input">
                            <input type="text" 
                                id="title" 
                                placeholder="@lang('messages.title-' . $locale)"
                                name="{{ $locale . '[title]' }}" 
                                value="{{ $post->translate($locale)->title }}" 
                                class="thumbnail-input"
                            >
                        </div>
                        <div class="box-input-error">
                            @error($locale . '.title')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @endforeach
        
                    <div class="row">
                        <div class="box-input">
                            <input type="text" id="slug" placeholder="@lang('messages.slug')" name="slug" value="{{ $post->slug }}" >
                        </div>
                        <div class="box-input-error">
                            @error('slug')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
        
                    @foreach (config('translatable.locales') as $locale)
                    <div class="row">
                        <div class="box-input">
                            <textarea 
                                name="{{ $locale . '[excerpt]' }}"
                                id="excerpt" 
                                rows="5" 
                                placeholder="@lang('messages.excerpt-' . $locale)"
                            >{{ $post->translate($locale)->excerpt }}</textarea>
                        </div>
                        <div class="box-input-error">
                            @error($locale . '.excerpt')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @endforeach
        
                    @foreach (config('translatable.locales') as $locale)
                    <div class="row">
                        <div class="box-input">
                            <textarea 
                                name="{{ $locale . '[body]' }}"
                                id="body" 
                                rows="5" 
                                placeholder="@lang('messages.body-' . $locale)"
                            >{{ $post->translate($locale)->body }}</textarea>
                        </div>
                        <div class="box-input-error">
                            @error($locale . '.body')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @endforeach

                    <div class="row">
                        <div class="box-input">
                            <select name="category_id" id="category_id">
                                <option value="select-Category" selected disabled >@lang('messages.select-category')</option>

                                @foreach (App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}" {{ old("category_id", $post->category->id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="box-input-error">
                            @error('category_id')
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
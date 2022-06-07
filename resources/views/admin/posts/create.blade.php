

<x-layout>
    <section class="section publish-post">
        <div class="publish-post_container">
            <div class="publish-post_links">
                <h2>@lang('messages.links')</h2>

                <span>
                    <a href="{{ route('allPosts') }}">@lang('messages.all-posts')</a>
                </span>
                
                <span class="active">
                    @lang('messages.publish-post')
                </span>
            </div>

            <div class="publish-post_form">

                <div class="publish-post_header">
                    <h2>@lang('messages.publish-new-post')</h2>
                </div>


                <form action="{{ route('store-post') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
        
                    <x-form.input name="thumbnail" type='file' />

                    @foreach (config('translatable.locales') as $locale)
                    <div class="row">
                        <div class="box-input">
                            <input type="text" 
                                id="title" 
                                placeholder="@lang('messages.title-' . $locale)"
                                name="{{ $locale . '[title]' }}" 
                                value="{{ old($locale . '.title') }}" 
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

                    <x-form.input name="slug" />

                    @foreach (config('translatable.locales') as $locale)
                    <div class="row">
                        <div class="box-input">
                            <textarea 
                                name="{{ $locale . '[excerpt]' }}"
                                id="excerpt" 
                                rows="5" 
                                placeholder="@lang('messages.excerpt-' . $locale)"
                            >{{ old($locale . '.excerpt') }}</textarea>
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
                            >{{ old($locale . '.body') }}</textarea>
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
                                <option value="{{ $category->id }}" {{ old("category_id") == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                            <button type="submit">@lang('messages.publish-post')!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>
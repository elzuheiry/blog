


<x-layout>
    <section class="section publish-post">
        <div class="publish-post_container">
            <div class="publish-post_links">
                <h2>@lang('messages.links')</h2>

                <span><a href="{{ route('allCategories') }}">@lang('messages.all-categories')</a></span>

                <span class="active">
                    @lang('messages.publish-category')
                </span>
            </div>

            <div class="publish-post_form">

                <div class="publish-post_header">
                    <h2>@lang('messages.publish-new-category')</h2>
                </div>


                <form action="{{ route('store-category') }}" method="POST" autocomplete="off">
                    @csrf
        
                    @foreach (config('translatable.locales') as $locale)
                    <div class="row">
                        <div class="box-input">
                            <input type="text" 
                                id="name" 
                                placeholder="@lang('messages.name-' . $locale)"
                                name="{{ $locale }}[name]" 
                                value="{{ old($locale . '.name') }}" 
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

                    <x-form.input name="slug" />
        
                    <div class="row">
                        <div class="box-submit">
                            <button type="submit">@lang('messages.publish-category')!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>


<x-layout>

    @if (auth()->user()->hasRole('admin'))
    <section class="section">
        @include('posts._header')
    </section>
    @endif

    <section class="section posts">
        <div class="table-container">
            @if ($posts->count())
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">@lang('messages.number')</th>
                        <th scope="col">@lang('messages.title')</th>
                        <th scope="col">@lang('messages.status')</th>
                        <th scope="col">@lang('messages.action')</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($posts as $index => $post)
                  <tr>
                      <th scope="row">{{ $index + 1 }}</th>
                      <td><a href="{{ route('post', $post->slug) }}" class="post-link">{{ $post->title }}</a></td>
                      <td><p class="published">published</p></td>
                      <td> 
                        @if (auth()->user()->hasPermission('post_update'))
                        <a href="{{ route('edit-post', $post->slug) }}" class="btn btn-edit btn-action">@lang('messages.edit')</a>
                        @endif

                        @if (auth()->user()->hasPermission('post_delete'))
                        <form action="{{ route('destroy-post', $post->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-delete btn-action" type="submit">@lang('messages.delete')</button>
                        </form>
                        @endif
                      </td>
                  </tr>
                @endforeach
                </tbody>
            </table>

            {{ $posts->links() }}
            @else
            <p>No posts yet. Please check back later.!</p>
            @endif
        </div>
    </section>
    
</x-layout>
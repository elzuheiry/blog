

<x-layout>

    <section class="section">
        @include('posts._header')
    </section>

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
                        <a href="{{ route('edit-post', $post->slug) }}" class="btn btn-edit btn-action">@lang('messages.edit')</a>

                        <form action="{{ route('destroy-post', $post->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-delete btn-action" type="submit">@lang('messages.delete')</button>
                        </form>
                      </td>
                  </tr>
                @endforeach
                </tbody>
            </table>

            {{ $posts->links() }}
            @else
            <p>no posts yet. please check back later.</p>
            @endif
        </div>
    </section>
</x-layout>
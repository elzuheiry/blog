

<x-layout>

    @if (auth()->user()->hasRole('admin'))
    <section class="section">
        @include('posts._header')
    </section>
    @endif

    <section class="section posts">
        <div class="table-container">
            @if ($categories->count())
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
                @foreach ($categories as $index => $category)
                  <tr>
                      <th scope="row">{{ $index + 1 }}</th>
                      <td>{{ $category->name }}</td>
                      <td><p class="published">published</p></td>
                      <td>
                        @if (auth()->user()->hasPermission('category_update'))
                        <a href="{{ route('edit-category', $category->slug) }}" class="btn btn-edit btn-action">@lang('messages.edit')</a>
                        @endif

                        @if (auth()->user()->hasPermission('category_delete'))
                        <form action="{{ route('destroy-category', $category->slug) }}" method="POST">
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

            {{ $categories->links() }}
            @else
            <p>No categories yet. Please check back later.!</p>
            @endif
        </div>
    </section>
</x-layout>
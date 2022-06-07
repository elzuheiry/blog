

<x-layout>

    @if (auth()->user()->hasRole('admin'))
    <section class="section">
        @include('posts._header')
    </section>
    @endif

    <section class="section posts">
        <div class="table-container">
            @if ($users->count())
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">@lang('messages.number')</th>
                        <th scope="col">@lang('messages.name')</th>
                        <th scope="col">@lang('messages.status')</th>
                        <th scope="col">@lang('messages.action')</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $index => $user)
                  <tr>
                      <th scope="row">{{ $index + 1 }}</th>
                      <td>{{ $user->name }}</td>
                      <td><p class="published">{{ $user->hasRole(['admin']) ? 'admin' : 'user' }}</p></td>
                      <td> 
                        @if (auth()->user()->hasPermission('admin_update'))
                        <a href="{{ route('edit-author', $user->username)  }}" class="btn btn-edit btn-action">@lang('messages.edit')</a>
                        @endif

                        @if (auth()->user()->hasPermission('admin_delete'))
                        <form action="{{ route('destroy-author', $user->username) }}" method="POST">
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

            {{ $users->links() }}
            @else
            <p>No authors yet. Please check back later.!</p>
            @endif
        </div>
    </section>

</x-layout>
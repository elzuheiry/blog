



<x-layout>
    <section class="section publish-post">
        <div class="publish-post_container">
            <div class="publish-post_links">
                <h2>@lang('messages.links')</h2>

                <span><a href="{{ route('all-authors') }}">@lang('messages.all-authors')</a></span>

                <span class="active">
                    @lang('messages.edit-author')
                </span>
            </div>

            <div class="publish-post_form">

                <div class="publish-post_header">
                    <h2>@lang('messages.edit-author')</h2>
                </div>


                <form action="{{ route('update-author', $user->username) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PATCH')
        
                    <div class="row">
                        <div class="box-input">
                            <input type="text" 
                                id="name" 
                                placeholder="@lang('messages.name')"
                                disabled
                                value="{{ $user->name }}"
                                class="thumbnail-input"
                            >
                        </div>
                    </div>

                    <div class="row">
                        <div class="box-input">
                            <input type="text" 
                                id="username" 
                                placeholder="@lang('messages.username')"
                                disabled
                                value="{{ $user->username }}"
                                class="thumbnail-input"
                            >
                        </div>
                    </div>

                    <div class="row">
                        <div class="box-input">
                            <input type="text" 
                                id="email" 
                                placeholder="@lang('messages.email')"
                                disabled
                                value="{{ $user->email }}"
                                class="thumbnail-input"
                            >
                        </div>
                    </div>

                    <div class="nav-tabs">
                        <h2>@lang('messages.permissions')</h2>

                        <div class="nav-tabs-head">
                            <ul>
                                <li>
                                    <a class="tab_link active" data-target=".users">@lang('messages.authors')</a>
                                </li>

                                <li>
                                    <a class="tab_link" data-target=".categories">@lang('messages.categories')</a>
                                </li>

                                <li>
                                    <a class="tab_link" data-target=".posts">@lang('messages.posts')</a>
                                </li>
                            </ul>
                        </div>

                        <div class="nav-tab-container permissionsTabs">

                            <div class="nav-tab users active" id="users">
                                <div class="form-group">
                                    <label for="admin_create">@lang('messages.create')</label>
                                    <input type="checkbox" 
                                        id="admin_create"
                                        value="admin_create"
                                        name="permissions[]"
                                        {{ $user->hasPermission('admin_create') ? 'checked' : '' }}
                                        class="check-box"
                                    >
                                </div>
    
                                <div class="form-group">
                                    <label for="admin_read">@lang('messages.read')</label>
                                    <input type="checkbox" 
                                        id="admin_read"
                                        value="admin_read"
                                        name="permissions[]"
                                        {{ $user->hasPermission('admin_read') ? 'checked' : '' }}
                                        class="check-box"
                                    >
                                </div>
    
                                <div class="form-group">
                                    <label for="admin_update">@lang('messages.update')</label>
                                    <input type="checkbox" 
                                        id="admin_update"
                                        value="admin_update"
                                        name="permissions[]"
                                        {{ $user->hasPermission('admin_update') ? 'checked' : '' }}
                                        class="check-box"
                                    >
                                </div>
    
                                <div class="form-group">
                                    <label for="admin_delete">@lang('messages.delete')</label>
                                    <input type="checkbox" 
                                        id="admin_delete"
                                        value="admin_delete"
                                        name="permissions[]"
                                        {{ $user->hasPermission('admin_delete') ? 'checked' : '' }}
                                        class="check-box"
                                    >
                                </div>
                            </div>

                            <div class="nav-tab categories" id="categories">
                                <div class="form-group">
                                    <label for="category_create">@lang('messages.create')</label>
                                    <input type="checkbox" 
                                        id="category_create"
                                        value="category_create"
                                        name="permissions[]"
                                        {{ $user->hasPermission('category_create') ? 'checked' : '' }}
                                        class="check-box"
                                    >
                                </div>
    
                                <div class="form-group">
                                    <label for="category_read">@lang('messages.read')</label>
                                    <input type="checkbox" 
                                        id="category_read"
                                        value="category_read"
                                        name="permissions[]"
                                        {{ $user->hasPermission('category_read') ? 'checked' : '' }}
                                        class="check-box"
                                    >
                                </div>
    
                                <div class="form-group">
                                    <label for="category_update">@lang('messages.update')</label>
                                    <input type="checkbox" 
                                        id="category_update"
                                        value="category_update"
                                        name="permissions[]"
                                        {{ $user->hasPermission('category_update') ? 'checked' : '' }}
                                        class="check-box"
                                    >
                                </div>
    
                                <div class="form-group">
                                    <label for="category_delete">@lang('messages.delete')</label>
                                    <input type="checkbox" 
                                        id="category_delete"
                                        value="category_delete"
                                        name="permissions[]"
                                        {{ $user->hasPermission('category_delete') ? 'checked' : '' }}
                                        class="check-box"
                                    >
                                </div>
                            </div>

                            <div class="nav-tab posts" id="posts">
                                <div class="form-group">
                                    <label for="post_create">@lang('messages.create')</label>
                                    <input type="checkbox" 
                                        id="post_create"
                                        value="post_create"
                                        name="permissions[]"
                                        {{ $user->hasPermission('post_create') ? 'checked' : '' }}
                                        class="check-box"
                                    >
                                </div>
    
                                <div class="form-group">
                                    <label for="post_read">@lang('messages.read')</label>
                                    <input type="checkbox" 
                                        id="post_read"
                                        value="post_read"
                                        name="permissions[]"
                                        {{ $user->hasPermission('post_read') ? 'checked' : '' }}
                                        class="check-box"
                                    >
                                </div>
    
                                <div class="form-group">
                                    <label for="post_update">@lang('messages.update')</label>
                                    <input type="checkbox" 
                                        id="post_update"
                                        value="post_update"
                                        name="permissions[]"
                                        {{ $user->hasPermission('post_update') ? 'checked' : '' }}
                                        class="check-box"
                                    >
                                </div>
    
                                <div class="form-group">
                                    <label for="post_delete">@lang('messages.delete')</label>
                                    <input type="checkbox" 
                                        id="post_delete"
                                        value="post_delete"
                                        name="permissions[]"
                                        {{ $user->hasPermission('post_delete') ? 'checked' : '' }}
                                        class="check-box"
                                    >
                                </div>
                            </div>

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
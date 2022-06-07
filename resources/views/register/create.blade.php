

<x-layout>
    <section class="section register">
        <div class="register-box">
            <div class="register-header">
                <h1>@lang('messages.register') !</h1>
            </div>
    
            <form action="{{ route('store') }}" method="POST" autocomplete="off">
                @csrf
    
                <div class="row">
                    <div class="box-input">
                        <input type="text" id="name" placeholder="@lang('messages.name')" name="name" value="{{ old('name') }}" >
                    </div>
                    <div class="box-input-error">
                        @error('name')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
    
                <div class="row">
                    <div class="box-input">
                        <input type="text" id="username" placeholder="@lang('messages.username')" name="username" value="{{ old('username') }}" >
                    </div>
                    <div class="box-input-error">
                        @error('username')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
    
                <div class="row">
                    <div class="box-input">
                        <input type="text" id="email" placeholder="@lang('messages.email')" name="email" value="{{ old('email') }}" >
                    </div>
                    <div class="box-input-error">
                        @error('email')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
    
                <div class="row">
                    <div class="box-input">
                        <input type="password" id="password" placeholder="@lang('messages.password')" name="password" >
                    </div>
                    <div class="box-input-error">
                        @error('password')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
    
                <div class="row">
                    <div class="box-submit">
                        <button type="submit">@lang('messages.register')!</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-layout>
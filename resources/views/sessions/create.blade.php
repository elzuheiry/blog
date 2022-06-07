

<x-layout>
    <section class="section login">
        <div class="login-box">
            <div class="login-header">
                <h1>@lang('messages.login') !</h1>
            </div>

            <form action="{{ route('session') }}" method="POST" autocomplete="off">
                @csrf
    
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
                        <button type="submit">@lang('messages.login')</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-layout>
<footer class="footer">
    <div class="footer_container">
        <div class="footer_img-box">
            <img src="{{ asset('assets/images/32.png') }}" alt="">
        </div>
        <div class="footer_body">
            <h2>@lang('messages.stay-in-touch-with-the-latest-posts')</h2>
            <p>@lang('messages.promise-to-keep-the-inbox-clean-no-bugs')</p>
        </div>


        <form action="" method="post">
            <div class="footer_box-input">

                <i class="fa-solid fa-envelope"></i>
                <input type="text" name="" placeholder="@lang('messages.your-email-address')">
                <button type="submit">@lang('messages.subscribe')</button>
                
            </div>
        </form>
    </div>
</footer>
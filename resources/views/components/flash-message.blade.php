
@if (session()->has('success'))
<div class="flash-message" id="flash-message">
    <p>{{ session('success') }}</p>
</div>
@endif


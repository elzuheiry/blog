@props(['name'])

<div class="box-input-error">
    @error($name)
    <p>{{ $message }}</p>
    @enderror
</div>
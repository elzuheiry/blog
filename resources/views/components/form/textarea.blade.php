@props(['name'])

<div class="row">

    <div class="box-input">

        <textarea 
            name="{{ $name }}" 
            id="{{ $name }}" 
            rows="5" 
            placeholder="@lang('messages.' . $name)"
        >{{ old($name) }}</textarea>

    </div>
    
    <x-form.error name='{{ $name }}' />

</div>
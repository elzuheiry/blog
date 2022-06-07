
@props(['name', 'type' => 'text'])

<div class="row">

    <div class="box-input">

        <input type="{{ $type }}" 
            id="{{ $name }}" 
            placeholder="@lang('messages.' . $name)"
            name="{{ $name }}" 
            value="{{ old($name) }}" 
            class="thumbnail-input"
        >
        
    </div>
    
    <x-form.error name='{{ $name }}' />

</div>
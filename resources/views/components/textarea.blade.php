<label for="{{ $label }}">{{ ucfirst($label) }}</label>
<div class="col-12 my-3">
    <textarea name="{{ $field }}" id="{{ $field }}" class="textareaInput" placeholder="{{ $placeholder ?? '' }}">@isset($value){{ old($field) ? old($field) : $value}} @else{{ old($field) }}@endisset</textarea>
    @error($field)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
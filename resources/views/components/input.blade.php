

<label for="{{ $label }}">{{ ucfirst($label) }}</label>
<div class="col-12 my-3">
    <input type="text" name="{{ $field }}" class="inputText" id="{{ $field }}" placeholder="{{ $placeholder }}">
    @error($field)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
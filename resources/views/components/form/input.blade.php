@props([
    'id',
    'name',
    'type' => 'text',
    'label' => '',
    'placeholder' => '',
    'value' => ''
])
<label>{{ $label }}</label>
<input type="{{ $type }}" class="form-control
@error($name)
    is-invalid
@enderror
" placeholder={{  $placeholder}} name={{ $name }} value={{ old($name, $value) }}>
@error($name)
    <div class="alert alert-danger">
        {{ $message }}
    </div>
@enderror
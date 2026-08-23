@props([
    'label' => '',
    'name' => '',
    'options' => [],
    'selected' => null,
    'useOld' => true,
])
<label for="{{ $name }}">{{ $label }}</label>
<select
    id="{{ $name }}"
    name="{{ $name }}"
    {{ $attributes->merge([
        'class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : ''),
    ]) }}
>
    @foreach ($options as $value => $text)
        @php
            $current = $useOld ? old($name, $selected) : $selected;
        @endphp
        <option value="{{ $value }}" @selected((string) $value === (string) $current)>
            {{ $text }}
        </option>
    @endforeach
</select>
@error($name)
    <div class="text-danger">{{ $message }}</div>
@enderror

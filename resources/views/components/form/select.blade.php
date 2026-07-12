@props([
    'label',
    'name',
    'options'=>[],
    'selected',
])
<label>{{ $label ?? '' }}</label>
  <select name="{{ $name }}" id="status" class="form-control
    @error( $name)
        is-invalid
    @enderror
    ">
        @foreach ( $options as $value => $text )
            <option value={{ $value }}
            @if ($value == old($name,$selected))
                selected
            @endif
            
            >{{ $text }}</option>
        @endforeach
    </select>
    @error('status')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror

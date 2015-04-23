<select multiple class="form-control">
@foreach ($options as $key => $option)
    <option {{ in_array($key, $value) ? 'selected' : '' }}>{{ $option }}</option>
@endforeach
</select>

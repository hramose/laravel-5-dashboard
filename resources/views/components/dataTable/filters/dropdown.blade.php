<select type="text" class="form-control input-sm" name="search[{{ $column['name'] }}]">
    <option value="-1">--Select--</option>
    @foreach($column['options'] as $value => $option)
        <option value="{{ $value }}" {{ Input::get('search[' . $column['name'] . ']') == $value ? 'selected' : '' }}>
            {{$option}}
        </option>
    @endforeach
</select>
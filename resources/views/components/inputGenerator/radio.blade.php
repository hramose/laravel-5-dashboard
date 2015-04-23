@foreach ($options as $key => $option)
    <label class="radio-inline">
        {!! Form::radio($name, $key, ($key == $value)) !!} {{ $option }}
    </label>
@endforeach
@foreach ($options as $key => $option)
<label class="checkbox-inline">
    {!! Form::checkbox($name, $key, in_array($key, $value)) !!} {{ $option }}
</label>
@endforeach
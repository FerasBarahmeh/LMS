<select
    {!! $attributes->merge([
    'id' => 'select',
    'class' => 'form-control select2',
     'data-parsley-class-handler' => '#slWrapper',
     'data-parsley-errors-container' => '#slErrorContainer',
    'data-placeholder' => 'Choose one',
     ]) !!}
>
    {{$slot}}
</select>

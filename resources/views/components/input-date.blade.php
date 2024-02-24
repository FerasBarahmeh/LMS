@props([
    'name',
    'placeholder' => 'MM/DD/YYYY'
])
<div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text">
            <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
        </div>
    </div>

        <input
            {{ $attributes->merge(['class'=> 'form-control', 'id' => 'dateMask', 'name' => $name, 'placeholder' => $placeholder, 'type' => 'text']) }}
            />

</div>

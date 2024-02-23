<div>
    <div class="alter alter-success w-100">
        <x-alerts.simple-alert :success="$message"/>
    </div>

    <div class="container">
        @if ($type == TypeSkills::Technical->value)
            <p class="tx-12 tx-gray-500 p-2">Empower Your Expertise: Showcase Your Technical Prowess</p>
        @else
            <p class="tx-12 tx-gray-500 p-2">Bridging Brilliance: Highlight Your Soft Skills for Personal and
                Professional Excellence</p>
        @endif
    </div>

    <div class="tags-container container">
        @foreach ($tags as $key => $tag)
            <div wire:key="{{ $key }}"
                 class="tag tag-gray-dark">
                <span>{{$tag}}</span>

                <button class="remove-btn" wire:click="remove('{{$key}}')">&times;</button>
            </div>
        @endforeach

        <label class="label-add-tag">
            <input type="text" wire:model="tag" wire:keydown.enter="add" placeholder="Hit enter to added"
                   class="add-tag-input" id="add-tag-input"/>
        </label>


    </div>


    <div class="mt-2 d-flex justify-content-end">
        <x-primary-button :content="'save'" class="" wire:click="save"/>
    </div>
</div>


@push('css')
    <!---Internal Input tags css-->
    <link href="{{ asset('backend/assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
@endpush
<script>
    document.querySelector('.tags-container').addEventListener('click', () => {
        document.getElementById('add-tag-input').focus();
    });
</script>

<div>
    <div class="alter alter-success w-100">
        <x-alerts.simple-alert :success="$message"/>
    </div>

    <div class="container">
        @if ($type == TypeSkills::Technical->value)
            <p class="tx-15">Empower Your Expertise: Showcase Your Technical Prowess</p>
        @else
            <p class="tx-15">Bridging Brilliance: Highlight Your Soft Skills for Personal and Professional Excellence</p>
        @endif
    </div>

    <div class="tags-container container">
        @foreach ($tags as $key => $tag)
            <div wire:key="{{ $key }}" class="tag tag-gray-dark">
                <span>{{$tag}}</span>
                <button class="remove-btn" wire:click="remove('{{$key}}')">&times;</button>
            </div>
        @endforeach

        <label class="label-add-tag">
            <input type="text" wire:model="tag" wire:keydown.enter="add" placeholder="Hit enter to added" class="add-tag-input" id="add-tag-input"/>
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
@push('js')
    <script>
        let tagContainer = document.querySelectorAll('.tags-container');
        tagContainer.forEach(container => {
            container.addEventListener('click', () => {
                container.querySelector('.add-tag-input').focus();
            });
        });
    </script>
@endpush

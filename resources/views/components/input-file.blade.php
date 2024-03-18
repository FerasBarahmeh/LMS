@props(['submitWhenChange' => false])
<div class="w-100 mt-3">
    <p  class="text-success" @style(['display: none !important;'])>Uploaded success</p>
    <input {{ $attributes->merge(['class' => 'd-none', 'id' => 'input-file', 'type' => 'file']) }}/>
    <p class="text-danger" @style(['display: none !important;'])>Uploaded failed</p>
</div>

<div @class(['position-relative d-flex flex-column justify-content-center align-items-center gap-10 border p-2 rad-5'])>
    <label for="input-file"
           @class(['input-file-label w-100 d-flex gap-10 cursor-pointer m-0 justify-content-center align-items-center'])
    >
        {{ $attributes['title'] }} {!! $content ?? '<i class="fa fa-upload"></i>' !!}
    </label>

</div>

<script>
    let fileInputs= document.querySelectorAll('#input-file');
    fileInputs.forEach(fileInput => {
        fileInput.addEventListener('change', (e) => {
            fileInput.previousElementSibling.style.display = e.target.files.length > 0 ? 'flex' : 'none';
            let submitWhenChange = @js($submitWhenChange);
            submitWhenChange ?   fileInput.closest('form').submit() : false;
        });
    });
</script>

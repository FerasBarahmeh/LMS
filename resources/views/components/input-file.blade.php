<div class="w-100 mt-3">
    <x-alerts.success :message="'Uploaded success'" @style(['display: none !important;'])/>
    <input {{ $attributes->merge(['class' => 'd-none', 'id' => 'input-file', 'type' => 'file']) }}/>
    <x-alerts.danger :message="'Uploaded failed'" @style(['display: none !important;'])/>
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
            if (e.target.files.length > 0){
                fileInput.previousElementSibling.style.display = 'flex';
            } else {
                fileInput.nextElementSibling.classList.display = 'none';
            }
        });
    });
</script>

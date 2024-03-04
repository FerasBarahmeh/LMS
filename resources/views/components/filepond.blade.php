{{--
    How run it
      - Create table and model for temporary file
     - Create Tem "TemporaryFileController"
         - create "upload" method
         - create "delete" method
     - Create Rotues

      /**
         * Temp Files
         */
        Route::post('/tmp-upload', [TemporaryFileController::class, 'upload'])
            ->name('tmp.upload');
        Route::delete('/tmp-delete/{folder}', [TemporaryFileController::class, 'delete'])
            ->name('tmp.delete');

--}}

@props([
    'preview' => true,
    'accept' => ['image/*'],
    'name',
])
@push('css')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet"/>
    @if($preview)
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet"/>
        <link
            href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
            rel="stylesheet"
        />
    @endif

@endpush

<input type="file" name="{{ $name }}" id="filepond"/>

@push('js')
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script>
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateSize,
        );
        const inputElement = document.getElementById('filepond');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement, {
            acceptedFileTypes: @js($accept),
        });
        let id = null;

        pond.setOptions({
            maxFileSize: '500MB',
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append('{{ $name }}', file);
                    formData.append('name', '{{ $name }}');

                    const request = new XMLHttpRequest();
                    request.open('POST', '{{ route('tmp.upload') }}');
                    request.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');


                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };

                    request.onload = function () {
                        if (request.status >= 200 && request.status < 300) {
                            id = JSON.parse(request.response).id;
                            load(request.responseText);
                        } else {
                            error('oh no');
                        }
                    };

                    request.send(formData);

                    return {
                        abort: () => {
                            request.abort();
                            abort();
                        },
                    };
                },

                revert: {
                    url: '{{ route('tmp.delete') }}',
                    method: 'delete',
                    body: 'id=' + id,
                    headers: {
                        'X-CSRF-TOKEN':'{{ csrf_token() }}',
                        '_method': 'DELETE'
                    }
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },

            },
        });


    </script>
@endpush

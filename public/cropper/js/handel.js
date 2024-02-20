let sampleImg = document.getElementById('sample-img');
let profileImg = document.getElementById('profile-img');
let displayPreviewModalBtn = document.getElementById('display-preview-modal-btn');
let cropBtn = document.getElementById('crop-btn');
let footerCanselPreviewBtn = document.getElementById('footer-cansel-preview-btn');
let headerCanselPreviewBtn = document.getElementById('header-cansel-preview-btn');
let cropper;


profileImg.addEventListener('change', (e) => {
    let files = e.target.files;

    let done = function (url) {
        sampleImg.src = url;
        displayPreviewModalBtn.click();
    };

    if (files && files.length > 0) {
        let render = new FileReader();
        render.onload = function (ev) {
            done(render.result);
        };
        render.readAsDataURL(files[0]);
    }
});

displayPreviewModalBtn.addEventListener('click', () => {
    cropper = new Cropper(sampleImg, {
        aspectRatio: 1,
        viewMode: 3,
        preview: '.preview',
    });
});

footerCanselPreviewBtn.addEventListener('click', ()=> {
    cropper.destroy();
    cropper=null;
});
headerCanselPreviewBtn.addEventListener('click', () => {
    cropper.destroy();
    cropper=null;
});

cropBtn.addEventListener('click', () => {
    let canvas = cropper.getCroppedCanvas({
        width: 400,
        height: 400,
    });

    canvas.toBlob(function (blob) {
        let url = URL.createObjectURL(blob);
        let render = new FileReader();
        render.readAsDataURL(blob);
        render.onloadend = function () {
            let base64data = render.result;
            console.log(method)

            const response = fetch(route, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': csrf,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ image: base64data }),

            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((data) => {
                    console.log(data.message); // Log the success message from the server
                })
                .catch((error) => {
                    console.error(error); // Log any errors that occurred during the fetch
                });
        };
    });
});

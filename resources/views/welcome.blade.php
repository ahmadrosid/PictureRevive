<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PictureRevive - Laravel Image Restoration</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Space Grotesk', sans-serif;
            }
            input::-webkit-file-upload-button, input::file-selector-button {
                margin-top: 10px;
                margin-bottom: 6px;
                border: none;
                padding: .8rem 1.2rem;
                border-radius: .4rem;
                background-color: white;
                --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);
                --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
                box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow);
                cursor: pointer;
                margin-right: 1rem;
            }

            @media (prefers-color-scheme: dark) {
                input::-webkit-file-upload-button, input::file-selector-button {
                    color: white;
                    background-color:rgb(31 41 55);
                }
            }

            input:hover {
                opacity: 70%;
            }

            .title-text {
                --bg-size: 400%;
                --color-one: hsl(15 90% 55%);
                --color-two: hsl(40 95% 55%);
                font-size: clamp(2rem, 25vmin, 3rem);
                padding: 0;
                margin: 0;
                font-weight: 700;
                background: linear-gradient(
                                90deg,
                                var(--color-one),
                                var(--color-two),
                                var(--color-one)
                            ) 0 0 / var(--bg-size) 100%;
                color: transparent;
                background-clip: text;
                -webkit-background-clip: text;
                animation: move-bg 8s infinite linear;
            }

            .btn-download {
                width: 100%;
                padding-left: 2rem;
                padding-right: 2rem;
                padding-top: .7rem;
                padding-bottom: .7rem;
                border-radius: .4rem;
                cursor: pointer;
                border-width: 1px;
                display: none;
            }

            @media (prefers-reduced-motion: no-preference) {
                .title-text {
                    animation: move-bg 8s linear infinite;
                }
                @keyframes move-bg {
                    to {
                        background-position: var(--bg-size) 0;
                    }
                }
            }

            .pt-6{
                padding-top:1.5rem;
            }

            .spinner {
                width: 48px;
                height: 48px;
                display: inline-block;
                box-sizing: border-box;
                position: relative
            }
            .spinner-round:before {
                border-radius: 50%;
                content: " ";
                width: 48px;
                height: 48px;
                display: inline-block;
                box-sizing: border-box;
                border-top: solid 6px #f97316;
                border-right: solid 6px #f97316;
                border-bottom: solid 6px #f97316;
                border-left: solid 6px #f97316;
                position: absolute;
                top: 0;
                left: 0
            }
            .spinner-round:after {
                border-radius: 50%;
                content: " ";
                width: 48px;
                height: 48px;
                display: inline-block;
                box-sizing: border-box;
                border-top: solid 6px hsl(15 90% 55%);
                border-right: solid 6px #fed7aa;
                border-bottom: solid 6px #fed7aa;
                border-left: solid 6px #fed7aa;
                position: absolute;
                top: 0;
                left: 0;
                animation: spinner-round-animate 1s ease-in-out infinite
            }
            @keyframes spinner-round-animate {
                0% {
                    transform: rotate(0)
                }
                100% {
                    transform: rotate(360deg)
                }
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <div>
                        <div>
                            <p class="title-text">PictureRevive</p>
                        </div>
                        <div class="dark:text-white">
                            <p class="text-lg">Restore old photo with AI</p>
                            <form>
                                <input type="file" id="file" accept="image/*" />
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg dark:text-white">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            Before
                            <div class="pt-6">
                                <img id="original" width="300" />
                                <button id="upload-btn" class="btn-download border-gray-200 dark:border-gray-700">Upload new photo</button>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div>
                                After
                                <div class="pt-6">
                                    <img id="result" width="300"/>
                                    <div id="result-container"></div>
                                    <button id="download-btn" class="btn-download border-gray-200 dark:border-gray-700">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Created by <a href="https://ahmadrosid.com">@ahmadrosid</a> v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/browser-image-compression@2.0.0/dist/browser-image-compression.js"></script>
        <script src="https://unpkg.com/axios@1.2.2/dist/axios.min.js"></script>
        <script src="https://unpkg.com/file-saver@2.0.5/dist/FileSaver.min.js"></script>
        <script>
            const fileInput = document.getElementById('file');
            const originalImage = document.getElementById('original');
            const loadingContainer = document.querySelector("#result-container");

            const options = {
                maxSizeMB: 1,
                maxWidthOrHeight: 1920,
                useWebWorker: true
            };

            const handleFileChange = async (event) => {
                try {
                    const file = event.target.files[0];
                    loadingContainer.innerHTML = '<div class="spinner mx-auto spinner-round my-16"></div>';
                    const compressedFile = await imageCompression(file, options);
                    originalImage.src = URL.createObjectURL(file);
                    const formData = new FormData();
                    formData.append('photo', compressedFile, compressedFile.name);
                    const response = await axios.post('/', formData);
                    await getStatus(response.data.result.id);
                } catch (err) {
                    loadingContainer.innerHTML = `<p class="py-8 text-2xl text-red-500">${err.message}</p>`;
                }
            }
            fileInput.addEventListener('change', handleFileChange);

            function displayResult(data) {
                const imgResult = document.querySelector("#result");
                const loadingContainer = document.querySelector("#result-container")
                imgResult.src = data.result;
                imgResult.style.display = 'block';
                loadingContainer.innerHTML = "";

                const downloadBtn = document.getElementById('download-btn');
                const uploadBtn = document.getElementById('upload-btn');
                downloadBtn.style.display = 'block';
                uploadBtn.style.display = 'block';

                downloadBtn.addEventListener("click", () => saveAs(document.querySelector("#result").src, "output.png"));
                uploadBtn.addEventListener("click", () => {
                    imgResult.src = '';
                    imgResult.style.display = 'none';
                    downloadBtn.style.display = 'none';
                    uploadBtn.style.display = 'none';
                    fileInput.click();
                });
            }

            async function getStatus(id) {
                const res = await axios.get('/status/' + id);
                if (res.data.status !== "succeeded") {
                    setTimeout(async () => {
                        await getStatus(id);
                    }, 1000);
                } else {
                    displayResult({ result: res.data.output })
                }
            }
        </script>
    </body>
</html>

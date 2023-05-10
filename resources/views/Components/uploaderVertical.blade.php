<div class="uploader" style="width:100%">
    <div class="button">
        <input class="upload-photos" type="file" id="{{ $name }}" name="{{ $name }}[]"
            accept="{{ $typeFile }}" data-max-size="{{ $maxSize }}" data-image-size="{{ $imageSize }}"
            data-button-color="{{ $buttonColor }}" data-preview-color="{{ $previewColor }}"
            data-preview-height="{{ $previewHeight }}" data-card-width="{{ $cardWidth }}"
            data-button-height="{{ $buttonHeight }}" data-element-count="{{ $elementCount }}" multiple>

        <span>Select Images</span>
        <i id="icon" class="fa fa-cloud-upload"></i>
        <span><span class="file-count">0</span> Files</span>
    </div>
    <div class="file-content">
        <div class="preview"></div>
    </div>
</div>


<script>
    let photos = document.querySelector('input[type=file]');
    let preview = document.querySelector('.preview');
    let file_delete = document.querySelector('.file-delete');
    let file_count = document.querySelector('.file-count');


    const fileList = [];
    // Function To Get Alias File
    const aliasName = (filename, length_filename = 6) => {
        if (filename.length >= length_filename) {
            splitName = filename.split('.');
            filename = splitName[0].substring(0, length_filename + 1) + "... ." + splitName[1];
        }
        return filename
    }

    // Function To Get Size File
    const fileSize = (size) => {
        let firstSize = Math.floor(size / 1024);
        if (firstSize < 1024) {
            return firstSize + " KB";
        }
        return (firstSize / 1024).toFixed(2) + " MB";
    }


    let deleteFile = () => {
        const element = document.querySelectorAll('.element');
        if (element) {
            for (let i = 0; i < element.length; i++) {
                element[i].onclick = function() {
                    element[i].remove();
                    file_count.innerHTML = parseInt(file_count.innerHTML) - 1;
                }
            }
        }
    };

    // Display Thumbnil where is Select Photo
    photos.addEventListener('change', uploadImage);
    let combinedList = new DataTransfer();

    function uploadImage() {
        for (let i = 0; i < photos.files.length; i++) {
            file_count.innerHTML = parseInt(file_count.innerHTML) + 1;
            let file = photos.files[i];
            combinedList.items.add(photos.files.item(i))
            let fileName = file.name
            let shortName = aliasName(fileName);
            let fileSizes = fileSize(file.size);
            // Get Path Photo Before Uploaded
            let path = (window.URL || window.webkitURL).createObjectURL(file);
            // Card To Display Photo
            let progressHTML = `<li class="element">
                                <img class="file-type" src=${path}>
                                <div class="details">
                                    <span class="name">${shortName}</span>
                                    <span class="percent">${fileSizes}</span>
                                </div>
                                <div class="percentg">
                                    <span class="file-delete"><i onClick="deleteFile()" class="fa fa-times-circle delete-icon"></i></span>
                                    <span><i class="fa fa-check"></i></span>
                                </div>
                            </li>`;
            preview.insertAdjacentHTML("afterbegin", progressHTML);
        }
        photos.files = combinedList.files;
    }
</script>


<style>
    * {
        --button-color: {{ $buttonColor }};
        --button-height: {{ $buttonHeight }};
        --card-color: {{ $previewColor }};
        --size-image: {{ $imageSize }};
        --preview-height: {{ $previewHeight }};
        --card-width: {{ $cardWidth }};
        --element-count: {{ $elementCount }};
    }

    .uploader {
        background-color: white;
        width: 230px;
    }

    #icon {
        font-size: 36px;
    }


    .button {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: var(--button-height);
        border: 1px solid #ccc;
        flex-direction: column;
        cursor: pointer;

    }

    .file-content {
        display: flex;
        flex-direction: column;
        overflow-y: scroll;
        height: calc((var(--size-image) + 15px) * var(--element-count));
        border: 1px solid #ccc;
    }

    .file-type {
        width: var(--size-image);
        height: var(--size-image);
    }

    input[type="file"] {
        opacity: 0;
        min-height: var(--button-height);
        position: absolute;
        height: var(--button-height);
        cursor: pointer;
     
    }

    .preview .li {
        list-style: none;
    }

    .element {
        width: 100%;
        display: flex;
        padding: 5px;
        justify-content: space-between;
        align-items: center;
        height: calc(var(--size-image) + 15px);
    }

    .details {
        display: flex;
        flex-direction: column;
    }

    .percentg {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 230px;
        flex-basis: fit-content;
        height: 100%;
        justify-content: space-between;
    }

    .file-content::-webkit-scrollbar {
        width: 0px;
    }

    hr {
        margin: 0rem 0;
        border: 0;
        border-top: var(--bs-border-width) solid #ccc;
        opacity: .25;
        height: 3px;
        background: #ccc;
        width: 96%;
        margin: auto;
    }

    .delete-icon:hover {
        color: red;
        cursor: pointer;
    }
</style>

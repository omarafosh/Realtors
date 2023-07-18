<div class="uploader">
    <div class="button">
        <input class="upload-photos" type="file" id="{{ $name }}" name="{{ $name }}[]"
            accept="{{ $typeFile }}">

        <span>Select Images</span>
        <i id="icon" class="fa fa-cloud-upload"></i>
        <span><span class="file-count">0</span> Files</span>
    </div>

    <div class="preview" id="{{ $images }}">

    </div>

</div>


<script>
    let photos = document.querySelector('input[type=file]');
    let preview = document.querySelector('.preview');
    let file_delete = document.querySelector('.file-delete');
    let file_count = document.querySelector('.file-count');
    let combinedList = new DataTransfer();
    const fileList = [];

    // Display Thumbnil where is Select Photo
    photos.addEventListener('change', uploadImage);

    // Function To Get Alias File
    const aliasName = (filename, length_filename = 8) => {
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
        const file = document.querySelectorAll('.details');
        if (element) {
            for (let i = 0; i < element.length; i++) {
                element[i].onclick = function() {
                    combinedList.items.remove(file.id);
                    this.remove();
                    file_count.innerHTML = parseInt(file_count.innerHTML) - 1;
                }
            }
        }
        photos.files = combinedList.files;
    };

    let getExistingFile = () => {
        if (preview.id != "") {
            $arrayPaths = preview.id.split(',');
            $reverse = $arrayPaths.reverse();
            return $reverse;
        }
    };


    let LoadImages = () => {
        data = getExistingFile();
        console.log(data);
        if (data.length != 0) {
            for (let i = 0; i < data.length; i++) {
                file_count.innerHTML = parseInt(file_count.innerHTML) + 1;
                let start = parseInt(data[i].lastIndexOf('/'))
                let filename = data[i].slice(start + 1);
                let shortName = aliasName(filename);
                let fileSizes = fileSize(data[i].size);
                fetch(data[i])
                    .then(response => response.blob())
                    .then(blob => {
                        let file = new File([blob], filename, {type: "image/jpg"});
                        console.log(file)
                        combinedList.items.add(file);
                        console.log( combinedList.files);
                    });
                console.log('sss',data[i])
                let progressHTML = `<li class="element">
                        <img class="file-type" src=${data[i]}>
                        <div class="details" id="${i}">
                            <span class="name">${shortName}</span>
                            <span class="file-size">${fileSizes}</span>
                        </div>
                        <div class="delete-button">
                            <span class="file-delete">
                                <i onClick="deleteFile()" class="fa fa-times-circle delete-icon"></i>
                            </span>
                            <span>
                                <i class="fa fa-check file-uploaded"></i>
                            </span>
                        </div>
                    </li>`;
                preview.insertAdjacentHTML("afterbegin", progressHTML);

            }
            photos.files = combinedList.files;

        }
    }

    onload = (event) => {
        LoadImages()
    };

    function uploadImage() {
        for (let i = 0; i < photos.files.length; i++) {
            file_count.innerHTML = parseInt(file_count.innerHTML) + 1;
            let file = photos.files[i];
            combinedList.items.add(photos.files.item(i))
            let fileName = file.name
            let shortName = aliasName(fileName);
            let fileSizes = fileSize(file.size);
            // Get Path Photo Before Uploaded
            path = (window.URL || window.webkitURL).createObjectURL(file);

            // Card To Display Photo
            let progressHTML = `<li class="element">
                                    <img class="file-type" src=${path}>
                                    <div class="details">
                                        <span class="name">${shortName}</span>
                                        <span class="file-size">${fileSizes}</span>
                                    </div>
                                <div class="delete-button">
                                    <span class="file-delete"><i onClick="deleteFile()" class="fa fa-times-circle delete-icon"></i></span>
                                    <span><i class="fa fa-check file-uploaded"></i></span>
                                </div>
                            </li>`;
            preview.insertAdjacentHTML("afterbegin", progressHTML);
        }
        photos.files = combinedList.files;
    }
</script>


<style>
    * {

        --card-gap: {{ $cardGap }};
        --button-color: {{ $buttonColor }};
        --button-height: {{ $buttonHeight }};
        --card-color: {{ $previewColor }};
        --size-image: {{ $imageSize }};
        --preview-height: {{ $previewHeight }};
        --element-count: {{ $elementCount }};
    }

    .uploader {
        display: flex;
    }

    input[type="file"] {
        opacity: 0;
        width: calc(var(--size-image) + 1%);
        height: calc(var(--size-image) + 40px + 17px);
        z-index: 10;
        position: absolute;
    }

    .button {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        border: 1px dashed #ccc;
        font-size: 16px;
        width: calc(var(--size-image) + 2%);
        height: calc(var(--size-image) + 40px + 17px);
    }

    .button #icon {
        font-size: 35px;
    }

    .preview {
        display: flex;
        gap: var(--card-gap);
        padding: 5px;
        width: calc((var(--size-image) + var(--card-gap)) * var(--element-count) + 5px);
        height: calc(var(--size-image) + 40px + 17px);
        overflow-x: scroll;
        border: 1px dashed #ccc;
    }

    .preview .element {
        list-style: none;
        border: 1px solid #ccc;
        width: calc(var(--size-image) + 2px);
        position: relative;
    }

    .preview img {
        width: var(--size-image);
        height: var(--size-image);
    }

    .preview .delete-button {
        position: absolute;
        left: calc(var(--size-image) - 14px);
        top: 0px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        height: calc(var(--size-image) + 40px);
    }

    .preview .details {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .preview::-webkit-scrollbar {
        width: 0px;
        height: 5px;
    }

    .preview .delete-icon {
        color: white;
        background-color: black;
        border: 1px solid #000;
        border-radius: 50%;
    }

    .preview .fa-cloud-upload:before {
        content: "\f0ee";
        font-size: 50px;
    }

    .preview .delete-icon:hover {
        color: red;
        border: 1px solid #fff;
        background-color: white;
        border-radius: 50%;
        cursor: pointer;
    }

    .preview .file-uploaded {
        color: green;
        /* display: none; */
    }



    .col-xs-1,
    .col-sm-1,
    .col-md-1,
    .col-lg-1,
    .col-xs-2,
    .col-sm-2,
    .col-md-2,
    .col-lg-2,
    .col-xs-3,
    .col-sm-3,
    .col-md-3,
    .col-lg-3,
    .col-xs-4,
    .col-sm-4,
    .col-md-4,
    .col-lg-4,
    .col-xs-5,
    .col-sm-5,
    .col-md-5,
    .col-lg-5,
    .col-xs-6,
    .col-sm-6,
    .col-md-6,
    .col-lg-6,
    .col-xs-7,
    .col-sm-7,
    .col-md-7,
    .col-lg-7,
    .col-xs-8,
    .col-sm-8,
    .col-md-8,
    .col-lg-8,
    .col-xs-9,
    .col-sm-9,
    .col-md-9,
    .col-lg-9,
    .col-xs-10,
    .col-sm-10,
    .col-md-10,
    .col-lg-10,
    .col-xs-11,
    .col-sm-11,
    .col-md-11,
    .col-lg-11,
    .col-xs-12,
    .col-sm-12,
    .col-md-12,
    .col-lg-12 {
        padding-right: 0px;
        padding-left: 0px;
    }
</style>

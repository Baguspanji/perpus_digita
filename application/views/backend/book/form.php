<style>
    img {
        width: 200px;
    }

    .card-upload {
        width: 200px;
        height: 200px;
        padding: 10px;
    }

    .dropzone {
        background-color: rgb(248, 248, 248);
        width: 200px;
        height: 200px;
        border: 2px dashed rgba(155, 155, 155, 0.500);
    }

    .dropzone:hover,
    .dropzone-hover {
        background-color: #ddd;
        border-color: #3070a577;
        border-style: solid;
    }

    .child {
        position: absolute;
        top: 20px;
        right: 20px;
    }

    .parent {
        position: relative;
    }

    .account-settings-fileinput {
        position: absolute;
        visibility: hidden;
        width: 1px;
        height: 1px;
        opacity: 0;
    }
</style>

<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold"><?= $title ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" <?= explode(' ', $title)[0] == 'Edit' ? 'action="' . base_url() . 'admin/post_buku/' . $id . '"' : '' ?>>
                            <div class="form-group">
                                <label>Nama Buku</label>
                                <input type="text" class="form-control" name="nama_buku" placeholder="Masukkan Nama Buku" value="<?= isset($post['nama_buku']) ? $post['nama_buku'] : '' ?>">
                                <span class="text-danger"><?= form_error('nama_buku') ?></span>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori">
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kategoris as $key => $value) : ?>
                                        <?php if (isset($post['kategori']) ? $post['kategori'] == $value->kategori : false) : ?>
                                            <option value="<?= $value->id ?>" selected><?= $value->kategori ?></option>
                                        <?php else : ?>
                                            <option value="<?= $value->id ?>"><?= $value->kategori ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                                <span class="text-danger"><?= form_error('kategori') ?></span>
                            </div>
                            <div class="form-group">
                                <label>Pengarang</label>
                                <input type="text" class="form-control" name="pengarang" placeholder="Masukkan Pengarang" value="<?= isset($post['pengarang']) ? $post['pengarang'] : '' ?>">
                                <span class="text-danger"><?= form_error('pengarang') ?></span>
                            </div>
                            <div class="form-group">
                                <label>Tahun Terbit</label>
                                <input type="number" class="form-control" name="tahun_terbit" placeholder="Masukkan Tahun Terbit" value="<?= isset($post['tahun_terbit']) ? $post['tahun_terbit'] : '' ?>">
                                <span class="text-danger"><?= form_error('tahun_terbit') ?></span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gambar Buku</label>
                                        <div class="row px-3">
                                            <div class="card shadow-none card-upload" id="btn-upload">
                                                <div class="card-body align-items-center d-flex justify-content-center dropzone" id="dropzone">
                                                    <div class="text-center">
                                                        <p>Drag and Drop</p>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            Choose File
                                                            <input type="file" class="account-settings-fileinput" id="imgInp">
                                                        </label> &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger"><?= form_error('foto') ?></span>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>File Buku</label>
                                        <div class="row px-3">
                                            <div class="card shadow-none card-upload" id="btn-upload-file">
                                                <div class="card-body align-items-center d-flex justify-content-center dropzone" id="dropzone-file">
                                                    <div class="text-center">
                                                        <p>Drag and Drop</p>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            Choose File
                                                            <input type="file" class="account-settings-fileinput" id="fileInp">
                                                        </label> &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger"><?= form_error('file') ?></span>
                                </div>
                            </div>

                            <div class="progress" style="display:none">
                                <div id="progressBar" class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                    <span class="sr-only">0%</span>
                                </div>
                            </div>

                            <div class="error"></div>

                            <div class="form-group text-center mt-2">
                                <button type="submit" class="btn btn-primary btn-sm w-50"><?= explode(' ', $title)[0] == 'Edit' ? 'Update' : 'Simpan' ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function addimage(image) {
        var value = '' +
            `<div class="parent path-image">` +
            `    <img src="<?= base_url() ?>assets/images/${image}"` +
            '        class="img-thumbnail mx-1 my-1" alt="...">' +
            '    <input type="hidden"' +
            `        name="foto" value="${image}">` +
            `    <a class="btn btn-danger child btn-sm" onClick="btn_path()"><i class="fas fa-trash-alt"></i></a>` +
            '</div>' +
            '';
        $(value).insertBefore("#btn-upload");
        $('#btn-upload').hide()
    }

    function btn_path(id) {
        $(`.path-image`).remove()
        $('#btn-upload').show()
    }

    function image_upload(file) {
        var formData = new FormData();
        formData.append("file", file);
        formData.append("rule", 'images');
        $.ajax({
            type: 'POST',
            url: "<?= base_url('upload') ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res) {
                if (JSON.parse(res).file) {
                    addimage(JSON.parse(res).file);
                }
                if (JSON.parse(res).error) {
                    $('.error').append(JSON.parse(res).error)
                    $('.progress').hide();
                }
            },
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                        // console.log('Bytes Loaded : ' + e.loaded);
                        // console.log('Total Size : ' + e.total);
                        // console.log('Persen : ' + (e.loaded / e.total));
                        var percent = Math.round((e.loaded / e.total) * 100);
                        $('#progressBar').attr('aria-valuenow', percent).css('width',
                            percent + '%').text(percent + '%');
                        if (percent === 100) {
                            $('.progress').hide();
                        }
                    }
                });
                return xhr;
            },
        });
    }

    $("#imgInp").change(function(event) {
        $('.progress').show();
        var file = $("#imgInp")[0].files[0];
        image_upload(file)
    });

    (function() {
        function Init() {
            var fileDrag = document.getElementById('dropzone');
            // Is XHR2 available?
            var xhr = new XMLHttpRequest();
            if (xhr.upload) {
                // File Drop
                fileDrag.addEventListener('dragover', fileDragHover, false);
                fileDrag.addEventListener('dragleave', fileDragHover, false);
                fileDrag.addEventListener('drop', fileSelectHandler, false);
            }
        }

        function fileDragHover(e) {
            var fileDrag = document.getElementById('dropzone');
            e.stopPropagation();
            e.preventDefault();
            if (e.type === 'dragover') {
                fileDrag.classList.add("dropzone-hover")
            } else {
                fileDrag.classList.remove("dropzone-hover")
            }
        }

        function fileSelectHandler(e) {
            // Fetch FileList object
            var files = e.target.files || e.dataTransfer.files;
            // Cancel event and hover styling
            fileDragHover(e);
            // Process all File objects
            image_upload(files[0])
        }
        // Check for the various File API support.
        if (window.File && window.FileList && window.FileReader) {
            Init();
        }
    })();

    var images = <?= json_encode(isset($post['foto']) ? $post['foto'] : '') ?>;
    if (images != '') {
        addimage(images)
    }
</script>

<script>
    function addFile(file) {
        var value = '' +
            `<div class="parent card shadow-none card-upload path-file">` +
            '<div class="card-body align-items-center d-flex justify-content-center dropzone">' +
            `<a href="<?= base_url() ?>assets/pdf/${file}" class="btn btn-primary" target="_blank"><i class="fas fa-book fa-lg"></i></a>` +
            `<input type="hidden" name="file" value="${file}">` +
            '</div>' +
            `<a class="btn btn-danger child btn-sm" onClick="btn_path_file()"><i class="fas fa-trash-alt"></i></a>` +
            '</div>' +
            '';
        $(value).insertBefore("#btn-upload-file");
        $('#btn-upload-file').hide()
    }

    function btn_path_file(id) {
        $(`.path-file`).remove()
        $('#btn-upload-file').show()
    }

    function file_upload(file) {
        var formData = new FormData();
        formData.append("file", file);
        formData.append("rule", 'pdf');
        $.ajax({
            type: 'POST',
            url: "<?= base_url('upload') ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res) {
                if (JSON.parse(res).file) {
                    addFile(JSON.parse(res).file);
                }
                if (JSON.parse(res).error) {
                    $('.error').append(JSON.parse(res).error)
                    $('.progress').hide();
                }
            },
            error: function(res) {
                var err = eval("(" + res.responseText + ")");
                err.error.images.forEach(e => {
                    $('.error').append(`<div class="text-danger mt-2">${e}</div>`)
                });
                $('.progress').hide();
            },
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                        // console.log('Bytes Loaded : ' + e.loaded);
                        // console.log('Total Size : ' + e.total);
                        // console.log('Persen : ' + (e.loaded / e.total));
                        var percent = Math.round((e.loaded / e.total) * 100);
                        $('#progressBar').attr('aria-valuenow', percent).css('width',
                            percent + '%').text(percent + '%');
                        if (percent === 100) {
                            $('.progress').hide();
                        }
                    }
                });
                return xhr;
            },
        });
    }

    $("#fileInp").change(function(event) {
        $('.progress').show();
        var file = $("#fileInp")[0].files[0];
        file_upload(file)
    });

    (function() {
        function InitFile() {
            var fileDrag = document.getElementById('dropzone-file');
            // Is XHR2 available?
            var xhr = new XMLHttpRequest();
            if (xhr.upload) {
                // File Drop
                fileDrag.addEventListener('dragover', fileDragHoverFile, false);
                fileDrag.addEventListener('dragleave', fileDragHoverFile, false);
                fileDrag.addEventListener('drop', fileSelectHandlerFile, false);
            }
        }

        function fileDragHoverFile(e) {
            var fileDrag = document.getElementById('dropzone-file');
            e.stopPropagation();
            e.preventDefault();
            if (e.type === 'dragover') {
                fileDrag.classList.add("dropzone-hover")
            } else {
                fileDrag.classList.remove("dropzone-hover")
            }
        }

        function fileSelectHandlerFile(e) {
            // Fetch FileList object
            var files = e.target.files || e.dataTransfer.files;
            // Cancel event and hover styling
            fileDragHoverFile(e);
            // Process all File objects
            file_upload(files[0])
        }
        // Check for the various File API support.
        if (window.File && window.FileList && window.FileReader) {
            InitFile();
        }
    })();

    var file = <?= json_encode(isset($post['file']) ? $post['file'] : '') ?>;
    if (file != '') {
        addFile(file)
    }
</script>
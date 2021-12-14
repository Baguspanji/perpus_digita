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
                        <form method="POST" <?= explode(' ', $title)[0] == 'Edit' ? 'action="' . base_url() . 'admin/post_siswa/' . $id . '"' : '' ?>>
                            <div class="form-group">
                                <label>NIS</label>
                                <input type="number" class="form-control" name="nis" placeholder="Masukkan NIS" value="<?= isset($post['nis']) ? $post['nis'] : '' ?>">
                                <span class="text-danger"><?= form_error('nis') ?></span>
                            </div>
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input type="text" class="form-control" name="nama_siswa" placeholder="Masukkan Nama Siswa" value="<?= isset($post['nama_siswa']) ? $post['nama_siswa'] : '' ?>">
                                <span class="text-danger"><?= form_error('nama_siswa') ?></span>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Masukkan Tahun Terbit" value="<?= isset($post['alamat']) ? $post['alamat'] : '' ?>">
                                <span class="text-danger"><?= form_error('alamat') ?></span>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <input type="text" class="form-control" name="kelas" placeholder="Masukkan Kelas" value="<?= isset($post['kelas']) ? $post['kelas'] : '' ?>">
                                <span class="text-danger"><?= form_error('kelas') ?></span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="<?= isset($post['tempat_lahir']) ? $post['tempat_lahir'] : '' ?>">
                                        <span class="text-danger"><?= form_error('tempat_lahir') ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="<?= isset($post['tanggal_lahir']) ? $post['tanggal_lahir'] : '' ?>">
                                        <span class="text-danger"><?= form_error('tanggal_lahir') ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Foto Siswa</label>
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
        formData.append("rule", 'siswa');
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
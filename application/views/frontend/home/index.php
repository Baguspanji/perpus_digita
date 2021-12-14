<div class="row justify-content-center">

    <div class="col-md-6 mt-2">
        <nav class="nav nav-pills nav-fill justify-content-center">
            <a class="nav-link active" id="btnSiswa" href="javascript:void(0)">Siswa</a>
            <a class="nav-link" id="btnTamu" href="javascript:void(0)">Tamu</a>
        </nav>
    </div>
</div>

<div class="row justify-content-center">

    <div class="col-md-8 mt-2 hide" id="tamu">
        <div class="card">
            <div class="card-body shadow">
                <h3>Buku Tamu</h3>
                <p>Wajib diisi apabila ada tanda <em>asterisk</em> (<span class="text-danger">*</span>)!</p>

                <div class="collapse" id="bukuTamuAlert">
                    <div class="alert"></div>
                </div>
                <form class="row" id="bukuTamu">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputName">Nama Depan<span class="text-danger">*</span></label>
                            <input type="text" required="required" class="form-control" id="inputName" aria-describedby="firstNameHelp" name="FirstName" />
                            <small id="firstNameHelp" class="form-text text-muted">Isikan nama depan anda.</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputNameLast">Nama Belakang<span class="text-danger">*</span></label>
                            <input name="LastName" type="text" class="form-control" id="inputNameLast" required="required" aria-describedby="lastNameHelp" />
                            <small id="lastNameHelp" class="form-text text-muted">Isikan nama belakang anda.</small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="jenisKelamin">Jenis Kelamin<span class="text-danger">*</span></label>
                            <select name="selectKelamin" class="form-control" id="jenisKelamin" aria-describedby="kelaminSelect" data-live-search="true" required="required">
                                <option selected="selected" disabled="disabled">Pilih</option>
                                <option value="lk">Laki-Laki</option>
                                <option value="pr">Perempuan</option>
                            </select>
                            <small id="kelaminSelect" class="form-text text-muted">Pilih jenis kelamin anda.</small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="alamatRumah">Alamat Rumah<span class="text-danger">*</span></label>
                            <textarea name="alamat" class="form-control" id="alamatRumah" aria-describedby="alamat" data-live-search="true" placeholder="Dimanakah rumahmu?" required="required"></textarea>
                            <small id="alamat" class="form-text text-muted">Dimanakah rumahmu?</small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Apa Tujuan Anda?<span class="text-danger">*</span></label>

                            <div class="row">
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="tujuan1" name="tujuan[]" value="baca" />
                                        <label class="custom-control-label" for="tujuan1">Baca Buku</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="tujuan2" name="tujuan[]" value="wifi" />
                                        <label class="custom-control-label" for="tujuan2">Mengakses Internet</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="tujuan3" name="tujuan[]" value="pertemuan" />
                                        <label class="custom-control-label" for="tujuan3">Agenda Pertemuan Santai</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="tujuan4" name="tujuan[]" value="koran" />
                                        <label class="custom-control-label" for="tujuan4">Baca Koran</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="tujuan5" name="tujuan[]" value="lainnya" />
                                        <label class="custom-control-label" for="tujuan5">Lainnya</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="alamat_ip" value="<?= $_SERVER['REMOTE_ADDR']; ?>" />

                    <div class="col-12 text-center mt-2">
                        <button class="btn btn-primary w-50" type="submit">Simpan<i class="fas fa-save ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6 mt-2" id="siswa">
        <div class="card">
            <div class="card-body shadow">
                <h3>Kehadiran Siswa</h3>

                <div class="collapse" id="bukuSiswaAlert">
                    <div class="alert"></div>
                </div>
                <form class="row" id="bukuSiswa">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nis">Nomor Induk<span class="text-danger">*</span></label>
                            <input type="text" required="required" class="form-control" id="nis" aria-describedby="nisHelp" name="nis" />
                            <small id="nisHelp" class="form-text text-muted">Isikan nomor induk siswa.</small>
                        </div>
                    </div>

                    <!-- <div class="col-12">
                        <div class="form-group">
                            <label for="sandi">Sandi<span class="text-danger">*</span></label>
                            <input type="password" required="required" class="form-control" id="sandi" aria-describedby="sandiHelp" name="sandi" />
                            <small id="sandiHelp" class="form-text text-muted">Isikan password/sandi siswa.</small>
                        </div>
                    </div> -->

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Apa Tujuan Anda?<span class="text-danger">*</span></label>

                            <div class="row">
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="tujuan6" name="tujuan" value="baca" />
                                        <label class="custom-control-label" for="tujuan6">Baca Buku</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="tujuan7" name="tujuan" value="wifi" />
                                        <label class="custom-control-label" for="tujuan7">Mengakses Internet</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="tujuan8" name="tujuan" value="pertemuan" />
                                        <label class="custom-control-label" for="tujuan8">Agenda Pertemuan Santai</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="tujuan9" name="tujuan" value="koran" />
                                        <label class="custom-control-label" for="tujuan9">Baca Koran</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="tujuan10" name="tujuan" value="lainnya" />
                                        <label class="custom-control-label" for="tujuan10">Lainnya</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-2">
                        <button class="btn btn-primary w-50" type="submit">Submit<i class="fas fa-save ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


<script type="text/javascript">
    // $('select').selectpicker();

    $('#bukuTamu').submit(function(e) {
        e.preventDefault();

        $('#bukuTamuAlert').collapse('hide');

        var f = $(this);
        var data = f.serializeArray();

        $.ajax({
            'url': '<?= base_url('home/buku_tamu'); ?>',
            'data': data,
            'method': "POST",
            beforeSend: function() {
                $('[type="submit"]').attr({
                    'disabled': 'disabled',
                }).html('<i class="fas fa-spin fa-spinner mr-2"></i>Tunggu Sebentar');
            },
            error: function() {
                $('#bukuTamuAlert').collapse('show');
                $('#bukuTamuAlert .alert').addClass('alert-danger').removeClass('alert-success').html('<h3>Gagal!</h3><p>Ups, nampaknya server sedang bermasalah. Coba lagi beberapa saat.</p>');

                setInterval(function() {
                    $('#bukuTamuAlert').collapse('hide');
                    $('[type="submit"]').removeAttr('disabled').html('Simpan<i class="fas fa-save ml-2"></i>');
                }, 5000);
            },
            success: function(s) {
                if (s == 1) {
                    $('#bukuTamuAlert').collapse('show');
                    $('#bukuTamuAlert .alert').addClass('alert-success').removeClass('alert-danger').html('<h3>Sukses!</h3><p>Anda telah mengirimkan data, terimakasih telah mengisi kuisioner ini.</p>');

                    $f[0].reset();

                    setInterval(function() {
                        $('#bukuTamuAlert').collapse('hide');
                        $('[type="submit"]').removeAttr('disabled').html('Simpan<i class="fas fa-save ml-2"></i>');
                    }, 5000);

                    $('#visitor').DataTable().destroy();
                    $('#visitor').DataTable({
                        'ajax': '<?= base_url('home/list_buku_tamu'); ?>',
                    });
                } else {
                    $('#bukuTamuAlert').collapse('show');
                    $('#bukuTamuAlert .alert').addClass('alert-danger').removeClass('alert-success').html('<h3>Gagal!</h3><p>Ups, nampaknya server sedang bermasalah. Coba lagi beberapa saat.</p>');

                    setInterval(function() {
                        $('#bukuTamuAlert').collapse('hide');
                        $('[type="submit"]').removeAttr('disabled').html('Simpan<i class="fas fa-save ml-2"></i>');
                    }, 5000);
                }
            }
        });
    });

    $('#bukuSiswa').submit(function(e) {
        e.preventDefault();

        $('#bukuSiswaAlert').collapse('hide');

        var f = $(this);
        var data = f.serializeArray();

        $.ajax({
            'url': '<?= base_url('home/buku_siswa'); ?>',
            'data': data,
            'method': "POST",
            beforeSend: function() {
                $('[type="submit"]').attr({
                    'disabled': 'disabled',
                }).html('<i class="fas fa-spin fa-spinner mr-2"></i>Tunggu Sebentar');
            },
            error: function() {
                $('#bukuSiswaAlert').collapse('show');
                $('#bukuSiswaAlert .alert').addClass('alert-danger').removeClass('alert-success').html('<h3>Gagal!</h3><p>Ups, nampaknya server sedang bermasalah. Coba lagi beberapa saat.</p>');

                setInterval(function() {
                    $('#bukuSiswaAlert').collapse('hide');
                    $('[type="submit"]').removeAttr('disabled').html('Simpan<i class="fas fa-save ml-2"></i>');
                }, 5000);
            },
            success: function(s) {
                var res = JSON.parse(s)

                if (res.status == 'error') {
                    $('#bukuSiswaAlert').collapse('show');
                    $('#bukuSiswaAlert .alert').addClass('alert-danger').removeClass('alert-success').html('<h3>Gagal!</h3><p>' + res.message + '.</p>');

                    setInterval(function() {
                        $('#bukuSiswaAlert').collapse('hide');
                        $('[type="submit"]').removeAttr('disabled').html('Simpan<i class="fas fa-save ml-2"></i>');
                    }, 5000);
                } else {

                    $('#bukuSiswaAlert').collapse('show');
                    $('#bukuSiswaAlert .alert').addClass('alert-success').removeClass('alert-danger').html('<h3>Sukses!</h3><p>Anda berhasil mengisi kehadiran.</p>');

                    // $f[0].reset();

                    setInterval(function() {
                        location.href = '<?= base_url() ?>/home/buku'
                    }, 5000);
                }
            }
        });
    });

    var tamu = $('#tamu')
    var btnTamu = $('#btnTamu')
    var siswa = $('#siswa')
    var btnSiswa = $('#btnSiswa')

    btnSiswa.click(() => {
        btnTamu.removeClass('active')
        btnSiswa.addClass('active')

        tamu.addClass('hide')
        siswa.removeClass('hide')
    })

    btnTamu.click(() => {
        btnSiswa.removeClass('active')
        btnTamu.addClass('active')

        siswa.addClass('hide')
        tamu.removeClass('hide')
    })
</script>
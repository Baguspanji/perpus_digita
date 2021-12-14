<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Daftar Kategori</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <h4 class="card-title">Daftar Buku</h4> -->
                        <a href="javascript:void(0)" id="btnAdd" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <table id="basic-datatables" class="display table table-bordered dataTable" role="grid" aria-describedby="basic-datatables_info">
                                    <thead class="text-center">
                                        <tr>
                                            <th style="width: 26px;">#</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php foreach ($kategori as $key => $value) : ?>
                                            <tr>
                                                <td><?= ++$key ?></td>
                                                <td><?= $value->kategori ?></td>
                                                <td>
                                                    <a href="javascript:void(0)" onclick="onEdit('<?= $value->id ?>', '<?= $value->kategori ?>')" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="kategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriModalLabel">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <form id="formAdd" method="POST">
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control" name="kategori" placeholder="Masukkan Kategori" value="<?= isset($post['kategori']) ? $post['kategori'] : '' ?>">
                        <span class="text-danger mt-2"><?= form_error('kategori') ?></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-primary" id="submiteAdd">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#btnAdd').click(() => {
        $('#kategoriModal').modal('show')
        $('#formAdd').attr('action', '<?= base_url('admin/kategori') ?>')
        $('input[name=kategori]').val('')
        $('#submiteAdd').text('Simpan')
    })

    $('#submiteAdd').click(() => {
        $('#formAdd').submit()
    })

    function onEdit(id, kategori) {
        $('#kategoriModal').modal('show')
        $('#formAdd').attr('action', '<?= base_url('admin/kategori') ?>/' + id)
        $('input[name=kategori]').val(kategori)
        $('#submiteAdd').text('Update')
    }
</script>

<?php if (isset($post)) : ?>
    <script>
        $(document).ready(function() {
            $('#kategoriModal').modal('show')
        });
    </script>
<?php endif ?>
<style>
    img {
        width: 100px;
    }
</style>

<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Daftar Siswa</h2>
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
                        <a href="<?= base_url() ?>admin/post_siswa" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <table id="basic-datatables" class="display table table-bordered dataTable" role="grid" aria-describedby="basic-datatables_info">
                                    <thead class="text-center">
                                        <tr>
                                            <th style="width: 26px;">#</th>
                                            <th>Foto</th>
                                            <th>Nis</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Kelas</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php foreach ($siswas as $key => $value) : ?>
                                            <tr>
                                                <td width="20px"><?= ++$key ?></td>
                                                <?php if ($value->foto == '') {
                                                    echo '<td><img src="' . base_url('assets/images/noimage.png') . '" class="img-thumbnail img-fluid m-2" alt="..."></td>';
                                                } else {
                                                    echo '<td><img src="' . base_url() . 'assets/siswa/' . $value->foto . '" class="img-thumbnail img-fluid m-2" alt="..."></td>';
                                                } ?>
                                                <td><?= $value->nis ?></td>
                                                <td><?= $value->nama_siswa ?></td>
                                                <td><?= $value->alamat ?></td>
                                                <td><?= $value->kelas ?></td>
                                                <?php if ($value->status == 1) {
                                                    echo '<td><a href="' . base_url() . 'admin/siswa_status/' . $value->id . '" class="btn btn-sm btn-success">Aktif</a></td>';
                                                } else {
                                                    echo '<td><a href="' . base_url() . 'admin/siswa_status/' . $value->id . '" class="btn btn-sm btn-danger">Non-aktif</a></td>';
                                                } ?>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-info mt-2"><i class="fas fa-eye"></i></a>
                                                    <a href="<?= base_url() . 'admin/post_siswa/' . $value->id ?>" class="btn btn-sm btn-warning mt-2"><i class="fas fa-pen"></i></a>
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
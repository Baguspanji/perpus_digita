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
                    <h2 class="text-white pb-2 fw-bold">Daftar Absensi</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <table id="basic-datatables" class="display table table-bordered dataTable" role="grid" aria-describedby="basic-datatables_info">
                                    <thead class="text-center">
                                        <tr>
                                            <th style="width: 26px;">#</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Waktu</th>
                                            <th>Tujuan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php foreach ($absensis as $key => $value) : ?>
                                            <tr>
                                                <td width="20px"><?= ++$key ?></td>
                                                <td><?= $value->nis ?></td>
                                                <td><?= $value->nama ?></td>
                                                <td><?= tanggal($value->tanggal) ?></td>
                                                <td><?= $value->keperluan ?></td>
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
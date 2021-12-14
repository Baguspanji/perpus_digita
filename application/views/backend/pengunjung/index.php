<div class="row justify-content-center">

    <div class="col-md-12 mb-3">
        <div class="card-body card shadow">
            <h3>Daftar Pengunjung</h3>
            <p>Pengunjung yang terdaftar pada hari ini.</p>

            <div class="table-responsive">
                <table id="visitor" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Pengunjung</th>
                            <th>Jam Kunjung</th>
                            <th>Tujuan</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Pengunjung</th>
                            <th>Jam Kunjung</th>
                            <th>Tujuan</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>


<script type="text/javascript">
    $('select').selectpicker();

    $('#visitor').DataTable({
        'ajax': '<?= base_url('frontend/list_buku_tamu'); ?>',
    });
</script>
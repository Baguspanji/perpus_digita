<style>
    img {
        width: 200px;
    }
</style>

<div class="row justify-content-center">

    <div class="col-md-6 mt-2 text-center">
        <h2>Daftar Buku</h2>
    </div>
</div>

<div class="row justify-content-center">

    <?php foreach ($books as $key => $value) : ?>
        <div class="col-md-3 mt-2" id="siswa">
            <div class="card shadow p-2">
                <?php if ($value->foto == '') {
                    echo '<img src="' . base_url() . 'assets/images/noimage.png' . '" class="card-img-top img-fluid img-thumbnail" alt="...">';
                } else {
                    echo '<img src="' . base_url() . 'assets/images/' . $value->foto . '" class="card-img-top img-fluid img-thumbnail" alt="...">';
                } ?>
                <div class="card-body">
                    <h5 class="card-title"><?= $value->nama_buku ?></h5>
                    <p class="card-text"><?= $value->pengarang ?></p>
                    <?php if ($value->foto == '') {
                        echo '<a href="#nodata" class="btn btn-primary btn-block">Baca</a>';
                    } else {
                        echo '<a href="' . base_url() . 'assets/pdf/' . $value->file . '" target="_blank" class="btn btn-primary btn-block">Baca</a>';
                    } ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>

</div>
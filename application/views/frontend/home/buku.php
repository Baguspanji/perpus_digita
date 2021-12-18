<style>
    .gambar {
        width: auto;
        height: 220px;
    }

    .card-title {
        height: 50px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* number of lines to show */
        line-clamp: 2;
        -webkit-box-orient: vertical;
    }
</style>

<div class="col-12 mt-4">
    <div class="form-row p-2 text-center mb-5">
        <div class="col-2">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                    Kategori Buku
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php foreach ($kategoris as $key => $value) : ?>
                        <a class="dropdown-item" href="<?= base_url() . 'home/buku?kategori=' . $value->id ?>"><?= $value->kategori ?></a>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="col-8">
            <input type="text" class="form-control" placeholder="Cari Buku">
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary mb-2">Cari Buku</button>
        </div>
    </div>

    <div class="row justify-content-center">

        <?php foreach ($books as $key => $value) : ?>
            <div class="col-md-3 mb-3" id="siswa">
                <div class="card shadow p-2">
                    <?php if ($value->foto == '') {
                        echo '<img src="' . base_url() . 'assets/images/noimage.png' . '" class="card-img-top img-fluid img-thumbnail gambar" alt="...">';
                    } else {
                        echo '<img src="' . base_url() . 'assets/images/' . $value->foto . '" class="card-img-top img-fluid img-thumbnail gambar" alt="...">';
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

        <div class="col-12 mt-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</div>
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

    #dt.dataTable.no-footer {
        border-bottom: unset;
    }

    #dt tbody td {
        display: block;
        border: unset;
    }

    #dt>tbody>tr>td {
        border-top: unset;
    }

    .dataTables_paginate {
        display: flex;
        align-items: center;
    }

    .dataTables_paginate a {
        padding: 12 12px;
    }

    img {
        height: 180px;
    }
</style>

<div class="col-12 mt-4">

    <div class="row g-5 mb-4">
        <div class="col-md-12">
            <div class="row pt-2 mb-4 mt-3 px-5">
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
                    <div class="input-group">
                        <input class="form-control" id="search" type="search" placeholder="Cari Buku" aria-label="Search">
                        <span class="input-group-text" id="icon"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </div>

            <table id="dt" class="table w-100">
                <thead>
                    <tr>
                        <th>nama_buku</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>

</div>


<script type="text/javascript">
    $(document).ready(function() {
        var urlData = "<?= base_url() ?>home/get_buku?kategori=<?= $kategori != 0 ? $kategori : 0?>"

        var dt = $('#dt').DataTable({
            ajax: urlData,
            bInfo: false,
            pageLength: 8,
            lengthChange: false,
            deferRender: true,
            processing: true,
            language: {
                paginate: {
                    previous: "<",
                    next: ">"
                },
            },
            columns: [{
                    render: function(data, type, row, meta) {
                        var html =
                            '<div class="card shadow">' +
                            (row.foto == '' ?
                                '  <img src="<?= base_url() ?>assets/images/noimage.png" class="card-img-top img-fluid img-thumbnail gambar" alt="...">' :
                                '  <img src="<?= base_url() ?>assets/images/' + row.foto + '" class="card-img-top img-fluid img-thumbnail gambar" alt="...">') +
                            '  <div class="card-body">' +
                            '    <div class="card-title">' + row.nama_buku + '</div>' +
                            '    <p class="card-text">' + row.pengarang + '</p>' +
                            '    <div class="d-flex justify-content-between">' +
                            (row.file == '' ?
                                '      <a href="#nodata" class="btn btn-primary btn-block">Baca</a>' :
                                '      <a href="<?= base_url() ?>assets/pdf/' + row.file + '" target="_blank" class="btn btn-primary btn-block">Baca</a>') +
                            '    </div>' +
                            '  </div>' +
                            '</div>';
                        return html;
                    }
                },
                {
                    data: "nama_buku",
                    visible: false
                }
            ],
        });

        dt.on('draw', function() {
            $('#dt tbody').addClass('row');
            $('#dt tbody tr').addClass('col-md-3 col-sm-12');
        });

        $("#dt thead").hide();
        $('#dt_filter').hide();

        $('#search').keyup(function() {
            dt.search($(this).val()).draw();
        });

    });
</script>
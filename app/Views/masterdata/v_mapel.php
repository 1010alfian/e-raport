<?= $this->extend('layout/default') ?>


<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1><?= $title ?></h1>
    </div>

    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Succes !</b>
                <?= session()->getFlashdata('msg') ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped" id="sortable-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Nama Mata Pelajaran</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($mapel as $m) : ?>
                                        <tr>
                                            <td>
                                                <div class="text-center"><?= $i++ ?></div>
                                            </td>
                                            <td><?= $m['mapel']?></td>
                                            <td class="text-center">
                                                <a class="btn btn-success" href="" data-toggle="modal" data-target="#editModal<?= $m['id']?>"><i class="fas fa-pencil-alt"></i></a>

                                                <form action="KelolaMapel/<?= $m['id'] ?>/delete " method="post" class="d-inline" onsubmit="return confirm('Yakin Hapus data?')">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Modal tambah -->
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?= site_url('KelolaMapel/create') ?>" method="post">
                <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control" id="nip" name="mapel" autofocus>
                    </div>
                    <div class="modal-footer br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit -->
<?php foreach ($mapel as $m) : ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="editModal<?= $m['id']?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="<?= site_url('KelolaSiswa/'.$m['id'])?>" method="post">
                    <?= csrf_field()?>
                    <input type="hidden" name="_method" value="PATCH">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Mata Pelajaran</label>
                            <input type="text" class="form-control" id="mapel" name="mapel" value="<?=$m['mapel']?>">
                        </div>
                        </div>
                        <div class="modal-footer br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endsection() ?>
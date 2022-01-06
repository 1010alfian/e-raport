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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="KelolaSiswa/new"><i class="fas fa-plus"></i> Tambah Data</a>
                        <h4></h4>
                        <div class="card-header-action">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped" id="sortable-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kelas</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($siswa as $s) : ?>
                                        <tr>
                                            <td>
                                                <div class="text-center"><?= $i++ ?></div>
                                            </td>
                                            <td><?= $s['nis'] ?></td>
                                            <td><?= $s['nama'] ?></td>
                                            <td><?= $s['jns_kelamin'] ?></td>
                                            <td><?= $s['kelas'] ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-success" href="" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a>

                                                <form action="KelolaSiswa/<?= $s['id_user'] ?>/delete " method="post" class="d-inline" onsubmit="return confirm('Yakin Hapus data?')">
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
                    <?= $pager->links('tbl_siswa', 'siswa_pagination') ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


<?= $this->endsection() ?>
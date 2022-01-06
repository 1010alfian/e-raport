<?= $this->extend('layout/default') ?>


<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1><?= $title ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Kelola Data Siswa</a></div>
            <div class="breadcrumb-item"><?= $title ?></div>
        </div>

    </div>

    <div class="section-body">

        <div class="row mt-sm-4">
            <div class="col-12">
                <div class="card">
                    <form method="post" action="<?= site_url('KelolaSiswa/create') ?>" class="needs-validation" novalidate="">
                        <?= csrf_field() ?>
                        <div class="card-header">
                            <h4>Tambah Siswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>NIS*</label>
                                    <input type="text" class="form-control" name="nis" placeholder="Masukan NIS">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Nama*</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Lengkap">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 col-12">
                                    <label>Tempat Tanggal Lahir</label>
                                    <input type="text" class="form-control" name="tgl_lahir" placeholder="Contoh : Subang, 01-01-2010">
                                </div>
                                <div class="form-group col-md-3 col-12">
                                    <label>Agama</label>
                                    <input type="text" class="form-control" name="agama" placeholder="Masukan Agama">
                                </div>
                                <div class="form-group col-md-3 col-12">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jns_kelamin">
                                            <option>Pilih Jenis Kelamin</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 col-12">
                                    <div class="form-group">
                                        <label>Kelas*</label>
                                        <select class="form-control" name="id_kelas">
                                            <option value="" hidden></option>
                                            <?php foreach ($kelas as $k => $value) : ?>
                                                <option value="<?= $value['id_kelas'] ?>"><?= $value['kelas'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Orangtua :</label>
                                <div class="form-group col-md-12 col-12">
                                    <label>Ayah</label>
                                    <input type="text" class="form-control" name="nama_ayah" placeholder="Masukan Nama Ayah">
                                </div>
                                <div class="form-group col-md-12 col-12">
                                    <label>Ibu</label>
                                    <input type="text" class="form-control" name="nama_ibu" placeholder="Masukan Nama Ibu">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan Orangtua :</label>
                                <div class="form-group col-md-12 col-12">
                                    <label>Ayah</label>
                                    <input type="text" class="form-control" name="pekerjaan_ayah" placeholder="Masukan Nama Ayah">
                                </div>
                                <div class="form-group col-md-12 col-12">
                                    <label>Ibu</label>
                                    <input type="text" class="form-control" name="pekerjaan_ibu" placeholder="Masukan Nama Ibu">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Alamat Orangtua</label>
                                    <textarea class="form-control summernote-simple" name="alamat" id="alamat"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endsection() ?>
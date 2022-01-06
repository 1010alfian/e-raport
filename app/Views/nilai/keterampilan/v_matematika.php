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
        <div class="card">
                  <div class="card-body">
                        <div class="form-group col-md-2">
                            <div class="section-title mt-0">Light</div>
                          <select class="form-control select2">
                            <option>Pilih Kelas</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                          </select>
                        </div>
                        <form action="/keterampilan/save" method="post">
                          <?= csrf_field() ?>
                          <table class="table table-hover">
                            <thead>
                              <tr>
                              <th scope="col">No</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Kelas</th>
                              <th scope="col">Tugas Harian</th>
                              <th scope="col">UTS</th>
                              <th scope="col">UAS</th>
                              <th scope="col">Deskripsi</th>
                            </tr>
                          </thead>
                          <?php $i=1 ?>
                          <tbody>
                            <?php foreach ($siswa as $s) : ?>
                            <tr>
                              <th scope="row"><?= $i++ ?></th>
                              <td class="col-2"><input value="<?= $s['id_siswa']?>" name="id_siswa[]" hidden><?= $s['nama']?></td>
                              <td class="col-2"><?= $s['kelas']?></td>
                              <td class="w-20 p-3"><input type="text" class="form-control" name="tgs[]" ></td>
                              <td class="w-20 p-3"><input type="text" class="form-control" name="uts[]" ></td>
                              <td class="w-20 p-3"><input type="text" class="form-control" name="uas[]" ></td>
                              <td class="col-4"><textarea name="deskripsi[]" class="form-control" id="" cols="30" rows="10"></textarea></td>
                            </tr>
                            <?php endforeach; ?>
                          </table>
                          <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                          </tbody>
                      </form>
        </div>
    </div>
</section>
<?= $this->endsection() ?>
<div class="container mt-5">
  <div class="card item-card card-block p-3" style="width:18rem ;">
    <h4 class="card-title text-right"><?= $data['mhs']['nama']; ?></h4>
    <h5 class="item-card-title mt-3 mb-3"><?= $data['mhs']['nim']; ?></h5>
    <p class="card-text"><?= $data['mhs']['email']; ?></p>
    <p class="card-text"><?= $data['mhs']['jurusan']; ?></p>
    <a href="<?= BASE_URL ?>/mahasiswa">Kembali</a>
  </div>
</div>
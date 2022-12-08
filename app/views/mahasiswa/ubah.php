<div class="container mt-5">
  <form action="<?= BASE_URL; ?>mahasiswa/ubahData" method="POST">
    <input type="hidden" name="id_mahasiswa" value="<?= $data['mhs']['id_mahasiswa']; ?>">
    <div class="form-group mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" name="nama" value="<?= $data['mhs']['nama']; ?>" class="form-control" id="exampleFormControlInput1" placeholder="ahmad sabili alghifari">
    </div>
    <div class="form-group mb-3">
      <label for="exampleFormControlInput1" class="form-label">Email address</label>
      <input type="email" class="form-control" value="<?= $data['mhs']['email']; ?>" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="form-group mb-3 ">
      <label for="exampleFormControlInput1" class="form-label">Nim</label>
      <input type="text" name="nim" value="<?= $data['mhs']['nim']; ?>" class="form-control" id="exampleFormControlInput1" placeholder="11180332">
    </div>
    <div class="form-group mb-3">
      <label for="jurusan" class="form-label">Jurusan</label>
      <select class="form-select" aria-label="Default select example" name="jurusan">
        <option value="<?= $data['mhs']['jurusan']; ?>" selected><?= $data['mhs']['jurusan']; ?></option>
        <option value="Sistem Informasi">Sistem Informasi</option>
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Tata Boga">Tata Boga</option>
        <option value="Perhotelan">Perhotelan</option>
        <option value="Ekonomi Digital">Ekonomi Digital</option>
        <option value="Bisnis Digital">Bisnis Digital</option>
      </select>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary " data-bs-dismiss="modal"><a href="<?= BASE_URL ?>mahasiswa">Kembali</a></button>
      <button type="submit" class="btn btn-primary m-2">Ubah Data Mahasiswa</button>
    </div>
  </form>
</div>
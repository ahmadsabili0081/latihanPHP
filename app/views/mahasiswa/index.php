<div class="container mt-4">
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>
  <div class="container rounded-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTarget">
      Tambah Data
    </button>
    <div class="col-lg-4 mt-3">
      <form action="<?= BASE_URL ?>mahasiswa/cariMahasiswa" method="POST">
        <div class="form-group d-flex justify-content-between align-items-center">
          <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-primary" type="submit">Search</button>
        </div>
      </form>
    </div>
    <div class="container-fluid py-5">
      <h2 class="mb-3">Selamat Datang Dihalaman Mahasiswa</h2>
      <ul class="list-group mb-5">
        <?php foreach ($data['mhs'] as $mhs) : ?>
          <li class='list-group-item d-flex justify-content-between align-items-center mb-2'><?= $mhs['nama']; ?>
            <div class="buttons_group">
              <a class="badge bg-primary p-3" href="<?= BASE_URL . "mahasiswa/detail/$mhs[id_mahasiswa]"; ?>">Detail</a>
              <a class="badge bg-success p-3 edit" href="<?= BASE_URL . "mahasiswa/ubah/$mhs[id_mahasiswa]"; ?>">Ubah</a>
              <a onclick="return confirm('Yakin ingin dihapus?')" class="badge bg-danger  p-3" href="<?= BASE_URL . "mahasiswa/hapus/$mhs[id_mahasiswa]"; ?>">Hapus</a>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>


<!-- modal -->
<div class="modal fade" id="modalTarget" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASE_URL; ?>mahasiswa/tambah" method="POST">
          <div class="form-group mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="ahmad sabili alghifari">
          </div>
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="form-group mb-3 ">
            <label for="exampleFormControlInput1" class="form-label">Nim</label>
            <input type="text" name="nim" class="form-control" id="exampleFormControlInput1" placeholder="11180332">
          </div>
          <div class="form-group mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select class="form-select" aria-label="Default select example" name="jurusan">
              <option selected>Pilih Jurusan</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Tata Boga">Tata Boga</option>
              <option value="Perhotelan">Perhotelan</option>
              <option value="Ekonomi Digital">Ekonomi Digital</option>
              <option value="Bisnis Digital">Bisnis Digital</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Proyek dan Lokasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Main Content -->
            <div class="col-md-9 mx-auto">

                <!-- Database Table: Daftar Proyek -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title">Daftar Proyek</h5>
                                <div class="d-flex justify-content-center">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mx-auto">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nama Client</th>
                                                    <th>Nama Proyek</th>
                                                    <th>Pemimpin Proyek</th>
                                                    <th>Tanggal Mulai</th>
                                                    <th>Tanggal Selesai</th>
                                                    <th>Keterangan</th>
                                                    <th>Lokasi</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($proyek_list as $proyek): ?>
                                                
                                                <tr>
                                                    <td><?= $proyek['id']; ?></td>
                                                    <td><?= $proyek['client']; ?></td>
                                                    <td><?= $proyek['namaProyek']; ?></td>
                                                    <td><?= $proyek['pimpinanProyek']; ?></td>
                                                    <td><?= $proyek['tglMulai']; ?></td>
                                                    <td><?= $proyek['tglSelesai']; ?></td>
                                                    <td><?= $proyek['keterangan']; ?></td>
                                                    <td>
                                                        
                                                            <?php foreach ($proyek['lokasi'] as $lokasi): ?>
                                                            <?= $lokasi['namaLokasi']; ?>
                                                            <?php endforeach; ?>
                                                        
                                                    </td>
                                                    <td>
                                                        <div class="d-grid gap-2 d-md-block">
                                                            <a class="btn btn-primary"
                                                                href="<?= site_url('proyek/edit/'.$proyek['id']); ?>">Edit</a>
                                                            <a class="btn btn-danger"
                                                                href="<?= site_url('proyek/delete/'.$proyek['id']); ?>">Hapus</a>
                                                        </div>
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
                    <div class="text-end mt-4 mb-4">
                        <a class="btn btn-primary <?= empty($lokasi_list) ? 'disabled' : '' ?>" href="<?= site_url('proyek/create'); ?>">Tambah Proyek</a>
                    </div>
                </div>

            </div>
            <div class="col-md-9 mx-auto">

                <!-- Database Table: Daftar Lokasi -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="d-flex justify-content-center">
                            <div class="card-body text-center">
                                <h5 class="card-title">Daftar Lokasi</h5>
                                
                                    <div class="table-responsive">
                                        <table class="table table-bordered mx-auto">
                                            <thead class="thead-light">
                                                <tr>
                                                <th>ID</th>
                                                    <th>Nama Lokasi</th>
                                                    <th>Kota</th>
                                                    <th>Provinsi</th>
                                                    <th>Negara</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($lokasi_list as $lokasi): ?>
                                                    <tr>
                                                        <td><?= $lokasi['id']; ?></td>
                                                        <td><?= $lokasi['namaLokasi']; ?></td>
                                                        <td><?= $lokasi['kota']; ?></td>
                                                        <td><?= $lokasi['provinsi']; ?></td>
                                                        <td><?= $lokasi['negara']; ?></td>
                                                        <td>
                                                            <div class="d-grid gap-2 d-md-block">
                                                                <a class="btn btn-primary" href="<?= site_url('proyek/editlokasi/'.$lokasi['id']); ?>">Edit</a>
                                                                <a class="btn btn-danger" href="<?= site_url('proyek/deletelokasi/'.$lokasi['id']); ?>">Hapus</a>
                                                            </div>
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
                    <div class="text-end mt-4 mb-4">
                        <a class="btn btn-primary" href="<?= site_url('proyek/createlokasi'); ?>">Tambah Lokasi</a>
                    </div>
                </div>

            </div>
    </div>
</body>

</html>

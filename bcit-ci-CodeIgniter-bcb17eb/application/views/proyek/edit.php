
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Proyek</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit Proyek</h1>
        <form action="<?= site_url('proyek/update/'.$proyek['id']); ?>" method="POST">
            <div class="form-group">
                <label for="nama_proyek">Nama Proyek:</label>
                <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" value="<?= $proyek['namaProyek']; ?>">
            </div>
            <div class="form-group">
                <label for="client">Client:</label>
                <input type="text" class="form-control" id="client" name="client" value="<?= $proyek['client']; ?>">
            </div>
            <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai:</label>
                <input type="datetime-local" class="form-control" id="tgl_mulai" name="tgl_mulai" value="<?= date('Y-m-d\TH:i', strtotime($proyek['tglMulai'])); ?>">
            </div>
            <div class="form-group">
                <label for="tgl_selesai">Tanggal Selesai:</label>
                <input type="datetime-local" class="form-control" id="tgl_selesai" name="tgl_selesai" value="<?= date('Y-m-d\TH:i', strtotime($proyek['tglSelesai'])); ?>">
            </div>
            <div class="form-group">
                <label for="pimpinan_proyek">Pimpinan Proyek:</label>
                <input type="text" class="form-control" id="pimpinan_proyek" name="pimpinan_proyek" value="<?= $proyek['pimpinanProyek']; ?>">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <textarea class="form-control" id="keterangan" name="keterangan"><?= $proyek['keterangan']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <select class="form-control" id="lokasi" name="lokasi[]" multiple>
                    <?php foreach ($lokasi_list as $lokasi): ?>
                        <option value="<?= $lokasi['id']; ?>" <?= in_array($lokasi['id'], array_column($proyek['lokasi'], 'id')) ? 'selected' : ''; ?>><?= $lokasi['namaLokasi']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

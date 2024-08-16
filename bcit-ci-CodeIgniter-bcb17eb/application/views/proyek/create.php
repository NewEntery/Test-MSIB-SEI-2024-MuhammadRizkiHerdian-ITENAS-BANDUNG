<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Proyek</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    

    <div class="container mt-4">
       
        <h1>Tambah Proyek</h1>
        <form action="<?= site_url('proyek/store'); ?>" method="POST">
            <div class="form-group">
                <label for="nama_proyek">Nama Proyek:</label>
                <input type="text" class="form-control" name="nama_proyek" id="nama_proyek">
            </div>
            <div class="form-group">
                <label for="client">Client:</label>
                <input type="text" class="form-control" name="client" id="client">
            </div>
            <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai:</label>
                <input type="datetime-local" class="form-control" name="tgl_mulai" id="tgl_mulai">
            </div>
            <div class="form-group">
                <label for="tgl_selesai">Tanggal Selesai:</label>
                <input type="datetime-local" class="form-control" name="tgl_selesai" id="tgl_selesai">
            </div>
            <div class="form-group">
                <label for="pimpinan_proyek">Pimpinan Proyek:</label>
                <input type="text" class="form-control" name="pimpinan_proyek" id="pimpinan_proyek">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <select class="form-control" name="lokasi[]" multiple id="lokasi">
                    <?php foreach ($lokasi_list as $lokasi): ?>
                        <option value="<?= $lokasi['id']; ?>"><?= $lokasi['namaLokasi']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <a href="<?= site_url('proyek'); ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
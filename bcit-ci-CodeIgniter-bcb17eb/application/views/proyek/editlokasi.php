
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Proyek</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit Lokasi</h1>
        <form action="<?= site_url('proyek/updatelokasi/'.$lokasi['id']); ?>" method="POST">
        <div class="form-group">
                <label for="nama_lokasi">Nama Lokasi:</label>
                <input type="text" class="form-control" name="nama_lokasi" id="nama_lokasi" value="<?= $lokasi['namaLokasi']; ?>">
            </div>
            <div class="form-group">
                <label for="Kota">Kota:</label>
                <input type="text" class="form-control" name="Kota" id="Kota" value="<?= $lokasi['kota']; ?>">
            </div>
            <div class="form-group">
                <label for="Provinsi">Provinsi:</label>
                <input type="text" class="form-control" name="Provinsi" id="Provinsi" value="<?= $lokasi['provinsi']; ?>">
            </div>
            <div class="form-group">
                <label for="Negara">Negara:</label>
                <input type="text" class="form-control" name="Negara" id="Negara" value="<?= $lokasi['negara']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

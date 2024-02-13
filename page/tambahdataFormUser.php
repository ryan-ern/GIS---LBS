<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pemesanan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        body {
            background: #354b8f;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h3>TAMBAH PEMESANAN</h3>
        <form action="../connection/validate.php" method="POST">
            <div class="form-group">
                <label for="invoice">Invoice:</label>
                <input type="text" class="form-control" id="invoice" name="invoice" readonly>
            </div>

            <div class="form-group">
                <label for="Nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="nomor">Nomor:</label>
                <input type="text" class="form-control" id="nomor" name="nomor">
            </div>


            <div class="form-group">
                <input type="date" class="form-control" id="tanggal" name="tanggal" style="display:none;">
            </div>

            <div class="form-group">
                <label for="Keterangan">Jenis Pesanan</label>
                <select class="form-control" id="JenisPesanan" name="keterangan" required>
                    <option value="" disabled selected>Pilih Jenis Pesanan</option>
                    <optgroup label="Instalasi">
                        <option value="Instalasi Fiber Optik">Instalasi Fiber Optik</option>
                        <option value="Instalasi Jaringan Internet">Instalasi Jaringan Internet</option>
                    </optgroup>
                    <optgroup label="Jenis Aksesoris">
                        <option value="Suspension Gantung">Suspension Gantung</option>
                        <option value="Stopping Buckle Clamp">Stopping Buckle Clamp</option>
                    </optgroup>
                    <optgroup label="Jenis Jasa">
                        <option value="Jasa Penanaman Tiang">Jasa Penanaman Tiang</option>
                        <option value="Jasa Penarikan Kabel Fiber Optic">Jasa Penarikan Kabel Fiber Optic</option>
                    </optgroup>
                </select>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat Lengkap:</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="4"></textarea>
            </div>

            <button type="submit" class="btn btn-success" name="tambah-pesanan">Tambah Data</button>
            <button type="button" class="btn btn-primary" onClick="window.location.href='../index.html#layanan'">Keluar</button>
        </form>
    </div>
    <script>
        document.getElementById('tanggal').value = new Date().toLocaleDateString('en-CA');


        // Fungsi untuk generate invoice
        function generateInvoice() {
            var currentDate = new Date();
            var formattedDate = currentDate.getFullYear() +
                ('0' + (currentDate.getMonth() + 1)).slice(-2) +
                ('0' + currentDate.getDate()).slice(-2) +
                currentDate.getHours() +
                currentDate.getMinutes() +
                currentDate.getSeconds();

            document.getElementById('invoice').value = 'INV-' + formattedDate;
        }

        generateInvoice();
    </script>
</body>

</html>
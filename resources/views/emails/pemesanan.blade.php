<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

    <h1>Daftar Pesanan</h1>
    <p>Ini adalah barang-barang yang ingin dipesan oleh minimarket kami</p>
        <table border="1">
                <thead>
                    <tr>
                        <th style="text-align:center;">Kode Pesanan</th>
                        <th style="text-align:center;">Nama Barang</th>
                        <th style="text-align:center;">Satuan Barang</th>
                        <th style="text-align:center;">Jumlah Barang</th>
                        <th style="text-align:center;">Supplier</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemesanan as $item)
                    <tr>
                        <td>{{ $item->kode_pemesanan }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->satuan_barang }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->daftarSupplier->nama_supplier }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

</body>
</html>



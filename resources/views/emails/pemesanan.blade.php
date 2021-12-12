<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

    <h1>Selamat datang!</h1>
    <h3>Halo, {{ $user->nama }}
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
                    @foreach ($listBuku as $buku)
                    <tr>
                        <td>{{ $buku->title }}</td>
                        <td>{{ $buku->tahun }}</td>
                        <td>{{ $buku->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <h3 style="">Mau tau lebih lanjut mengenai bagaimana cara menghias email yang baik ? klik <a href="https://stackoverflow.com/questions/127498/what-guidelines-for-html-email-design-are-there">Disini</a></h3>
            <h3 style="">Mailtrap Starting Guide <a href="https://help.mailtrap.io/article/12-getting-started-guide">Disini</a></h3>

</body>
</html>



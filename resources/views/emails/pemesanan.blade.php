@extends('template_email')

@section('konten')
<p>Dengan hormat,</p>
<p>Berdasarkan informasi dari surat yang telah kami terima, maka dengan ini kami bermaksud untuk memesan beberapa barang.</p>
<p>Adapun beberapa barang yang kami pesan adalah sebagai berikut :</p>
<br>
<table border="3" id="table" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th style="text-align:center">No.</th>
            <th style="text-align:center;">Nama Barang</th>
            <th style="text-align:center;">Satuan Barang</th>
            <th style="text-align:center;">Jumlah Barang</th>
            <th style="text-align:center;">Supplier</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($pemesanan as $item)
            <tr>
                <td style="text-align:center">{{$loop ->index + 1}}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->satuan_barang }}</td>
                <td style="text-align:center">{{ $item->jumlah }}</td>
                <td>{{ $item->daftarSupplier->nama_supplier }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>
<p>Pembayaran akan dilakukan secara tunai setelah barang tersebut diterima, mohon saat pengiriman barang agar disertakan juga kwitansi atau struk barang yang kami pesan.</p>
<p>Demikian surat pemesanan ini kami sampaikan, mohon barang dikirim secepatnya dan atas perhatiannya kami ucapkan terima kasih.</p>
<br><br>
<p>Hormat kami,</p>
<br>
<br>
<br>
<p>Minimarket Sejahtera</p>
@endsection



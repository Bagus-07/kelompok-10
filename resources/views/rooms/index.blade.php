<!DOCTYPE html>
<html>
<head>
    <title>List Kamar - BlueDoors</title>
</head>
<body>

    <h1>Daftar Kamar Hotel</h1>

    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama Kamar</th>
            <th>Tipe</th>
            <th>Harga</th>
            <th>Status</th>
        </tr>

        @foreach($rooms as $index => $room)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $room['nama'] }}</td>
            <td>{{ $room['tipe'] }}</td>
            <td>Rp {{ number_format($room['harga']) }}</td>
            <td>{{ $room['status'] }}</td>
        </tr>
        @endforeach

    </table>

</body>
</html>
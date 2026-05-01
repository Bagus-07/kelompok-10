<link rel="stylesheet" href="{{ asset('styles/style_Bagus.css') }}">
@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="bg-blue-500 text-white p-4 m-4 rounded-lg">
    Ini pakai Tailwind
</div>
<h1>Ini Judul Merah</h1>

<img src="{{ asset('images/RuangBagus1.jpg') }}" width="200">
<img src="{{ asset('images/RuangBagus2.jpg') }}" width="200">

<h1>Customer List</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
    </tr>

    @foreach($data as $index => $d)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $d['name'] }}</td>
        <td>{{ $d['email'] }}</td>
    </tr>
    @endforeach

</table>
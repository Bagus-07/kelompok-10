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
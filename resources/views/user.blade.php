@extends('layouts.app')

@section('title', 'Data User')

@section('content')

<style>
.content-box {
    background: #f1f5f9;
    padding: 25px;
    border-radius: 16px;
}

.card {
    background: white;
    padding: 20px;
    border-radius: 14px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.btn-add {
    background: #3b82f6;
    color: white;
    padding: 10px 16px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
}

th {
    background: #f1f5f9;
    padding: 14px;
    text-align: left;
    color: #475569;
}

td {
    padding: 14px;
    border-bottom: 1px solid #eee;
    color: #1e293b;
}

/* BUTTON */
.btn {
    padding: 6px 12px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

.edit {
    background: #3b82f6;
    color: white;
}

.delete {
    background: #ef4444;
    color: white;
}

/* HOVER */
tr:hover {
    background: #f9fafb;
}
</style>

<div class="content-box">

    <div class="header">
        <h3>Data User</h3>
        <button class="btn-add">+ Tambah User</button>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Cia</td>
                    <td>cia@gmail.com</td>
                    <td>08123456789</td>
                    <td>
                        <button class="btn edit">Edit</button>
                        <button class="btn delete">Hapus</button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Andi</td>
                    <td>andi@gmail.com</td>
                    <td>08234567890</td>
                    <td>
                        <button class="btn edit">Edit</button>
                        <button class="btn delete">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

@endsection
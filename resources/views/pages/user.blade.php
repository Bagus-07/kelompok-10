@extends('layouts.admin')

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

.alert-success{
    background:#dcfce7;
    color:#166534;
    padding:12px;
    border-radius:8px;
    margin-bottom:15px;
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

@if(session('success'))

<div class="alert-success">
    {{ session('success') }}
</div>

@endif

<div class="content-box">

    <div class="header">
        <h3>Data User</h3>
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
                @forelse($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone ?? '-' }}</td>
                    <td>
                        <button class="btn edit">
                            Edit
                        </button>
                        <form
                            action="{{ route('user.destroy', $user->id) }}"
                            method="POST"
                            style="display:inline;"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn delete"
                                onclick="return confirm('Hapus user ini?')"
                            >
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;">
                        Belum ada data user
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

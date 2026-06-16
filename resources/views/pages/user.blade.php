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

.modal{
    display:none;
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.5);
    z-index:9999;

    justify-content:center;
    align-items:center;
}

.modal.active{
    display:flex;
}

.modal-content{
    background:white;
    width:500px;
    padding:25px;
    border-radius:15px;
}

.modal-form{
    display:flex;
    flex-direction:column;
    gap:12px;
}

.modal-form input{
    padding:10px;
    border:1px solid #ddd;
    border-radius:10px;
}

.modal-footer{
    margin-top:15px;
    display:flex;
    justify-content:flex-end;
    gap:10px;
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



.btn-add{
    background:#3b82f6;
    color:white;
    padding:10px 16px;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-weight:600;
}

.btn-close{
    background:#64748b;
    color:white;
    border:none;
    padding:10px 16px;
    border-radius:8px;
    cursor:pointer;
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

        <button
            class="btn-add"
            onclick="openModal('modalUser')">
            + Tambah Tamu
        </button>
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
                        <button
                            class="btn edit"
                            onclick="openModal('editUser{{ $user->id }}')">

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
@foreach($users as $user)

<div id="editUser{{ $user->id }}" class="modal">

    <div class="modal-content">

        <h3>Edit User</h3>

        <form
            method="POST"
            action="{{ route('user.update', $user->id) }}"
            class="modal-form"
        >

            @csrf
            @method('PUT')

            <input
                type="text"
                name="name"
                value="{{ $user->name }}"
            >

            <input
                type="email"
                name="email"
                value="{{ $user->email }}"
            >

            <input
                type="text"
                name="phone"
                value="{{ $user->phone }}"
            >

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-close"
                    onclick="closeModal('editUser{{ $user->id }}')"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="btn-add"
                >
                    Update
                </button>

            </div>

        </form>

    </div>

</div>

@endforeach
<div id="modalUser" class="modal">
    <div class="modal-content">
        <h3>Tambah Tamu</h3>

        <form
            method="POST"
            action="{{ route('user.store') }}"
            class="modal-form">

            @csrf

            <input
                type="text"
                name="name"
                placeholder="Nama">

            <input
                type="email"
                name="email"
                placeholder="Email">

            <input
                type="text"
                name="phone"
                placeholder="No HP">

            <input
                type="password"
                name="password"
                placeholder="Password">

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-close"
                    onclick="closeModal('modalUser')">
                    Batal
                </button>

                <button
                    type="submit"
                    class="btn-add">
                    Simpan
                </button>

            </div>
        </form>
    </div>
</div>
<script>

function openModal(id)
{
    document
        .getElementById(id)
        .classList
        .add('active');
}

function closeModal(id)
{
    document
        .getElementById(id)
        .classList
        .remove('active');
}

</script>
@endsection
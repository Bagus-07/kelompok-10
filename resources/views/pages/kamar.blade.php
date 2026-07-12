@extends('layouts.admin')

@section('title', 'Data Kamar')

@section('content')

<style>

.room-guide{
    display:grid;
    grid-template-columns:
        2fr
        1.2fr
        1fr
        1fr
        1.2fr;

    background:#f8fafc;
    border:1px solid #e2e8f0;
    border-radius:12px;

    padding:14px 20px;
    margin-bottom:15px;

    font-weight:600;
    color:#64748b;
}

.room-header-table{
    display:grid;
    grid-template-columns:
        50px
        1.5fr
        1fr
        1fr
        1fr
        180px;

    background:#e2e8f0;

    padding:15px;

    border-radius:12px;

    font-weight:700;

    margin-bottom:10px;
}

.room-container{
    background:white;
    border-radius:20px;
    padding:25px;
}

.room-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.room-actions{
    display:flex;
    gap:10px;
}

.btn-room{
    padding:10px 16px;
    border:none;
    border-radius:10px;
    cursor:pointer;
    background:#2563eb;
    color:white;
    font-weight:600;
}

.btn-room.secondary{
    background:#10b981;
}

.room-type{
    border:1px solid #ddd;
    border-radius:15px;
    margin-bottom:15px;
    overflow:hidden;
}

.room-type-header{
    display:grid;
    grid-template-columns:
        50px
        1.5fr
        1fr
        1fr
        1fr
        180px;

    align-items:center;
    padding:15px;
    background:#f8fafc;
}

.room-list{
    display:none;
    padding:15px;
}

.room-list.active{
    display:block;
}

.dropdown-btn{
    cursor:pointer;
    font-size:18px;
    font-weight:bold;
}

.action-buttons{
    display:flex;
    gap:8px;
}

.btn-edit{
    background:#3b82f6;
    color:white;
    border:none;
    padding:8px 14px;
    border-radius:8px;
    cursor:pointer;
}

.btn-delete{
    background:#ef4444;
    color:white;
    border:none;
    padding:8px 14px;
    border-radius:8px;
    cursor:pointer;
}

.room-details{
    display:none;
    padding:15px;
}

.room-details.active{
    display:block;
}

.room-table{
    width:100%;
    border-collapse:collapse;
}

.room-table th,
.room-table td{
    border-bottom:1px solid #eee;
    padding:12px;
    text-align:center;
}

.status{
    padding:6px 12px;
    border-radius:20px;
    font-weight:600;
    font-size:13px;
}


/* MODAL */

.modal{
    display:none;
    position:fixed;
    inset:0;
    background:rgba(0,0,0,0.5);
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
    border-radius:20px;
}

.modal-content h3{
    margin-bottom:20px;
}

.modal-form{
    display:flex;
    flex-direction:column;
    gap:12px;
}

.modal-form input,
.modal-form textarea,
.modal-form select{
    padding:10px;
    border:1px solid #ddd;
    border-radius:10px;
}

.modal-footer{
    margin-top:20px;
    display:flex;
    justify-content:flex-end;
    gap:10px;
}

.btn-close{
    background:#64748b;
    color:white;
    border:none;
    padding:10px 16px;
    border-radius:10px;
    cursor:pointer;
}

.alert-success{
    background:#dcfce7;
    color:#166534;
    padding:12px;
    border-radius:8px;
    margin-bottom:15px;
}

</style>

@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="room-container">
    <div class="room-header">
        <h3>Data Kamar</h3>

        <div class="room-actions">
            <button class="btn-room"
                    onclick="openModal('modalTipe')">
                Tambah Tipe Kamar
            </button>

            <button class="btn-room secondary"
                    onclick="openModal('modalKamar')">
                Tambah Kamar
            </button>
        </div>
    </div>

    <!-- TAMBAHKAN DI SINI -->
    <div class="room-guide">
        <div>Tipe Kamar</div>
        <div>Harga/Malam</div>
        <div>Kamar Terpakai</div>
        <div>Kamar Tersedia</div>
        <div>Aksi</div>
    </div>
    
   @foreach($tipeKamars as $tipe)

<div class="room-type">
    <div class="room-type-header">
        <div class="dropdown-btn"
            onclick="toggleRoom('room{{ $tipe->id }}')">
            ▼
        </div>

        <div style="display:flex; align-items:center; gap:10px;">

            @if($tipe->gambar)
                <img
                    src="{{ asset('storage/' . $tipe->gambar) }}"
                    alt="{{ $tipe->nama_tipe }}"
                    style="
                        width:60px;
                        height:60px;
                        object-fit:cover;
                        border-radius:8px;
                    "
                >
            @endif

            <span>{{ $tipe->nama_tipe }}</span>
        </div>

        <div>
            Rp {{ number_format($tipe->harga_per_malam,0,',','.') }}
        </div>

        <div>
            {{ $tipe->kamars->where('status','Dipakai')->count() }}
        </div>

        <div>
            {{ $tipe->kamars->where('status','Tersedia')->count() }}
        </div>

        <div class="action-buttons">

            <button
                class="btn-edit"
                onclick="openModal('editModal{{ $tipe->id }}')">
                Edit
            </button>

            <form
                action="{{ route('tipe-kamar.destroy',$tipe->id) }}"
                method="POST"
                style="display:inline">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="btn-delete"
                    onclick="return confirm('Hapus tipe kamar ini?')">
                    Hapus
                </button>

            </form>

        </div>

    </div>

    <div class="room-list" id="room{{ $tipe->id }}">

        <table class="room-table">

            <thead>
                <tr>
                    <th>No Kamar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @forelse($tipe->kamars as $kamar)

                    <tr>
                        <td>{{ $kamar->nomor_kamar }}</td>
                        <td>

                            @if($kamar->status == 'Tersedia')

                            <span class="status tersedia">
                                Tersedia
                            </span>

                            @elseif($kamar->status == 'Dipakai')

                            <span class="status dipakai">
                                Dipakai
                            </span>

                            @elseif($kamar->status == 'Cleaning')

                            <span class="status cleaning">
                                Cleaning
                            </span>

                            @elseif($kamar->status == 'Maintenance')

                            <span class="status maintenance">
                                Maintenance
                            </span>
                                
                            @else

                            {{ $kamar->status }}

                            @endif

                        </td>

                        <td>

                            <button
                                class="btn-edit"
                                onclick="openModal('editKamar{{ $kamar->id }}')">
                                Edit
                            </button>

                            <form
                                action="{{ route('kamar.destroy', $kamar->id) }}"
                                method="POST"
                                style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn-delete"
                                    onclick="return confirm('Hapus kamar ini?')">
                                    Hapus
                                </button>

                            </form>

                            @if($kamar->status == 'Cleaning')

                                <form
                                    action="{{ route('kamar.cleaning', $kamar->id) }}"
                                    method="POST"
                                    style="display:inline;">

                                    @csrf
                                    @method('PUT')

                                    <button
                                        class="btn-edit"
                                        style="background:#06b6d4;">
                                        Cleaning Selesai
                                    </button>

                                </form>

                            @endif

                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="2">
                            Belum ada kamar
                        </td>
                    </tr>

                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endforeach

@foreach($tipeKamars as $tipe)

<div id="editModal{{ $tipe->id }}" class="modal">
    <div class="modal-content">
        <h3>Edit Tipe Kamar</h3>

        <form
            method="POST"
            action="{{ route('tipe-kamar.update', $tipe->id) }}"
            class="modal-form">

            @csrf
            @method('PUT')

            <input
                type="text"
                name="nama_tipe"
                value="{{ $tipe->nama_tipe }}">

            <input
                type="number"
                name="harga_per_malam"
                value="{{ $tipe->harga_per_malam }}">
            
            <input
                type="file"
                name="gambar[]"
                multiple>

            <textarea
                name="fasilitas">{{ $tipe->fasilitas }}</textarea>

            <textarea
                name="deskripsi">{{ $tipe->deskripsi }}</textarea>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-close"
                    onclick="closeModal('editModal{{ $tipe->id }}')">
                    Batal
                </button>

                <button
                    type="submit"
                    class="btn-room">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

@endforeach
@foreach($tipeKamars as $tipe)
    @foreach($tipe->kamars as $kamar)
    <div id="editKamar{{ $kamar->id }}" class="modal">
        <div class="modal-content">
            <h3>Edit Kamar</h3>
            <form
                method="POST"
                action="{{ route('kamar.update', $kamar->id) }}"
                class="modal-form"
            >

                @csrf
                @method('PUT')

                <input
                    type="text"
                    name="nomor_kamar"
                    value="{{ $kamar->nomor_kamar }}"
                >

                <select name="tipe_kamar_id">

                    @foreach($tipeKamars as $option)

                        <option
                            value="{{ $option->id }}"
                            {{ $kamar->tipe_kamar_id == $option->id ? 'selected' : '' }}
                        >
                            {{ $option->nama_tipe }}
                        </option>

                    @endforeach

                </select>

                <select name="status">

                    <option value="Tersedia"
                        {{ $kamar->status == 'Tersedia' ? 'selected' : '' }}>
                        Tersedia
                    </option>

                    <option value="Dipakai"
                        {{ $kamar->status == 'Dipakai' ? 'selected' : '' }}>
                        Dipakai
                    </option>

                    <option value="Cleaning"
                        {{ $kamar->status == 'Cleaning' ? 'selected' : '' }}>
                        Cleaning
                    </option>

                    <option value="Maintenance"
                        {{ $kamar->status == 'Maintenance' ? 'selected' : '' }}>
                        Maintenance
                    </option>

                </select>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn-close"
                        onclick="closeModal('editKamar{{ $kamar->id }}')"
                    >
                        Batal
                    </button>

                    <button
                        type="submit"
                        class="btn-room"
                    >
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
@endforeach
<!-- MODAL TIPE KAMAR -->

<div id="modalTipe" class="modal">
    <div class="modal-content">
        <h3>Tambah Tipe Kamar</h3>

        <form
            class="modal-form"
            method="POST"
            action="{{ route('tipe-kamar.store') }}"
            enctype="multipart/form-data"
        >
            @csrf

            <input
                type="text"
                name="nama_tipe"
                placeholder="Nama Tipe">

            <input
                type="number"
                name="harga_per_malam"
                placeholder="Harga per malam">

            <input
                type="file"
                name="gambar"
                accept="image/*">

            <textarea
                name="fasilitas"
                placeholder="Fasilitas"></textarea>

            <textarea
                name="deskripsi"
                placeholder="Deskripsi"></textarea>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-close"
                    onclick="closeModal('modalTipe')">
                    Batal
                </button>

                <button
                    type="submit"
                    class="btn-room">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL KAMAR -->

<div id="modalKamar" class="modal">
    <div class="modal-content">
        <h3>Tambah Kamar</h3>

        <form
            class="modal-form"
            method="POST"
            action="{{ route('kamar.store') }}">

            @csrf

            <input
                type="text"
                name="nomor_kamar"
                placeholder="Nomor Kamar">

            <select name="tipe_kamar_id">

                <option value="">
                    Pilih Tipe Kamar
                </option>

                @foreach($tipeKamars as $tipe)

                    <option value="{{ $tipe->id }}">
                        {{ $tipe->nama_tipe }}
                    </option>

                @endforeach

            </select>

            <select name="status">

                <option value="Tersedia">Tersedia</option>
                <option value="Dipakai">Dipakai</option>
                <option value="Cleaning">Cleaning</option>
                <option value="Maintenance">Maintenance</option>

            </select>

        <div class="modal-footer">

            <button
                type="button"
                class="btn-close"
                onclick="closeModal('modalKamar')">
                Batal
            </button>

            <button 
                type="submit"
                class="btn-room secondary">
                Simpan
            </button>
        </div>
    </form>
    </div>
</div>

<script>

function toggleRoom(id){

    let section = document.getElementById(id);

    section.classList.toggle('active');

}

function openModal(id){

    document
        .getElementById(id)
        .classList
        .add('active');

}

function closeModal(id){

    document
        .getElementById(id)
        .classList
        .remove('active');

}

</script>
@endsection
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
    table-layout:fixed;
}

.room-table th{
    background:#f1f5f9;
    color:#475569;
    padding:14px;
    font-weight:600;
    text-align:center;
}

.room-table td{
    padding:14px;
    text-align:center;
    vertical-align:middle;
}


/* header detail kamar */

.room-detail-header{
    display:grid;
    grid-template-columns:
        1fr
        1fr
        1fr
        1fr
        180px;

    background:#f8fafc;
    padding:14px;
    font-weight:600;
    color:#64748b;
    margin-bottom:5px;
}


/* isi detail kamar */

.room-detail-row{
    display:grid;
    grid-template-columns:
        1fr
        1fr
        1fr
        1fr
        180px;

    align-items:center;
    padding:14px;
    border-bottom:1px solid #eee;

}


.room-detail-row:last-child{
    border-bottom:none;
}


.room-detail-action{
    display:flex;
    justify-content:center;
    gap:8px;

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
        <h3>{{ __('messages.room_data') }}</h3>

        <div class="room-actions">
            <button class="btn-room"
                    onclick="openModal('modalTipe')">
                {{ __('messages.add_room_type') }}
            </button>

            <button class="btn-room secondary"
                    onclick="openModal('modalKamar')">
                {{ __('messages.add_room') }}
            </button>
        </div>
    </div>

    <!-- TAMBAHKAN DI SINI -->
    <div class="room-guide">
        <div>{{ __('messages.room_type') }}</div>
        <div>{{ __('messages.price_night') }}</div>
        <div>{{ __('messages.room_occupied') }}</div>
        <div>{{ __('messages.room_available') }}</div>
        <div>{{ __('messages.action') }}</div>
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
                    {{ __('messages.delete') }}
                </button>

            </form>

        </div>

    </div>

    <div class="room-list" id="room{{ $tipe->id }}">


    <div class="room-detail-header">

        <div>
            {{ __('messages.room_number') }}
        </div>

        <div>
            {{ __('messages.status') }}
        </div>

        <div>
            
        </div>

        <div>

        </div>

        <div>
            {{ __('messages.action') }}
        </div>

    </div>



    @forelse($tipe->kamars as $kamar)


    <div class="room-detail-row">


        <div>
            <strong>
                {{ $kamar->nomor_kamar }}
            </strong>
        </div>


        <div>

            @if($kamar->status == 'Tersedia')

                <span class="status tersedia">
                    {{ __('messages.available') }}
                </span>


            @elseif($kamar->status == 'Dipakai')

                <span class="status dipakai">
                    {{ __('messages.occupied') }}
                </span>


            @elseif($kamar->status == 'Cleaning')

                <span class="status cleaning">
                    {{ __('messages.cleaning') }}
                </span>


            @elseif($kamar->status == 'Maintenance')

                <span class="status maintenance">
                    {{ __('messages.maintenance') }}
                </span>

            @endif

        </div>


        <div>
            
        </div>


        <div>

            @if($kamar->status == 'Dipakai')

                @php
                    $booking = $kamar->bookings()
                        ->where('status','confirmed')
                        ->latest()
                        ->first();
                @endphp





            @else

                

            @endif

        </div>



        <div class="room-detail-action">


            <button
                class="btn-edit"
                onclick="openModal('editKamar{{ $kamar->id }}')">

                Edit

            </button>



            <form
                action="{{ route('kamar.destroy',$kamar->id) }}"
                method="POST">


                @csrf
                @method('DELETE')


                <button
                    class="btn-delete"
                    onclick="return confirm('Hapus kamar ini?')">

                    {{ __('messages.delete') }}

                </button>


            </form>



            @if($kamar->status == 'Cleaning')


            <form
                action="{{ route('kamar.cleaning',$kamar->id) }}"
                method="POST">

                @csrf
                @method('PUT')


                <button
                    class="btn-edit"
                    style="background:#06b6d4">

                    {{ __('messages.clean_done') }}

                </button>


            </form>


            @endif


        </div>



    </div>


    @empty


    <p style="text-align:center;padding:20px">
        {{ __('messages.no_rooms') }}
    </p>


    @endforelse


    </div>
</div>
@endforeach

@foreach($tipeKamars as $tipe)

<div id="editModal{{ $tipe->id }}" class="modal">
    <div class="modal-content">
        <h3>{{ __('messages.edit_room_type') }}r</h3>

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
                    {{ __('messages.cancel') }}
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
            <h3>{{ __('messages.edit_room') }}</h3>
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
                        {{ __('messages.available') }}
                    </option>

                    <option value="Dipakai"
                        {{ $kamar->status == 'Dipakai' ? 'selected' : '' }}>
                        {{ __('messages.occupied') }}
                    </option>

                    <option value="Cleaning"
                        {{ $kamar->status == 'Cleaning' ? 'selected' : '' }}>
                        {{ __('messages.cleaning') }}
                    </option>

                    <option value="Maintenance"
                        {{ $kamar->status == 'Maintenance' ? 'selected' : '' }}>
                        {{ __('messages.maintenance') }}
                    </option>

                </select>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn-close"
                        onclick="closeModal('editKamar{{ $kamar->id }}')"
                    >
                        {{ __('messages.cancel') }}
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
        <h3>{{ __('messages.add_room_type') }}</h3>

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
                    {{ __('messages.cancel') }}
                </button>

                <button
                    type="submit"
                    class="btn-room">
                    {{ __('messages.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL KAMAR -->

<div id="modalKamar" class="modal">
    <div class="modal-content">
        <h3>{{ __('messages.add_room') }}</h3>

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
                    {{ __('messages.select_room_type') }}
                </option>

                @foreach($tipeKamars as $tipe)

                    <option value="{{ $tipe->id }}">
                        {{ $tipe->nama_tipe }}
                    </option>

                @endforeach

            </select>

            <select name="status">

                <option value="Tersedia">{{ __('messages.available') }}</option>
                <option value="Dipakai">{{ __('messages.occupied') }}</option>
                <option value="Cleaning">{{ __('messages.cleaning') }}</option>
                <option value="Maintenance">{{ __('messages.maintenance') }}</option>

            </select>

        <div class="modal-footer">

            <button
                type="button"
                class="btn-close"
                onclick="closeModal('modalKamar')">
                {{ __('messages.cancel') }}
            </button>

            <button 
                type="submit"
                class="btn-room secondary">
                {{ __('messages.save') }}
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
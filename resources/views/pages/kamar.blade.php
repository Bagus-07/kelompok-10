@extends('layouts.admin')

@section('title', 'Data Kamar')

@section('content')

<style>

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

.status-available{
    color:green;
    font-weight:600;
}

.status-used{
    color:red;
    font-weight:600;
}

</style>

<div class="room-container">

    <div class="room-header">

        <h3>Data Kamar</h3>

        <div class="room-actions">

            <button class="btn-room">
                Tambah Tipe Kamar
            </button>

            <button class="btn-room secondary">
                Tambah Kamar
            </button>

        </div>

    </div>

    {{-- STANDARD --}}
    <div class="room-type">

        <div class="room-type-header">

            <div class="dropdown-btn"
                 onclick="toggleRoom('standard')">
                 ▼
            </div>

            <div>Standard</div>

            <div>Rp 200.000</div>

            <div>1</div>

            <div>1</div>

            <div class="action-buttons">

                <button class="btn-edit">
                    Edit
                </button>

                <button class="btn-delete">
                    Hapus
                </button>

            </div>

        </div>

        <div id="standard" class="room-details active">

            <table class="room-table">

                <thead>
                    <tr>
                        <th>No Kamar</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Tersedia</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>101</td>
                        <td>31/05/2026 12:00</td>
                        <td>01/06/2026 08:00</td>
                        <td>01/06/2026 11:00</td>

                        <td>
                            <span class="status-used">
                                Dipakai
                            </span>
                        </td>

                        <td>

                            <button class="btn-edit">
                                Edit
                            </button>

                            <button class="btn-delete">
                                Hapus
                            </button>

                        </td>

                    </tr>

                    <tr>

                        <td>102</td>
                        <td>31/05/2026 12:00</td>
                        <td>31/05/2026 12:00</td>
                        <td>28/05/2026 12:00</td>

                        <td>
                            <span class="status-available">
                                Tersedia
                            </span>
                        </td>

                        <td>

                            <button class="btn-edit">
                                Edit
                            </button>

                            <button class="btn-delete">
                                Hapus
                            </button>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    {{-- SUPERIOR --}}
    <div class="room-type">

        <div class="room-type-header">

            <div class="dropdown-btn"
                 onclick="toggleRoom('superior')">
                 ▶
            </div>

            <div>Superior</div>

            <div>Rp 350.000</div>

            <div>1</div>

            <div>1</div>

            <div class="action-buttons">

                <button class="btn-edit">
                    Edit
                </button>

                <button class="btn-delete">
                    Hapus
                </button>

            </div>

        </div>

        <div id="superior" class="room-details">

            <p>Data kamar superior...</p>

        </div>

    </div>

    {{-- DELUXE --}}
    <div class="room-type">

        <div class="room-type-header">

            <div class="dropdown-btn"
                 onclick="toggleRoom('deluxe')">
                 ▶
            </div>

            <div>Deluxe</div>

            <div>Rp 500.000</div>

            <div>1</div>

            <div>1</div>

            <div class="action-buttons">

                <button class="btn-edit">
                    Edit
                </button>

                <button class="btn-delete">
                    Hapus
                </button>

            </div>

        </div>

        <div id="deluxe" class="room-details">

            <p>Data kamar deluxe...</p>

        </div>

    </div>

</div>

<script>

function toggleRoom(id){

    let section = document.getElementById(id);

    section.classList.toggle('active');

}

</script>

@endsection
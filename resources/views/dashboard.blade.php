@forelse($bookingTerbaru as $booking)

<tr>

    <td>
        {{ $booking->nama }}
    </td>

    <td>
        {{ $booking->room_name ?? $booking->kamar }}
    </td>

    <td>
        {{ $booking->tanggal 
            ? \Carbon\Carbon::parse($booking->tanggal)->format('d M Y') 
            : '-' 
        }}
    </td>

    <td>

        @if($booking->status == 'confirmed')

            <span class="status confirmed">
                Confirmed
            </span>

        @elseif($booking->status == 'pending')

            <span class="status pending">
                Pending
            </span>

        @else

            <span class="status">
                {{ $booking->status }}
            </span>

        @endif

    </td>

</tr>

@empty

<tr>
    <td colspan="4" style="text-align:center">
        Belum ada booking
    </td>
</tr>

@endforelse
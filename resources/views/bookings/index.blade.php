<x-guest-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Your Bookings</h1>

        @if ($bookings->isEmpty())
            <p class="text-gray-600">You have no bookings yet.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">Event Name</th>
                            <th class="py-2 px-4 border-b text-left">Date</th>
                            <th class="py-2 px-4 border-b text-left">Time</th>
                            <th class="py-2 px-4 border-b text-left">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $booking->event->name }}</td>
                                <td class="py-2 px-4 border-b">{{ date('F j, Y',strtotime($booking->booking_date)) }}</td>
                                <td class="py-2 px-4 border-b">{{ date('g:i A',strtotime($booking->booking_time)) }}</td>
                                <td class="py-2 px-4 border-b">{{ $booking->attendee_email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-guest-layout>

<x-guest-layout>
    <h1>Book {{ $event->name }}</h1>

    <form action="{{ route('bookings.store', $event->id) }}" method="POST">
        @csrf
        <label for="booking_date">Date:</label>
        <input type="date" name="booking_date" id="booking_date" required>

        <label for="booking_time">Time:</label>
        <input type="time" name="booking_time" id="booking_time" required>

        <label for="attendee_name">Name:</label>
        <input type="text" name="attendee_name" id="attendee_name" required>

        <label for="attendee_email">Email:</label>
        <input type="email" name="attendee_email" id="attendee_email" required>

        <button type="submit">Confirm Booking</button>
    </form>
</x-guest-layout>

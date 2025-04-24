<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Dashboard</h2>
    @if (auth()->user()->hasRole('staf'))
        <p class="text-gray-600 mb-4">Selamat datang, {{ auth()->user()->name }}! Silakan kelola log harian Anda.</p>
        <a href="{{ route('logs') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md">Kelola Log Harian</a>
    @else
        <p class="text-gray-600 mb-4">Selamat datang, {{ auth()->user()->name }}! Berikut adalah log harian bawahan yang perlu diverifikasi.</p>
        <div id="calendar" class="mb-6"></div>
        <a href="{{ route('verify-logs') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md">Verifikasi Log</a>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: @json($events),
        eventClick: function(info) {
            alert('Log: ' + info.event.title + '\nDeskripsi: ' + info.event.extendedProps.description);
        }
    });
    calendar.render();
});
</script>
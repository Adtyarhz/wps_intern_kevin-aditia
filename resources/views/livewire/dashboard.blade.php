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
    if (calendarEl) {
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            initialDate: '{{ now()->format('Y-m-d') }}', // Fokus pada hari ini
            events: @json($events),
            eventClick: function(info) {
                if (info.event.url) {
                    window.location.href = info.event.url; // Redirect ke halaman verifikasi
                    info.jsEvent.preventDefault(); // Cegah perilaku default
                }
            },
            eventDidMount: function(info) {
                info.el.style.borderColor = '#2563eb'; // Border biru untuk semua event
                info.el.style.cursor = 'pointer'; // Kursor menunjukkan klik
            },
            dayMaxEvents: true, // Batasi jumlah event per hari
            eventDisplay: 'block', // Tampilan event sebagai blok
        });
        calendar.render();
    }
});
</script>
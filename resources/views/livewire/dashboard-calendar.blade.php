<div>
    <h2 class="text-xl font-bold mb-4">Kalender Log Harian</h2>

    <div id='calendar'></div>

    @push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($events),
                eventColor: '#2563eb',
                eventClick: function(info) {
                    alert('Log oleh: ' + info.event.title + '\nTanggal: ' + info.event.startStr + '\nStatus: ' + info.event.extendedProps.status);
                }
            });
            calendar.render();
        });
    </script>
    @endpush
</div>

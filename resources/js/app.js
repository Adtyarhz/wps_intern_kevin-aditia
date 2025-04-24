import './bootstrap';

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    if (calendarEl) {
        var events = JSON.parse(calendarEl.dataset.events || '[]');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            initialDate: new Date().toISOString().split('T')[0], // Fokus pada hari ini
            events: events,
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
import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';

window.Alpine = Alpine;
window.FullCalendar = Calendar;
window.dayGridPlugin = dayGridPlugin;

Alpine.plugin(focus);

Alpine.start();

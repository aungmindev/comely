import './bootstrap';
import Alpine from 'alpinejs';
global.$ = global.jQuery = require('jquery');
window.Alpine = Alpine;
Alpine.start();
import csvUploader from './components/csvUploader.vue'
import dashboardView from './components/dashboardView.vue'
import calendarSetting from './components/calendarSetting.vue'
import calendarView from './components/calendarView.vue'
import parliamentSession from './components/parliamentSession.vue'
import Swal from 'sweetalert2'
import Toast from 'sweetalert2'
import VCalendar from 'v-calendar';
import 'v-calendar/dist/style.css';
window.Swal = Swal;
window.Toast = Toast;
import { createApp } from 'vue'

const app = createApp({
    components : {
        'csv-uploader'       : csvUploader,
        'dashboard-view'     : dashboardView,
        'calendar-setting'           : calendarSetting,
        'calendar-view'           : calendarView,
        'parliament-session'           : parliamentSession,
    }
})
app.use(VCalendar)
app.mount('#app')


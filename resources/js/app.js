import './bootstrap';
import Alpine from 'alpinejs';
global.$ = global.jQuery = require('jquery');
window.Alpine = Alpine;
Alpine.start();
import csvUploader from './components/csvUploader.vue'
import dashboardView from './components/dashboardView.vue'
import colorView from './components/colorView.vue'
import imageUpload from './components/imageUpload.vue'
import manualCashier from './components/manualCashier.vue'
import imageUploadEdit from './components/imageUploadEdit.vue'
import priceCalculate from './components/priceCalculate.vue'
import calendarSetting from './components/calendarSetting.vue'
import calendarView from './components/calendarView.vue'
import parliamentSession from './components/parliamentSession.vue'
import lawView from './components/lawView.vue'
import qandpView from './components/qandpView.vue'
import reportView from './components/reportView.vue'
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
        'law-view'           : lawView,
        'qandp-view'           : qandpView,
        'report-view'           : reportView,
        'color-view'           : colorView,
        'price-calculate'           : priceCalculate,
        'image-upload'           : imageUpload,
        'image-upload-edit'           : imageUploadEdit,
        'manual-cashier'           : manualCashier,
    }
})
app.use(VCalendar)
app.mount('#app')


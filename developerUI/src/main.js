import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import PrimeVue from 'primevue/config';
import Dialog from 'primevue/dialog';
import Button from 'primevue/button';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup'; 
import Toolbar from 'primevue/toolbar';
import "primevue/resources/themes/saga-blue/theme.css";
import "primevue/resources/primevue.min.css";          
import "primeicons/primeicons.css";
import 'primeflex/primeflex.css';
import axios from 'axios';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.baseURL = 'http://localhost:8000/'

const app = createApp(App)
app.use(router)
app.use(PrimeVue)
app.component('Button', Button)
app.component('Dialog', Dialog)
app.component('DataTable', DataTable)
app.component('Column ', Column)
app.component('ColumnGroup', ColumnGroup)
app.component('Toolbar ', Toolbar)
app.mount("#app");

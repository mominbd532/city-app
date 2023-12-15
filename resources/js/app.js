import './bootstrap';
import 'admin-lte';

import {createApp} from 'vue'
import App from './App.vue';
import axios from 'axios'

axios.defaults.baseURL = 'http://127.0.0.1:8000/api/';

import CitySearch from './components/CitySearch.vue';

const app = createApp(App);
app.component('CitySearch', CitySearch);
app.mount('#app');
 


import './bootstrap';
import 'admin-lte';

import {createApp} from 'vue'
import App from './App.vue';

import CitySearch from './components/CitySearch.vue';

const app = createApp(App);
app.component('CitySearch', CitySearch);
app.mount('#app');
 


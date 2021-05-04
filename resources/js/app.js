import ElementUI from 'element-ui';
import 'element-ui/lib/theme-custom/index.css';
import VueAxios from 'vue-axios';
import axios from 'axios';

window.Vue = require('vue').default;

Vue.use(ElementUI);
Vue.use(VueAxios,axios);

Vue.component('properties-component', require('./components/PropertiesComponent.vue').default);
Vue.component('number-range-input', require('./components/partials/NumericRangeInput.vue').default);
const app = new Vue({
    el: '#app',
});

import './bootstrap';
import '../css/app.css';
import router from './router';
import { createApp } from 'vue/dist/vue.esm-bundler';
import SurveyView from "./views/SurveyView.vue";
import Navbar from  "./components/Navbar.vue";
createApp({
  components: {
    SurveyView,
    Navbar
    
  }  
}).use(router).mount("#app")
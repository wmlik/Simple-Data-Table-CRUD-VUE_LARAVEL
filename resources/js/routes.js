import { createRouter, createWebHashHistory } from 'vue-router'
import Home from "./Home";
import ListPatient from "./components/patient/ListPatient.vue";
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/patients/liste',
        name: 'Patients',
        component: ListPatient
    }

];
const router = createRouter({
    history: createWebHashHistory(),
    routes
})
export default router

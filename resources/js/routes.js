import { createRouter, createWebHashHistory } from 'vue-router'
import Home from "./Home";
import ListPatient from "./components/patient/ListPatient.vue";
import AddPatient from "./components/patient/AddPatient.vue";
import EditPatient from "./components/patient/EditPatient.vue";
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/patients/liste',
        name: 'patients',
        component: ListPatient
    },
    {
    path: '/patients/AddPatient',
        name: 'addPatient',
        component: AddPatient
    },
    {
        path: '/patients/editPatient',
        name: 'editPatient',
        component: EditPatient
    }

];
const router = createRouter({
    history: createWebHashHistory(),
    routes
})
export default router

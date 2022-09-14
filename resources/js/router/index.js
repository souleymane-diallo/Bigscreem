import { createRouter, createWebHistory, routerKey } from 'vue-router';
import LoginView from "../views/LoginView.vue";
import SurveyView from "../views/SurveyView.vue";
import AdminView from "../views/AdminView.vue";

const routes = [
    {
        path: "/login",
        name: "Connexion",
        component: LoginView
    },
    {
        path: "/",
        name: "Survey",
        component: SurveyView
    },
    {
        path: "/administration",
        name: "Admin",
        component: AdminView
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});
export default router;
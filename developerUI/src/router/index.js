import { createRouter, createWebHistory } from "vue-router";

import Register from "../Modules/auth/register/register.vue";
import Login from "../Modules/auth/login/login.vue";
import ForgotPassword from "../Modules/auth/forgotPassword/forgotPassword.vue";
import ResetPassword from "../Modules/auth/resetPassword/resetPassword.vue";
import DeveloperList from "../Modules/developers/developerList/developerList.vue";
const routes = [
  {
    path: "/register",
    name: "Register",
    component: Register,
  },
  {
    path: "/",
    name: "Login",
    component: Login,
  },
 
  {
    path: "/developerList",
    name: "DeveloperList",
    component:DeveloperList,
  },
  {
    path: "/forgotPassword",
    name: "ForgotPassword",
    component:ForgotPassword,
  },
  {
    path: "/resetPassword",
    name: "ResetPassword",
    component:ResetPassword,
  },
  
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;

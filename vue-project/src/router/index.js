import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/home",
      name: "home",
      component: HomeView,
    },
    {
      path: "/about",
      name: "about",
      component: () => import("../components/AboutSida.vue"),
    },
    {
      path: "/rules",
      name: "rules",
      component: () => import("../components/GameRules.vue"),
    },
    {
      path: "/",
      name: "login",
      component: () => import("../components/LoginPage3.vue"),
    },
    {
      path: "/profile",
      name: "profile",
      component: () => import("../components/ProfilPage.vue"),
    },
    {
      path: "/register",
      name: "register",
      component: () => import("../components/RegisterComp.vue"),
    },
    {
      path: "/games",
      name: "games",
      component: () => import("../components/GamePage.vue"),
    },
    {
      path: "/games/blackjack",
      name: "blackjack",
      component: () => import("../components/BlackJack.vue"),
    },
    {
      path: "/games/slot",
      name: "slot",
      component: () => import("../components/SlotMachine.vue"),
    },
    {
      path: "/login/guest",
      name: "GuestLogin",
      component: () => import("../components/GuestLogin.vue"),
    },
    {
      path: "/contact",
      name: "contact",
      component: () => import("../components/ContactComp.vue"),
    },
    {
      path: "/games/wheel",
      name: "wheel",
      component: () => import("../components/Wheel.vue"),
    },

    {},
  ],
});

export default router;

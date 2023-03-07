import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path: "/about",
      name: "about",
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import("../components/AboutSida.vue"),
    },
    {
      path: "/rules",
      name: "rules",
      component: () => import("../components/GameRules.vue"),
    },
    {
      path: "/login",
      name: "login",
      component: () => import("../components/LoginPage.vue"),
    }, // Lagt till en login - Robin
    {
      path: "/games",
      name: "games",
      component: () => import("../components/GamePage.vue"),
      /*children: [
              {
                path: "/blackjack",
                name: "blackjack",
                component: () => import("../components/BlackJack.vue"),
              },
            ],*/
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
      component: () => import("../views/ContactPage.vue"),
    },
    {
      path: "/wheel",
      name: "wheel",
      component: () => import("../views/WheelOfFortune.vue"),
    },

    {},
  ],
});

export default router;

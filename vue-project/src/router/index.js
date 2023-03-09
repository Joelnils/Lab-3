import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
//import express from 'express';
//import path from 'path';
//import authController from '../controllers/auth'

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
      component: () => import("../components/LoginPage3.vue"),
    },
    {
      path: "/profile",
      name: "profile",
      component: () => import("../components/ProfilPage.vue"),
    },
    {
      path: "/games",
      name: "games",
      component: () => import("../components/GamePage.vue"),
      children: [
        {
          path: "/blackjack",
          name: "blackjack",
          component: () => import("../components/BlackJack.vue"),
        },
      ],
    },
    {
      path: "/games/blackjack",
      name: "blackjack",
      component: () => import("../components/BlackJack.vue"),
    },
    {
      path: "/games/slot", //Denna path fungerar inte? 6/3
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
      path: "/register",
      name: "register",
      component: () => import("../components/RegisterComp.vue"),
    },

    {},
  ],
});

/*const routes = express.routes();

routes.get('*', authController.isLoggedIn, (req, res) => {
    res.sendFile(path.join(__dirname, '..', 'dist', 'index.html'));
  });

  module.exports = router; */ // ------- 6/3 NY

export default router;

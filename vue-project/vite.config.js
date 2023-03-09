import { fileURLToPath, URL } from "node:url";
//import { createVuePlugin } from 'vite-plugin-vue';
import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: {
      "@": fileURLToPath(new URL("./src", import.meta.url)),
    },
  },
});
/*  module.exports = { /* Kan tas bort
    plugins: [
      createVuePlugin()
    ],
    build: {
      outDir: './dist'
    }
  };
  */

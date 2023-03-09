/*import express from "express";
import mysql from "mysql";
//1- import dotenv from 'dotenv';
import path from "path";
import { dirname } from "path";
import { fileURLToPath } from "url";
//import authController from './controllers/auth'

// 2- dotenv.config ({ path: './.env'});

const app = express();
const db = mysql.createConnection({
  // 3- Connectar databasen
  host: "localhost" /* 4- Det är här man skriver in ip adressen till
    online server */ /*,/*
  /*user: "root",
  password: "",
  database: "loginmain", // 5- phpMyAdmin database namn
  /* Har heller inte gjort en .env fil eftersom det är
  ett skolprojekt där det inte riktigt krävs samma säkerhet
   */
/*});

/* 6- Dessa två behövs i ES module */
/*const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);
/* 7- Går att ta bort dessa */

/*app.use(express.static(path.join(__dirname, "dist"))); //Dist folder

// Serve the HTML file that contains your Vue app
app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "dist", "index.html"));
}); // Använder sendFile för att få projektet att fungera med Vue Vite
// Skickas till home sidan i dist foldern
app.get("/login", (req, res) => {
  res.sendFile(path.join(__dirname, "dist", "index.html"));
});
app.get("/register", (req, res) => {
  res.sendFile(path.join(__dirname, "dist", "index.html"));
});




const publicDirectory = path.join(__dirname, "./src");
console.log(__dirname); // 8. Skriver ut vart filen ligger
app.use(express.static(publicDirectory));
app.use(express.urlencoded({ extended: false})) // Behövs för register och är ny 6/3 - 23:17
app.use(express.json()); // 6/3 - 23:18



db.connect((error) => {
  if (error) {
    console.log(error);
  } else {
    console.log("MY SQL Connected!...");
  }
});

/*app.get("/", (req, res) => {
    //res.render('/src/components/LoginPage.vue')
  res.send("<h1>Home Page</h1>");
}); */

/*app.listen(5000, () => {
  console.log("Server started on Port 5000");
});*/

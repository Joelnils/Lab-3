<template>
    <div class="container">
      <ul class="nav">
        <li class="links">
          <a class="nav-link" href="#blackjack">Blackjack</a>
        </li>
        <li class="links">
          <a class="nav-link" href="#Slot">Slot</a>
        </li>
        <li class="links">
          <a class="nav-link" href="#Wheel">Lucky wheel</a>
        </li>
        <li class="links">
          <a class="nav-link" href="#Roulette">Roulette</a>
        </li>
        <li class="links">
          <a class="nav-link" href="#Baccarat">Baccarat</a>
        </li>
        <li class="links">
          <a class="nav-link" href="#tcp">Three Card Poker</a>
        </li>
      </ul>
    </div>
  </template>

  <style scoped>
.container{
  display: flex ;
  justify-content: flex-end;
  align-items: center;
}
@media only screen and (max-width: 1053px){
  .container{
    justify-content: space-evenly;
  }
}
  .nav {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 0;
  }

  .links {
    list-style-type: none;
    margin: 0 5px;
  }

  .nav-link {
    color: #ffffff;
    text-decoration: none;
    font-size: 0.875rem;
    line-height: 1.5;
    padding: 5px;
    border-radius: 5px;
  }

  .nav-link:hover {
    color: darkgrey;}
    @media (max-width: 800px) {
  .container {
    top: auto;
    bottom: 0;
    left: 0;
    right: 0;
    transform: none;
    text-align: center;
  }

  .links {
    display: inline-block;
    margin: 5px;
  }
}

  </style>

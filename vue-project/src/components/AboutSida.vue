<template>
  <div class="container_top">
    <div>
      <h1>About Us</h1>
    </div>
    <div class="scroll">
      <bounce class="scroll-text">Scroll</bounce>
    </div>
  </div>
  <div class="container_bottom">
    <div class="container_bottom_content container_bottom_text">
      <!-- Text här i -->
      <p>
        Welcome to our online casino, where you can enjoy a wide range of
        exciting games from the comfort of your own home. We are dedicated to
        providing a safe and secure gaming environment. And our site is fully
        licensed and regulated to ensure fairness and transparency.<br /><br />
        Our casino offers a diverse selection of games, including classic table
        games like blackjack, roulette, and baccarat, as well as a variety of
        popular slot machines and video poker games. We also offer live dealer
        games, where you can play in real time with a professional dealer and
        other players from around the world.<br /><br />
        At our casino, we take responsible gambling seriously and offer a range
        of tools and resources to help our player stay in control of their
        gaming habits. We also provide support and assistance to anyone who may
        be experiencing problems with gambling.<br /><br />
        Our site is user-friendly and easy to navigate, with a responsive design
        that allows you to play on any device, whether it's a desktop computer,
        laptop, tablet or smartphone. We offer a range of payment options to
        make deposits and withdrawals quick and easy, and our support team is
        available 24/7 to assist you with any questions or issues you have
        have.<br /><br />
        We are committed to providing a fun and enjoyable gaming experience for
        all of our players, and we strive to create a welcoming and inclusive
        community where everyone can feel comfortable and valued. Thank you for
        choosing our online casino, and we look forward to providing you with
        the best possible gaming experience.
      </p>
    </div>
  </div>
</template>
<script>
export default {
  name: "AboutSida",
};
</script>

<style scoped>
h2 {
  color: #ffffff;
}

hr.solid {
  border-top: 3px solid #ffffff;
}

div p {
  color: #ffffff;
}

.container_top {
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.container_top h1 {
  color: #fff;
  font-family: "Times New Roman", Times, serif;
  font-size: 40px;
}

.container_bottom {
  background-color: #000000;
  display: flex;
  overflow: hidden;
}

.container_bottom_content {
  display: flex;
  flex-direction: column;
  padding: 2rem;
  margin-left: 15%;
  margin-right: 15%;
}

.container_bottom_text {
  color: #ffffff;
  font-size: 0.975rem;
  line-height: 1.5;
  margin-bottom: 0.15rem;
}

/* Scroll Animation */
.scroll {
  background: 0 0;
  border-width: 0;
  padding: 0;
  width: 0;
  position: absolute;
  right: 1.5rem;
  bottom: 0;
  z-index: 10;
  animation: scrollAnimation 2s ease-in-out infinite alternate;
}

.scroll::before {
  content: '';
  display: block;
  height: 80px;
  width: 24px;
  position: absolute;
  bottom: 0;
  left: calc(50% - 12px);
  z-index: 10;
}

.scroll-text {
  letter-spacing: .2rem;
  text-transform: uppercase;
  color: #f7f7f7;
  text-decoration: none;
  display: block;
  text-shadow: 0 0 1px rgb(0 0 0 / 30%), 0 1px 2px rgb(0 0 0 / 20%), 0 2px 4px rgb(0 0 0 / 10%);
  transform: translateX(50%)rotate(-90deg);
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.scroll::after {
  background-color: #fff;
  content: '';
  display: block;
  height: 1.5rem;
  margin-left: -1px;
  transform-origin: 50% 100%;
  width: 2px;
}

@keyframes scrollAnimation {

  0%,
  100% {
    transform: translateY(0px);
  }

  50% {
    transform: translateY(20px);
  }
}
</style>

<template>
  <div>
    <div class="wrapp">
      <div class="content-box">
        <!-- Text här i -->

        <h1 class="title">About Us</h1>

        <p class="text">
          Welcome to our online casino, where you can enjoy a wide range of
          exciting games from the comfort of your own home. We are dedicated to
          providing a safe and secure gaming environment. And our site is fully
          licensed and regulated to ensure fairness and transparency.<br />
          Our casino offers a diverse selection of games, including classic
          table games like blackjack, roulette, and baccarat, as well as a
          variety of popular slot machines and video poker games. We also offer
          live dealer games, where you can play in real time with a professional
          dealer and other players from around the world.<br />
          At our casino, we take responsible gambling seriously and offer a
          range of tools and resources to help our player stay in control of
          their gaming habits. We also provide support and assistance to anyone
          who may be experiencing problems with gambling.<br />
          Our site is user-friendly and easy to navigate, with a responsive
          design that allows you to play on any device, whether it's a desktop
          computer, laptop, tablet or smartphone. We offer a range of payment
          options to make deposits and withdrawals quick and easy, and our
          support team is available 24/7 to assist you with any questions or
          issues you have have.<br />
          We are committed to providing a fun and enjoyable gaming experience
          for all of our players, and we strive to create a welcoming and
          inclusive community where everyone can feel comfortable and valued.
          Thank you for choosing our online casino, and we look forward to
          providing you with the best possible gaming experience.
        </p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "AboutSida",
};
</script>

<style scoped>
.wrapp {
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.content-box {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  flex-direction: column; /* add this line */
  padding: 20px;
  height: 80%;
  width: 60%;
  background-image: linear-gradient(
      to bottom,
      rgba(0, 0, 0, 0.5) 0%,
      rgba(0, 0, 0, 0.8) 100%
    ),
    url("https://images.unsplash.com/photo-1517232115160-ff93364542dd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1073&q=80");
  background-size: cover;
  border-radius: 3%;
  z-index: 1;
  overflow: auto;
}
.text {
  font-family: "Times New Roman";
  font-size: 22px;
  line-height: 35px;
  color: white;
  justify-content: center;
  text-align: center;
  padding-top: 30px;
}
.title {
  position: absolute;
  top: 15%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-family: "Times New Roman";
  font-weight: 400;
  font-size: 40px;
  line-height: 20px;
  color: white;
  margin: 0;
}
@media (max-width: 1209px) {
  .content-box {
    display: flex;
    flex-direction: column;
  }

  .text {
    font-size: 14px;
    line-height: 35px;
    color: white;
    justify-content: center;
    text-align: center;

    padding-top: 30px;
  }
}
.content-box {
  z-index: 0;
}
</style>

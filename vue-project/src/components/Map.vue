<template>
  <div class="skit">
    <div class="box">
      <div class="title">
        <h1>Directions via Google Maps</h1>
      </div>
      <div class="google-map">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25786.213877016646!2d-115.1743820156134!3d36.11111522465166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c8c43c44cae095%3A0x77c9c8f2a2af3ff7!2sCaesars%20Palace!5e0!3m2!1ssv!2sse!4v1677528422782!5m2!1ssv!2sse"
        width="1000"
        height="450"
        style="border: 0"
        allowfullscreen
        class="iframe"
      ></iframe>
    </div>
    </div>
  </div>
</template>

<script></script>

<style scoped>
* {
  margin: 0;
}
.box {
  display: flex;
  flex-direction: column;
  justify-content: center;
  height: 70vh;
  align-items: center;
  background-color: #02070c;
  color: white;
  gap: 40px;
}
.title {
  border-bottom: 2px solid white;
  width: 100%;
  text-align: center;
}
h3 {
  margin: 0;
}


</style>

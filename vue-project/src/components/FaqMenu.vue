<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
const qs = ref([]);

const getItems = () => {
  return axios
    .get("faq.json")
    .then((res) => (qs.value = res.data))
    .catch((error) => console.log(error));
};
console.log(qs);
onMounted(() => {
  getItems();
});
</script>

<template>
  <div class="main-thing">
    <div class="faq">
      <h1>FAQ</h1>
    </div>
    <div v-for="q in qs" :key="q.id" class="box">
      <h3>{{ q.title }}</h3>
      <p>{{ q.info }}</p>
    </div>
  </div>
</template>
<style scoped>
.main-thing {
  background-color: rgba(0, 0, 0, 0.9);
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  flex-direction: column;
  padding: 40px;
}
.box {
  color: white;
  max-width: 1200px;
  padding: 40px;
}
.faq {
  width: 100%;
  border-bottom: 2px solid white;
  text-align: center;
}
h1 {
  margin: 0;
}
</style>

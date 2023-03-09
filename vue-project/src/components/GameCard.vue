<script setup></script>

<script>
export default {
  data() {
    return {
      cardTitel: "Blackjack",
    };
  },
};
</script>

<style scoped>
.col-md-4,
.col-md-8 {
  background-color: #191c21;
}

.card {
  border: none;
}

.card-body {
  padding-top: 3rem;
  font-family: "Times New Roman", Times, serif;
  color: white;
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #191c21;
}

.card-link {
  color: rgb(100, 100, 100);
  text-decoration: none;
  font-size: 0.8em;
}

.card_button {
  margin-top: 3rem;
  width: 10rem;
  height: 2.5rem;
  background: #a25c1d;
  border: 1px solid #9c9c9c;
  border-radius: 10px;
}
</style>

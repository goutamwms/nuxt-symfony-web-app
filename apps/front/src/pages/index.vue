<template>
  <!--<div>
    Welcome to the homepage Lorem ipsum dolor sit amet, consectetur adipiscing
    elit. Ut a metus tortor. Integer mattis non odio et scelerisque. Nulla
    facilisi. Nam consequat aliquam neque, vitae sodales sem varius sit amet.
  </div>-->
  
  <div class="p-d-flex p-flex-row p-gap-4">
    <!-- Card 1: Score -->
    <div class="p-card card-container">
      <div class="p-d-flex p-ai-center p-jc-between">
        <div>
          <h3 class="card-title">Score</h3>
          <p class="card-value">{{ score }}</p>
        </div>
        <i class="pi pi-chart-line card-icon"></i>
      </div>
    </div>

    <!-- Card 2: Pending Transactions -->
    <div class="p-card card-container mt-2">
      <div class="p-d-flex p-ai-center p-jc-between">
        <div>
          <h3 class="card-title">Pending Transactions</h3>
          <p class="card-value">{{ pending_transaction }}</p>
        </div>
        <i class="pi pi-clock card-icon"></i>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
import useAuthUser from "~/store/auth";
const {me} = useAuthUser();

const score = computed(() => me?.score || 0);
const pending_transaction = computed(() => me?.pending_transaction || 0);

logger.info("index.vue");
</script>

<style scoped lang="scss">
.card-container {
  width: 100%; 
  max-width: 400px; 
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  background-color: #ffffff;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card-container:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.card-title {
  font-size: 1.2rem;
  font-weight: bold;
  color: #333333;
  margin: 0;
}

.card-value {
  font-size: 1.5rem;
  font-weight: 600;
  color: #007ad9; 
  margin: 5px 0 0;
}

.card-icon {
  font-size: 2rem;
  color: #007ad9; 
}
</style>

<template>
    <div class="p-d-flex p-ai-center p-jc-center loading-container mb-3 py py-3">
      <div class="spinner">
        <i class="pi pi-spin pi-spinner"></i>
      </div>
      <span class="loading-text pb-2">{{ displayText }}</span>
    </div>
</template>

<script setup lang="ts">

interface Props {
  isLoading: boolean;
  displayText: string
}

const props = defineProps<Props>();

</script>
<style scoped lang="scss"></style>
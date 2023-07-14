<script setup>
import { ref, defineProps } from 'vue';

const props = defineProps({
  slidesax: Array
});

const currentSlide = ref(0);

const nextSlide = () => {
  currentSlide.value = (currentSlide.value + 1) % props.slidesax.length;
};

const prevSlide = () => {
  currentSlide.value = (currentSlide.value - 1 + props.slidesax.length) % props.slidesax.length;
};
</script>

<template>
    <div class="carousel-container">
        <div class="carousel">
          <div
            v-for="(slide, index) in props.slidesax"
            :key="index"
            class="carousel-item"
            :class="{ 'active': index === currentSlide }"
          >
            {{ slide }}
          </div>
        </div>
        <div class="carousel-controls">
          <button class="carousel-control" @click="prevSlide">
            Prev
          </button>
          <button class="carousel-control" @click="nextSlide">
            Next
          </button>
        </div>
      </div>
</template>

<style>
.carousel-container {
  position: relative;
  width: 100%;
  height: 300px;
}

.carousel {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

.carousel-item {
  display: none;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  background-color: #e2e8f0;
  font-size: 24px;
}

.carousel-item.active {
  display: flex;
}

.carousel-controls {
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%);
}

.carousel-control {
  margin: 0 5px;
  padding: 5px 10px;
  background-color: #e2e8f0;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
}
</style>
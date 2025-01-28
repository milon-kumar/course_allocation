<script setup>
import { ref } from 'vue'

const counter = ref(0)
</script>

<template>
    <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque doloribus fugit iste libero molestias quaerat! Atque commodi corporis dolor eligendi et ex fugiat ipsum, natus non optio praesentium, quidem?</h1>
    <button
        type="button"
        @click="counter++"
        class="p-2 text-white bg-gray-500 rounded"
    >
        Counter is: {{ counter }}
    </button>
</template>

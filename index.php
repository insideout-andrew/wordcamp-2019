<?php
/**
 * Step 5: User Driven Data
 */
?>

<div id="app">
  <p>{{ message }}</p>
  <input type="text" v-model="message">
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script>
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello WordCamp'
  }
})
</script>
<?php
/**
 * Step 1: Getting started with Vue
 */
?>

<div id="app">
  {{ message }}
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script>
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello WordCamp!'
  }
})
</script>
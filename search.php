<?php
/**
 * Step 2: Vue Loops
 */
?>

<div id="app">
  <ol>
    <li v-for="movie in movies">
      {{ movie.title }}
    </li>
  </ol>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script>
var app = new Vue({
  el: '#app',
  data: {
    movies: [
      { title: 'Chappie' },
      { title: 'Lord of the Rings' },
      { title: 'When Kittens Attack' },
    ]
  }
})
</script>
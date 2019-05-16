<?php
/**
 * Step 3: Vue Conditionals
 */
?>

<div id="app">
  <ol v-if="show">
    <li v-for="movie in movies" v-if="movie.title">
      {{ movie.title }}
    </li>
  </ol>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script>
var app = new Vue({
  el: '#app',
  data: {
    show: true,
    movies: [
      { title: 'Chappie' },
      { title: 'Lord of the Rings' },
      { title: 'When Kittens Attack' },
      { description: 'A young boy becomes trained in the righteous ways of the Force in order to rescue the captured Princess from the evil Empire' }
    ]
  }
})
</script>
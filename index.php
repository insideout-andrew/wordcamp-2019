<?php
/**
 * Step 4: User Actions
 */
?>

<div id="app">
  <ol>
    <li v-for="movie in movies">
      {{ movie.title }}
    </li>
  </ol>
  <button @click="reverse">Reverse</button>
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
      { title: 'When Kittens Attack' }
    ]
  },
  methods: {
    reverse(){
      this.movies.reverse()
    }
  }
})
</script>
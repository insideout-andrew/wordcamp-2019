<?php
/**
 * Step 6: Putting it All Together
 */
?>

<div id="app">
  <ol>
    <li v-for="movie in movies" v-if="movie.title && movie.description">
      <h6>{{ movie.title }}</h6>
    </li>
  </ol>
  <input type="text" v-model="title">
  <input type="text" v-model="description">
  <button @click="addMovie">Add Movie</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script>
var app = new Vue({
  el: '#app',
  data: {
    movies: [
      { 
        title: 'Chappie', 
        description: 'When a police droid, Chappie, is stolen and given new programming, he becomes the first robot with the ability to think and feel for himself.' 
      },
      {
        title: ''
      }
    ]
  }
})
</script>
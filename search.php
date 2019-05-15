<?php
/**
 * Step 6: Putting it All Together
 */
?>

<div id="app">
  <ol>
    <li v-for="movie in movies" v-if="movie.title || movie.description">
      <h2 v-if="movie.title">
        {{ movie.title }}
      </h2>
      <p v-if="movie.description">
        {{ movie.description }}
      </p>
    </li>
  </ol>
  <input type="text" v-model="title" placeholder="Movie Title">
  <br>
  <textarea v-model="description" placeholder="Movie Description"></textarea>
  <br>
  <button @click="addMovie">Add Movie</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script>
var app = new Vue({
  el: '#app',
  data: {
    title: '',
    description: '',
    movies: [
      { 
        title: 'Chappie', 
        description: 'When a police droid, Chappie, is stolen and given new programming, he becomes the first robot with the ability to think and feel for himself.' 
      },
      {
        title: 'Lord of the Rings',
        description: 'Peoples of Middle-earth, such as Men, Elves, Dwarves, and Hobbits, must overcome the dark power of Sauron by destroying the Ring that gives him power.'
      },
      {
        title: 'When Kittens Attack',
        description: 'Litterally just cute kittens pouncing on things.'
      },
      {
        title: 'Star Wars: Episode V',
        description: 'Talking frog convinces a boy to kill his dad'
      }
    ]
  },
  methods: {
    addMovie(){
      if(this.title || this.description){
        this.movies.push({ title: this.title, description: this.description })
        this.title = ''
        this.description = ''
      }
    }
  }
})
</script>
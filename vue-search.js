;(function($){
  function init(){
    new Vue({
      //what element are we attaching the vue app to?
      el: '#app',

      //this is the data the vue app utilizes
      data: {
        //user data
        search   : '',
        category : '',

        //app data
        loading  : true,
        page     : 1,
        maxPages : 1,
        results  : []
      },

      //functions that the app can run
      methods: {
        //go to a specific page of results
        goToPage(page){
          this.page = page
          this.getResults()
        },

        //when a user clicks search or changes the category, reset the page to 1 and get the results
        submitSearch(event){
          //prevent the form from submitting
          event.preventDefault()
          //when text/category is changing, we need to reset to page 1 
          this.page = 1
          this.getResults()
        },
        
        //get the results of a search
        getResults(){
          this.loading = true

          $.ajax({
            url: adminAjax, //localized variable
            data: {
              action   : 'ajax_search',
              page     : this.page,
              search   : this.search,
              category : this.category
            },
            complete: payload => {
              this.loading  = false
              this.maxPages = payload.responseJSON.data.maxPages
              this.results  = payload.responseJSON.data.results
            }
          })
        }        
      },

      //run this function when the app is mounted on the el
      mounted(){
        this.getResults()
      }
    })
  }

  $(document).ready(init)
})(jQuery)
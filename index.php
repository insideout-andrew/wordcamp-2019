<?php
/**
 * Wordpress Search Results powered by Vue
 */

get_header();
?>
  <section id="primary" class="content-area">
    <main id="app" class="site-main">

      <div class="wrapper">

        <!-- Form for user entered data -->
        <form>
          <label>
            <div>Category:</div>
            <select v-model="category" @change="submitSearch">
              <option value="">All Categories</option>
              <?php foreach(get_categories() as $category): ?>
                <option value="<?php echo $category->term_id; ?>">
                  <?php echo $category->name; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </label>
          <label>
            <div>Search:</div>
            <input type="text" v-model="search" placeholder="Search...">
          </label>          
          <input type="submit" value="Search" @click="submitSearch">          
        </form>

        <!-- search results here -->
        <ul v-if="results.length">
          <li v-for="result in results">
            <h3>{{ result.post_title }}</h3>
            <div class="post-image" v-if="result.thumbnail">
              <img :src="result.thumbnail">
            </div>
            <div class="post-meta">
              <p v-if="result.category">
                <?php echo twentynineteen_get_icon_svg( 'archive', 16 ); ?> 
                {{ result.category }}
              </p>
              <p>
                <?php echo twentynineteen_get_icon_svg( 'watch', 16 ); ?> 
                {{ result.post_date }}
              </p>
            </div>
            <p>{{ result.excerpt }}</p>
            <a :href="result.permalink">Read More</a>
          </li>
        </ul>
        
        <h3 v-else>No results found.</h3>

        <!-- pagination -->
        <nav v-if="maxPages > 1">
          <a 
            href="#app" 
            v-for="index in maxPages" 
            @click="goToPage(index)" 
            :class="page == index ? 'active' : ''"
          >
            {{ index }}
          </a>
        </nav>

        <div class="loading" v-if="loading"></div>
      </div>


    </main><!-- #main -->
  </section><!-- #primary -->
<?php
get_footer();
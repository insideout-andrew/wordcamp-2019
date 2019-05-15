<?php
/**
 * Step 7: WordPress HTML
 */

get_header();
?>
  <section id="primary" class="content-area">
    <main id="main" class="site-main">
      <header class="page-header">
        <h1 class="page-title">Vue Search</h1>
      </header>


      <div class="wrapper">

        <!-- Form for user entered data -->
        <form>
          <input type="text" v-model="search" placeholder="Search...">
          <select v-model="category">
            <option value="">None</option>
            <?php foreach(get_categories() as $category): ?>
              <option value="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" value="Search" @click="getResults">          
        </form>

        <!-- search results here -->
        <ul v-if="results.length">
          <li v-for="result in results">
            <h3>{{ result.post_title }}</h3>
            <img :src="result.thumbnail">
            <p><?php echo twentynineteen_get_icon_svg( 'archive', 16 ); ?> {{ result.category }}</p>
            <p><?php echo twentynineteen_get_icon_svg( 'watch', 16 ); ?> {{ result.post_date }}</p>
            <p>{{ result.excerpt }}</p>
            <a :href="result.permalink">Read More</a>
          </li>
        </ul>
        <h3 v-else>No results found.</h3>

        <!-- pagination -->
        <nav>
          <a href="#main" v-for="page in maxPages" @click="goToPage(page)">{{ page }}</a>
        </nav>

      </div>


    </main><!-- #main -->
  </section><!-- #primary -->
<?php
get_footer();
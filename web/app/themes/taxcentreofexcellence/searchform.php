<?php
?>
<div class="search-form">
  <form id="searchform" method="get" action="<?php echo home_url('/'); ?>">
    <input class="govuk-input" name="s" type="text" value="<?php the_search_query(); ?>">
    <button type="submit" class="govuk-button" data-module="govuk-button">
      Search
    </button>
  </form>
</div>

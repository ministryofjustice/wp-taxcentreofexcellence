<?php the_post(); ?>

<article class="grid-row">
  <div class="column-two-thirds">

    <section class="section">
      <h2 class="section__heading">Welcome</h2>
      <div class="section__content">
        <?php the_content(); ?>
      </div>
    </section>

    <section class="section">
      <h2 class="section__heading">Tax guidance and training guides</h2>
      <div class="section__content">
        <?php
        $taxGuides = get_field('tax_guides');
        $taxGuidesFirstHalf = array_slice($taxGuides, 0, ceil(count($taxGuides)/2));
        $taxGuidesSecondHalf = array_slice($taxGuides, ceil(count($taxGuides)/2));

        ?>
        <?php if (!empty($taxGuides)): ?>
          <div class="grid-row">
            <div class="column-one-half">
              <ul class="link-list">
                <?php foreach ($taxGuidesFirstHalf as $link): ?>
                  <?php include(locate_template('templates/link-list-li-file.php')); ?>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="column-one-half">
              <ul class="link-list">
                <?php foreach ($taxGuidesSecondHalf as $link): ?>
                  <?php include(locate_template('templates/link-list-li-file.php')); ?>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </section>

    <section class="section">
      <h2 class="section__heading">Contact us</h2>
      <div class="section__content">
        
      </div>
    </section>

  </div>
  <div class="column-one-third">

    <section class="section">
      <h2 class="section__heading">Our offerings</h2>
      <div class="section__content">
        [ LINKS GO HERE ]
      </div>
    </section>

    <section class="section">
      <h2 class="section__heading">Quick links</h2>
      <div class="section__content">
        [ LINKS GO HERE ]
      </div>
    </section>

  </div>
</article>

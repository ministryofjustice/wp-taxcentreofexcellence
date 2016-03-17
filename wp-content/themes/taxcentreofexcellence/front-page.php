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
          <div class="grid-row grid-row--narrow">
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
        <?php
        $taxContacts = new WP_Query(array(
          'post_type' => 'tax-contact',
          'posts_per_page' => -1,
        ));
        ?>
        <?php if ($taxContacts->have_posts()): ?>
          <table class="table table--striped">
            <thead>
              <th>Departments Covered</th>
              <th>Contact Details</th>
            </thead>
            <tbody>
              <?php while ($taxContacts->have_posts()): $taxContacts->the_post(); ?>
                <tr>
                  <td><?php the_field('departments'); ?></td>
                  <td>
                    <?php if (get_field('email')): ?>
                      <a href="mailto:<?php the_field('email'); ?>" class="email-link">
                        <?php the_title(); ?>
                      </a>
                    <?php else: ?>
                      <?php the_title(); ?>
                    <?php endif; ?>
                    <?php if (get_field('telephone')): ?>
                      <br/>
                      Telephone: <?php the_field('telephone'); ?>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </section>

  </div>
  <div class="column-one-third">

    <section class="section">
      <h2 class="section__heading">Our offerings</h2>
      <div class="section__content">
        <?php
        $ourOfferings = get_field('our_offerings');
        ?>
        <?php if (!empty($ourOfferings)): ?>
          <ul class="link-list">
            <?php foreach ($ourOfferings as $link): ?>
              <?php include(locate_template('templates/link-list-li-file.php')); ?>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
    </section>

    <section class="section">
      <h2 class="section__heading">Quick links</h2>
      <div class="section__content section__content--smaller">
        <?php
        $quickLinks = get_field('quick_links');
        ?>
        <?php if (!empty($quickLinks)): ?>
          <?php

          // Group links array by heading text
          $linksGroupedByHeading = array();
          $currentHeading = false;
          foreach ($quickLinks as $link) {
            if ($link['type'] == 'Heading') {
              $linksGroupedByHeading[$link['name']] = array();
              $currentHeading = $link['name'];
              continue;
            }

            if ($currentHeading === false) {
              $linksGroupedByHeading[0] = array();
              $currentHeading = 0;
            }

            $linksGroupedByHeading[$currentHeading][] = $link;
          }

          ?>

          <?php foreach ($linksGroupedByHeading as $heading => $links): ?>
            <?php if (!is_int($heading)): ?>
              <h4><?php echo $heading; ?></h4>
            <?php endif; ?>
            <ul class="link-list">
              <?php foreach ($links as $link): ?>
                  <li>
                    <a href="<?php echo $link['link']; ?>" rel="external">
                      <?php echo $link['name']; ?>
                    </a>
                  </li>
              <?php endforeach; ?>
            </ul>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </section>

  </div>
</article>

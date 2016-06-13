<?php

namespace Roots\Sage\Commands;

use WP_CLI;
use WP_CLI_Command;

class Delete_Old_Homepage_Fields extends WP_CLI_Command {

  /**
   * Delete old homepage ACF fields.
   */
  public function __invoke() {
    global $wpdb;

    $fields = array(
      'tax_guides',
      'our_offerings',
      'quick_links',
    );

    $sql = "DELETE FROM {$wpdb->postmeta}
            WHERE `meta_key` LIKE '%1\$s%%'
            OR `meta_key` LIKE '_%1\$s%%'";

    $count = 0;
    foreach ($fields as $field) {
      $query = $wpdb->prepare($sql, $field);
      $count += $wpdb->query($query);
    }

    WP_CLI::success("Removed $count rows from {$wpdb->postmeta}");
  }

}

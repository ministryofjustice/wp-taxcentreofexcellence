<?php

namespace Roots\Sage\Commands;

use WP_CLI;
use WP_CLI_Command;

class Delete_Old_Homepage_Fields extends WP_CLI_Command {

  /**
   * Delete old homepage ACF fields.
   *
   * ## OPTIONS
   *
   * [--yes]
   * : Confirm deletion.
   */
  public function __invoke($args, $assoc_args) {
    global $wpdb;

    if (!isset($assoc_args['yes'])) {
      WP_CLI::warning('Post meta fields will be deleted! Make sure you\'ve migrated fields first.');
      WP_CLI::log('To continue, run this command again with --yes flag.');
      return;
    }

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

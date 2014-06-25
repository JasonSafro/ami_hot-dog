<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<div class="<?php print $classes; ?>">

  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header columns">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>  
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>
	<div class="filter">
<?php

global $base_url;

?>  
        <a class="<?php if( !isset($_GET['field_image_category_tid']) || ( $_GET['field_image_category_tid'] !=1 && $_GET['field_image_category_tid'] != 2)  ) :
  print 'active';
endif ?>" href="<?php echo $base_url; ?>/media/photo-galleries">All</a>

        <a class="<?php if( isset($_GET['field_image_category_tid']) && $_GET['field_image_category_tid'] == 1 ) :
  print 'active';
 endif ?>" href="<?php echo $base_url; ?>/media/photo-galleries?field_image_category_tid=1">Traditional</a>
 
        <a class="<?php if( isset($_GET['field_image_category_tid']) && $_GET['field_image_category_tid'] == 2 ) :
  print 'active';
endif ?>" href="<?php echo $base_url; ?>/media/photo-galleries?field_image_category_tid=2">Historic</a>
	</div>
  <?php if ($rows): ?>
    <div class="view-content">
    
<?php if( !isset($_GET['field_image_category_tid']) || ( $_GET['field_image_category_tid'] !=1 && $_GET['field_image_category_tid'] != 2)  ) :
  echo '<h2 class="dotted-header"><span class="creme">All Photos</span></h2>';
endif ?>

<?php if( isset($_GET['field_image_category_tid']) && $_GET['field_image_category_tid'] == 1 ) :
  echo '<h2 class="dotted-header"><span class="creme">Traditional Photos</span></h2>';
 endif ?>

<?php if( isset($_GET['field_image_category_tid']) && $_GET['field_image_category_tid'] == 2 ) :
  echo '<h2 class="dotted-header"><span class="creme">Historic Photos</span></h2>';
endif ?>


    
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>

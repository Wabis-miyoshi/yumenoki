<?php
// vars
$group_name = get_field('admission');
if( $group_name ):
?>
<section class="section recruit">
  <div class="container w-1200">
    <div class="ctm_title">
      <h3 class="deco-green"><?php echo $group_name['title']; ?></h3>
    </div>

    <p class="has-text-left-mobile has-text-centered-tablet is-size-5 mb-50">
      <?php echo $group_name['text']; ?>
    </p>

    <div class="is-hidden-mobile has-text-centered">
      <a href="<?php echo $group_name['file']; ?>">
        <img src="/wp-content/uploads/admissionBnr-pc.jpg" alt="">
      </a>
    </div>
    <div class="is-hidden-tablet has-text-centered">
      <a href="<?php echo $group_name['file']; ?>">
        <img src="/wp-content/uploads/admissionBnr-sp.jpg" alt="">
      </a>
    </div>
</section>
<?php endif; ?>

<?php

  $logo = get_field('footer-brand','option');
  $title1 = get_field('col-1-title','option');
  $title2 = get_field('col-2-title','option');
  $title3 = get_field('col-3-title','option');
  $title4 = get_field('col-4-title','option');
  $c1c = get_field('col-1-content','option');
  $c4c = get_field('col-4-content','option');
  $c4u = get_field('col-4-url','option');
  $copy = get_field('copy','option');




?>
<div class="m-footer">
  <div class="row">
    <div class="m-footer__wrapper">

      <div class="m-footer__col">
        <?php
          echo '<img src="'.$logo['url'].'" alt="'.$logo['alt'].'" class="m-footer__brand">';
        ?>
        <p class="m-footer__col-title">
          <?= $title1 ?>
        </p>
        <div class="m-footer__col-desc">
          <?= $c1c ?>
        </div>
        <?php
          if( have_rows('social-list','option') ):
            echo '<ul class="m-footer-socials">';
              while ( have_rows('social-list','option') ) : the_row();
                $img = get_sub_field('social-img');
                $url= get_sub_field('social-url');
                echo '<li><a href="'.$url.'"><img src="'.$img['url'].'" alt="'.$img['alt'].'"></a></li>';
              endwhile;
            echo '</ul>';
          else :
          endif;
        ?>
      </div>

      <div class="m-footer__col">
      <p class="m-footer__col-title">
        <?= $title2 ?>
        </p>
        <?php
          if( have_rows('col-2-menu', 'option') ):
            echo '<ul class="m-footer__menu">';
              while ( have_rows('col-2-menu', 'option') ) : the_row();
                $item = get_sub_field('col-menu-item');
                echo '<li class="m-footer__menu-item"><a href="'.$item['url'].'" class="m-footer__menu-url">'.$item['title'].'</a></li>';
              endwhile;
            echo '</ul>';
          else :
          endif;
        ?>
      </div>

      <div class="m-footer__col">
      <p class="m-footer__col-title">
        <?= $title3 ?>
        </p>
        <?php
          if( have_rows('col-3-menu', 'option') ):
            echo '<ul class="m-footer__menu">';
              while ( have_rows('col-3-menu', 'option') ) : the_row();
                $item = get_sub_field('col-menu-item');
                echo '<li class="m-footer__menu-item"><a href="'.$item['url'].'" class="m-footer__menu-url">'.$item['title'].'</a></li>';
              endwhile;
            echo '</ul>';
          else :
          endif;
        ?>
      </div>

      <div class="m-footer__col">
      <p class="m-footer__col-title">
        <?= $title4 ?>
        </p>
        <div class="m-footer__col-desc">
        <?= $c4c ?>
        </div>
        <a href="<?= $c4u['url'] ?>" class="m-footer__col-url">
          <?= $c4u['title'] ?>
        </a>
      </div>

    </div>
  </div>
  <div class="m-footer__bottom">
    <div class="row">
      <p class="copy">
      <?= $copy ?>
      </p>
    </div>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
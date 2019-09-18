                <?php foreach($websiteicon as $icon) { ?>
                    <li style="color:<?php echo $icon->color_text?>; background: <?php echo $icon->back_ground_color;?>; border: 1px solid <?php echo $icon->border_color;?>;"><?php echo @$icon->icon_code; ?></li>
                    <?php } ?>
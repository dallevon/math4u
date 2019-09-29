<?php
/**
* @version   $Id: item.php 26113 2015-01-27 15:06:19Z james $
* @author    RocketTheme http://www.rockettheme.com
* @copyright Copyright (C) 2007 - 2019 RocketTheme, LLC
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

/**
 * @var $item RokSprocket_Item
 */

$background 		= $item->getParam('features_item_background'); 								// Background Image
$image 				= $item->getParam('features_item_image'); 									// Content Image
$imagePosition 		= $item->getParam('features_item_image_position'); 							// Content Image Position
$imageAnimation		= str_replace("-", '', $item->getParam('features_item_image_animation', "-flipinx-"));

?>

<li class="sprocket-features-index-<?php echo $index;?>">
	<?php if ($background): ?>
	<div class="sprocket-features-img-container" <?php if ($background) : ?>style="background-image: url(<?php echo json_decode(str_replace("'", '"', $background))->path; ?>);"<?php endif; ?> data-animation-image>
	<?php endif; ?>
		<div class="rt-container">
			<div class="sprocket-features-content" data-animation-content="<?php echo $imageAnimation; ?>">

				<?php if ($image !="-none-" and ($imagePosition == "-top-" or $imagePosition == "-left-")): ?>
					<div class="sprocket-features-img <?php echo str_replace("-", '', $imagePosition ); ?>">
						<img src="<?php echo json_decode(str_replace("'", '"', $image))->path; ?>" alt="">
					</div>
				<?php endif; ?>

				<?php if ($parameters->get('features_show_article_text') && ($item->getText() || $item->getPrimaryLink())) : ?>
					<div class="sprocket-features-desc <?php echo str_replace("-", '', $imagePosition ); ?>">
						<?php if ($parameters->get('features_show_title') && $item->getTitle()) : ?>
							<h2 class="sprocket-features-title">
								<?php echo $item->getTitle(); ?>
							</h2>
						<?php endif; ?>
						<span>
							<?php echo $item->getText(); ?>
						</span>
						<?php if ($item->getPrimaryLink()) : ?>
						<span class="readon-wrapper"><a href="<?php echo $item->getPrimaryLink()->getUrl(); ?>" class="readon"><span><?php rc_e('READ_MORE'); ?></span></a></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ($image != "-none-" and ($imagePosition == "-bottom-" or $imagePosition == "-right-")): ?>
					<div class="sprocket-features-img <?php echo str_replace("-", '', $imagePosition ); ?>">
						<img src="<?php echo json_decode(str_replace("'", '"', $image))->path; ?>" alt="">
					</div>
				<?php endif; ?>

			</div>
		</div>
	<?php if ($background): ?>
	</div>
	<?php endif; ?>
</li>

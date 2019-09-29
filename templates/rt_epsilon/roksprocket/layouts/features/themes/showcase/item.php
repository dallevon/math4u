<?php
/**
 * @version   $Id: item.php 19233 2014-02-27 14:39:39Z james $
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2013 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

/**
 * @var $item RokSprocket_Item
 */
?>
<?php $itemText = explode('||',$item->getText()); ?>
<li class="sprocket-features-index-<?php echo $index;?><?php echo (!($index - 1)) ? ' active' : '';?>" data-showcase-pane>
	<div class="sprocket-features-container">
		<div class="sprocket-features-content">
			<?php if ($parameters->get('features_show_title') && $item->getTitle()) : ?>
				<h2 class="sprocket-features-title">
					<?php if ($item->getPrimaryLink()) : ?>
						<a href="<?php echo $item->getPrimaryLink()->getUrl(); ?>"><?php echo $item->getTitle(); ?></a>
					<?php else: ?>
						<?php echo $item->getTitle(); ?>
					<?php endif; ?>
				</h2>
			<?php endif; ?>
			<?php if ($parameters->get('features_show_article_text') && ($item->getText() || $item->getPrimaryLink())) : ?>
				<div class="sprocket-features-desc">
					<?php echo $itemText[0]; ?>
					<?php if ($item->getPrimaryLink()) : ?>
					<a href="<?php echo $item->getPrimaryLink()->getUrl(); ?>" class="readon"><span><?php rc_e('READ_MORE'); ?></span></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php
		if ($item->getPrimaryImage()) :
		?>
		<div class="sprocket-features-img-container">
			<?php if ($item->getPrimaryLink()) : ?>
				<a href="<?php echo $item->getPrimaryLink()->getUrl(); ?>"><img src="<?php echo $item->getPrimaryImage()->getSource(); ?>" alt="<?php echo $itemText[2]; ?>" style="max-width: 100%; height: auto;" width="<?php echo $itemText[3]; ?>" height="<?php echo $itemText[3]; ?>" /></a>
			<?php else: ?>
				<img src="<?php echo $item->getPrimaryImage()->getSource(); ?>" alt="<?php echo $itemText[2]; ?>" width="<?php echo $itemText[3]; ?>" height="<?php echo $itemText[3]; ?>" />
			<?php endif; ?>
            <?php echo $itemText[1]; ?>
		</div>
		<?php endif; ?>		
	</div>
</li>

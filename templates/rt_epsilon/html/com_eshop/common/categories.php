<?php
/**
 * @version		1.3.0
 * @package		Joomla
 * @subpackage	EShop
 * @author  	Giang Dinh Truong
 * @copyright	Copyright (C) 2012 Ossolution Team
 * @license		GNU/GPL, see LICENSE.php
 */
?>
<div class="row-fluid">
	<?php
	$i = 0;
	foreach ($categories as $category) 
	{
		$i++;
		$categoryUrl = JRoute::_(EshopRoute::getCategoryRoute($category->id));
		?>
		<div class="span4">
        	<div class="image">
			<a href="<?php echo $categoryUrl; ?>" title="<?php echo $category->category_page_title != '' ? $category->category_page_title : $category->category_name; ?>">
				<img src="<?php echo $category->image; ?>" alt="<?php echo $category->category_page_title != '' ? $category->category_page_title : $category->category_name; ?>" />	            
			</a>
            </div>
			<div class="info_block">
				<h5>
					<a href="<?php echo $categoryUrl; ?>" title="<?php echo $category->category_page_title != '' ? $category->category_page_title : $category->category_name; ?>">
						<?php echo $category->category_name; ?>
					</a>
				</h5>
			</div>
		</div>
		<?php
		if ($i % 3 == 0)
		{
		?>
			</div><div class="row-fluid">
		<?php
		}
	}
	?>
</div>
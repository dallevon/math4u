<?php
/**
 * @version		1.3.1
 * @package		Joomla
 * @subpackage	EShop
 * @author  	Giang Dinh Truong
 * @copyright	Copyright (C) 2012 Ossolution Team
 * @license		GNU/GPL, see LICENSE.php
 */
// no direct access
defined ( '_JEXEC' ) or die ();

echo $this->loadTemplate ( 'category' );
if (count ( $this->subCategories ) && EshopHelper::getConfigValue ( 'show_sub_categories' )) {
	echo $this->loadTemplate ( 'subcategories' );
}
echo EshopHtmlHelper::loadCommonLayout ( 'common/products.php', array (
		'products' => $this->products,
		'pagination' => $this->pagination,
		'sort_options' => $this->sort_options,
		'tax' => $this->tax,
		'currency' => $this->currency,
		'productsPerRow' => $this->productsPerRow,
		'catId' => $this->category->id,
		'actionUrl' => $this->actionUrl,
		'showSortOptions' => true
) );
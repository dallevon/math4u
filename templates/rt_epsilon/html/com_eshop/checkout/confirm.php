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
defined( '_JEXEC' ) or die();
?>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th><?php echo JText::_('ESHOP_PRODUCT_NAME'); ?></th>
			<th><?php echo JText::_('ESHOP_MODEL'); ?></th>
			<th><?php echo JText::_('ESHOP_QUANTITY'); ?></th>
			<th><?php echo JText::_('ESHOP_UNIT_PRICE'); ?></th>
			<th><?php echo JText::_('ESHOP_TOTAL'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($this->cartData as $key => $product)
		{
			$optionData = $product['option_data'];
			$viewProductUrl = JRoute::_(EshopRoute::getProductRoute($product['product_id'], EshopHelper::getProductCategory($product['product_id'])));
			?>
			<tr>
				<td>
					<a href="<?php echo $viewProductUrl; ?>">
						<?php echo $product['product_name']; ?>
					</a><br />	
					<?php
					for ($i = 0; $n = count($optionData), $i < $n; $i++)
					{
						echo '- ' . $optionData[$i]['option_name'] . ': ' . $optionData[$i]['option_value'] . '<br />';
					}
					?>
				</td>
				<td><?php echo $product['product_sku']; ?></td>
				<td>
					<?php echo $product['quantity']; ?>
				</td>
				<td><?php echo $this->currency->format($this->tax->calculate($product['price'], $product['product_taxclass_id'], EshopHelper::getConfigValue('tax'))); ?></td>
				<td><?php echo $this->currency->format($this->tax->calculate($product['total_price'], $product['product_taxclass_id'], EshopHelper::getConfigValue('tax'))); ?></td>
			</tr>
			<?php
		}
		foreach ($this->totalData as $data)
		{
			?>
			<tr>
				<td colspan="4" style="text-align: right;"><?php echo $data['title']; ?>:</td>
				<td><strong><?php echo $data['text']; ?></strong></td>
			</tr>
			<?php	
		}
		?>
	</tbody>
</table>
<?php
if ($this->total > 0)
{
	?>
	<div class="payment">
		<?php echo $this->paymentClass->renderPaymentInformation(); ?>
	</div>
	<?php
}
else 
{
	?>
	<form action="<?php echo EshopHelper::getSiteUrl(); ?>index.php?option=com_eshop&task=checkout.processOrder" method="post" name="payment_method_form" id="payment_method_form" class="form form-horizontal">
		<div class="no_margin_left">
			<div class="no_margin_left">
				<input id="button-confirm" type="submit" class="button pull-right" value="<?php echo JText::_('ESHOP_CONFIRM_ORDER'); ?>" />
			</div>
		</div>
	</form>
	<?php	
}
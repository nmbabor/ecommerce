<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2016
 */

$enc = $this->encoder();

$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );
$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );
$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );
$detailConfig = $this->config( 'client/html/catalog/detail/url/config', array() );

$basketTarget = $this->config( 'client/html/basket/standard/url/target' );
$basketController = $this->config( 'client/html/basket/standard/url/controller', 'basket' );
$basketAction = $this->config( 'client/html/basket/standard/url/action', 'index' );
$basketConfig = $this->config( 'client/html/basket/standard/url/config', array() );

/// Price format with price value (%1$s) and currency (%2$s)
$priceFormat = $this->translate( 'client', '%1$s %2$s' );
/// Percent format with value (%1$s) and % sign
$percentFormat = $this->translate( 'client', '%1$s%%' );

$position = $this->get( 'itemPosition', 0 );

$reqstock = (int) $this->config( 'client/html/basket/require-stock', true );

?>
<?php $this->block()->start( 'catalog/lists/items' ); ?>
<div class="catalog-list-items">
	<ul class="list-items list"><!--
<?php foreach( $this->get( 'listProductItems', array() ) as $id => $productItem ) : $firstImage = true; ?>
<?php
		$params = array( 'd_name' => $productItem->getName( 'url' ), 'd_prodid' => $id, 'l_pos' => $position++ );
		$conf = $productItem->getConfig(); $css = ( isset( $conf['css-class'] ) ? $conf['css-class'] : '' );

		$itemProdDeps = $this->get( 'itemsSelectionProductDependencies', array() );
		$prodDeps = ( isset( $itemProdDeps[$id] ) ? json_encode( (array) $itemProdDeps[$id] ) : '{}' );

		$itemAttrDeps = $this->get( 'itemsSelectionAttributeDependencies', array() );
		$attrDeps = ( isset( $itemAttrDeps[$id] ) ? json_encode( (array) $itemAttrDeps[$id] ) : '{}' );

		$itemAttrTypeDeps = $this->get( 'itemsSelectionAttributeTypeDependencies', array() );
		$attrTypeDeps = ( isset( $itemAttrTypeDeps[$id] ) ? (array) $itemAttrTypeDeps[$id] : array() );

		$itemSubProducts = $this->get( 'itemsSelectionProducts', array() );
		$subProducts = ( isset( $itemSubProducts[$id] ) ? (array) $itemSubProducts[$id] : array() );

		$itemAttrConfigItems = $this->get( 'itemsAttributeConfigItems', array() );
		$attrConfigItems = ( isset( $itemAttrConfigItems[$id] ) ? (array) $itemAttrConfigItems[$id] : array() );

		$selectParams = array(
			'selectionProducts' => $subProducts,
			'selectionAttributeTypeDependencies' => $attrTypeDeps,
			'selectionAttributeItems' => $this->get( 'itemsSelectionAttributeItems', array() ),
		);

		$attributeParams = array(
			'attributeConfigItems' => $attrConfigItems,
			'attributeCustomItems' => $productItem->getRefItems( 'attribute', null, 'custom' ),
			'attributeHiddenItems' => $productItem->getRefItems( 'attribute', null, 'hidden' ),
		);
?>
--><li class="product <?php echo $enc->attr( $css ); ?>" data-reqstock="<?php echo $reqstock; ?>" itemscope="" itemtype="http://schema.org/Product">
<?php	$url = $enc->attr( $this->url( $detailTarget, $detailController, $detailAction, $params, array(), $detailConfig ) ); ?>
		<a class="media-list" href="<?php echo $url; ?>">
<?php	foreach( $productItem->getRefItems( 'media', 'default', 'default' ) as $mediaItem ) : ?>
<?php		$mediaUrl = $enc->attr( $this->content( $mediaItem->getPreview() ) ); ?>
<?php		if( $firstImage === true ) : $firstImage = false; ?>
				<noscript>
					<div class="media-item" style="background-image: url('<?php echo $mediaUrl; ?>')" itemscope="" itemtype="http://schema.org/ImageObject">
						<meta itemprop="contentUrl" content="<?php echo $mediaUrl; ?>" />
					</div>
				</noscript>
				<div class="media-item lazy-image" data-src="<?php echo $mediaUrl; ?>"></div>
<?php		else : ?>
				<div class="media-item" data-src="<?php echo $mediaUrl; ?>"></div>
<?php		endif; ?>
<?php	endforeach; ?>
		</a><!--
		--><a class="text-list" href="<?php echo $url; ?>">
			<h2 itemprop="name"><?php echo $enc->html( $productItem->getName(), $enc::TRUST ); ?></h2>
<?php	foreach( $productItem->getRefItems( 'text', 'short', 'default' ) as $textItem ) : ?>
			<div class="text-item" itemprop="description">
<?php		echo $enc->html( $textItem->getContent(), $enc::TRUST ); ?><br/>
			</div>
<?php	endforeach; ?>
		</a><!--
		--><div class="offer" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<div class="stock" data-prodid="<?php echo $enc->attr( implode( ' ', array_merge( array( $id ), array_keys( $subProducts ) ) ) ); ?>"></div>
			<div class="price-list price price-actual">
<?php	echo $this->partial( $this->config( 'client/html/common/partials/price', 'common/partials/price-default.php' ), array( 'prices' => $productItem->getRefItems( 'price', null, 'default' ) ) ); ?>
			</div>
		</div>
<?php	if( $this->config( 'client/html/catalog/lists/basket-add', false ) ) : ?>
		<form class="basket" method="POST" action="<?php echo $enc->attr( $this->url( $basketTarget, $basketController, $basketAction, array(), array(), $basketConfig ) ); ?>">
<!-- catalog.lists.items.csrf -->
<?php		echo $this->csrf()->formfield(); ?>
<!-- catalog.lists.items.csrf -->
			<div class="items-selection" data-proddeps="<?php echo $enc->attr( $prodDeps ); ?>" data-attrdeps="<?php echo $enc->attr( $attrDeps ); ?>">
<?php echo $this->partial( $this->config( 'client/html/common/partials/selection', 'common/partials/selection-default.php' ), $selectParams ); ?>
			</div>
			<div class="items-attribute">
<?php echo $this->partial( $this->config( 'client/html/common/partials/attribute', 'common/partials/attribute-default.php' ), $attributeParams ); ?>
			</div>
			<div class="addbasket">
				<div class="group">
					<input name="<?php echo $enc->attr( $this->formparam( 'b_action' ) ); ?>" type="hidden" value="add" />
					<input name="<?php echo $enc->attr( $this->formparam( array( 'b_prod', 0, 'prodid' ) ) ); ?>" type="hidden" value="<?php echo $id; ?>" />
					<input name="<?php echo $enc->attr( $this->formparam( array( 'b_prod', 0, 'quantity' ) ) ); ?>" type="number" min="1" max="2147483647" maxlength="10" step="1" required="required" value="1" />
					<button class="standardbutton btn-action" type="submit" value=""><?php echo $enc->html( $this->translate( 'client', 'Add to basket' ), $enc::TRUST ); ?></button>
				</div>
			</div>
		</form>
<?php	endif; ?>
	</li><!--
<?php endforeach; ?>
--></ul>
<?php	echo $this->get( 'itemsBody' ); ?>
</div>
<?php $this->block()->stop(); ?>
<?php echo $this->block()->get( 'catalog/lists/items' ); ?>

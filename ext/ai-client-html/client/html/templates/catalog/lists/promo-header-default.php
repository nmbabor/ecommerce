<?php

/**
 * @copyright Copyright (c) Metaways Infosystems GmbH, 2013
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2016
 */

$enc = $this->encoder();

?>
<?php if( ( $url = $this->get( 'promoStockUrl' ) ) != null ) : ?>
<script type="text/javascript" defer="defer" src="<?php echo $enc->attr( $url ); ?>"></script>
<?php endif; ?>
<?php echo $this->get( 'promoHeader' ); ?>

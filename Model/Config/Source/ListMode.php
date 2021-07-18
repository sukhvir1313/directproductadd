<?php

namespace Sukhvir\DirectProductAdd\Model\Config\Source;

class ListMode implements \Magento\Framework\Option\ArrayInterface
{
	public function toOptionArray()
	{
	  	return array(
	        array(
	            'value' => 'checkout/cart/',
	            'label' => 'Cart',
	        ),
	        array(
	            'value' => 'checkout/',
	            'label' => 'Checkout',
	        )
	    );
	}
}
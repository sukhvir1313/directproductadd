<?php
 
namespace Sukhvir\DirectProductAdd\Controller\Add;
 
use Magento\Framework\App\Action\Context;
use \Magento\Framework\App\Request\Http;
use \Magento\Catalog\Model\ProductRepository;
use \Magento\Checkout\Model\Cart;
use \Magento\Framework\Data\Form\FormKey;
class ToCart extends \Magento\Framework\App\Action\Action
{
    protected $_request;
    protected $_productRepository;
    protected $_cart;
    protected $formKey;
    protected $_scopeConfig;
 
    public function __construct(Context $context, Http $request, ProductRepository $productRepository, Cart $cart,  FormKey $formKey,\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        $this->_request = $request;
        $this->_productRepository = $productRepository;
        $this->_cart = $cart;
        $this->formKey = $formKey;
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context);
    }
 
    public function execute()
    {
        $product_id = $this->_request->getParam('id');
        $coupon = $this->_request->getParam('coupon');
        $sku = $this->_request->getParam('sku');
        $empty = $this->_request->getParam('empty');

        if ($empty) {
            try {
                $allItems = $this->_cart->getQuote()->getAllVisibleItems();
                foreach ($allItems as $item) {
                    $itemId = $item->getItemId();
                    $this->_cart->removeItem($itemId);
                }
            } catch (\Exception $e) {

            }
        }
        
        try {
            $this->addToCart($product_id, $coupon, $sku);
        } catch (\Exception $e) {
            $this->_redirect("/");
        }
    }

    public function addToCart($product_id, $coupon, $sku){

            if(isset($product_id) && !empty($product_id)) {
                if(strpos($product_id,",")!==FALSE){
                    $carr = explode(",",$product_id);
                    if(is_array($carr)){
                        foreach($carr as $p){
                            $p = trim($p);
                            $q = 1;
                            $this->toCart($p,$q, false);
                        }
                    }
                }else{
                    $p = trim($product_id);
                    $q = 1;
                    $this->toCart($p,$q, false);
                }
            }

            if(isset($sku) && !empty($sku)) {
                if(strpos($sku,",")!==FALSE){
                    $carr = explode(",",$sku);
                    if(is_array($carr)){
                        foreach($carr as $p){
                            $p = trim($p);
                            $q = 1;
                            $this->toCart($p,$q, true);
                        }
                    }
                }else{
                    $p = trim($sku);
                    $q = 1;
                    $this->toCart($p,$q, true);
                }
            }
            

            if (isset($coupon) && !empty($coupon)) {
                $this->_cart->getQuote()->setCouponCode($coupon);
            }
            
            $this->_cart->save();

        	$redirect = $this->_scopeConfig->getValue('sukhvirdirectproductadd/general/redirects', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        	$this->_redirect($redirect);
    }
    
    private function toCart($p,$q, $is_sku){
    	if(strpos($p,"-")!==FALSE){
    		$aq = explode("-",$p);
    		
            if (is_numeric($aq[1])) {
                $p = $aq[0];
                $q = (int)$aq[1];
            } else {
                $q = 1;
            }
    		
    	}
    	$params = array(
            'product' => $p,
      	    'qty' => $q
        );

        if (isset($is_sku) && $is_sku == true) {
            $_product = $this->_productRepository->get($p);
        } else {
            $_product = $this->_productRepository->getById($p);
        }
        
        $this->_cart->addProduct($_product,$params);
   }
}

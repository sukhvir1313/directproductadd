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

        $response = array();
        if(isset($product_id) && !empty($product_id)) {
            if(strpos($product_id,",")!==FALSE){
                $carr = explode(",",$product_id);
                if(is_array($carr)){
                    foreach($carr as $p){
                        $p = trim($p);
                        $q = 1;
                        $response = $this->toCart($p,$q, false);
                    }
                }
            }else{
                $p = trim($product_id);
                $q = 1;
                $response = $this->toCart($p,$q, false);
            }
        }

        if(isset($sku) && !empty($sku)) {
            if(strpos($sku,",")!==FALSE){
                $carr = explode(",",$sku);
                if(is_array($carr)){
                    foreach($carr as $p){
                        $p = trim($p);
                        $q = 1;
                        $response = $this->toCart($p,$q, true);
                    }
                }
            }else{
                $p = trim($sku);
                $q = 1;
                $response = $this->toCart($p,$q, true);
            }
        }
        

        if (isset($coupon) && !empty($coupon)) {
            $this->_cart->getQuote()->setCouponCode($coupon);
        }
        
        $this->_cart->save();

        if ($response['status'] == false && $response['redirect_url']) {
            $this->_redirect($response['redirect_url']);
        } else {
            $redirect = $this->_scopeConfig->getValue('sukhvirdirectproductadd/general/redirects', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $this->_redirect($redirect);
        }
    }
    
    private function toCart($p,$q, $is_sku){
        $qty = $q;
        $code = $p;

        if (strpos($p, "-") !== false) {
            $lastHyphen = strrpos($p, "-");
            $maybeQty = substr($p, $lastHyphen + 1);
            $possibleCode = substr($p, 0, $lastHyphen);

            if (ctype_digit($maybeQty)) {
                if ($is_sku) {
                    try {
                        // Check if SKU with quantity part actually exists
                        $this->_productRepository->get($p);
                    } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
                        $code = $possibleCode;
                        $qty = (int)$maybeQty;
                    }
                } else {
                    $code = $possibleCode;
                    $qty = (int)$maybeQty;
                }
            }
        }

        $params = array(
            'product' => $code,
            'qty' => $qty
        );

        if (isset($is_sku) && $is_sku == true) {
            $_product = $this->_productRepository->get($code);
        } else {
            $_product = $this->_productRepository->getById($code);
        }

        // check if product is simple product or not
        if ($_product->getTypeId() != 'simple') {
            return array(
                'status' => false,
                'message' => 'Redirect to product page',
                'redirect_url' => $_product->getProductUrl()
            );
        }

        // check if product has customizable options
        $customOptions = $_product->getOptions();

        if (count($customOptions) > 0) {
            return array(
                'status' => false,
                'message' => 'Redirect to product page',
                'redirect_url' => $_product->getProductUrl()
            );
        }

        // check if product is out of stock
        if (!$_product->isSaleable()) {
            return array(
                'status' => false,
                'message' => 'Redirect to product page',
                'redirect_url' => $_product->getProductUrl()
            );
        }
        
        $result = $this->_cart->addProduct($_product,$params);
        return array(
            'status' => true,
        );
   }
}

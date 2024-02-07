What if you want to send your customers a link and grant them the ability to quickly add products to the cart, instantly redirecting them to the cart or checkout page, all just be clicking on the link? Great idea! right? "Direct Product Add" is a perfect solution for you. Just share a link with your users through email, social media, blogs etc. Once user clicks on this link, the product will be automatically added to the cart and the user will be redirected to the cart or checkout page. You can change the redirection page from the admin section. Direct Product Add extension will reduce the required steps for your users and cause your revenue to increase.

### URL Formats:

`http://{yourdomain}/dpa/add/tocart/sku/{product_sku}`
`http://{yourdomain}/dpa/add/tocart/sku/{product_sku}-{quantity}`
`http://{yourdomain}/dpa/add/tocart/sku/{product_sku_1}-{quantity}, {product_sku_2}-{quantity}`
`http://{yourdomain}/dpa/add/tocart/sku/{product_sku_1},{product_sku_2}`
`http://{yourdomain}/dpa/add/tocart/sku/{product_sku}/coupon/{coupon_code}`
`http://{yourdomain}/dpa/add/tocart/id/{product_id}`
`http://{yourdomain}/dpa/add/tocart/id/{product_id}-{quantity} (i.e. http://{yourdomain}/dpa/add/tocart/id/123-2)`
`http://{yourdomain}/dpa/add/tocart/id/{product_1},{product_2} (i.e. http://{yourdomain}/dpa/add/tocart/id/123,223)`
`http://{yourdomain}/dpa/add/tocart/id/{product_1}-{product_1_quantity},{product_2}-{product_2_quantity} (i.e. http://{yourdomain}/dpa/add/tocart/id/123-3,223-3)`

If you want to remove all previous items from the cart before adding new items use "empty" parameter like below:
`http://{yourdomain}/dpa/add/tocart/sku/{product_sku}/empty/1`

### Key features:

Directly add products to the cart and redirect users to checkout/cart page on a single click
Reduce steps required to buy products quickly
Add coupon code directly defined in the URL
  

A few notes to help you in creating a proper link

Please use simple product sku/id. For configurable product sku/id, it will be redirected to the product page.
Please use product sku/id of a relevant store, otherwise users will be redirected to home page.


Checkout our youtube video to check how it will work. [https://www.youtube.com/watch?v=PxFEiAbDfpM](https://www.youtube.com/watch?v=PxFEiAbDfpM)

Below is demo url which will directly add product with id 1 to cart and redirect user to checkout page. [https://magento-demo.chlamyssoftware.com/dpa/add/tocart/id/1](https://magento-demo.chlamyssoftware.com/dpa/add/tocart/id/1)

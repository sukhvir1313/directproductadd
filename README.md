# **Direct Product Add to Cart**

Imagine simplifying the shopping experience for your customers by letting them add products to their cart with just one click. Sounds amazing, right? With the **Direct Product Add** extension, you can do exactly that! This powerful tool lets you share unique links that allow customers to instantly add products to their cart and redirect them to the cart or checkout page—no extra steps, no hassle.

Simply share these links through email, social media, or blogs, and watch your conversion rates soar. When users click the link, the product is added to their cart automatically, and they’re taken straight to where they need to be. You can even customize whether they land on the cart or checkout page from your admin settings. This streamlined shopping process not only enhances the user experience but also helps drive more sales for your store.

**Get started today** by downloading Direct Product Add from the [Adobe Commerce Marketplace](https://commercemarketplace.adobe.com/sukhvir-directproductadd.html)!

---

## **How It Works: Creating URLs**

The Direct Product Add extension supports a variety of URL formats, making it flexible and easy to use. Here are some examples:

1. **Add a Single Product by SKU**  
   ```
   http://{yourdomain}/dpa/add/tocart/sku/{product_sku}
   ```

2. **Add a Product with a Specific Quantity**  
   ```
   http://{yourdomain}/dpa/add/tocart/sku/{product_sku}-{quantity}
   ```

3. **Add Multiple Products with Quantities**  
   ```
   http://{yourdomain}/dpa/add/tocart/sku/{product_sku_1}-{quantity_1},{product_sku_2}-{quantity_2}
   ```

4. **Add Multiple Products by SKU**  
   ```
   http://{yourdomain}/dpa/add/tocart/sku/{product_sku_1},{product_sku_2}
   ```

5. **Add Products with a Coupon Code**  
   ```
   http://{yourdomain}/dpa/add/tocart/sku/{product_sku}/coupon/{coupon_code}
   ```

6. **Add a Single Product by Product ID**  
   ```
   http://{yourdomain}/dpa/add/tocart/id/{product_id}
   ```

7. **Add a Product by ID with Quantity**  
   ```
   http://{yourdomain}/dpa/add/tocart/id/{product_id}-{quantity}
   ```
   *Example:*  
   ```
   http://{yourdomain}/dpa/add/tocart/id/123-2
   ```

8. **Add Multiple Products by ID**  
   ```
   http://{yourdomain}/dpa/add/tocart/id/{product_id_1},{product_id_2}
   ```
   *Example:*  
   ```
   http://{yourdomain}/dpa/add/tocart/id/123,223
   ```

9. **Add Multiple Products by ID with Quantities**  
   ```
   http://{yourdomain}/dpa/add/tocart/id/{product_id_1}-{quantity_1},{product_id_2}-{quantity_2}
   ```
   *Example:*  
   ```
   http://{yourdomain}/dpa/add/tocart/id/123-3,223-3
   ```

10. **Clear the Cart Before Adding New Items**  
    If you want to empty the cart before adding new items, include the `empty` parameter:  
    ```
    http://{yourdomain}/dpa/add/tocart/sku/{product_sku}/empty/1
    ```

---

## **Why Use Direct Product Add?**

Here are some key benefits of the Direct Product Add extension:

- **Instant Cart Addition**: Customers can add products to their cart and be redirected to the cart or checkout page with a single click.  
- **Time-Saving for Shoppers**: Reduce the steps customers need to take to complete their purchase, resulting in faster checkouts.  
- **Coupon Integration**: Apply coupon codes directly through the link, making discounts even easier to redeem.  
- **Custom Redirection**: Decide where the customer lands—cart or checkout—directly from the admin panel.

---

## **Tips for Creating URLs**

To ensure the best experience for your users, follow these tips when creating URLs:

1. Always use **simple product SKUs/IDs**. If you use configurable product SKUs/IDs, customers will be redirected to the product page instead of the cart.  
2. Use product SKUs/IDs from the **correct store view**. If the SKU or ID doesn’t match the store, users will be redirected to the homepage.

---

## **See It in Action**

Curious to see how it works? Check out our detailed demo video on YouTube:  
[Watch the Demo](https://www.youtube.com/watch?v=PxFEiAbDfpM)

---

## **Live Demo Link**

Experience the extension yourself with this demo link. It will directly add a product with sku `24-MB01` to the cart and redirect you to the checkout page:  
[Try It Now](https://magento-demo-247p3.chlamyssoftware.com/dpa/add/tocart/sku/24-MB01)
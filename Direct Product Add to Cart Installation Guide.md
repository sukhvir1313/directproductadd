# **Direct Product Add to Cart Installation Guide**

## **Using Composer**
To install the extension via Composer, run the following commands in your terminal from the Magento root directory. **Ensure you back up your code and database before proceeding** to avoid potential issues.

1. **Install the Extension**:
   ```bash
   composer require sukhvir1313/directproductadd
   ```

2. **Enable the Extension**:
   ```bash
   bin/magento module:enable Sukhvir_DirectProductAdd
   ```

3. **Run Required Setup Commands**:
   Magento might prompt additional commands to finalize the setup. If it doesn’t, manually clear the cache and recompile as follows:
   ```bash
   bin/magento setup:upgrade
   bin/magento setup:di:compile
   bin/magento cache:clean
   ```

---

## **Manual Installation**
If you received a ZIP file for the extension, you can perform a manual installation by following these steps:

1. **Create the Required Directory**:
   Navigate to the Magento root directory and create the following folders if they don’t already exist. Ensure the folder names match the capitalization exactly:
   ```
   app/code/Sukhvir/DirectProductAdd/
   ```

2. **Extract the Files**:
   Extract the contents of the ZIP file into the `DirectProductAdd` folder. Verify that the `composer.json` file exists at the following path:
   ```
   app/code/Sukhvir/DirectProductAdd/composer.json
   ```

3. **Run Setup Commands**:
   Execute the following commands to enable the extension and ensure proper functionality:
   ```bash
   bin/magento module:enable Sukhvir_DirectProductAdd
   bin/magento setup:upgrade
   bin/magento cache:clean
   bin/magento setup:di:compile
   ```

---

## **Installation via Magento Admin**
You can also install the extension directly from the Magento Admin Panel. Check the official documentation or your Magento store settings for guidance on how to upload and enable the extension.

---

## **Shareable Product Links**

**Direct Product Add** allows you to create shareable URLs, making it easier for users to add products to their cart and purchase them quickly. Below are the supported URL formats:

### **1. Using Product SKU**
- Add a single product by SKU:
  ```
  http://{yourdomain}/dpa/add/tocart/sku/{product_sku}
  ```
- Add multiple products by SKU:
  ```
  http://{yourdomain}/dpa/add/tocart/sku/{product_sku_1},{product_sku_2}
  ```
- Add a product with specific quantity:
  ```
  http://{yourdomain}/dpa/add/tocart/sku/{product_sku}-{product_quantity}
  ```
- Add multiple products with specific quantities:
  ```
  http://{yourdomain}/dpa/add/tocart/sku/{product_sku_1}-{product_quantity_1},{product_sku_2}-{product_quantity_2}
  ```

### **2. Adding Coupons**
You can also apply a coupon code while adding products to the cart:
  ```
  http://{yourdomain}/dpa/add/tocart/sku/{product_sku}/coupon/{coupon_code}
  ```

### **3. Using Product ID**
- Add a single product by ID:
  ```
  http://{yourdomain}/dpa/add/tocart/id/{product_id}
  ```
- Add multiple products by ID:
  ```
  http://{yourdomain}/dpa/add/tocart/id/{product_id_1},{product_id_2}
  ```
- Add a product with specific quantity by ID:
  ```
  http://{yourdomain}/dpa/add/tocart/id/{product_id}-{product_quantity}
  ```
- Add multiple products with specific quantities by ID:
  ```
  http://{yourdomain}/dpa/add/tocart/id/{product_id_1}-{product_quantity_1},{product_id_2}-{product_quantity_2}
  ```

### **How to Share URLs**
Distribute these URLs to your users via email, social media, blogs, or other platforms. When a user clicks a link:
- The products will be automatically added to their cart.
- The user will be redirected to the cart or checkout page.

To configure the redirection page:
Navigate to **Admin Panel**:
```
Stores -> Configuration -> SUKHVIR -> Direct Product Add
```

---

## **Notes**
1. **Only Use Simple Products**: For configurable product IDs, the user will be redirected to the product page.
2. **Store-Specific SKUs/IDs**: Ensure you use SKUs/IDs that are valid for the relevant store. Invalid SKUs/IDs will redirect users to the homepage.

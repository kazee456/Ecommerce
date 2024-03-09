<div class="container mt-5">
    <h1 class="text-center">Edit Products</h1>
    <form action=""method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" class="form-control mb-4"
             required="required">
        </div>
         <div class="form-outline w-50 m-auto">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" name="product_desc" class="form-control mb-4"
             required="required">
        </div>
        <div class="form-outline w-50 m-auto">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" class="form-control mb-4"
             required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_categories" class="form-label">Product Categories</label>
            <select name="product_category" class="form-select w-100 mb-4 py-2">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4</option>
                <option value="">5</option>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form-label">Product Brands</label>
            <select name="product_brands" class="form-select w-100 mb-4 py-2">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4</option>
                <option value="">5</option>
            </select>
        </div>
         <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex  mb-4">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-80 m-auto"
             required="required">
             <img src="./product_images/Curry wallpaper.jpeg" alt="" class="product_img">
            </div>  
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex  mb-4">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto"
             required="required">
             <img src="./product_images/Curry wallpaper.jpeg" alt="" class="product_img">
            </div>  
        </div>
          <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image3</label>
            <div class="d-flex mb-4">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto"
             required="required">
             <img src="./product_images/Curry wallpaper.jpeg" alt="" class="product_img">
            </div>  
        </div>
          <div class="form-outline w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control mb-4"
             required="required">
        </div>  
        <div class="text-center">
            <input type="submit" name="edit_product" value="Update Product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>
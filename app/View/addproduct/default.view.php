<form id="product_form" autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded">
    <div class="product_add_div">
        <div class="add_product_head">
            <div class="add_head_text">
                <h2>Product Add</h2>
            </div>
            <div class="add_cancel_div">
                <button type="submit" name="save_product" id="save_product">Save</button>
                <button type="button" name="cancel_product" id="cancel_product" onclick='window.location.assign("/")'>Cancel</button>
            </div>
        </div>
        <hr>
        <div class="regular_properties">
            <div class="form_group">
                <label for="sku">SKU</label>
                <input class="defaultinpt" style="" type="text" name="sku" id="sku" value="<?= isset($_POST['sku'])? $_POST['sku'] : ''?>">  
                <span style="width: 90px;" class="error" aria-live="polite"></span>
            </div>
            <div class="form_group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?= isset($_POST['name'])? $_POST['name'] : ''?>"> 
                <span class="error" aria-live="polite"></span>
            </div>
            <div  class="form_group">
                <label for="price">Price ($) </label>
                <input type="number" step="1" name="price" id="price" value="<?= isset($_POST['price'])? $_POST['price'] : ''?>">
                <span class="error" aria-live="polite"></span>
            </div>
            <div class="select_group">
                <label for="productType">Type Switcher</label>
                <select id="productType">
                    <option></option>
                    <option id="bookType"  value="Book">Book</option>
                    <option id="DVDType"  value="DVD-disk">DVD</option>
                    <option id="furnitureType" value="Furniture">Furniture</option>
                </select>
            </div>
        </div>
        <div class="selectedProductTypeDiv"><!-- Div container for  When the user select the product type -->
        <div id="book">
            <label for="weight">Weight (KG) </label>
            <input type="int" name="weight" id="weight" value="<?= isset($_POST['weight'])? $_POST['weight'] : ''?>">
            <span class="error" aria-live="polite"></span>
            <input type="hidden" id="typeBook" name="unitBook" value="Book">
        </div>
        <div id="DVD">
            <label for="size">Size (MB) </label>
            <input type="int" name="size" id="size" value="<?= isset($_POST['size'])? $_POST['size'] : ''?>">
            <span class="error" aria-live="polite"></span>
            <input type="hidden" id="typeDVD" name="unitDVD" value="DVD-disk">
        </div>  
        <div id="furniture">
            <div id="height_group">
                <label for="height">Height (CM) </label>
                <input type="int" name="height" id="height" value="<?= isset($_POST['height'])? $_POST['height'] : ''?>">
                <span style="height: 25px;" class="error" aria-live="polite"></span>
            </div>
            <div id="width_group">
                <label for="width">Width (CM) </label>
                <input type="int" name="width" id="width" value="<?= isset($_POST['width'])? $_POST['width'] : ''?>">
                <span style="height: 25px;" class="error" aria-live="polite"></span>
            </div>
            <div id="length_group">
              <label for="length">Length (CM) </label>
              <input type="int" name="length" id="length" value="<?= isset($_POST['length'])? $_POST['length'] : ''?>"> 
              <span style="height: 25px;" class="error" aria-live="polite"></span>
            </div>
            <input type="hidden" id="typeFurniture" name="unitFurniture" value="Furniture">
        </div>   
        <div id="textProductUnit">
            
        </div>
        </div>
    </div>
      
</form>

        <h1>Add a Product</h1>
        <form method="post" action ="addProduct.php">
            <input type="text" placeholder = "Name" name = "name"/>
            <input type="text" placeholder = "Brand" name = "brand"/>
            <textarea placeholder ="Description (Optional)" name = "description" rows = "4" ></textarea>
            <input type="text" placeholder = "Price" name = "price"/>
            <input type="text" placeholder = "ImageUrl" name = "imageurl"/>
            <select name = "gender" class = "admin-select">
                <option value = "Male">Male</option>
                <option value = "Female">Female</option>
            </select>
            <input type="submit" class="admin-submit"value = "Add"/>
        </form>

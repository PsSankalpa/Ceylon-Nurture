
        <?php $this -> view ("header",$data)?>

        <link rel="stylesheet" href="<?=ASSETS?>css/sellerStyle.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/common.css">

        <div class="">

            <img src="<?=ASSETS?>img/products.jpg" alt="top-image" class="upperpart">
            <div class="buttons_section mg1 btn-group center">
                        <button class="" onclick="registrationForm()">Register</button>
                        <button class="" onclick="products()">Register</button>
            </div>

        </div>
        <div class="form-popup" id="sellerForm">
                <form  class="form-container" method="POST">
                    <h1>Reistration</h1><br />

                    <label for="nameWithInitials"><b>Name With Initials</b></label>
                    <input type="text" placeholder="Enter Name With Initials" name="nameWithInitials" required>

                    <label for="nic"><b>NIC</b></label>
                    <input type="text" placeholder="Registration Number" name="nic" required>

                    <label for="registrationNumber"><b>Registration Number</b></label>
                    <input type="text" placeholder="Registration Number" name="registrationNumber" required>

                    <label for="tpNumber"><b>Telephone Number</b></label>
                    <input type="text" placeholder="TP Number" name="tpNumber" required>
                    
                    <label for="address"><b>Address</b></label>
                    <input type="text" placeholder="Address" name="address" required>

                    <button type="submit" class="btn" name="submit">Submit</button>
                    <button type="button" class="btn cancel" onclick="closeRegistrationForm()">Close</button>
                </form>
            </div>

            //products form
    <!-- <div class="form-popup" id="productForm">
                <form  class="form-container" method="POST">
                    <h1>Products</h1><br />

                    <label for="title"><b>Title</b></label>
                    <input type="text" placeholder="Enter Title" name="title" required>

                    <label for="file"><b>Image</b></label>
                    <input type="text" placeholder="Registration Number" name="file" required>

                    <label for="description"><b>description</b></label>
                    <input type="text" placeholder="description" name="description" required>

                    <button type="submit" class="btn" name="submit">Submit</button>
                    <button type="button" class="btn cancel" onclick="closeproductForm()">Close</button>
                </form>
            </div>-->

        <div class="products-section">
            
        </div>

        <script type="text/javascript" src="<?=ASSETS?>js/sellerJs.js"></script>

    </body>
</html>
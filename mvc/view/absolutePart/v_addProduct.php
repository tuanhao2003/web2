
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web2/public/css/product.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
   
    
    <div class="wrapper">
        <div class="form-box login">
            <h2>Add Product</h2>
            <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
            <form  action="#">
                <div class="input-box">
                    <span class="icon"><ion-icon name="key-outline"></ion-icon></span>
                    <input type="text" id="idProduct" name="idProduct" required >
                    <label>IdProduct</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="pricetag-outline"></ion-icon></span>
                    <input type="text" id="nameProduct" name="nameProduct" required >
                    <label>Name</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="cash-outline"></ion-icon></span>
                    <input type="text" id="priceProduct" name="priceProduct" required  >
                    <label>Price</label>
                </div>
                <div class="select-box">
                    <span class="icon"><ion-icon name="keypad-outline"></ion-icon></span>
                    <select name="typeProduct">
                        <option value="option1">Option1</option>
                        <option value="option2">Option2</option>
                        <option value="option3">Option3</option>
                    </select>
                    <label>Type Product</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="reader-outline"></ion-icon></span>
                    <input type="text" id="describeProduct" name="describeProduct" >
                    <label>Describe</label>
                </div>
                
                    <input type="file" id="file" hidden>
                    <div class="img-area" data-img="hello.png">
                        <i class='bx bxs-cloud-upload icon'></i>
                        <h3>Upload Image</h3>
                        <p>Image size must be less than <span>2MB</span></p>

                    </div>
                    <button class="select-image">Select Image</button>
                
                
                <button type="submit" class="btn" id="addProduct" name="addProduct">Add</button>
                
            </form>
        </div>
        
    </div>
    
    <script src="/web2/public/js/index.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

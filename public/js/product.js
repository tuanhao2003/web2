document.addEventListener('DOMContentLoaded', function() {
    fetch('/mvc/model/listproduct.php')
        .then(response => response.json())
        .then(products => {
            const productList = document.getElementById('product-list');
            products.forEach(product => {
                const productDiv = document.createElement('div');
                productDiv.classList.add('product');

                const image = document.createElement('img');
                // Thay đổi đường dẫn tới hình ảnh
                image.src = product.HinhAnh;
                productDiv.appendChild(image);

                const detailsDiv = document.createElement('div');
                detailsDiv.classList.add('product-details');

                const name = document.createElement('div');
                name.classList.add('product-name');
                name.textContent = product.TenSP;
                detailsDiv.appendChild(name);

                const description = document.createElement('div');
                description.classList.add('product-description');
                description.textContent = product.MoTa;
                detailsDiv.appendChild(description);

                productDiv.appendChild(detailsDiv);

                productList.appendChild(productDiv);
            });
        })
        .catch(error => {
            console.error('Error fetching products:', error);
        });
});

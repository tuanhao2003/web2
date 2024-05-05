(function () {
    document.addEventListener("DOMContentLoaded", function () {
        let popup = document.querySelector(".popup");
        let btn = document.querySelector(".addBtn");
        let addProductPopup = document.querySelector(".addProductPopup");
        let statusSetters = document.querySelectorAll(".toggle input");
        let form = document.getElementById("productForm");

        btn.addEventListener("mouseup", function () {
            if (!popup.classList.contains("show")) {
                popup.classList.add("show");
            }
        });

        document.addEventListener("mousedown", function (event) {
            if (!addProductPopup.contains(event.target)) {
                popup.classList.remove("show");
            }
        });

        form.addEventListener("submit", function (e) {
            e.preventDefault();
            let cloneForm = new FormData(form);
            fetch("http://localhost/web2/admin/products", {
                method: 'POST',
                body: cloneForm
            }).catch(error => {
                console.error('Error:', error);
            });
        });

        statusSetters.forEach(toggle => {
            let trData = toggle.parentElement.parentElement.parentElement;
            toggle.addEventListener("change", function () {
                form.querySelector("input:nth-child(1)").value = trData.querySelector("td:nth-child(2) > p").textContent;
                form.querySelector("input:nth-child(2)").value = trData.querySelector("td:nth-child(3) > p").textContent;
                form.querySelector("input:nth-child(3)").value = trData.querySelector("td:nth-child(4) > p").textContent;
                form.querySelector("input:nth-child(4)").value = trData.querySelector("td:nth-child(5) > p").textContent;
                form.querySelector("input:nth-child(5)").value = trData.querySelector("td:nth-child(6) > p").textContent;
                form.querySelector("input:nth-child(6)").value = trData.querySelector("td:nth-child(1) img").getAttribute("src");
                form.querySelector("input:nth-child(7)").value = trData.querySelector("td:nth-child(7) > p").textContent;
                form.querySelector("input:nth-child(8)").value = toggle.checked == true ? 1 : 0;

                window.method = "<?php $controller->updateProduct(); ?>"
                form.querySelector("input[type='submit']").click();
            });
        });
    })
})();
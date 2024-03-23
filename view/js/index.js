document.addEventListener("DOMContentLoaded", function () {
    let active = 0;
    let prev = 2;
    let next = 1;
    document.querySelectorAll(".slide").forEach(sld => {
        let itemList = sld.querySelectorAll(".slide-item");

    });
    
    function slide(itemList) {
        itemList[active].classList.toggle("active");
        itemList[next].classList.toggle("active");


        itemList[next].classList.toggle("next");
        itemList[prev].classList.toggle("next");


        itemList[prev].classList.toggle("prev");
        itemList[active].classList.toggle("prev");



        active ^= prev;
        prev ^= active;
        active ^= prev;

        active ^= next;
        next ^= active;
        active ^= next;
    }

    setInterval(slide, 5000);

    // document.querySelector(".prevItem").addEventListener("click", function () {
    //     itemList[active].classList.toggle("active");
    //     itemList[prev].classList.toggle("active");


    //     itemList[next].classList.toggle("next");
    //     itemList[active].classList.toggle("next");


    //     itemList[prev].classList.toggle("prev");
    //     itemList[next].classList.toggle("prev");



    //     active ^= next;
    //     next ^= active;
    //     active ^= next;

    //     active ^= prev;
    //     prev ^= active;
    //     active ^= prev;
    // })

    // document.querySelector(".nextItem").addEventListener("click", function () {
    //     itemList[active].classList.toggle("active");
    //     itemList[next].classList.toggle("active");


    //     itemList[next].classList.toggle("next");
    //     itemList[prev].classList.toggle("next");


    //     itemList[prev].classList.toggle("prev");
    //     itemList[active].classList.toggle("prev");



    //     active ^= prev;
    //     prev ^= active;
    //     active ^= prev;

    //     active ^= next;
    //     next ^= active;
    //     active ^= next;
    // })

    window.addEventListener("scroll", function () {
        let navbarPos = document.querySelector(".navBar").getBoundingClientRect();
        let navBottom = navbarPos.bottom;
        if (navBottom < 0) {
            if (!document.querySelector(".navBar").classList.contains("sticky")) {
                document.querySelector(".navBar").classList.add("sticky");

            }
        } if (window.scrollY == 0) {
            document.querySelector(".navBar").classList.remove("sticky");
        }
    })
});
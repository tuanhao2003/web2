document.addEventListener("DOMContentLoaded", function () {
    function slide(itemList, activeIndex) {
        let prev, next = 0;
        if (activeIndex - 1 < 0) {
            prev = itemList.length - 1;
        } else {
            prev = activeIndex - 1;
        }

        if (activeIndex + 1 > itemList.length - 1) {
            next = 0;
        } else {
            next = activeIndex + 1;
        }


        itemList[activeIndex].classList.toggle("active");
        itemList[next].classList.toggle("active");


        itemList[next].classList.toggle("next");
        itemList[prev].classList.toggle("next");


        itemList[prev].classList.toggle("prev");
        itemList[activeIndex].classList.toggle("prev");

        activeIndex = next;
        return activeIndex;
    }

    document.querySelectorAll(".slide").forEach(sld => {
        let itemList = sld.querySelectorAll(".slide-item");
        let index = 0;
        
        setInterval(function(){
            index = slide(itemList, index);
        }, 5000)
    });


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
                setTimeout(function(){
                    document.querySelector(".hideBox").classList.add("hide")
                },300);
            }
        } if (window.scrollY == 0) {
            document.querySelector(".hideBox").classList.remove("hide");
            setTimeout(function(){
                document.querySelector(".navBar").classList.remove("sticky")
            },300);
        }
    })

    document.querySelector(".searchIcon").addEventListener("click", function(){
        document.querySelector(".hideBox").classList.remove("hide");
    });
});
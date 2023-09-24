$(document).ready(function () {
    const tabs = document.querySelectorAll(".tab-item");
    const panes = document.querySelectorAll(".tab-pane");

    tabs.forEach((tab, index) => {
        const pane = panes[index];

        tab.onclick = function () {
            document
                .querySelector(".tab-item.active")
                .classList.remove("active");
            document
                .querySelector(".tab-pane.active")
                .classList.remove("active");

            this.classList.add("active");
            pane.classList.add("active");
        };
    });



    // danh sách bài viết


    const tabsPost = document.querySelectorAll(".tab-item-post");
    const panesPost = document.querySelectorAll(".tab-pane-post");

    tabsPost.forEach((tab, index) => {
        const panesPosts = panesPost[index];

        tab.onclick = function () {
            document
                .querySelector(".tab-item-post.active")
                .classList.remove("active");
            document
                .querySelector(".tab-pane-post.active")
                .classList.remove("active");

            this.classList.add("active");
            panesPosts.classList.add("active");
        };
    });

    const dropUser = document.querySelector(".dropdow-user");
    const drop = document.querySelector(".user-dropdown");
    const dropexit = document.querySelector(".dropexit");
    dropUser.onclick = function (e) {
        e.preventDefault();
        drop.classList.toggle("active");
    };
    dropexit.onclick = () => {
        drop.classList.remove("active");
    };

    // const register = document.querySelector("#register");
    // register.onclick = (e) => {
    //     e.preventDefault();
    //     $("#login").modal("hide");
    //     $("#registerForm").modal("show");
    // };

    // const loginreg = document.querySelector(".login-btn");
    // loginreg.onclick = (e) => {
    //     e.preventDefault();
    //     $("#registerForm").modal("hide");
    //     $("#login").modal("show");
    // };

    const register = document.querySelector("#forgetPassword");
    register.onclick = (e) => {
        e.preventDefault();
        $("#login").modal("hide");
        $("#forgetPass").modal("show");
    };

    // const togglePassword = document.querySelector("#togglePassword");
    // const password = document.querySelector(".repass");

    // const togglePassword1 = document.querySelector("#togglePassword1");
    // const password1 = document.querySelector(".repass1");

    // togglePassword.addEventListener("click", function (e) {
    //     const type =
    //         password.getAttribute("type") === "password" ? "text" : "password";
    //     password.setAttribute("type", type);
    //     this.classList.toggle("fa-eye-slash");
    // });

	// togglePassword1.addEventListener("click", function (e) {
    //     const type =
	// 	password1.getAttribute("type") === "password" ? "text" : "password";
    //     password1.setAttribute("type", type);
    //     this.classList.toggle("fa-eye-slash");
    // });



    const item_user = document.querySelectorAll(".item_user");
    item_user.forEach((tab, index) => {
        tab.onclick = function (e) {
            e.preventDefault()    
            document
                .querySelector(".item_user.active")
                .classList.remove("active");

            let tabdis = '.tab_' + tab.getAttribute('data-nav')
            let pane = document.querySelector(tabdis)
            document
                .querySelector('.tab_info.show')
                .classList.remove("show");

            this.classList.add("active");
            pane.classList.add("show");
        };
    });


    const filterCards = document.querySelectorAll('.single_filter_card');
    const sections = document.querySelectorAll('.item-products')
    // if(filterCards) {
    //     filterCards.forEach( item => {
    //         item.addEventListener('click', () => {
    //             // const active = document.querySelector(".single_filter_card.active");
    //             // if(active) {
    //             //     active.classList.remove('active')
    //             // }

    //             // item.classList.add('active');

    //             let card = '.filter_card_'+ item.getAttribute('id').trim();
    //             let getCard = document.querySelector(card);
    //             getCard.scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"}) 
    //         })


    //     })
    // }
    
    window.addEventListener('scroll', () => {
        let current = "";
        sections.forEach( section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;

            if(scrollY >= (sectionTop - sectionHeight / 3)) {
                current = section.getAttribute('id');
            }
        })
        if (current) {
            filterCards.forEach( item => {
                let card = 'filter_card_'+current.trim();
                item.classList.remove("active");
                if (item.classList.contains(card)) {
                    item.classList.add('active')
                }
            })

        }

    })

});




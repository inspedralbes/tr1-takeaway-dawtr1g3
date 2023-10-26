const { createApp } = Vue;
import { getProductes } from "../js/comunicationManager.js";

createApp({
    data() {
        return {
            productes: [],
            categories: [],
            shopping_cart: {
                products_cart: [],
                totalPrice: 0,
                totalItems: 0,
            },
            user: {
                name: "",
                surnames: "",
                DNI: "",
                residence: "",
                email: "",
            },
            // landingImage: {
            //     currentSlideIndex: 0,
            //     slides: [
            //         { src: "../img/img-landing-carrusel1.png", caption: "Caption Text" },
            //         { src: "../img/img-landing-carrusel2.png", caption: "Caption Two" },
            //         { src: "../img/img-landing-carrusel3.png", caption: "Caption Three" },
            //         { src: "../img/img-landing-carrusel4.png", caption: "Caption Four" },
            //     ]
            // },
            nav_toggle: false,
            cart_toggle: false,
            landing_page: true,
            shop_page: false,
            checkout_page: false,
            status_page: false,
        };
    },
    methods: {
        //header
        clickNavToggle() {
            this.nav_toggle = !this.nav_toggle;
        },
        clickTitlePage() {
            this.landing_page = true;
            this.shop_page = false;
            this.checkout_page = false;
            this.status_page = false;
        },
        clickCartToggle() {
            this.cart_toggle = !this.cart_toggle;
            if (this.shopping_cart.products_cart.length == 0) {
                this.showTotalTicket = false;
            } else {
                this.showTotalTicket = true;
            }
        },
        //front-page_functions
        clickStartShopping() {
            this.landing_page = false;
            this.shop_page = true;
        },

        //shlidesShow


        //shop-page_functions
        searchProductePos(producte) {
            for (let i = 0; i < this.productes.length; i++) {
                if (producte.id == this.productes[i].id) {
                    return i;
                }
            }
        },
        countPriceAccount() {
            let priceSCart = 0;
            this.shopping_cart.products_cart.forEach(element => {
                priceSCart += element.preu * element.counter;
            });
            this.shopping_cart.totalPrice = priceSCart;
        },
        countItemsAccount() {
            let itemsSCart = 0;
            this.shopping_cart.products_cart.forEach(element => {
                itemsSCart += element.counter;
            });
            this.shopping_cart.totalItems = itemsSCart;
        },
        clickButtonMore(producte) {
            let position = this.searchProductePos(producte);
            this.productes[position].counter++;
            if (!this.shopping_cart.products_cart.includes(this.productes[position])) {
                this.shopping_cart.products_cart.push(this.productes[position]);
            }
            //shopping_cart
            this.countPriceAccount();
            this.countItemsAccount();
        },
        //ticket
        searchProducte_CartPos(producte_cart) {
            for (let i = 0; i < this.shopping_cart.products_cart.length; i++) {
                if (producte_cart.id == this.shopping_cart.products_cart[i].id) {
                    return i;
                }
            }
        },
        clickButtonLess(producte_cart) {
            let position = this.searchProductePos(producte_cart);
            if (this.productes[position].counter > 0) {
                this.productes[position].counter--;
                if (this.productes[position].counter == 0) {
                    let index = this.searchProducte_CartPos(producte_cart);
                    this.shopping_cart.products_cart.splice(index, 1);
                }
                //shopping_cart
                this.countPriceAccount();
                this.countItemsAccount();
                if (this.shopping_cart.totalItems == 0) {
                    this.clickCartToggle();
                }
            }
        },
        clickBuyButton() {
            this.shop_page = false;
            this.cart_toggle = false;
            this.checkout_page = true;
        }
        //checkout-page_functions

        //status-page_functions
    },
    created() {
        getProductes().then((productes) => {
            this.productes = productes;
            console.log(this.productes);
            this.productes.forEach((element) => {
                element.counter = 0;
            });
        });

        // let slideIndex = 0;
        // showSlides();

        // function showSlides() {
        //     let i;
        //     let slides = document.getElementsByClassName("mySlides");
        //     let dots = document.getElementsByClassName("dot");
        //     for (i = 0; i < slides.length; i++) {
        //         slides[i].style.display = "none";
        //     }
        //     slideIndex++;
        //     if (slideIndex > slides.length) { slideIndex = 1 }
        //     for (i = 0; i < dots.length; i++) {
        //         dots[i].className = dots[i].className.replace(" active", "");
        //     }
        //     slides[slideIndex - 1].style.display = "block";
        //     dots[slideIndex - 1].className += " active";
        //     setTimeout(showSlides, 2000); // Change image every 2 seconds
        // }
    },
}).mount("#app");

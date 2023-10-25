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
            nav_toggle: false,
            cart_toggle: false,
            landing_page: false,
            shop_page: false,
            checkout_page: true,
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
        //shop-page_functions
        searchProductePos(producte) {
            for (let i = 0; i < this.productes.length; i++) {
                if(producte.id == this.productes[i].id){
                    return i;
                }
            }
        },
        countPriceAccount() {
            let priceSCart = 0;
            this.shopping_cart.products_cart.forEach( element => {
                priceSCart += element.preu * element.counter;
            });
            this.shopping_cart.totalPrice = priceSCart;
        },
        countItemsAccount() {
            let itemsSCart = 0;
            this.shopping_cart.products_cart.forEach( element => {
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
                if(producte_cart.id == this.shopping_cart.products_cart[i].id){
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
                    this.shopping_cart.products_cart.splice(index,1);
                }
                //shopping_cart
                this.countPriceAccount();
                this.countItemsAccount();
                if (this.shopping_cart.totalItems == 0) {
                    this.clickCartToggle();
                }
            }
        },
        clickBuyButton(){
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
    },
}).mount("#app");

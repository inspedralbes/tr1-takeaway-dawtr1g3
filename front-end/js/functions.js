const { createApp } = Vue;
import { getProductes } from "../js/comunicationManager.js";

createApp({
    data() {
        return {
            productes: [],
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
            shop_page: true,
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
            console.log(position);
            console.log('here');
            this.productes[position].counter++;
            console.log('hola');
            if (!this.shopping_cart.products_cart.includes(this.productes[position])) {
                console.log('aaaa');
                this.shopping_cart.products_cart.push(this.productes[position]);
                console.log('ppppp');
            }
            //shopping_cart
            this.countPriceAccount();
            this.countItemsAccount();
            //views
            // this.showTotals();
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

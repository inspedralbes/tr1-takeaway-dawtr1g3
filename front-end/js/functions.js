const { createApp } = Vue
import { getProductes } from "./comunicationManager.js";

createApp({
    data() {
        return {
            productes: [],
            shopping_cart: {
                products_cart: [],
                totalPrice: 0,
                totalItems: 0
            },
            user: {
                name: '',
                surnames: '',
                DNI: '',
                residence: '',
                email: ''
            },
            front_page: true,
            shop_page: false,
            checkout_page: false,
            status_page: false
        }
    },
    methods: {
        //front-page_functions
        
        //shop-page_functions
        
        //checkout-page_functions
        
        //status-page_functions

    },
    created() {
        getProductes().then( productes=> {
            this.productes = movies
            this.productes.forEach(element => {
                element.counter = 0;
            });
        });
    }
}).mount('#app')


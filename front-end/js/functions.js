const { createApp } = Vue
import { getProductes } from "../js/comunicationManager(array).js";

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
            landing_page: true,
            shop_page: false,
            checkout_page: false,
            status_page: false
        }
    },
    methods: {
        //front-page_functions
        clickStartShopping(){
            this.landing_page = false;
            this.shop_page = true;
        }
        //shop-page_functions
        
        //checkout-page_functions
        
        //status-page_functions

    },
    created() {
        getProductes().then( productes => {
            console.log('Data loaded:', productes);
            this.productes = productes
            this.productes.forEach(element => {
                element.counter = 0;
            });
        });
    }
}).mount('#app')


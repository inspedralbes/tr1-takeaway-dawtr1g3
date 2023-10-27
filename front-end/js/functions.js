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
            admin_page: false,
            order_admin: false,
            product_admin: false,
            edit_order: false,

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
            this.admin_page = false;
            this.edit_order=false;
            this.order_admin=false;
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
        },
        //checkout-page_functions
        clickBuyForm() {
            const response = fetch("http://localhost:8000/api/comandes", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify([{ total: this.shopping_cart.totalPrice }]),
            });
            response.then((response) => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error("Error al crear la comanda.");
                }
            }).then((data) => {
                const comandaID = data.comandaID;
                console.log("ID de la comanda creada:", comandaID);
                const responseLineaComanda = fetch("http://localhost:8000/api/lineacomandes", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify([{ items: this.shopping_cart.products_cart }, { idComanda: comandaID }]),
                });
            }).catch((error) => {
                console.error(error);
            });
            this.checkout_page = false;
            this.landing_page = true;
        },
        //status-page_functions
        clickOrdersButton() {
            this.landing_page = false;
            this.shop_page = false;
            this.cart_toggle = false;
            this.checkout_page = false;
            this.status_page = true;
        },
        clickAdminFunction() {
            this.edit_order=false;
            this.admin_page = true;
            this.landing_page = false;
            this.shop_page = false;
            this.cart_toggle = false;
            this.checkout_page = false;
            this.status_page = false;
            this.order_admin = false;
            this.product_admin = false;
          } ,
          ClickOrderAdmin() {
            this.edit_order = true; // Establece edit_order a true
            this.order_admin = false; // Establece order_admin a true
            this.admin_page = false; // Asegúrate de ocultar otras secciones si es necesario
            this.landing_page = false;
            this.shop_page = false;
            this.cart_toggle = false;
            this.checkout_page = false;
            this.status_page = false;
            this.product_admin = false; // Asegúrate de ocultar product_admin si es necesario
          },     
        ClickProductsAdmin() {

            this.product_admin = true;
            this.admin_page = false;
            this.landing_page = false;
            this.shop_page = false;
            this.cart_toggle = false;
            this.checkout_page = false;
            this.status_page = false;
            this.order_admin = false;
            this.edit_order=false;
            
        },
        clickStartOrders() {
            this.order_admin = true;
            this.product_admin = false; 
            this.admin_page = false;
            this.landing_page = false;
            this.shop_page = false;
            this.cart_toggle = false;
            this.checkout_page = false;
            this.status_page = false;
            this.edit_order = false; // Establece edit_order a true

        }
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

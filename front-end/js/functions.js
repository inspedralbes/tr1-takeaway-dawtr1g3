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
                email: "",
                password: "",
            },
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
            showTotalTicket: false,
            login_page: false,
        };
    },
    // computed: {
    //     isFormValid: function() {
    //         return this.user.name && this.user.surnames && this.user.email && this.user.password;
    //     }
    // },

    methods: {
     
        //allPages
        hiddenAllPages() {
            this.nav_toggle = false,
                this.cart_toggle = false,
                this.landing_page = false,
                this.shop_page = false,
                this.checkout_page = false,
                this.status_page = false,
                this.admin_page = false,
                this.order_admin = false,
                this.product_admin = false,
                this.edit_order = false,
                this.isFormValid = false,
                this.login_page = false

        },
        
        //header
        clickNavToggle() {
            this.nav_toggle = !this.nav_toggle;
        },
        clickTitlePage() {
            this.hiddenAllPages();
            this.landing_page = true;
        },
        clickCartToggle() {
            this.cart_toggle = !this.cart_toggle;
            if (this.shopping_cart.products_cart.length == 0) {
                this.showTotalTicket = false;
            } else {
                this.showTotalTicket = true;
            }
        },
        searchProducte() {
            let inputNomLanding = document.getElementById('searchInputLanding');
            let inputNomNav = document.getElementById('searchInputNav');
            if (inputNomNav != null) {
                var nom = inputNomNav.value;
            } else if (inputNomLanding != null) {
                var nom = inputNomLanding.value;
            }
            const response = fetch(`http://localhost:8000/api/productes/search/${nom}`);
            response.then((response) => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error("Error al fer una cerca.");
                }
            }).then((data) => {
                this.productes = data;
                this.hiddenAllPages();
                this.shop_page = true;
                console.log("Els productes per la recerca:", this.productes);
                this.productes.forEach((element) => {
                    element.counter = 0;
                });
            }).catch((error) => {
                console.error(error);
            });
        },

        //front-page_functions
        clickStartShopping() {
            this.hiddenAllPages();
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
            this.hiddenAllPages();
            this.checkout_page = true;
            if (localStorage == null) {
                this.user.name = localStorage.getItem(JSON.parse(user.name));
                this.user.surnames = localStorage.getItem(JSON.parse(user.surnames));
                this.user.residence = localStorage.getItem(JSON.parse(user.email));
                this.user.email = localStorage.getItem(JSON.parse(user.password));
            }
        },
        //checkout-page_functions
        clickBuyForm() {
            const response = fetch("http://localhost:8000/api/comandes", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify([{ total: this.shopping_cart.totalPrice },]),
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
                responseLineaComanda.then((response) => {
                    if (response.ok) {
                        this.hiddenAllPages();
                        this.landing_page = true;
                        this.shopping_cart.products_cart = [];
                        this.shopping_cart.totalAccount = 0;
                        this.shopping_cart.totalItems = 0;
                        this.productes.forEach(element => {
                            element.counter = 0;
                        });
                        return response.json();
                    } else {
                        throw new Error("Error al crear la comanda.");
                    }
                });
            }).catch((error) => {
                console.error(error);
            });
            if (localStorage == null) {
                localStorage.setItem('user', JSON.stringify(this.user));
            } else {
                localStorage.clear();
                localStorage.setItem('user', JSON.stringify(this.user));
            }
            // if (this.isFormValid) {

            // } else {
            //     console.log('Por favor, complete todos los campos obligatorios.');
            // }
        },
      
        //status-page_functions
        clickOrdersButton() {
            this.hiddenAllPages();
            this.status_page = true;
        },
        clickAdminFunction() {
            this.hiddenAllPages();
            this.admin_page = true;
        },
        clickLogin() {
            this.hiddenAllPages();
            this.login_page = true;
        },

        ClickOrderAdmin() {
            this.hiddenAllPages();
            this.edit_order = true;
        },
        ClickProductsAdmin() {
            this.hiddenAllPages();
            this.product_admin = true;
        },
        clickStartOrders() {
            this.hiddenAllPages();
            this.order_admin = true;
        },

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

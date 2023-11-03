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
            usuari: {
                name: "",
                surnames: "",
                email: "",
                password: "",
            },
            estatOrderClient: {
                id: '',                
                usuari: "",
                estat: "",
                total: "",
                productsOrder: {}
            },
            views: {
                nav_toggle: false,
                cart_toggle: false,
                landing_page: true,
                shop_page: false,
                checkout_page: false,
                status_page: false,
                showTotalTicket: false,
                searchOrderClientPage: false,
                register_page: false,
                login_page: false,
                orders_users:false
            }
        };
    },
    methods: {

        //allPages
        hiddenAllPages() {
            this.views.nav_toggle = false,
            this.views.cart_toggle = false,
            this.views.landing_page = false,
            this.views.shop_page = false,
            this.views.checkout_page = false,
            this.views.status_page = false,
            this.views.admin_page = false,
            this.views.order_admin = false,
            this.views.product_admin = false,
            this.views.edit_order = false,
            this.views.isFormValid = false,
            this.views.login_page = false,
            this.views.register_page = false,
            this.views.orders_users =false
        },

        //header
        clickNavToggle() {
            this.views.nav_toggle = !this.views.nav_toggle;
        },
        clickTitlePage() {
            this.hiddenAllPages();
            this.views.landing_page = true;
        },
        clickCartToggle() {
            this.views.cart_toggle = !this.views.cart_toggle;
            if (this.shopping_cart.products_cart.length == 0) {
                this.views.showTotalTicket = false;
            } else {
                this.views.showTotalTicket = true;
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
                this.views.shop_page = true;
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
            this.views.shop_page = true;
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
            this.views.checkout_page = true;
            if (localStorage == null) {
                this.usuari.name = localStorage.getItem(JSON.parse(user.name));
                this.usuari.surnames = localStorage.getItem(JSON.parse(user.surnames));
                this.usuari.residence = localStorage.getItem(JSON.parse(user.email));
                this.usuari.email = localStorage.getItem(JSON.parse(user.password));
            }
        },
        //checkout-page_functions
        clickBuyForm() {
            const response = fetch("http://localhost:8000/api/comandes", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify([{ total: this.shopping_cart.totalPrice }, { usuari: this.usuari.email }]),
            });
            response.then((response) => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error("Error al crear la comanda.");
                }
                }).then((data) => {
                    const comandaID = data.comandaID;
                    const responseLineaComanda = fetch("http://localhost:8000/api/lineacomandes", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        
                        body: JSON.stringify([{items: this.shopping_cart.products_cart}, {idComanda: comandaID}, {usuari: this.usuari},{total: this.shopping_cart.totalPrice}]),
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
                            //return response.json();
                        } else {
                            throw new Error("Error al crear la comanda.");
                        }
                    });
                }).catch((error) => {
                    console.error(error);
                });
                if (localStorage == null) {
                    localStorage.setItem('user', JSON.stringify(this.usuari));
                } else {
                    localStorage.clear();
                    localStorage.setItem('user', JSON.stringify(this.usuari));
                }
            // if (this.isFormValid) {

            // } else {
            //     console.log('Por favor, complete todos los campos obligatorios.');
            // }
        },

        //status-page_functions
        clickOrdersButton() {
            this.hiddenAllPages();
            this.views.status_page = true;
        },
        clickOrdersUser(){
            this.hiddenAllPages();
            this.views.orders_users=true;
        },
        clickSearchOrderClient() {
            let inputOrderClient = document.getElementById('searchInputOrderClient');
            var id = inputOrderClient.value;

            const response = fetch(`http://localhost:8000/api/comandes/${id}`);
            response.then((response) => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error("Error al fer una cerca.");
                }
            }).then((data) => {
                this.estatOrderClient.id = data.comanda.id;
                this.estatOrderClient.estat = data.comanda.estat;
                this.estatOrderClient.usuari = data.comanda.usuari;
                this.estatOrderClient.total = data.comanda.total;
                this.views.searchOrderClientPage = true;
                let comandaID = this.estatOrderClient.id;
                const responseLineaComanda = fetch(`http://localhost:8000/api/lineacomandes/orderclient/${comandaID}`);
                responseLineaComanda.then((response) => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error("Error al fer una cerca.");
                    }
                }).then((data) => {
                    this.estatOrderClient.productsOrder = data.items;
                    console.log(data.items);
                    console.log(this.estatOrderClient.productsOrder);
                }).catch((error) => {
                    console.error(error);
                });
            }).catch((error) => {
                console.error(error);
            });
        },
        // Register-Login Functions
        clickLogin() {
            this.hiddenAllPages();
            this.views.login_page = true;
        },
        clickRegister() {
            this.hiddenAllPages();
            this.views.register_page = true;
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

        document.addEventListener("DOMContentLoaded", function () {
            const button = document.querySelector(".hamburger__toggle");
            button.addEventListener("click", () => button.classList.toggle("toggled"));
          });
    },
}).mount("#app");

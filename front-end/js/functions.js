const { createApp } = Vue;
import { getProductes } from "../js/comunicationManager.js";
import { getCategories } from "../js/comunicationManager.js";

createApp({
    data() {
        return {
            productesOriginal: [],
            productes: [],
            categories: [],
            selectedCategory: null,
            shopping_cart: {
                products_cart: [],
                totalPrice: 0,
                totalItems: 0,
            },
            usuari: {
                nom: "",
                cognoms: "",
                email: "",
                contrasenya: "",
                token: ""
            },
            registreMissatge: "",
            checkFormMissatge: "",
            error: 0,
            loginActive: false,
            estatOrderClient: {
                id: '',
                usuari: "",
                estat: "",
                total: "",
                productsOrder: {}
            },
            ordersClient: [],
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
                orders_users: false,
                registreMissatgeView: false,
                adminButton: false,
                checkFormMissatge: false
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
                this.views.orders_users = false,
                this.views.registreMissatgeView = false,
                this.views.checkFormMissatge = false
        },
        //header
        clickNavToggle() {
            this.views.cart_toggle = false;
            this.views.registreMissatgeView = false;
            this.views.nav_toggle = !this.views.nav_toggle;
        },
        clickTitlePage() {
            this.hiddenAllPages();
            this.views.landing_page = true;
        },
        clickCartToggle() {
            this.views.cart_toggle = !this.views.cart_toggle;
            this.views.registreMissatgeView = false;
            this.views.nav_toggle = false;
            if (this.shopping_cart.products_cart.length == 0) {
                this.views.showTotalTicket = false;
                this.views.cart_toggle = false;
            } else {
                this.views.showTotalTicket = true;
            }
        },
        //front-page_functions
        searchProducte() {
            this.productes = this.productesOriginal;
            let inputNomLanding = document.getElementById('searchInputLanding');
            let inputNomNav = document.getElementById('searchInputNav');
            let result;

            if (inputNomNav != null) {
                var keyword = inputNomNav.value.trim().toLowerCase();
            } else if (inputNomLanding != null) {
                var keyword = inputNomLanding.value.trim().toLowerCase();
            }

            if (keyword == "") {
                result = [...this.productesOriginal]; // Clona el array
            } else {
                // Filtra los elementos del array que contienen la palabra clave en su nombre o descripción.
                result = this.productes.filter((element) => {
                    const nombre = element.nom.toLowerCase();
                    const descripcion = element.descripcio.toLowerCase();
                    return nombre.includes(keyword) || descripcion.includes(keyword);
                });
            }

            this.productes = result; // Actualiza el array productes con el resultado de la búsqueda.
            this.hiddenAllPages();
            this.views.shop_page = true;
        },
        filterByCategory(category) {
            this.selectedCategory = category.id;

            if (category.id == null) {
                this.productes = this.productesOriginal;
            } else {
                this.productes = this.productesOriginal;
                this.productes = this.productes.filter(product => product.categoria_id == category.id);
            }
        },
        clickStartShopping() {
            this.hiddenAllPages();
            this.selectedCategory = null,
                this.productes = this.productesOriginal;
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
        toggleCardDescription(producte) {
            producte.mostrarDescripcion = !producte.mostrarDescripcion;
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
                this.usuari.nom = localStorage.getItem(JSON.parse(user.nom));
                this.usuari.cognoms = localStorage.getItem(JSON.parse(user.cognoms));
                this.usuari.email = localStorage.getItem(JSON.parse(user.email));
                this.usuari.contrasenya = localStorage.getItem(JSON.parse(user.contrasenya));
            }
        },
        //checkout-page_functions
        validateEmail() {
            var emailField = document.getElementById('email');
            var nombreField = document.getElementById('nom');
            var apellidosField = document.getElementById('cognoms');
            var passwordField = document.getElementById('contrasenya');
            var validEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

            if (nombreField.value == "") {
                this.error = 1;
                this.views.checkFormMissatge = true;
                this.checkFormMissatge = 'Verifica que has introduit el nom.';
            } else {
                if (apellidosField.value == "") {
                    this.error = 1;
                    this.views.checkFormMissatge = true;
                    this.checkFormMissatge = 'Verifica que has introduit els cognoms.';
                } else {
                    if (!validEmail.test(emailField.value)) {
                        this.error = 1;
                        this.views.checkFormMissatge = true;
                        this.checkFormMissatge = 'Verifica que has introduit un correu o que el format es el correcte.';
                    } else {
                        if (passwordField.value == "") {
                            this.error = 1;
                            this.views.checkFormMissatge = true;
                            this.checkFormMissatge = 'Verifica que has introduït una contrasenya.';
                        } else {
                            const response = fetch("http://localhost:8000/api/usuari/validation", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                body: JSON.stringify({
                                        usuari: this.usuari,
                                        loginActive: this.loginActive,
                                    }),
                            });
                            response.then((response) => {
                                if (response.ok) {
                                    return response.json();
                                } else {
                                    throw new Error("Error al validar usuari.");
                                }
                            }).then((jsonData) => {
                                const dades = jsonData.data;
                                if (dades['error'] == 1) {
                                    this.error = 1;
                                    this.views.checkFormMissatge = true;
                                    this.checkFormMissatge = dades['missatge'];
                                } else {
                                    this.clickBuyForm()
                                }
                            }).catch((error) => {
                                console.error(error);
                            });
                        }
                    }
                }
            }


        },
        clickBuyForm() {
            this.hiddenAllPages();
            this.views.landing_page = true;
            const response = fetch("http://localhost:8000/api/comandes", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": `Bearer ${this.usuari.token}`
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
                        "Authorization": `Bearer ${this.usuari.token}`
                    },

                    body: JSON.stringify([{ items: this.shopping_cart.products_cart }, { idComanda: comandaID }, { usuari: this.usuari }, { total: this.shopping_cart.totalPrice }]),
                });
                responseLineaComanda.then((response) => {
                    if (response.ok) {
                        this.shopping_cart.products_cart = [];
                        this.shopping_cart.totalAccount = 0;
                        this.shopping_cart.totalItems = 0;
                        this.productes.forEach(element => {
                            element.counter = 0;
                        });
                    } else {
                        throw new Error("Error al crear la linea comanda.");
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
        },
        //status-page_functions
        clickOrdersButton() {
            this.hiddenAllPages();
            this.views.status_page = true;
        },
        clickOrdersUser() {
            const response = fetch("http://localhost:8000/api/comandes/orderclient", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": `Bearer ${this.usuari.token}`
                },
                body: JSON.stringify(this.usuari),
            });
            response.then((response) => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error("Error al cercar comandes del usuari.");
                }
            }).then((jsonData) => {
                this.ordersClient = jsonData.comandes;
                this.hiddenAllPages();
                this.views.orders_users = true;
            }).catch((error) => {
                console.error(error);
            });
        },
        clickSearchOrderClient(id) {
            const response = fetch(`http://localhost:8000/api/comandes/${id}`, {
                headers: {
                    'Authorization': `Bearer ${this.usuari.token}`,
                    'Content-Type': 'application/json'
                },
                method: 'GET'
            });
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
                this.hiddenAllPages();
                this.views.status_page = true;
                this.views.searchOrderClientPage = true;
                let comandaID = this.estatOrderClient.id;
                const responseLineaComanda = fetch(`http://localhost:8000/api/lineacomandes/orderclient/${comandaID}`, {
                    headers: {
                        'Authorization': `Bearer ${this.usuari.token}`,
                        'Content-Type': 'application/json'
                    },
                    method: 'GET'
                });
                responseLineaComanda.then((response) => {
                    if (response.ok) {
                        return response.json();

                    } else {
                        throw new Error("Error al fer una cerca.");
                    }
                }).then((data) => {
                    this.estatOrderClient.productsOrder = data.items;
                }).catch((error) => {
                    console.error(error);
                });
            }).catch((error) => {
                console.error(error);
            });
        },
        // Register-Login Functions
        // Login Functions
        clickLogin() {
            this.hiddenAllPages();
            this.views.login_page = true;
        },
        clickLoginForm() {
            const response = fetch("http://localhost:8000/api/login", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(this.usuari),
            });
            response.then((response) => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error("Error al iniciar Sessió.");
                }
            }).then((jsonData) => {
                const dades = jsonData.data;
                if (dades['error'] == 1) {
                    this.views.registreMissatgeView = true;
                    this.registreMissatge = dades['missatge'];
                    this.error = 1;
                } else {
                    this.usuari.token = dades['token'];
                    this.error = 0;
                    this.loginActive = true;
                    this.hiddenAllPages();
                    this.views.landing_page = true;
                    if (dades['tipusUsuari'] == 1) {
                        this.views.adminButton = true;
                    }
                }
            }).catch((error) => {
                console.error(error);
            });

            if (localStorage == null) {
                localStorage.setItem('user', JSON.stringify(this.usuari));
            } else {
                localStorage.clear();
                localStorage.setItem('user', JSON.stringify(this.usuari));
            }
        },
        // Register Functions
        clickRegister() {
            this.hiddenAllPages();
            this.views.register_page = true;
        },
        clickRegisterForm() {
            const response = fetch("http://localhost:8000/api/register", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(this.usuari),
            });
            response.then((response) => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error("Error al crear usuari.");
                }
            }).then((jsonData) => {
                const dades = jsonData.data;
                if (dades['error'] == 1) {
                    this.error = 1;
                    this.views.registreMissatgeView = true;
                    this.registreMissatge = dades['missatge'];
                } else {
                    this.error = 0;
                    this.views.registreMissatgeView = true;
                    this.registreMissatge = dades['missatge'];
                }
            }).catch((error) => {
                console.error(error);
            });

            if (localStorage == null) {
                localStorage.setItem('user', JSON.stringify(this.usuari));
            } else {
                localStorage.clear();
                localStorage.setItem('user', JSON.stringify(this.usuari));
            }
        },
        // Logout Functions
        clickLogout() {
            const response = fetch("http://localhost:8000/api/logout", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": `Bearer ${this.usuari.token}`
                }
            });

            response.then(
                this.usuari.token = "",
                this.loginActive = false,
                this.views.adminButton = false
            );
        },
        // AdminPage
        clickAdminPage() {
            var nuevaRuta = 'http://studentstock.daw.inspedralbes.cat/back-end/laravel-api/public/admin';
            window.open(nuevaRuta, '_blank');
        }
    },
    created() {
        getProductes().then((productes) => {
            this.productesOriginal = productes;
            this.productesOriginal.forEach((element) => {
                element.counter = 0;
            });
            this.productes = [...this.productesOriginal];
        });
        getCategories().then((categories) => {
            this.categories = categories;
        });
        document.addEventListener("DOMContentLoaded", function () {
            const button = document.querySelector(".hamburger__toggle");
            button.addEventListener("click", () => button.classList.toggle("toggled"));
        });
    },
}).mount("#app");

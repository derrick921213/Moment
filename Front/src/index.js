// import "./index.scss";
// import Modal from "bootstrap/js/dist/modal";
// Vue.createApp({
//   data() {
//     return {
//       products: [],
//       amountShow: 0,
//     }
//   },
//   created() {
//     let url = "https://moment.duacodie.com/Back/PHP/readJSON/product.json"
//     fetch(url).then(res => res.json()).then(data => {
//       this.products = data;
//     })
//   },
//   methods: {
//     minus(product) {
//       product.amountShow--;
//       product.amountShow = (product.amountShow < 1) ? 0 : product.amountShow
//     },
//     plus(product) {
//       product.amountShow++;
//       product.amountShow = (product.amountShow > 9) ? 9 : product.amountShow
//     },
//   }
// }).mount("#app");

// function modalHandler() {
//   const cartBtn = document.getElementById("cart-btn");
//   const cart = new Modal(document.getElementById("cart"), {
//       keyboard: false,
//   });

//   cartBtn.addEventListener("click", function () {
//       cart.toggle();
//   });
// }
// modalHandler();


import "./index.scss";
import Modal from "bootstrap/js/dist/modal";
Vue.createApp({
  data() {
    return {
      products: [],
      cartItems: [],
    }
  },
  created() {
    let url = "https://moment.duacodie.com/Back/PHP/readJSON/product.json"
    fetch(url).then(res => res.json()).then(data => {
      this.products = data;
    })
  },
  methods: {
    addToCart(product) {
      let index = this.cartItems.findIndex(item => item.id === product.id);
      if (index === -1) {
        this.cartItems.push({ id: product.id, title: product.title, price: product.price, quantity: 1 });
      } else {
        this.cartItems[index].quantity++;
      }
    },
    removeFromCart(item) {
      let index = this.cartItems.findIndex(cartItem => cartItem.id === item.id);
      this.cartItems.splice(index, 1);
    },
    getTotalPrice() {
      return this.cartItems.reduce((total, item) => total + item.price * item.quantity, 0);
    },
    getCartCount() {
      return this.cartItems.reduce((total, item) => total + item.quantity, 0);
    }
  },
  computed: {
    cartIsEmpty() {
      return this.cartItems.length === 0;
    }
  }
}).mount("#app");

function modalHandler() {
  const cartBtn = document.getElementById("cart-btn");
  const cart = new Modal(document.getElementById("cart"), {
    keyboard: false,
  });

  cartBtn.addEventListener("click", function () {
    cart.toggle();
  });
}
modalHandler();

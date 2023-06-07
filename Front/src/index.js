import "./index.scss";
import Modal from "bootstrap/js/dist/modal";
import axios from 'axios';
Vue.createApp({
  data() {
    return {
      products: [],
      cartItems: [],
      amountShow: 0,
    };
  },
  methods: {
    // minus(product) {
    //   this.addToCart(product, false);
    // },
    minus(product) {
      const index = this.cartItems.findIndex((item) => item.id === product.id);
      if (index > -1) {
        if (this.cartItems[index].amount >= 0) {
          this.addToCart(product, false);
        }
      }
    },

    plus(product) {
      this.addToCart(product);
    },
    addToCart(product, increase = true) {
      const index = this.cartItems.findIndex((item) => item.id === product.id);
      if (index > -1) {
        this.cartItems[index].amount += increase ? 1 : -1;
        this.cartItems[index].amount = this.cartItems[index].amount < 1 ? 0 : this.cartItems[index].amount > 9 ? 9 : this.cartItems[index].amount;
        if (this.cartItems[index].amount === 0) {
          this.removeFromCart(index);
        }
      } else {
        this.cartItems.push({
          id: product.id,
          title: product.title,
          price: product.price,
          amount: increase ? 1 : 0,
        });
      }
      const cartItem = this.cartItems.find((item) => item.id === product.id);
      product.amountShow = cartItem ? cartItem.amount : 0;
    },
    removeFromCart(index) {
      const productId = this.cartItems[index].id;
      this.cartItems.splice(index, 1);
      const product = this.products.find((product) => product.id === productId);
      if (product) {
        product.amountShow = 0;
      }
    },
    getTotalPrice() {
      return this.cartItems.reduce((total, item) => {
        return total + item.price * item.amount;
      }, 0);
    }, 
    checkout() {
      //  axios 
      const data = {
        totalPrice: this.getTotalPrice()
      };
      axios.post('page/test.php', data)
        .then(function (response) {
          // 處理後端回應
          console.log(response);
          console.log("success");
        })
        .catch(function (error) {
          // 處理錯誤
          console.log(error);
          console.log(data);
        });
    }

  },
  created() {
    // let url = "https://moment.duacodie.com/Back/PHP/readJSON/product.json"
    let url = "https://moment.duacodie.com/api/menu";
    fetch(url).then(res => res.json()).then(data => {
      this.products = data;
      this.products.forEach((product) => {
        product.amountShow = 0;
      });
    })
  },
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


// import "./index.scss";
// import Modal from "bootstrap/js/dist/modal";
// Vue.createApp({
//   data() {
//     return {
//       products: [],
//       cartItems: [],
//     }
//   },
//   created() {
//     let url = "https://moment.duacodie.com/Back/PHP/readJSON/product.json"
//     fetch(url).then(res => res.json()).then(data => {
//       this.products = data;
//     })
//   },
//   methods: {
//     addToCart(product) {
//       let index = this.cartItems.findIndex(item => item.id === product.id);
//       if (index === -1) {
//         this.cartItems.push({ id: product.id, title: product.title, price: product.price, quantity: 1 });
//       } else {
//         this.cartItems[index].quantity++;
//       }
//     },
//     removeFromCart(item) {
//       let index = this.cartItems.findIndex(cartItem => cartItem.id === item.id);
//       this.cartItems.splice(index, 1);
//     },
//     getTotalPrice() {
//       return this.cartItems.reduce((total, item) => total + item.price * item.quantity, 0);
//     },
//     getCartCount() {
//       return this.cartItems.reduce((total, item) => total + item.quantity, 0);
//     },
//     increaseQuantity(item) {
//       item.quantity++;
//     },
//     decreaseQuantity(item) {
//       if (item.quantity > 1) {
//         item.quantity--;
//       }
//     }
//   },
//   computed: {
//     cartIsEmpty() {
//       return this.cartItems.length === 0;
//     }
//   }
// }).mount("#app");

// function modalHandler() {
//   const cartBtn = document.getElementById("cart-btn");
//   const cart = new Modal(document.getElementById("cart"), {
//     keyboard: false,
//   });

//   cartBtn.addEventListener("click", function () {
//     cart.toggle();
//   });
// }
// modalHandler();


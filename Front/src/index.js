import "./index.scss";
// import Collapse from "bootstrap/js/dist/collapse";
import Modal from "bootstrap/js/dist/modal";
Vue.createApp({
  data() {
    return {
      products: []
    }
  },
  created() {
    // let url = "https://fakestoreapi.com/products";
    let url = "https://moment.duacodie.com/Back/PHP/readJSON/product.json"
    fetch(url).then(res => res.json()).then(data => {
      this.products = data;
    })
  },
  methods: {
    minus(product) {
      product.amountShow--;
      product.amountShow = (product.amountShow < 1) ? 0 : product.amountShow
    },
    plus(product) {
      product.amountShow++;
      product.amountShow = (product.amountShow > 9) ? 9 : product.amountShow
    },
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
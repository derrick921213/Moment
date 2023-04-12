import "./index.scss";
import Collapse from "bootstrap/js/dist/collapse";
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
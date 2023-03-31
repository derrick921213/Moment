import "./index.scss";
import Collapse from "bootstrap/js/dist/collapse";
Vue.createApp({
  data() {
    return {
      products: []
    }
  },
  created() {
    let url = "https://fakestoreapi.com/products";
    fetch(url).then(res => res.json()).then(data => {
      this.products = data;
    })
  }
}).mount("#app");
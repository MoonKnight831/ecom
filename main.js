import './style.css';
import products from "./api/product.json";
// console.log(products)
import { showProductContainer } from './homeProductCards';



    //  function calling for template
showProductContainer(products);


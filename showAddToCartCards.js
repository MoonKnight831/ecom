import products from "./api/product.json";
import { fetchQuantityFromCartLS } from "./fetchQuantityFromCartLs";
import { getCartProductFromLS } from "./getCartProducts";
import { incrementDecrement } from "./incrementDecrement";
import { removeProdFromCart } from "./removeProdFromCart";
import { updateCartProductTota } from "./updateCartProductTota";

let cartProducts = getCartProductFromLS();
let filterProducts = products.filter((curProd)=>{
    return cartProducts.some((curElem) => curElem.id ==curProd.id);

    // console.log(curProd.id)
})
console.log(filterProducts);
const cartElement = document.querySelector("#productCartContainer");
const templateContainer = document.querySelector("#productCartTemplate");
const showCartProduct =() =>{
    filterProducts.forEach((curProd)=>{

        const {category,id,image,name,stock,price} = curProd;
        const lsActualData = fetchQuantityFromCartLS(id,price)
        let productClone = document.importNode(templateContainer.content,true);

        productClone.querySelector("#cardValue").setAttribute("id",`card${id}`);
        productClone.querySelector(".category").textContent = category;
        productClone.querySelector(".productName").textContent = name;
        productClone.querySelector(".productImage").src = image;
        
        productClone.querySelector(".productQuantity").textContent = lsActualData.quantity;
        productClone.querySelector(".productPrice").textContent = lsActualData.price;
        productClone.querySelector

        productClone.querySelector(".stockElement").addEventListener('click',(events)=>{
            incrementDecrement(events,id,stock,price);
        })

        productClone.querySelector(".remove-to-cart-button").addEventListener('click',()=>
            removeProdFromCart(id))
        cartElement.appendChild(productClone);
    
    })
}

showCartProduct();
updateCartProductTota()
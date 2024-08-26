import { getCartProductFromLS } from "./getCartProducts";

export const updateCartProductTota =()=>{
    let productSub = document.querySelector(".productSubTotal");
    let finPrice = document.querySelector(".productFinalTotal")
    let localCartProd = getCartProductFromLS();
    let initialValue = 0
    let totalPrice = localCartProd.reduce((acc,curE,)=>{
        let prodPrice =  parseInt(curE.price) ||0;
        return acc + prodPrice
    },initialValue)
    // console.log(totalPric

    productSub.textContent =`₹${totalPrice.toFixed(2)}`;
    finPrice.textContent = `₹${totalPrice + 50}`;
    }
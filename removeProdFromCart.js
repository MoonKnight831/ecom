import { getCartProductFromLS } from "./getCartProducts";
import { showToast } from "./showToast";
import { updateCartProductTota } from "./updateCartProductTota";
import { updateCartValue } from "./updateCartValue";


export const removeProdFromCart = (id) => {
    let cartProducts = getCartProductFromLS();


  cartProducts = cartProducts.filter((curProd) => curProd.id !== id);

  localStorage.setItem("cartProductLS", JSON.stringify(cartProducts));


  // Remove the div by using Onclick 
  let remDiv = document.getElementById(`card${id}`);
  if(remDiv){
    remDiv.remove();
    showToast("Delete",id)
  }

  updateCartProductTota();

  updateCartValue(cartProducts)
};
import { getCartProductFromLS } from "./getCartProducts";
import { updateCartProductTota } from "./updateCartProductTota";

export const incrementDecrement = (events,id,stock,price) =>{
    const currentCardElement = document.querySelector(`#card${id}`);
    const productQuantity = currentCardElement.querySelector('.productQuantity');
    const productPrice = currentCardElement.querySelector('.productPrice');

    let  quantity = 1;
    let localStoragePrice = 0;

    let localCartProd = getCartProductFromLS();

    let existingProd = localCartProd.find((cur)=>cur.id === id)

    if(existingProd){
        quantity = existingProd.quantity;
        localStoragePrice = existingProd.price;
    }else{
        localStoragePrice= price;
        price = price;
    }

    if (events.target.className == "cartIncrement") {
        if(quantity<stock){
            quantity +=1;
        
      }else if(quantity == stock){
        quantity = stock;
        alert("you can't add more");
        localStoragePrice = price * stock;
      }
    }


    if (events.target.className == "cartDecrement") {
        if(quantity > 1){
            quantity -=1;
    }
    }

    // updating the local storage as quantity increase 

    localStoragePrice = price * quantity;
    localStoragePrice = Number(localStoragePrice.toFixed(2));

    let updatedCart = { id, quantity, price: localStoragePrice };
  
    updatedCart = localCartProd.map((curProd) => {
      return curProd.id === id ? updatedCart : curProd;
    });


    localStorage.setItem("cartProductLS", JSON.stringify(updatedCart));

    productQuantity.innerText =quantity;
    productPrice.innerText = localStoragePrice;



    updateCartProductTota()


    
  
}

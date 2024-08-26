import { getCartProductFromLS } from "./getCartProducts";
import { updateCartValue } from "./updateCartValue";
getCartProductFromLS();
export const addToCart = (event,id,stock)=>{
    
    let arrLocalStorageProduct = getCartProductFromLS();
    
    const currentProdElem = document.querySelector(`#card${id}`);
    let quantity = currentProdElem.querySelector(".productQuantity").innerText;
    let price = currentProdElem.querySelector(".productPrice").innerText;
    
    // console.log(quantity,price)
   price =  price.replace("₹","");

   let existingProd = arrLocalStorageProduct.find((curprod)=> curprod.id === id);
   if(existingProd && quantity >1 ){

    quantity = Number(existingProd.quantity) + Number( quantity);
    price = Number( price * quantity);
    let updateCart = {id,quantity,price};
    updateCart =  arrLocalStorageProduct.map((curprod)=>{
      return curprod.id == id ?updateCart :curprod
    })
   localStorage.setItem('cartProductLs',JSON.stringify(updateCart))
   console.log(updateCart)
   }
   
   if(existingProd){
   //  alert("your Product Is already Present In Your List ")
    return false;
   }else{

   price = Number( price * quantity);
   quantity = Number(quantity);
   
   // let updateCart = {id,quantity,price};
   arrLocalStorageProduct.push({id,quantity,price});
  }
localStorage.setItem('cartProductLs',JSON.stringify(arrLocalStorageProduct))
//    cartupdate value 
   updateCartValue(arrLocalStorageProduct);



};



let existingProd = arrLocalStorageProduct.find(
    (curProd) => curProd.id === id
  );

  console.log(existingProd);

  if (existingProd && quantity > 1) {
    quantity = Number(existingProd.quantity) + Number(quantity);
    price = Number(price * quantity);
    let updatedCart = { id, quantity, price };

    updatedCart = arrLocalStorageProduct.map((curProd) => {
      return curProd.id === id ? updatedCart : curProd;
    });
    console.log(updatedCart);

    localStorage.setItem("cartProductLS", JSON.stringify(updatedCart));
    
  }

  if (existingProd) {
    
    return false;
  }


  import { getCartProductFromLS } from "./getCartProducts";
import { updateCartValue } from "./updateCartValue";
export function showToast(operation,id){
    const toast = document.createElement("div")
    toast.classList.add("toast")

    if(operation === "add"){
        toast.textContent = `Your Product is Added To Cart`;
    }else{
        toast.textContent = `product With Id ID: ${id} has been Removed.`
    }
    document.body.appendChild(toast);
    setTimeout(() => {
        toast.remove();
    },2000);
}

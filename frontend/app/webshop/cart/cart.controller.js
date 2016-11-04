function CartController(CartFactory,$state,$rootScope,  toastr) {
  "ngInject"
  var vm = this;
    vm.products = CartFactory.getProducts();
    vm.buyProduct = buyProduct;
    vm.addProduct = addProduct;
    vm.subProduct = subProduct;
    vm.removeProduct = removeProduct;
     vm.showPayment = false;
    function addProduct() {
        updateProduct(vm.products);    
    }
    
    function subProduct() {
        updateProduct(vm.products);
    }
    
    function removeProduct(index) {
        if (index > -1) {
            vm.products.splice(index, 1);
        }
        $rootScope.$broadcast('updatecartheader', { add: -1 });
        updateProduct(vm.products);
    }
    
    function updateProduct(products) {
        
        CartFactory.updateProducts(products);
    }
    
    function buyProduct(){
     //   $state.go('buyfailed');
        CartFactory.buy(vm.products).then(function(response){
            
            if(response.data === 'false'){
                console.log(response.data)
                 window.location.href = "/login"
            }
            vm.showPayment = true;
        });
    }
    
    function success(response) {
        vm.products = response.data;
    }
    
    function error(error) {
        console.log(error)
    }

}
export default CartController;

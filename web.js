function addCart(id){
    // var sosp_hien_tai = document.getElementById(id).getAttribute('value');
    var sosp_hien_tai = document.getElementById("add_input-text").getAttribute('value');
    sosp_hien_tai = parseInt(sosp_hien_tai);
   
    document.getElementById("add_input-text").setAttribute('value',"1");
    
    $.post( "./addCart123.php",{ 'id':id,'number':sosp_hien_tai },function(data,status) {
        
        }
     );
     
     
}

function update_cart(id){
    var num = document.getElementById("quantity_".id);
    alert(num);
}
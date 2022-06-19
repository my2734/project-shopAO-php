
function display_modal(id){
    document.getElementById(id).style.display = 'block';
}

function changImg(id,mainImg){
    var listImg= document.getElementsByClassName('list-img');
    // console.log(listImg);
    for(i=0;i<listImg.length;i++){
        listImg[i].style.borderColor = 'transparent';
    }
    var path = document.getElementById(id).getAttribute('src');
    document.getElementById(id).style.borderColor = '#000';
    document.getElementById(mainImg).setAttribute('src',path);
}



// 
function displayCheck(id,idCheck){
    var listBorder = document.getElementsByClassName('item_size');
    for(i=0;i<listBorder.length;i++){
        listBorder[i].style.borderColor = "transparent";
    }

    var listCheck = document.getElementsByClassName('item_size-check');
    for(i=0;i<listCheck.length;i++){
        listCheck[i].style.display = 'none';
    }

    document.getElementById(id).style.borderColor = 'red';
   document.getElementById(idCheck).style.display = 'block';
}
// 

function sub_product(id){
    var sosp_hien_tai = document.getElementById(id).getAttribute('value');
    console.log(sosp_hien_tai);
    sosp_hien_tai = parseInt(sosp_hien_tai);
    if(sosp_hien_tai==1){
        alert('Vui lòng nhập số lượng sản phẩm')
    }else{
        sosp_hien_tai = sosp_hien_tai-1;
        sosp_hien_tai = sosp_hien_tai+"";
        document.getElementById(id).setAttribute('value',sosp_hien_tai);

    }
    
}

// 
function add_product(id){
    var sosp_hien_tai = document.getElementById(id).getAttribute('value');
    console.log(sosp_hien_tai);
    sosp_hien_tai = parseInt(sosp_hien_tai);
        sosp_hien_tai = sosp_hien_tai+1;
        sosp_hien_tai = sosp_hien_tai+"";
        document.getElementById(id).setAttribute('value',sosp_hien_tai);
}




function function_blur(id){
    var sosp_hien_tai = document.getElementById(id).getAttribute('value');
    document.getElementById(id).setAttribute('value',sosp_hien_tai);
}


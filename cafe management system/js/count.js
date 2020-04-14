function qtyUpdate1(kind){
    var c = parseInt(document.getElementById("qty1").value);
    if(kind == "up"){
        c++;
    }else if(kind == "down"){
        if(c >= 1) c--;
    }
    document.getElementById('qty1').value = c;
}

function qtyUpdate2(kind){
    var c = parseInt(document.getElementById("qty2").value);
    if(kind == "up"){
        c++;
    }else if(kind == "down"){
        if(c >= 1) c--;
    }
    document.getElementById('qty2').value = c;
}
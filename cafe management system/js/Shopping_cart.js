function update_item(id){
//var item_id=id;
var item_name= document.getElementById("name"+id).innerHTML;
var item_price= document.getElementById("price"+id).innerHTML;
var item_number= document.getElementById("number"+id).value;
var item_id=id;
localStorage.setItem('foodid'+id, item_id);
localStorage.setItem('item_name'+id, item_name);
localStorage.setItem('item_price'+id, item_price);
localStorage.setItem('item_number'+id, item_number);
if(item_number==0){
    localStorage.removeItem('foodid'+id);
    localStorage.removeItem('item_name'+id);
    localStorage.removeItem('item_price'+id);
    localStorage.removeItem('item_number'+id);
}
caculate_money();
}

function caculate_money(){
    var total_price=0;
    var subtotal_price=0;
    for(var i=1;i<=99;i++){
        var item_amount=localStorage.getItem('item_number'+i);
        var item_price=localStorage.getItem('item_price'+i);
        subtotal_price=Number(item_amount)*Number(item_price);
        total_price+=subtotal_price;
    }
    localStorage.setItem('total_price', total_price);
    document.getElementById("total_price").innerHTML="Total:"+total_price+"$";
    //alert(total_price);
}	

function delete_item(id){
    localStorage.removeItem('foodid'+id);
    localStorage.removeItem('item_name'+id);
    localStorage.removeItem('item_price'+id);
    localStorage.removeItem('item_number'+id);
    view_cart();
    caculate_money();
}

function view_cart(){
    var view_zone = document.getElementById("view_cart"); 
    var total_price=localStorage.getItem('total_price');
    var view_html="";
    for(var i=0;i<99;i++){
        var foodid=localStorage.getItem('foodid'+i);
        var item_name=localStorage.getItem('item_name'+i);
        var item_price=localStorage.getItem('item_price'+i);
        var item_number=localStorage.getItem('item_number'+i);
        var subtotal_price=Number(item_number)*Number(item_price);
        if(foodid!=""&&foodid!=null){
            view_html+="<tr><td>"+foodid+"</td><td>"+item_name+"</td><td>"+item_price+"$</td><td>x"+item_number;
            view_html+="</td><td>"+subtotal_price+"$</td><td><button onclick='delete_item("+foodid+")'>Delete</button></td></tr>";
        }
        view_zone.innerHTML=view_html;
    }
    if(total_price==0){
    view_html+="<tr><td></td><td></td><td></td><td></td><td>Empty</td></tr>";
    view_zone.innerHTML=view_html;
    }
    document.getElementById("total_price").innerHTML="Total:"+total_price+"$";
}

function set_cookie(){
    var total_price=localStorage.getItem('total_price');
    var item_list="";
    for(var i=0;i<99;i++){
        var foodid=localStorage.getItem('foodid'+i);
        var item_name=localStorage.getItem('item_name'+i);
        var item_number=localStorage.getItem('item_number'+i);
        if(foodid!=""&&foodid!=null){
            item_list+=item_name+" x"+item_number+"/ ";
            localStorage.removeItem('foodid'+i);
            localStorage.removeItem('item_name'+i);
            localStorage.removeItem('item_price'+i);
            localStorage.removeItem('item_number'+i);
        }
}
    document.cookie="item_list="+item_list;
    document.cookie="total_price="+total_price;
    localStorage.removeItem('total_price');
}


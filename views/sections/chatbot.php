<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<html>
<head>

<style>
    .container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  padding: 30px 15px 0 25px;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">

</head>
<body>
<div class="container">
<h3 class=" text-center">Messaging</h3>
<div class="messaging">
        <div class="mesgs">
          <div class="msg_history">
            
            <div class='incoming_msg'><div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div><div class='received_msg'><div class='received_withd_msg'><p>Hello! Welcome to Essence. I am Nick! Let me know what should I find for you!</p> </div>
          </div>
          </div>
      </div>
      <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Type a message"  id="msg"/>
              <button class="msg_send_btn" type="button" id="submit_btn"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
    
    <script>
        $("#submit_btn").click(function(){
            var da;
            $i = 0;
            $str = $("#msg").val();
            $("#msg").val(" ");
            if($str == ""){
                window.alert("Enter Something");
            }
            
            if($str != ""){
                $(".msg_history").append("<div class='outgoing_msg'><div class='sent_msg'><p>"+$str+"</p></div></div>");
                $.ajax({
                    url: "http://localhost/essence/helper/routing.php",
                    method:"POST",
                    dataType:"json",
                    data:{chatText : $str,chatbot : "true"},
                    success : function(data){
                       if(data.length != 0){ 
                        // console.log(da);
                        $name = data[$i].product_name;
                        $price = data[$i].price;
                        $product_id = data[$i].id;
                        $pro_desc = data[$i].short_description;
                        $(".msg_history").append("<div class='incoming_msg'><div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div><div class='received_msg'><div class='received_withd_msg'><p> Product Name : "+$name+"</p><p> Product Description : "+$pro_desc+"</p> <a href='http://localhost/essence/single-product-details/"+$product_id+"'>Click Here to Visit Product</a> </div>");
                       }else{
                           window.alert("Enter Valid Item");
                       }
                    }
                });
            }
            // console.log(da);
            // if("no".localeCompare($str) >= 0){
            //     console.log(da);
            //     $i++;
            //     $name = da[$i].product_name;
            //     $price = da[$i].price;
            //     $product_id = da[$i].id;
            //     $pro_desc = da[$i].short_description;
            //     $(".msg_history").append("<div class='incoming_msg'><div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div><div class='received_msg'><div class='received_withd_msg'><p> Product Name : "+$name+"</p><p> Product Description : "+$pro_desc+"</p> <a href='http://localhost/essence/single-product-details/"+$product_id+"'>Click Here to Visit Product</a> </div>");
            // }

            
            
        });
    
    </script>
    </body>
    </html>
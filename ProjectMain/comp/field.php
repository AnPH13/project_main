

<div id="listAll" class="container__field1"> 

    <?php 
    if(count($listPost)==0){
        echo "Không có bài viết nào thuộc chủ đề này";
    }
    foreach( $listPost as $value){
    ?>
        <div class="container__field1-item">
            <div class="container__field1-item-icon" >
                <img style="width: 100%;" src="./img/<?php echo $value['img'] ?>" alt="">
            </div>
            <div class="container__field1-item-title"><?php echo $value['name'] ?></div>
            <div  class="container__field1-item-decription">
               <?php echo $value['noiDung']?>  
            </div>
            <div style="margin-top: 10px;">
                <span>DANH MỤC:</span>
                <div class="container__field1-item-category">
                    Câu chuyện đẹp
                </div>
            </div>
            <div class="container__field1-item-date">
                <?php echo $value['date'] ?>
            </div>
        </div>
    <?php } ?>
</div> 
<div style="display:flex;"> 
    <button id="btnXemThem" style="margin:20px auto;">Xem thêm</button> 
</div>
   
    
    <!--  Ajax load them  --> 
    <script>
        document.getElementById('btnXemThem').onclick = function(){
            var xhttp = new XMLHttpRequest(); 
            xhttp.open('GET','api/xemThem.php',true);
			
			
            xhttp.onreadystatechange = function(){
				
                if(this.readyState ==4 && this.status == 200){

                     //alert(this.responseText);      // Kiểm tra lỗi 
                     $p = JSON.parse(this.responseText);
					 var stringR = "";
                   for( int i= 0; i<p.length;i++){
              
                          stringR + = '<div class="container__field1-item">'+
                            '<div class="container__field1-item-icon" >'+
                            '<img style="width: 100%;" src="./img/'+ p[i].img+'" alt="">'+
                            '</div>'+
                            '<div class="container__field1-item-title">'+ p[i].name+'</div>'+
                            '<div  class="container__field1-item-decription">'+
                            + p[i].noiDung+
                            '</div>'+
                            '<div style="margin-top: 10px;">'+
                            '<span>DANH MỤC:</span>'+
                            '<div class="container__field1-item-category">'+
                                    'Câu chuyện đẹp'+
                                '</div>'+
                            '</div>'+
                            '<div class="container__field1-item-date">'+
                            + p[i].date+
                            '</div>'+
                            '</div>';
                   }
				   
				     document.getElementById('listAll').innerHTML =stringR;
                }
            };
            
            xhttp.send();
        };
    </script>
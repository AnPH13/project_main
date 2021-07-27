
 
 <div class="app">
        <div class="header">
            <div class="header__title"><a href="#">VinHome</a></div>
            <div class="header__nav">
                <ul class="header__nav-list">
                    <li class="header__nav-item"><a href="#">Trang chủ</a></li>
                    <li class="header__nav-item">
                        <a href="#">Trang</a>
                        <ul  class="header__nav-item-list" style="width:175px;">
                            <?php foreach( $listCate as $value){
                            ?>
                                 <li><a href="index.php?cat=<?php echo $value['id'] ?>"><?php echo $value['name']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="header__nav-item"><a href="#">Login</a></li>
                    <li class="header__nav-item"><a href="#">LogOut</a></li>
                    <li class="header__nav-item"><a href="#">Thông tin thêm</a></li>
                    <li class="header__nav-item"><a href="#">Kết nối</a></li>
                </ul>
            </div>
        </div>
<div class="header-main">
    <h1>Đăng Nhập</h1>
    <div class="header-bottom">
        <div class="header-right w3agile">
            <div class="header-left-bottom agileinfo">
                <form action="check-login" method="POST">
                    <input type="text"  value="<?php if (isset($_COOKIE['username'])) echo $_COOKIE['username']; else { echo "Tên đăng nhập";}?>" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tên đăng nhập';}"/>
                    <input type="password"  value="<?php if (isset($_COOKIE['password'])) echo $_COOKIE['password']; else { echo "Password";}?>" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/>
<!--                    <input type="text"  value="--><?php //if (isset($_COOKIE['username'])) echo $_COOKIE['username'];?><!--" name="username"/>-->
<!--                    <input type="password"  value="--><?php //if (isset($_COOKIE['password'])) echo $_COOKIE['password'];?><!--" name="password"/>-->
                    <div class="remember">
			             <span class="checkbox1">
							   <label class="checkbox"><input type="checkbox" name="remember">
                                   Ghi nhớ tài khoản</label>
						 </span>
                        <div class="forgot">
                            <h6><a href="#">Quên mật khẩu?</a></h6>
                        </div>
                        <div class="register">
                            <h6><a href="register">Chưa có tài khoản? Đăng kí ngay</a></h6>
                        </div>
                        <div class="clear"> </div>
                    </div>

                    <input type="submit" value="Đăng Nhập">
                </form>
                <div class="header-left-top">
                    <div class="sign-up"> <h2>hoặc</h2> </div>

                </div>
                <div class="header-social wthree">
                    <a href="#" class="face"><h5>Facebook</h5></a>
                    <a href="#" class="twitt"><h5>Twitter</h5></a>
                </div>

            </div>
        </div>

    </div>
</div>
<script>
    // $("#remember-password").click(function (){
    //     $(this).css("display", "none");
    //     $("input[name=remember]").attr('checked', true);
    //     $("i.checked").css('display', 'inline-block');
    // })
</script>
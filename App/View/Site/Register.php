<div class="header-main">
    <h1>Đăng Kí</h1>
    <div class="header-bottom">
        <div class="header-right w3agile">
            <div class="header-left-bottom agileinfo">
                <form action="check-adduser" method="POST">
                    <div class="form-reg">
                        <label for="">Họ và tên</label>
                        <input type="text" name="name"/>
                    </div>
                    <div class="form-reg">
                        <label for="">Tên đăng nhập</label>
                        <input type="text" name="username"/>
                    </div>
                    <div class="form-reg">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="password"/>
                    </div>
                    <div class="form-reg">
                        <label for="">Giới tính</label>
                        <br>
                        <input type="radio" name="gender" value="Nam"/>
                        <label for="">Nam</label>
                        <input type="radio" name="gender" value="Nữ"/>
                        <label for="">Nữ</label>
                    </div>
                    <div class="remember">
                        <div class="forgot">
                            <h6><a href="login">Đã có tài khoản? Đăng nhập ngay</a></h6>
                        </div>
                        <div class="clear"> </div>
                    </div>

                    <input type="submit" value="Đăng Kí">
                </form>
                <div style="margin: 1em 1em;">
                    <h2 style="font-weight: bolder;color: #e1e1e1;text-transform: capitalize; text-align: center"><?=@$message?></h2>;
                </div>

            </div>
        </div>

    </div>
</div>
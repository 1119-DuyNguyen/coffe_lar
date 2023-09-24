<div style="width: 500px; margin: 0 auto;">
    <div style="text-align: center;">
        <h2>Xin chào {{$customer->hoten}}</h2>
        <p>Kích hoạt tài khoản của bạn</p>
        <p>Khi kích hoạt tài khoản của bạn, bạn sẽ có quyền đăng nhập sử dụng các tính năng của tài khoản.</p>
        <a href="{{ route('register.active', ['customer' => $customer->id, 'token' => $customer->token])}}"
            style="display: inline-block; background-color: #4e73df; color: #fff; padding: 7px 25px; text-decoration: none; border-radius: 3px;">
            Nhấn vào đây để kích hoạt
        </a>
    </div>
</div>
<div style="width: 500px; margin: 0 auto;">
<div style="text-align: center;">
   <h2>Xin chào {{$customer->hoten}}</h2>
   <p>Đặt lại mật khẩu.</p>
   <p>Nhấn vào đường đẫn dưới đây để đặt lại mật khẩu cho tài khoản của bạn.</p>
   <a href="{{ route('get.pass', ['customer' => $customer->id, 'token' => $customer->token])}}"
   style="display: inline-block; background-color: #4e73df; color: #fff; padding: 7px 25px; text-decoration: none; border-radius: 3px;"
   >
      Nhấn vào đây để kích hoạt
   </a>

</div>

</div>
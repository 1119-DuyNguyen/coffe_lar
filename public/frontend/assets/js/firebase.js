// var firebaseConfig = {
//     apiKey: "AIzaSyBK-juZ6krPJCHHELQgOW9sFUXsS9h3wHI",
//     authDomain: "fir-web-b823f.firebaseapp.com",
//     databaseURL: "https://fir-web-b823f.firebaseio.com",
//     projectId: "fir-web-b823f",
//     storageBucket: "fir-web-b823f.appspot.com",
//     messagingSenderId: "463332404757",
//     appId: "1:463332404757:web:68d04d3fdeeb333f",
// };
// // Initialize Firebase
// firebase.initializeApp(firebaseConfig);

// window.onload = function () {
//     render();
// };
// function render() {
//     window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier("recapcha", {
//         size: "invisible",
//         callback: (response) => {
//             // reCAPTCHA solved, allow signInWithPhoneNumber.
//             onSignInSubmit();
//         },
//     });
//     recaptchaVerifier.render();
// }
// $(document).on("click", "#sendPhone", function (e) {
//     e.preventDefault();

//     var number = $("input[name=phone]").val();
//     var pass = $("input[name=repass]").val();
//     var repass = $("input[name=repass1]").val();

//     if (number.length === 10) {
//         let num = number.split("");
//         if (num[0] != 0) {
//             alert("số diện thoại sai");
//         } else {
//             if (pass.length < 5) {
//                 alert("Mật khẩu ít nhật 5 kí tự");
//             } else {
//                 let route = $(this).data("route");
//                 if (pass === repass) {
//                     if (route) {
//                         console.log(route);
//                         $.ajax({
//                             url: route,
//                             type: "post",
//                             data: {
//                                 sdt: number,
//                                 pass: pass,
//                             },
//                             success(data) {
//                                 let std = data.sodienthoai
//                                 let format1 = std.replace(0, '+84')
//                                 firebase
//                                     .auth()
//                                     .signInWithPhoneNumber(format1, window.recaptchaVerifier)
//                                     .then(function (confirmationResult) {
//                                         //s is in lowercase
//                                         window.confirmationResult = confirmationResult;
//                                         coderesult = confirmationResult;
//                                         document.querySelector('#sendCode').style.display = "none"
//                                         document.querySelector('#verify').style.display = "block"
//                                        document.querySelector('#verifyCode').setAttribute('data-id', data.id)
//                                     })
//                                     .catch(function (error) {
//                                         alert(error.message);
//                                     });
//                             },
//                         });
//                     }
//                 } else {
//                     alert("Nhập sai mật khẩu sai");
//                 }
//             }
//         }
//     } else {
//         alert("số điện thoại sai !!!");
//     }
// });

// //xác nhận sms
// const verifyCode = document.querySelector("#verifyCode");
// verifyCode.onclick = (e) => {
//     e.preventDefault();
//     var code = $("input[name=verifycode]").val();
//     var idu =  $('#verifycode').data('id')
//     var routeg = $('#verifycode').data('route')
//     coderesult
//         .confirm(code)
//         .then(function (result) {
//                 if (route) {
//                     $.ajax({
//                         url: routeg,
//                         type: "post",
//                         data: {
//                             id: idu,
//                         },
//                         success(data) {
//                             if (data == 1 ) {
//                                 location.reload()
//                             }
//                         },
//                     });
//                 }
//         })
//         .catch(function (error) {
//             alert(error.message);
//         });
// };

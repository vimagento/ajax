<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }
        .application {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 1000px;
            height: 500px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        .application input {
            padding: 10px 20px;
            border-radius: 5px;
            border: 1px solid #a79b9b;
        }
    </style>
    <script>
        $(document).ready(function () {
            // Bắt sự kiện khi người dùng click vào button
             $('#calculate').click(function (e) {
                 // Ngăn không cho load lại trang
                 e.preventDefault();
                 //Lấy giá trị của 2 ô input
                 let so1 = $('input[name="so1"]').val(),
                     so2 = $('input[name="so2"]').val();

                 // Gửi request đến file calculate.php để xử lý với tham số là bien1 và bien2
                 $.ajax({
                    url: 'calculate.php',
                     type: 'POST',
                    data: {
                        bien1: so1,
                        bien2: so2
                    },
                     // Nếu thành công thì hiển thị kết quả ra trình duyệt
                     success: function (response) {
                        $('input[name="result"]').val(response);
                     },
                     error: function (error) {
                        console.log(error);
                     }
                 });
             });
        });
    </script>
</head>
<body>
<form class="application">
    <input type="number" name="so1" required/>
    <span>+</span>
    <input type="number" name="so2" required/>
    <input type="submit" id="calculate" value="Tính tổng"/>
    <input type="number" name="result" readonly>
</form>
</body>
</html>

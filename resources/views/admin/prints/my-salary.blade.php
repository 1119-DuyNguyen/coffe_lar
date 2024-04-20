<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ 'Lương của tôi' }}</title>
    <style>
        .container {
            width: 700px;
            margin: 0 auto;
            padding: 20px;
            /* border: 1px solid #ddd; */
            border-radius: 5px;
            justify-content: space-between;
        }

        .header,
        {
            text-align: center;
            position: relative;
            font-size: 24px;
            top: 1px;
        }

        .company-name {
            font-size: 20px;
            font-weight: bold;
        }

        .slip-title {
            font-size: 18px;
            text-decoration: underline;
        }

        .employee-info {
            position: relative;
            font-size: 14px;
            top: 1px;
            margin-bottom: 20px;
            text-align: center;
        }

        .employee-details {
            /* margin-bottom: 5px; */
            margin-right: 20px;
            font-weight: bold;
        }

        .table-container {
            width: 700px;
            margin-left: 25%;
            /* justify-content: center; */
        }

        .header {
            overflow: hidden;
        }

        .logo {
            background-color: #FFFFFF;
            text-align: left;
            float: left;
        }

        .company {
            padding-top: 24px;
            text-transform: uppercase;
            background-color: #FFFFFF;
            text-align: right;
            float: right;
            font-size: 16px;
        }


        .footer-container {
            width: 100%;
            margin: auto 250px;
        }

        table {
            border-collapse: collapse;
            /* Ensure borders don't overlap  */
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 5px;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="header">
        <div class="company-name">
            Công Ty TNHH Ngôi Nhà Cà Phê
        </div>
        <br>
        <br>
        -------oOo-------
        <div class="slip-title">
            PHIẾU LƯƠNG THÁNG:{{ $user->contract->first()->checkins->first()->created_at->format('m/Y') }}
        </div>
        <br>
        <br>
    </div>
    <div class="employee-info">
        <div class="employee-details">
            <span>Mã Số NV: {{ $user->employee_code }} </span>
        </div>
        <div class="employee-details">
            <span>Tên NV: {{ $user->name }} </span>
        </div>
    </div>
    <div class="table-container">
        <table>
            <thead>
            <tr>
                <th>STT</th>
                <th>Chỉ tiêu</th>
                <th>Thành tiền</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Lương cơ bản</td>
                <td>{{ $user->contract->first()->salary }}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Làm thêm giờ</td>
                <td>{{ $user->contract->first()->checkins->first()->over_times }}</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Số ngày nghỉ</td>
                <td>{{ $user->contract->first()->checkins->first()->auth_day_off }}</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Số ngày nghỉ có phép</td>
                <td>{{ $user->contract->first()->checkins->first()->unauth_day_off }}</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Số ngày công</td>
                <td>{{ $user->contract->first()->checkins->first()->reality_times }}</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Phụ cấp</td>
                <td>{{ $user->contract->first()->allowance }}</td>
            </tr>

            </tbody>
            <tfoot>
            <tr>
                <td colspan="2">Thực lĩnh</td>
                <td colspan="1">{{ $user->contract->first()->checkins->first()->total_salary }}</
                < /td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="footer-container">
        <footer>
            <br><br>
            <br><br>
            <div style="display: flex; justify-content: space-between; width: 100%;">
                <span style="margin-right: 20%;">Chữ ký người lập phiếu</span>
                <span style="margin-left: 20%;">Chữ ký người nhận tiền</span>
            </div>
        </footer>
    </div>

</div>
</body>

</html>

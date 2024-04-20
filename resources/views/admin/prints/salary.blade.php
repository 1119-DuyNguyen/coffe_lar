<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ 'Lương của tôi' }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            display: block;
            margin: 0;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            /* justify-content: center; */
        }

        .header {
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
            margin-bottom: 20px;
        }

        .employee-details {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .table-container {
            width: 100%;
            font-size: 12px;


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
                /* font-size: 16px; */
            }
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

        /*td::before {*/
        /*    content: "";*/
        /*    display: block;*/
        /*    width: 100%;*/
        /*    height: 1px;*/
        /*    background-color: #ddd;*/
        /*    position: absolute;*/
        /*    bottom: 0;*/
        /*}*/

        .footer-container {
            display: inline-block;
            width: 100%;
        }
    </style>
</head>

<body>
<div class="header">
    <div class="company-name">
        Công Ty TNHH Ngôi Nhà Cà Phê
    </div>
    <br>
    <br>
    -------oOo-------
    <div class="slip-title">
        PHIẾU LƯƠNG : {{ $month }}
    </div>
    <br>
    <br>
</div>
<div class="table-container">
    <table>
        <thead>
        <tr>
            <th>STT</th>
            <th>Mã nhân viên</th>
            <th>Họ và tên</th>
            <th>Lương cơ bản(đồng/ngày)</th>
            <th>Phụ cấp</th>
            <th>Số ngày nghỉ</th>
            <th>Tăng ca(tiếng)</th>
            <th>Số ngày công</th>
            <th>Lương thực lãnh</th>
        </tr>
        </thead>
        <tbody>
        @php
            $int = 1;
//            @endphp
        @forelse  ($checkins as $checkin)
            {{--                @foreach ($user->contract as $contract)--}}
            {{--                @foreach ($contract->checkins as $checkin)--}}
            <tr>
                <td>{{ $int }}</td>
                <td>{{ $checkin->contract->user->employee_code }}</td>
                <td>{{ $checkin->contract->user->name }}</td>
                <td>{{ $checkin->contract->salary }}</td>
                <td>{{ $checkin->contract->allowance }}</td>
                <td>{{ $checkin->auth_day_off }}</td>
                <td>{{ $checkin->over_times }}</td>
                <td>{{ $checkin->reality_times }}</td>
                <td>{{ $checkin->total_salary }}</td>
            </tr>
            @php
                $int++;
            @endphp
            {{--                    @endforeach--}}
            {{--                @endforeach--}}
        @empty
            <tr>
                <td colspan="9">Không thấy dữ liệu phù hợp</td>
            </tr>
        @endforelse
        {{-- @endif --}}
        </tbody>

    </table>
    <br><br>
    <br><br>
    <div class="footer-container">

        <span style="float:right">Chữ ký người lập phiếu</span>
        <span style="float:left">Chữ ký người nhận tiền</span>
    </div>
</div>
</body>

</html>

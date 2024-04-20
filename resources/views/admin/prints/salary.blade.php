<?php
$month = 1;
?>

<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ 'Lương của tôi' }}</title>
    <style>
        .container {
            width: 700px;
            margin: 0 auto;
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

        td::before {
            content: "";
            display: block;
            width: 100%;
            height: 1px;
            background-color: #ddd;
            position: absolute;
            bottom: 0;
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
                PHIẾU LƯƠNG THÁNG: {{ $month }}
            </div>
            <br>
            <br>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã nhân viên </th>
                        <th>Họ và tên </th>
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
                    @endphp
                    @foreach ($users as $user)
                        @foreach ($user->contract as $contract)
                            @foreach ($contract->checkins as $checkin)
                                <tr>
                                    <td>{{ $int }}</td>
                                    <td>{{ $user->employee_code }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $contract->salary }}</td>
                                    <td>{{ $contract->allowance }}</td>
                                    <td>{{ $checkin->auth_day_off }}</td>
                                    <td>{{ $checkin->over_times }}</td>
                                    <td>{{ $checkin->reality_times }}</td>
                                    <td>{{ $checkin->total_salary }}</td>
                                </tr>
                                @php
                                    $int++;
                                @endphp
                            @endforeach
                        @endforeach
                    @endforeach
                    {{-- @endif --}}
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

<!doctype html>
<html>

<body>
    <div
        style='background-color:#F5F5F5;color:#262626;font-family:"Helvetica Neue", "Arial Nova", "Nimbus Sans", Arial, sans-serif;font-size:16px;font-weight:400;letter-spacing:0.15008px;line-height:1.5;margin:0;padding:32px 0;min-height:100%;width:100%'>
        <table align="center" width="100%" style="margin:0 auto;max-width:600px;background-color:#FFFFFF"
            role="presentation" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr style="width:100%">
                    <td>
                        <h2 style="font-weight:bold;margin:0;font-size:24px;padding:16px 24px 16px 24px">
                            AJJ Car Rental
                        </h2>
                        <div style="font-weight:normal;padding:16px 24px 16px 24px">
                            Hi {{ explode(" ", $book->name)[0] }}, Thanks for choosing AJJ Car Rental, we’re
                            excited to confirm your car rental reservation. Here are the key
                            details of your booking:
                        </div>
                        <div style="padding:16px 24px 16px 24px">
                            <table align="center" width="100%" cellpadding="0" border="0"
                                style="table-layout:fixed;border-collapse:collapse">
                                <tbody style="width:100%">
                                    <tr style="width:100%">
                                        <td
                                            style="box-sizing:content-box;vertical-align:top;padding-left:0;padding-right:8px">
                                            <h3
                                                style="font-weight:bold;margin:0;font-size:20px;padding:20px 0px 16px 0px">
                                                Rental Details
                                            </h3>
                                            <div style="padding:0px 0px 0px 0px">
                                                <table align="center" width="100%" cellpadding="0" border="0"
                                                    style="table-layout:fixed;border-collapse:collapse">
                                                    <tbody style="width:100%">
                                                        <tr style="width:100%">
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:0;padding-right:8px">
                                                                <div
                                                                    style="color:#737373;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    Rental Option
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:8px;padding-right:0">
                                                                <div
                                                                    style="font-size:12px;font-weight:normal;text-align:left;padding:16px 0px 16px 0px">
                                                                    {{ ucfirst($book->rental_option) }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div style="padding:0px 0px 0px 0px">
                                                <table align="center" width="100%" cellpadding="0" border="0"
                                                    style="table-layout:fixed;border-collapse:collapse">
                                                    <tbody style="width:100%">
                                                        <tr style="width:100%">
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:0;padding-right:8px">
                                                                <div
                                                                    style="color:#737373;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    Vehicle
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:8px;padding-right:0">
                                                                <div
                                                                    style="font-size:12px;font-weight:normal;text-align:left;padding:16px 0px 16px 0px">
                                                                    {{ $book->car->model }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div style="padding:0px 0px 0px 0px">
                                                <table align="center" width="100%" cellpadding="0" border="0"
                                                    style="table-layout:fixed;border-collapse:collapse">
                                                    <tbody style="width:100%">
                                                        <tr style="width:100%">
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:0;padding-right:8px">
                                                                <div
                                                                    style="color:#737373;font-size:13px;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    Start Date and Time
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:8px;padding-right:0">
                                                                <div
                                                                    style="font-size:12px;font-weight:normal;text-align:right;padding:16px 0px 16px 0px">
                                                                    {{ date("F j, Y g:i A", strtotime($book->start_date_time)) }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div style="padding:0px 0px 0px 0px">
                                                <table align="center" width="100%" cellpadding="0" border="0"
                                                    style="table-layout:fixed;border-collapse:collapse">
                                                    <tbody style="width:100%">
                                                        <tr style="width:100%">
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:0;padding-right:8px">
                                                                <div
                                                                    style="color:#737373;font-size:13px;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    End Date and Time
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:8px;padding-right:0">
                                                                <div
                                                                    style="font-size:12px;font-weight:normal;text-align:right;padding:16px 0px 16px 0px">
                                                                    {{ date("F j, Y g:i A", strtotime($book->end_date_time)) }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div style="padding:0px 0px 0px 0px">
                                                <table align="center" width="100%" cellpadding="0" border="0"
                                                    style="table-layout:fixed;border-collapse:collapse">
                                                    <tbody style="width:100%">
                                                        <tr style="width:100%">
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:0;padding-right:8px">
                                                                <div
                                                                    style="color:#737373;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    Delivery
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:8px;padding-right:0">
                                                                <div
                                                                    style="font-size:12px;font-weight:normal;text-align:left;padding:16px 0px 16px 0px">
                                                                    {{ $book->delivery->name }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div style="padding:16px 0px 16px 0px">
                                                <hr
                                                    style="width:100%;border:none;border-top:1px solid #CCCCCC;margin:0" />
                                            </div>
                                            <div style="padding:0px 0px 0px 0px">
                                                <table align="center" width="100%" cellpadding="0" border="0"
                                                    style="table-layout:fixed;border-collapse:collapse">
                                                    <tbody style="width:100%">
                                                        <tr style="width:100%">
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:0;padding-right:8px">
                                                                <div
                                                                    style="color:#737373;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    Vehicle Price
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:8px;padding-right:0">
                                                                <div
                                                                    style="font-size:12px;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    &#8369;{{ $book->car->price }} Per day
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div style="padding:0px 0px 0px 0px">
                                                <table align="center" width="100%" cellpadding="0" border="0"
                                                    style="table-layout:fixed;border-collapse:collapse">
                                                    <tbody style="width:100%">
                                                        <tr style="width:100%">
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:0;padding-right:8px">
                                                                <div
                                                                    style="color:#737373;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    Delivery Price
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:8px;padding-right:0">
                                                                <div
                                                                    style="font-size:12px;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    &#8369;{{ $book->delivery->price }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div style="padding:0px 0px 0px 0px">
                                                <table align="center" width="100%" cellpadding="0" border="0"
                                                    style="table-layout:fixed;border-collapse:collapse">
                                                    <tbody style="width:100%">
                                                        <tr style="width:100%">
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:0;padding-right:8px">
                                                                <div style="font-weight:bold;padding:16px 0px 16px 0px">
                                                                    Total Amount
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:8px;padding-right:0">
                                                                <div
                                                                    style="font-size:12px;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    &#8369;{{ $book->total }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td
                                            style="box-sizing:content-box;vertical-align:top;padding-left:8px;padding-right:0">
                                            <h3
                                                style="font-weight:bold;margin:0;font-size:20px;padding:16px 24px 16px 24px">
                                                Renter&#x27;s Information
                                            </h3>
                                            <div style="padding:0px 0px 0px 0px">
                                                <table align="center" width="100%" cellpadding="0" border="0"
                                                    style="table-layout:fixed;border-collapse:collapse">
                                                    <tbody style="width:100%">
                                                        <tr style="width:100%">
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:0;padding-right:8px">
                                                                <div
                                                                    style="color:#737373;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    Name
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:8px;padding-right:0">
                                                                <div
                                                                    style="font-size:12px;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    {{ $book->name }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div style="padding:0px 0px 0px 0px">
                                                <table align="center" width="100%" cellpadding="0" border="0"
                                                    style="table-layout:fixed;border-collapse:collapse">
                                                    <tbody style="width:100%">
                                                        <tr style="width:100%">
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:0;padding-right:0">
                                                                <div
                                                                    style="color:#737373;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    Email
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:0;padding-right:0">
                                                                <div
                                                                    style="font-size:12px;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    {{ $book->email }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div style="padding:16px 0px 16px 0px">
                                                <table align="center" width="100%" cellpadding="0" border="0"
                                                    style="table-layout:fixed;border-collapse:collapse">
                                                    <tbody style="width:100%">
                                                        <tr style="width:100%">
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:0;padding-right:8px">
                                                                <div
                                                                    style="color:#737373;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    Contact number
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:8px;padding-right:0">
                                                                <div
                                                                    style="font-size:12px;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    {{ $book->contact_number }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div style="padding:0px 0px 0px 0px">
                                                <table align="center" width="100%" cellpadding="0" border="0"
                                                    style="table-layout:fixed;border-collapse:collapse">
                                                    <tbody style="width:100%">
                                                        <tr style="width:100%">
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:0;padding-right:8px">
                                                                <div
                                                                    style="color:#737373;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    Address
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:8px;padding-right:0">
                                                                <div
                                                                    style="font-size:12px;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    {{ $book->address }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div style="padding:0px 0px 0px 0px">
                                                <table align="center" width="100%" cellpadding="0" border="0"
                                                    style="table-layout:fixed;border-collapse:collapse">
                                                    <tbody style="width:100%">
                                                        <tr style="width:100%">
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:0;padding-right:8px">
                                                                <div
                                                                    style="color:#737373;font-weight:normal;padding:16px 0px 16px 0px">
                                                                    Message
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="box-sizing:content-box;vertical-align:middle;padding-left:8px;padding-right:0">
                                                                <div
                                                                    style="font-size:12px;font-weight:normal;padding:0px 0px 0px 0px">
                                                                    @foreach(explode("\n", $book->message) as $text)
                                                                        <p>{{ $text }}</p>
                                                                    @endforeach
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
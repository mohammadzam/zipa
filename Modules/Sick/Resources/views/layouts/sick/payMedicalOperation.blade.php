<html lang="fa">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="پرداخت اینترنتی به پرداخت ملت">
    <meta property="og:url" content="http://www.behpardakht.com/">
    <meta property="og:image" content="http://">

    <title> شركت زيبا | پرداخت اینترنتی</title>
    <link href="{{asset('assets/mellat/img/ipg-favicon.ico')}}" rel="shortcut icon">

    <link href="{{asset('assets/mellat/css/esprit_fa.min.css?v=16')}}" rel="stylesheet">
    <script src="{{asset('assets/mellat/js/jquery.min.js?v=1')}}"></script>
    <script src="{{asset('assets/mellat/msg/messages_fa.min.js?v=6')}}"></script>
    <script src="{{asset('assets/mellat/js/payment.min.js?v=30')}}"></script>


    <script>
        $(document).ready(function () {
            otpRequestWaitMillis = 120000
            setCardSuggestionListHeight();
            countDownRemainingTime(558);
            $("#cardnumber").focus();
            $(document).keydown(function (e) {
                var keyCode = getEventKeyCode(e);
                if (keyCode === ctrlKey || keyCode === cmdKey) ctrlDown = true;
            }).keyup(function (e) {
                var keyCode = getEventKeyCode(e);
                if (keyCode === ctrlKey || keyCode === cmdKey) ctrlDown = false;
            });
        });
    </script>
</head>
<body id="body" class="up-scroll" onclick="hideKeypadOnOutsideClick(event);hideCardSuggestionListOnOutSideClick(event)">
<header id="header">
    <div class="container">
        <div class="beh-card">
            <div class="row">
                <div class="col shaparaklogo align-self-start">
                    <img src="{{asset('assets/images/zipa.png')}}" alt="zipa">
                </div>
                <div class="col-6 header-center align-self-end">
                    <span>پرداخت اینترنتی شركت زيبا</span><br>
                    <span class="text-danger">توجه: اين صفحه واقعى نيست، وبراى تست پرداخت انجام شده </span><br>

                    <span class="behpardakht_a">www.zipa.com</span>

                </div>
                <div class="col behpardakhtlogo align-self-start"><img src="{{asset('assets/images/zipa.png')}}" alt="behpardakht">
                </div>
            </div>
        </div>
    </div>
</header>

<div class="main-wrapper payment">
    <section class="container">
        <div class="row row-eq-height">
            <div class="col-lg-8 col-md-12 col-sm-12 order-lg-1 order-2">
                <div class="beh-card carddetail">
                    <div class="background-overflow">
                        <span class="shape"></span>
                    </div>

                    <div class="card-header">
                        <h3>اطلاعات کارت</h3>
                        <span id="remaining-time">زمان باقی مانده :<b>07:20</b></span>
                    </div>
                    <div class="card-body">
                            <form method="POST" class="card-info" action="{{route('sick.pay.medical.operation.amount',$data->id)}}" enctype="multipart/form-data">
                                @csrf
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="cardnumber" class="col-form-label">شماره کارت</label>
                                </div>

                                <div class="col-md-6 col-sm-8 col-12 mobile-justify">
                                    <div class="cardnumberbox" id="cardnumberbox">
                                        <span class="banklogo"></span>
                                        <input type="tel" id="cardnumber" maxlength="19"
                                               onkeydown="preventInvalidKeys(event);setPanCursorPosition(event);"
                                               onkeyup="formatPanOnKeyUp(event);filterAndShowCardSuggestionList();setBankLogo();focusNextField(this,'inputcvv2',event);resetSelectedPan(event)"
                                               oninput="formatPanOnKeyUp(event);setBankLogo();focusNextField(this,'inputcvv2',event);resetSelectedPan(event)"
                                               onfocus="hideKeypad();removeInvalidClassFromPan()"
                                               onblur="handlePanChange()" value="" required>
                                        <button type="button" id="card-list-button" data-toggle="dropdown"
                                                onclick="toggleAllPans()" aria-haspopup="true" aria-expanded="false"
                                                tabindex="-1"></button>
                                        <div class="card-suggestionlist dropdown-menu"
                                             aria-labelledby="card-list-button" style="max-height: 329.7px;">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="inputcvv2" class="col-form-label">شماره شناسایی دوم (CVV2)</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-10  mobile-justify keypad-parent">
                                    <input type="password" class="form-control" id="inputcvv2" maxlength="4" onfocus="hideOthersKeypad(this);hideCardSuggestionList();removeInvalidClassFromInput('inputcvv2');
                                               showKeypadJustInMobile('inputcvv2',event)" autocomplete="off"
                                           onkeydown="preventInvalidKeys(event);"
                                           onkeyup="focusNextField(this,'inputmonth|inputcapcha',event);" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="inputmonth" class="col-form-label">تاریخ انقضای کارت</label>
                                </div>

                                <div class="col-2 d-lg-none d-sm-none"></div>

                                <div class="col-md-2 col-sm-3 col-4">
                                    <input type="tel" class="form-control" id="inputmonth" maxlength="2"
                                           placeholder="ماه" autocomplete="off" onkeydown="preventInvalidKeys(event);"
                                           onfocus="hideKeypad();removeInvalidClassFromInput('inputmonth')"
                                           onkeyup="focusNextField(this,'inputyear',event);" required>
                                </div>
                                <div class="col-md-2 col-sm-3 col-4">
                                    <input type="tel" class="form-control" id="inputyear" maxlength="2"
                                           placeholder="سال" autocomplete="off"
                                           onfocus="removeInvalidClassFromInput('inputmonth')"
                                           onkeydown="preventInvalidKeys(event);"
                                           onkeyup="focusNextField(this,'inputcapcha',event)" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-6 col-sm-8 col-12 mobile-justify btn-submit-form">
                                    <button type="submit" class="btn btn-perches" id=""
                                           >پرداخت
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 order-lg-2 order--1">
                <div class="beh-card merchantdetail">

                    <div class="card-body">

                        <div class="merchant-container">
                            <ul class="col-lg-12 col-sm-8 merchant-detail mb-4">
                                <li>نام پذیرنده : <b>کلینیک زيبايى "زيبا"</b></li>
                                <li>نام پرداخت كننده : <b>{{$data->sick->name}}</b></li>
                                <li>شرح عمليت پرداخت  : <span class="font-weight-bold">بابت انجام عمل جراجى زيبايى نزد دكتر {{$data->doctor->name??'بى نام'}} در قسمت {{$data->section->name??'بى نام'}} </span></li>
                                <li><b></b></li>
                                <li><b></b></li>

                            </ul>

                        </div>

                        <ul class="merchant-detail price">
                            <li>مبلغ قابل پرداخت :<b class="price-number">{{number_format($price->price)}} &nbsp; ریال</b></li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <div class="modal large-modal top_layer fade show" id="dynamic-pin-modal" tabindex="-1" role="dialog"
         aria-labelledby="ModalLabel" aria-hidden="true" style="display: none">
        <div class="modal-dialog modal-dialog-centered" role="document">
        </div>
    </div>
    <div class="modal-backdrop fade show" id="dynamic-pin-modal-backdrop" style="display: none"></div>

    <section class="container">
    </section>
</div>
<footer class="footer">
    <div class="container">
        <div class="footerarc"></div>
        <div class="footerarc content">
            <span class="call" >نكته بسيار مهم </span><br>
            <span style="font-size: 12px">اين صفحه واقعى نيست، وبراى تست پرداخت انجام شده </span>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">

            </div>
        </div>
    </div>
</footer>
</body>
</html>

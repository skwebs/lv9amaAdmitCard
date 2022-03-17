<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
    @media screen,
    print {
        * {
            -webkit-print-color-adjust: exact !important;
            /*Chrome, Safari */
            color-adjust: exact !important;
            /*Firefox*/
        }

        .admit-card {
            background: linear-gradient(rgba(250, 250, 250, 0.9),
                rgba(255, 255, 255, 0.85)),
            url("{{asset('images/web/ama-logo.jpg')}}") center/60px 60px round;
            /* box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); */
            width: 735px;
            height: 510px;
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }
    }

    .admit-card {
        background: linear-gradient(rgba(250, 250, 250, 0.85),
            rgba(255, 255, 255, 0.85)),
        url("{{asset('images/web/ama-logo.jpg')}}") center/60px 60px round;
        /* box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); */
        width: 735px;
        height: 510px;
        margin-top: 0 !important;
        margin-bottom: 0 !important;
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }


    .page-break {
        page-break-after: always;
        margin: 0px 0px 0px 0px;
        padding: 0px 0px 0px 0px;
        /* border-bottom: thin solid; */
    }

    .seal {
        position: absolute;
        left: 300px;
        bottom: 25px;
        width: 100px;
    }

    .seal-on-pic {
        position: absolute;
        right: 94px;
        bottom: 87px;
        width: 100px;
    }
    </style>

</head>

<body>

    <?php  $sn = 0 ?>
    @foreach($students as $student)

    <?php  $sn++ ?>

    <div style="width: 735px" height="518" class="card admit-card mx-auto">
        <div class="card-body">
            <!-- MAIN TABLE -->
            <table>
                <tr>
                    <td>
                        <div style="width: 700px;" class="d-flex justify-content-between my-0 py-0">
                            <span>Estd. 2017</span><span>Reg. No. 054631</span>
                        </div>
                    </td>
                </tr>
                <!-- FIRST ROW -->
                <tr>
                    <td>
                        <!-- HEADER TABE -->
                        <table width="700">
                            <tr>
                                <td width="80">
                                    <img height="80" src="{{asset('images/web/ama-logo.jpg')}}" alt="" srcset="" />
                                </td>
                                <td>
                                    <p class="text-center fs-1 py-0 my-0">
                                        <strong>
                                            Anshu Memorial
                                            Academy</strong>
                                    </p>

                                    <p class="text-center my-0 ">
                                        Run and managed by <strong>AnitaBindeshwar Foundation</strong> (Companies Act
                                        2013).
                                    </p>

                                </td>
                                <td width="80">
                                    <img height="80" src="{{asset('images/web/bbbp.jpg')}}" alt="" srcset="" />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- //FIRST ROW -->
                <tr>
                    <td>
                        <p class="text-center">
                            <strong>Bhatha Dasi, Rajapakar,
                                Vaishali, Bihar-844124</strong>
                        </p>
                    </td>
                </tr>
                <!-- SECOND ROW -->
                <tr>
                    <td class="text-center">
                        <div class="d-inline-block px-3 py-2 h4 rounded bg-primary text-white">
                            Admit Card
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <p class="fs-4 my-0">Annual Examination 2022</p>
                    </td>
                </tr>
                <!-- //SECOND ROW -->

                <!-- THIRD ROW -->
                <tr>
                    <td>
                        <table width="700">
                            <tr>
                                <td>
                                    <!-- details  -->
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>
                                                <!-- name -->
                                                <table class="table mb-0">
                                                    <tr>
                                                        <td>Name</td>
                                                        <td>
                                                            :
                                                            <strong>{{$student->name}}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Father's Name
                                                        </td>
                                                        <td>
                                                            : <strong>{{$student->father}}</strong>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td></td>
                                            <td>
                                                <!-- class -->
                                                <table class="table mb-0">
                                                    <tr>
                                                        <td>Class</td>
                                                        <td>: <strong>{{$student->class}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Roll No.</td>
                                                        <td>: <strong>{{$student->roll}}</strong></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="py-0">
                                                Note: <strong>Keep this card safely and must bring to
                                                    exam venue on every exam date.</strong>
                                            </td>

                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <!-- img -->
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="100">
                                                <img height="130" src="{{asset('upload/images/students/'.$student->image)}}"
                                                    alt="{{$student->image}}" />
                                                <img class="seal-on-pic" src="{{asset('images/web/seal-300.png')}}">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- //THIRD ROW -->
                <tr>
                    <td>
                        <br>
                        <br>

                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="700" class="text-center">
                            <tr>
                                <td>Principal Sign</td>
                                <td> School Seal <img class="seal" src="{{asset('images/web/seal-300.png')}}"></td>
                                <td>Exam Controller</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- //MAIN -->
        </div>
    </div>


    @if($sn % 2 == 0)
    <div class="page-break"></div>
    @else
    <br><br>
    @endif

    @endforeach


</body>

</html>
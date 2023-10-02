<?php

$imageLink = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/qr_code_PNG33 1.png');
$fontLink = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/SF-Pro-Display-Regular.otf');

// image string data into base64
$binaryImage = base64_encode($imageLink);
$binaryFont = base64_encode($fontLink);
?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>cheque</title>
    <style media="screen, print">
        /*@font-face {*/
        /*    font-family: SF Pro Display;*/
        /*    src: url("SF-Pro-Display-Regular.otf");*/
        /*}*/
    </style>
</head>
<body style="margin: 0;
/*font-family: SF Pro Display, sans-serif; */
font-size: 16px;">
<div style="width: 375px; margin: 10px auto; color: #1E1E1E;border: 1px solid #e8e8e8;">

    <div style="text-align:center; font-weight: 600; line-height: 20px;padding: 12px 0">
        Чек № 0000
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" width="375" height="22" viewBox="0 0 375 22" fill="none">
        <g filter="url(#filter0_d_51775_57063)">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M0 9L7.54358 5.70094C8.56536 5.25408 9.72732 5.25408 10.7491 5.70094L16.6899 8.29906C17.7117 8.74592 18.8737 8.74592 19.8954 8.29906L25.8363 5.70094C26.858 5.25408 28.02 5.25408 29.0418 5.70094L34.9826 8.29906C36.0044 8.74592 37.1663 8.74592 38.1881 8.29906L44.1289 5.70094C45.1507 5.25408 46.3127 5.25408 47.3345 5.70094L53.2753 8.29906C54.2971 8.74592 55.459 8.74592 56.4808 8.29906L62.4216 5.70094C63.4434 5.25408 64.6054 5.25408 65.6272 5.70094L71.568 8.29906C72.5898 8.74592 73.7517 8.74592 74.7735 8.29906L80.7143 5.70094C81.7361 5.25408 82.898 5.25408 83.9198 5.70094L89.8606 8.29906C90.8824 8.74592 92.0444 8.74592 93.0662 8.29906L99.007 5.70094C100.029 5.25408 101.191 5.25408 102.213 5.70094L108.153 8.29906C109.175 8.74592 110.337 8.74592 111.359 8.29906L117.3 5.70094C118.321 5.25408 119.483 5.25408 120.505 5.70094L126.446 8.29906C127.468 8.74592 128.63 8.74592 129.652 8.29906L135.592 5.70094C136.614 5.25408 137.776 5.25408 138.798 5.70094L144.739 8.29906C145.76 8.74592 146.922 8.74592 147.944 8.29906L153.885 5.70094C154.907 5.25408 156.069 5.25408 157.091 5.70094L163.031 8.29906C164.053 8.74592 165.215 8.74592 166.237 8.29906L172.178 5.70094C173.2 5.25408 174.361 5.25408 175.383 5.70094L181.324 8.29906C182.346 8.74592 183.508 8.74592 184.53 8.29906L190.47 5.70094C191.492 5.25408 192.654 5.25408 193.676 5.70094L199.617 8.29906C200.639 8.74592 201.8 8.74592 202.822 8.29906L208.763 5.70094C209.785 5.25408 210.947 5.25408 211.969 5.70094L217.909 8.29906C218.931 8.74592 220.093 8.74592 221.115 8.29906L227.056 5.70094C228.078 5.25408 229.24 5.25408 230.261 5.70094L236.202 8.29906C237.224 8.74592 238.386 8.74592 239.408 8.29906L245.348 5.70094C246.37 5.25408 247.532 5.25408 248.554 5.70094L254.495 8.29906C255.517 8.74592 256.679 8.74592 257.7 8.29906L263.641 5.70094C264.663 5.25408 265.825 5.25408 266.847 5.70094L272.788 8.29906C273.809 8.74592 274.971 8.74592 275.993 8.29906L281.934 5.70094C282.956 5.25408 284.118 5.25408 285.139 5.70094L291.08 8.29906C292.102 8.74592 293.264 8.74592 294.286 8.29906L300.227 5.70094C301.248 5.25408 302.41 5.25408 303.432 5.70094L309.373 8.29906C310.395 8.74592 311.557 8.74592 312.578 8.29906L318.519 5.70094C319.541 5.25408 320.703 5.25408 321.725 5.70094L327.666 8.29906C328.687 8.74592 329.849 8.74592 330.871 8.29906L336.812 5.70094C337.834 5.25408 338.996 5.25408 340.017 5.70094L345.958 8.29906C346.98 8.74592 348.142 8.74592 349.164 8.29906L355.105 5.70094C356.126 5.25408 357.288 5.25408 358.31 5.70094L364.251 8.29906C365.273 8.74592 366.435 8.74592 367.456 8.29906L375 5V21H0V9Z"
                  fill="white"/>
        </g>
        <defs>
            <filter id="filter0_d_51775_57063" x="-3" y="0" width="381" height="22"
                    filterUnits="userSpaceOnUse"
                    color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feColorMatrix in="SourceAlpha" type="matrix"
                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                               result="hardAlpha"/>
                <feOffset dy="-2"/>
                <feGaussianBlur stdDeviation="1.5"/>
                <feColorMatrix type="matrix"
                               values="0 0 0 0 0.901098 0 0 0 0 0.901098 0 0 0 0 0.901098 0 0 0 0.321951 0"/>
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_51775_57063"/>
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_51775_57063"
                         result="shape"/>
            </filter>
        </defs>
    </svg>

    <div style="padding: 0 16px 0 16px; margin-top: -10px;border-bottom: 1px solid #e8e8e8; ">

        <table style="width: 100%;border-collapse: collapse;">
            <tbody>
            <tr style="border-collapse:collapse;border-bottom: 1px solid #e8e8e8;  ">
                <td style="padding: 6px 0; font-size: 20px;font-weight: 600;line-height: 24px; ">
                    Покупка
                </td>
                <td style="text-align: end; font-weight: 500;line-height: 20px">
                    12.07.2023 18:44
                </td>
            </tr>
            </tbody>
        </table>

        <div style="padding: 16px 0;">
            <table style="width: 100%; border-collapse: collapse;">
                <tbody>

                <tr>
                    <td style="font-size: 12px;line-height: 16px; color: #B2B2B2">Арт.: 2000521680060</td>
                </tr>

                <tr>
                    <td colspan="2">СШ ГП НАБОР МАЙАМИ 440 ГР</td>
                </tr>

                <tr style="border-collapse:collapse; ">
                    <td style="padding-top: 8px; color: #B2B2B2">
                        1 шт.
                    </td>
                    <td style="text-align: end; font-weight: 600;padding-top: 8px;">
                        404,98 руб.
                    </td>
                </tr>

                <tr>
                    <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                        Скидка сотрудника
                    </td>
                    <td style="text-align: end; font-size: 12px;">
                        –45,00 руб.
                    </td>
                </tr>

                <tr>
                    <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                        Другая акция
                    </td>
                    <td style="text-align: end; font-size: 12px;">
                        –45,00 руб.
                    </td>
                </tr>

                <tr>
                    <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                        Бонусы по акции
                    </td>

                    <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                        Бонусы по акции
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>


    <div style="padding: 16px 0;">
        <table style="width: 100%; border-collapse: collapse;">
            <tbody>

            <tr>
                <td style="font-size: 12px;line-height: 16px; color: #B2B2B2">Арт.: 2000521680060</td>
            </tr>

            <tr>
                <td colspan="2">СШ ГП НАБОР МАЙАМИ 440 ГР</td>
            </tr>

            <tr style="border-collapse:collapse; ">
                <td style="padding-top: 8px; color: #B2B2B2">
                    1 шт.
                </td>
                <td style="text-align: end; font-weight: 600;padding-top: 8px;">
                    404,98 руб.
                </td>
            </tr>

            <tr>
                <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                    Скидка сотрудника
                </td>
                <td style="text-align: end; font-size: 12px;">
                    –45,00 руб.
                </td>
            </tr>

            <tr>
                <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                    Другая акция
                </td>
                <td style="text-align: end; font-size: 12px;">
                    –45,00 руб.
                </td>
            </tr>

            <tr>
                <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                    Бонусы по акции
                </td>

                <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                    Бонусы по акции
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</div>


<div style="padding: 16px 0;">
    <table style="width: 100%; border-collapse: collapse;">
        <tbody>

        <tr>
            <td style="font-size: 12px;line-height: 16px; color: #B2B2B2">Арт.: 2000521680060</td>
        </tr>

        <tr>
            <td colspan="2">СШ ГП НАБОР МАЙАМИ 440 ГР</td>
        </tr>

        <tr style="border-collapse:collapse; ">
            <td style="padding-top: 8px; color: #B2B2B2">
                1 шт.
            </td>
            <td style="text-align: end; font-weight: 600;padding-top: 8px;">
                404,98 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                Скидка сотрудника
            </td>
            <td style="text-align: end; font-size: 12px;">
                –45,00 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                Другая акция
            </td>
            <td style="text-align: end; font-size: 12px;">
                –45,00 руб.
            </td>
        </tr>

        <tr>
            <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                Бонусы по акции
            </td>

            <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                Бонусы по акции
            </td>
        </tr>

        </tbody>
    </table>
</div>
</div>


<div style="padding: 16px 0;">
    <table style="width: 100%; border-collapse: collapse;">
        <tbody>

        <tr>
            <td style="font-size: 12px;line-height: 16px; color: #B2B2B2">Арт.: 2000521680060</td>
        </tr>

        <tr>
            <td colspan="2">СШ ГП НАБОР МАЙАМИ 440 ГР</td>
        </tr>

        <tr style="border-collapse:collapse; ">
            <td style="padding-top: 8px; color: #B2B2B2">
                1 шт.
            </td>
            <td style="text-align: end; font-weight: 600;padding-top: 8px;">
                404,98 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                Скидка сотрудника
            </td>
            <td style="text-align: end; font-size: 12px;">
                –45,00 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                Другая акция
            </td>
            <td style="text-align: end; font-size: 12px;">
                –45,00 руб.
            </td>
        </tr>

        <tr>
            <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                Бонусы по акции
            </td>

            <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                Бонусы по акции
            </td>
        </tr>

        </tbody>
    </table>
</div>
</div>


<div style="padding: 16px 0;">
    <table style="width: 100%; border-collapse: collapse;">
        <tbody>

        <tr>
            <td style="font-size: 12px;line-height: 16px; color: #B2B2B2">Арт.: 2000521680060</td>
        </tr>

        <tr>
            <td colspan="2">СШ ГП НАБОР МАЙАМИ 440 ГР</td>
        </tr>

        <tr style="border-collapse:collapse; ">
            <td style="padding-top: 8px; color: #B2B2B2">
                1 шт.
            </td>
            <td style="text-align: end; font-weight: 600;padding-top: 8px;">
                404,98 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                Скидка сотрудника
            </td>
            <td style="text-align: end; font-size: 12px;">
                –45,00 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                Другая акция
            </td>
            <td style="text-align: end; font-size: 12px;">
                –45,00 руб.
            </td>
        </tr>

        <tr>
            <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                Бонусы по акции
            </td>

            <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                Бонусы по акции
            </td>
        </tr>

        </tbody>
    </table>
</div>
</div>


<div style="padding: 16px 0;">
    <table style="width: 100%; border-collapse: collapse;">
        <tbody>

        <tr>
            <td style="font-size: 12px;line-height: 16px; color: #B2B2B2">Арт.: 2000521680060</td>
        </tr>

        <tr>
            <td colspan="2">СШ ГП НАБОР МАЙАМИ 440 ГР</td>
        </tr>

        <tr style="border-collapse:collapse; ">
            <td style="padding-top: 8px; color: #B2B2B2">
                1 шт.
            </td>
            <td style="text-align: end; font-weight: 600;padding-top: 8px;">
                404,98 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                Скидка сотрудника
            </td>
            <td style="text-align: end; font-size: 12px;">
                –45,00 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                Другая акция
            </td>
            <td style="text-align: end; font-size: 12px;">
                –45,00 руб.
            </td>
        </tr>

        <tr>
            <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                Бонусы по акции
            </td>

            <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                Бонусы по акции
            </td>
        </tr>

        </tbody>
    </table>
</div>
</div>


<div style="padding: 16px 0;">
    <table style="width: 100%; border-collapse: collapse;">
        <tbody>

        <tr>
            <td style="font-size: 12px;line-height: 16px; color: #B2B2B2">Арт.: 2000521680060</td>
        </tr>

        <tr>
            <td colspan="2">СШ ГП НАБОР МАЙАМИ 440 ГР</td>
        </tr>

        <tr style="border-collapse:collapse; ">
            <td style="padding-top: 8px; color: #B2B2B2">
                1 шт.
            </td>
            <td style="text-align: end; font-weight: 600;padding-top: 8px;">
                404,98 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                Скидка сотрудника
            </td>
            <td style="text-align: end; font-size: 12px;">
                –45,00 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                Другая акция
            </td>
            <td style="text-align: end; font-size: 12px;">
                –45,00 руб.
            </td>
        </tr>

        <tr>
            <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                Бонусы по акции
            </td>

            <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                Бонусы по акции
            </td>
        </tr>

        </tbody>
    </table>
</div>
</div>


<div style="padding: 16px 0;">
    <table style="width: 100%; border-collapse: collapse;">
        <tbody>

        <tr>
            <td style="font-size: 12px;line-height: 16px; color: #B2B2B2">Арт.: 2000521680060</td>
        </tr>

        <tr>
            <td colspan="2">СШ ГП НАБОР МАЙАМИ 440 ГР</td>
        </tr>

        <tr style="border-collapse:collapse; ">
            <td style="padding-top: 8px; color: #B2B2B2">
                1 шт.
            </td>
            <td style="text-align: end; font-weight: 600;padding-top: 8px;">
                404,98 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                Скидка сотрудника
            </td>
            <td style="text-align: end; font-size: 12px;">
                –45,00 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                Другая акция
            </td>
            <td style="text-align: end; font-size: 12px;">
                –45,00 руб.
            </td>
        </tr>

        <tr>
            <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                Бонусы по акции
            </td>

            <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                Бонусы по акции
            </td>
        </tr>

        </tbody>
    </table>
</div>
</div>


<div style="padding: 16px 0;">
    <table style="width: 100%; border-collapse: collapse;">
        <tbody>

        <tr>
            <td style="font-size: 12px;line-height: 16px; color: #B2B2B2">Арт.: 2000521680060</td>
        </tr>

        <tr>
            <td colspan="2">СШ ГП НАБОР МАЙАМИ 440 ГР</td>
        </tr>

        <tr style="border-collapse:collapse; ">
            <td style="padding-top: 8px; color: #B2B2B2">
                1 шт.
            </td>
            <td style="text-align: end; font-weight: 600;padding-top: 8px;">
                404,98 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                Скидка сотрудника
            </td>
            <td style="text-align: end; font-size: 12px;">
                –45,00 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                Другая акция
            </td>
            <td style="text-align: end; font-size: 12px;">
                –45,00 руб.
            </td>
        </tr>

        <tr>
            <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                Бонусы по акции
            </td>

            <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                Бонусы по акции
            </td>
        </tr>

        </tbody>
    </table>
</div>
</div>


<div style="padding: 16px 0;">
    <table style="width: 100%; border-collapse: collapse;">
        <tbody>

        <tr>
            <td style="font-size: 12px;line-height: 16px; color: #B2B2B2">Арт.: 2000521680060</td>
        </tr>

        <tr>
            <td colspan="2">СШ ГП НАБОР МАЙАМИ 440 ГР</td>
        </tr>

        <tr style="border-collapse:collapse; ">
            <td style="padding-top: 8px; color: #B2B2B2">
                1 шт.
            </td>
            <td style="text-align: end; font-weight: 600;padding-top: 8px;">
                404,98 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                Скидка сотрудника
            </td>
            <td style="text-align: end; font-size: 12px;">
                –45,00 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 8px; font-size: 12px; color: #B2B2B2; display: inline-block; width: max-content;">
                Другая акция
            </td>
            <td style="text-align: end; font-size: 12px;">
                –45,00 руб.
            </td>
        </tr>

        <tr>
            <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                Бонусы по акции
            </td>

            <td style="width: 60px;
                            color: #fff;
                            text-align: center;
                            padding: 4px 8px;
                            background-color: #F98E04;
                            border-radius: 12px;
                           font-size: 9px;
                           font-weight: 700;
                            display: inline-block;
                            box-sizing: border-box;
                            margin-top: 10px;
                            margin-right: 8px;">

                Бонусы по акции
            </td>
        </tr>

        </tbody>
    </table>
</div>
</div>

<div style="padding: 16px;border-bottom: 1px solid #e8e8e8; ">
    <table style="width: 100%; border-collapse: collapse;">
        <tbody>
        <tr>
            <td style="font-size: 20px;font-weight: 600;line-height: 24px;padding-bottom: 12px;">Итого</td>
            <td style="font-size: 20px;font-weight: 600;line-height: 24px; padding-bottom: 12px; text-align: end">4
                470,80 руб.
            </td>
        </tr>

        <tr style="border-collapse:collapse; ">
            <td style="color: #B2B2B2; padding-bottom: 5px">
                Оплата по банковской карте
            </td>
            <td style="text-align: end; font-weight: 600;padding-bottom: 5px">
                3 454,10 руб.
            </td>
        </tr>

        <tr style="border-collapse:collapse; ">
            <td style=" color: #B2B2B2">
                Оплата наличными
            </td>
            <td style="text-align: end; font-weight: 600;">
                1 454,10 руб.
            </td>
        </tr>

        <tr>
            <td style="padding-top: 10px; color: #B2B2B2; display: inline-block; width: max-content;">
                Списано бонусов
            </td>
            <td style="text-align: end; color: #E53232">
                <span>–16,70</span>

                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#E53232"
                     style="position: relative; top: 6px">
                    <path d="M12 21C10.22 21 8.47991 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89471 5.63604 5.63604C6.89471 4.37737 8.49836 3.5202 10.2442 3.17294C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36628 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C20.9973 14.3861 20.0482 16.6738 18.361 18.361C16.6738 20.0482 14.3861 20.9973 12 21ZM15.5359 7.005C14.9462 7.034 14.359 7.09975 13.7775 7.20188C13.278 7.27613 12.7943 7.338 12.3251 7.3965C11.2474 7.53263 10.1325 7.67438 8.652 7.9905C8.23575 8.07938 8.10638 8.2425 8.076 8.71725C8.06025 8.92988 8.06025 9.05475 8.06025 9.23363C8.05633 9.40191 8.10552 9.56715 8.20084 9.70589C8.29616 9.84463 8.43276 9.94981 8.59125 10.0065L8.65088 10.0223C8.79375 10.0594 8.97038 10.1044 8.97038 10.3699C8.95367 10.7021 8.90775 11.0323 8.83313 11.3565C8.78213 11.6378 8.73188 11.9085 8.68238 12.1688V12.1766C8.40269 13.4267 8.23553 14.6993 8.18288 15.9791C8.19408 16.3453 8.30366 16.7016 8.50013 17.0108C8.7015 17.2988 9.18975 17.4506 9.912 17.4506C11.7938 17.3836 13.5942 16.666 15.006 15.42C15.3254 15.136 15.584 14.7902 15.7662 14.4035C15.9483 14.0168 16.0502 13.5972 16.0658 13.17C16.0143 12.6256 15.7766 12.1156 15.3927 11.7262C15.0088 11.3367 14.5022 11.0917 13.9586 11.0325C13.3266 11.0371 12.7005 11.1553 12.1103 11.3813C12.0405 11.4004 11.9156 11.4476 11.784 11.4938C11.6448 11.5538 11.5006 11.6016 11.3531 11.6366C11.2485 11.6366 11.2001 11.5185 11.2001 11.4116C11.2283 11.1111 11.2742 10.8124 11.3374 10.5173C11.4285 10.0549 11.4611 9.95475 11.6265 9.8355C11.9729 9.70703 12.335 9.62568 12.7031 9.59363C13.2184 9.51825 13.5919 9.46538 13.9204 9.41925C14.4446 9.34613 14.8204 9.29213 15.3829 9.19425C15.5933 9.16275 16.2829 9.012 16.3391 8.37525C16.3526 8.22338 16.3695 8.0175 16.3695 7.905C16.3695 7.29413 16.104 7.005 15.5359 7.005ZM11.1844 15.4808C11.0648 15.4802 10.9499 15.4344 10.8626 15.3526C10.7754 15.2708 10.7224 15.159 10.7141 15.0398C10.7262 14.5477 10.7976 14.0589 10.9268 13.584C11.0494 13.134 12.1643 12.8111 12.8516 12.8111C13.0312 12.8118 13.2037 12.8814 13.3335 13.0055C13.4633 13.1296 13.5405 13.2989 13.5491 13.4783C13.5439 13.7671 13.4628 14.0496 13.3139 14.2972C13.165 14.5448 12.9536 14.7489 12.7009 14.889C12.246 15.1972 11.7278 15.3994 11.1844 15.4808Z"/>
                </svg>
            </td>
        </tr>
        </tbody>
    </table>
</div>


<div style="padding: 16px;border-bottom: 1px solid #e8e8e8; ">
    <table style="width: 100%; border-collapse: collapse;">
        <tbody>
        <tr>
            <td style="font-weight: 500;line-height: 20px;">Ваша выгода</td>
            <td style="font-weight: 500;line-height: 20px; text-align: end">670,80 руб.</td>
        </tr>

        <tr style="border-collapse:collapse; ">
            <td style="padding-top: 8px; color: #B2B2B2">
                Начислено бонусов
            </td>
            <td style="text-align: end; color: #00AB4E">
                <span>+16,54</span>

                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#00AB4E"
                     style="position: relative; top: 6px">
                    <path d="M12 21C10.22 21 8.47991 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89471 5.63604 5.63604C6.89471 4.37737 8.49836 3.5202 10.2442 3.17294C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36628 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C20.9973 14.3861 20.0482 16.6738 18.361 18.361C16.6738 20.0482 14.3861 20.9973 12 21ZM15.5359 7.005C14.9462 7.034 14.359 7.09975 13.7775 7.20188C13.278 7.27613 12.7943 7.338 12.3251 7.3965C11.2474 7.53263 10.1325 7.67438 8.652 7.9905C8.23575 8.07938 8.10638 8.2425 8.076 8.71725C8.06025 8.92988 8.06025 9.05475 8.06025 9.23363C8.05633 9.40191 8.10552 9.56715 8.20084 9.70589C8.29616 9.84463 8.43276 9.94981 8.59125 10.0065L8.65088 10.0223C8.79375 10.0594 8.97038 10.1044 8.97038 10.3699C8.95367 10.7021 8.90775 11.0323 8.83313 11.3565C8.78213 11.6378 8.73188 11.9085 8.68238 12.1688V12.1766C8.40269 13.4267 8.23553 14.6993 8.18288 15.9791C8.19408 16.3453 8.30366 16.7016 8.50013 17.0108C8.7015 17.2988 9.18975 17.4506 9.912 17.4506C11.7938 17.3836 13.5942 16.666 15.006 15.42C15.3254 15.136 15.584 14.7902 15.7662 14.4035C15.9483 14.0168 16.0502 13.5972 16.0658 13.17C16.0143 12.6256 15.7766 12.1156 15.3927 11.7262C15.0088 11.3367 14.5022 11.0917 13.9586 11.0325C13.3266 11.0371 12.7005 11.1553 12.1103 11.3813C12.0405 11.4004 11.9156 11.4476 11.784 11.4938C11.6448 11.5538 11.5006 11.6016 11.3531 11.6366C11.2485 11.6366 11.2001 11.5185 11.2001 11.4116C11.2283 11.1111 11.2742 10.8124 11.3374 10.5173C11.4285 10.0549 11.4611 9.95475 11.6265 9.8355C11.9729 9.70703 12.335 9.62568 12.7031 9.59363C13.2184 9.51825 13.5919 9.46538 13.9204 9.41925C14.4446 9.34613 14.8204 9.29213 15.3829 9.19425C15.5933 9.16275 16.2829 9.012 16.3391 8.37525C16.3526 8.22338 16.3695 8.0175 16.3695 7.905C16.3695 7.29413 16.104 7.005 15.5359 7.005ZM11.1844 15.4808C11.0648 15.4802 10.9499 15.4344 10.8626 15.3526C10.7754 15.2708 10.7224 15.159 10.7141 15.0398C10.7262 14.5477 10.7976 14.0589 10.9268 13.584C11.0494 13.134 12.1643 12.8111 12.8516 12.8111C13.0312 12.8118 13.2037 12.8814 13.3335 13.0055C13.4633 13.1296 13.5405 13.2989 13.5491 13.4783C13.5439 13.7671 13.4628 14.0496 13.3139 14.2972C13.165 14.5448 12.9536 14.7489 12.7009 14.889C12.246 15.1972 11.7278 15.3994 11.1844 15.4808Z"/>
                </svg>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<div style="padding: 16px;border-bottom: 1px solid #e8e8e8; ">
    <table style="width: 100%; border-collapse: collapse;">
        <tbody>
        <tr>
            <td rowspan="2" style="width: 50px;">
                <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_d_15951_45063)">
                        <g clip-path="url(#clip0_15951_45063)">
                            <rect x="4" y="4" width="40" height="28" rx="6" fill="white"/>
                            <ellipse cx="25.8141" cy="28.9247" rx="22.1871" ry="21.7421" fill="#F17831"/>
                            <ellipse cx="39.0742" cy="9.5095" rx="3.02924" ry="2.96848" fill="#02AA52"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M36.0469 9.62793C37.5048 10.3718 38.8679 11.2697 40.1136 12.2996C39.7893 12.4158 39.4391 12.4791 39.0738 12.4791C37.4409 12.4791 36.1097 11.213 36.0469 9.62793Z"
                                  fill="#3E6142"/>
                            <ellipse cx="4.11695" cy="6.54092" rx="12.117" ry="11.8739" fill="#FAAF2F"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M15.8581 9.48975C14.7148 13.874 11.0814 17.2819 6.52148 18.1813C8.68539 14.4576 11.9395 11.4214 15.8581 9.48975Z"
                                  fill="#EF612F"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M17.7524 18.6835L17.7563 18.675C17.8653 18.4439 17.9605 18.2274 18.059 18.0037C18.182 17.7244 18.31 17.4337 18.4758 17.0889C18.5599 16.9134 18.69 16.6772 18.7666 16.6772C18.8355 16.6772 18.8508 16.7514 18.8508 16.8459C18.8508 17.1091 18.8508 17.5883 18.8355 17.9933C18.8202 18.3915 18.8202 18.567 18.8202 19.1744V19.1744C18.8202 19.4039 19.3712 19.4916 19.685 19.4916C20.0038 19.4916 20.1362 19.3379 20.3647 19.0727C20.394 19.0387 20.4249 19.0028 20.458 18.9652C20.7182 18.6682 21.0626 18.2093 21.4299 17.6896C21.5447 17.5276 21.6136 17.4331 21.6978 17.4331C21.7514 17.4331 21.7514 17.5478 21.7514 17.6153C21.7514 17.6561 21.7436 17.7437 21.7337 17.8567C21.7156 18.0617 21.6901 18.3503 21.6901 18.594C21.6901 18.8909 21.7284 19.3297 21.782 19.4241C21.8509 19.5456 22.0881 19.5929 22.333 19.5929C22.5703 19.5929 22.8764 19.4984 22.8841 19.3499C22.8897 19.2655 22.8953 19.1628 22.9017 19.0462C22.9127 18.8458 22.9259 18.6045 22.9453 18.3443C22.9835 17.8178 23.0218 17.3453 23.0601 17.0956L23.0659 17.0584C23.1491 16.5248 23.2514 15.8687 23.2514 15.6445C23.2514 15.3813 23.2055 15.3273 23.0907 15.2126C22.9529 15.0708 22.6315 14.9223 22.3636 14.9223C22.2641 14.9223 22.1417 15.0573 21.9197 15.3813C21.796 15.5631 21.6713 15.7485 21.5371 15.9479C21.2977 16.3037 21.0281 16.7044 20.6799 17.2104C20.5039 17.4736 20.1212 17.9933 20.0141 17.9933C19.9758 17.9933 19.9222 17.9595 19.9222 17.9123V17.9123C19.9222 17.4263 19.9222 16.6907 19.8993 16.3059C19.8927 16.2093 19.8883 16.1164 19.8841 16.0284C19.8686 15.7041 19.8562 15.445 19.7539 15.307C19.6544 15.1653 19.1492 15.0911 18.8661 15.0911C18.6594 15.0911 18.5446 15.2328 18.2615 15.6445C17.7487 16.3869 17.3966 16.9201 16.991 17.6153L16.9862 17.6236C16.7707 17.9901 16.3711 18.6696 16.3711 18.8572C16.3711 18.9719 16.3711 19.1204 16.6925 19.2352C16.9145 19.3162 17.0905 19.3229 17.2436 19.3229C17.4558 19.3229 17.6155 18.9786 17.7524 18.6835ZM24.608 15.8338C24.2253 16.3198 23.7891 17.1837 23.7891 17.9464C23.7891 18.2501 23.8809 18.6146 24.1258 18.9115C24.3248 19.1613 24.7763 19.4582 25.2585 19.4582C25.8248 19.4582 26.4218 19.1883 26.9116 18.7563C27.6387 18.1151 27.9448 17.1365 27.9448 16.1848C27.9448 15.4626 27.2943 14.9092 26.5366 14.9092C25.5876 14.9092 24.8758 15.4829 24.608 15.8338ZM26.3358 15.685C26.596 15.685 26.7873 15.8403 26.7873 16.1035C26.7873 16.5355 26.5883 17.0889 26.42 17.4399C26.2975 17.6963 25.8613 18.4523 25.5016 18.4523C25.2337 18.4523 25.0118 18.216 25.0118 17.9056C25.0118 17.6693 25.0347 17.2171 25.5016 16.468C25.6776 16.1845 26.022 15.685 26.3358 15.685ZM29.8472 17.4739C29.8166 17.4739 29.8166 17.4401 29.8166 17.4199C29.8166 17.3515 29.8543 17.1571 29.8991 16.9256C29.9649 16.5855 30.0462 16.1654 30.0462 15.9485C30.0462 15.8473 30.0462 15.6718 29.9926 15.5773C29.8625 15.3478 29.6023 15.3478 29.2809 15.3478C29.1125 15.3478 28.9212 15.4558 28.8829 15.638C28.8369 15.861 28.7468 16.4541 28.6473 17.1087C28.5811 17.5439 28.5109 18.0063 28.4467 18.4053C28.4405 18.4434 28.4318 18.4936 28.4219 18.551C28.3827 18.778 28.3242 19.117 28.3242 19.2624C28.3242 19.4582 28.4467 19.5459 28.661 19.5459C28.837 19.5459 29.0589 19.5189 29.189 19.4717C29.3369 19.4165 29.4045 19.3464 29.4891 19.2587C29.5183 19.2283 29.5496 19.1959 29.587 19.1612C29.6808 19.0749 30.0198 18.7206 30.3695 18.3552C30.6764 18.0346 30.9914 17.7054 31.1559 17.5414C31.2631 17.4266 31.3855 17.3051 31.4544 17.3051C31.4774 17.3051 31.4774 17.3321 31.4774 17.3591C31.4774 17.4563 31.4321 17.6874 31.3777 17.9647C31.2962 18.3807 31.1942 18.9007 31.1942 19.2287C31.1942 19.3907 31.4238 19.3974 31.5769 19.3974C32.059 19.3974 32.3345 19.2759 32.3958 18.979C32.4553 18.6887 32.534 18.2516 32.6151 17.8014C32.7113 17.2674 32.8108 16.7148 32.8856 16.367C32.9851 15.908 33.0233 15.6853 33.0233 15.4018C33.0233 15.1791 32.6254 15.1318 32.5029 15.1318C32.3805 15.1318 32.1509 15.1521 31.9825 15.2668C31.8386 15.3603 31.7697 15.4406 31.583 15.658L31.5769 15.665C31.3779 15.9013 30.8957 16.4615 30.4978 16.8664L30.4936 16.8708C30.3983 16.9701 29.915 17.4739 29.8472 17.4739ZM29.6018 14.072C29.4794 14.1664 29.4258 14.5512 29.4258 14.6861C29.4258 14.9156 29.9768 15.0911 30.2753 15.0911C30.7115 15.0911 31.0866 15.0169 31.5611 14.8886C32.0126 14.7671 32.2345 14.6726 32.6096 14.4769C32.8239 14.3622 32.8468 14.1529 32.8468 14.0247C32.8468 13.9235 32.7473 13.667 32.5483 13.667C32.4412 13.667 32.3876 13.6737 32.0432 13.7682C31.8639 13.8191 31.7006 13.8557 31.4772 13.9059C31.4336 13.9157 31.3878 13.926 31.3391 13.937C30.9641 14.018 30.6427 14.0585 30.2676 14.0585C30.1223 14.0585 30.0173 14.0442 29.9321 14.0326C29.8737 14.0246 29.8245 14.018 29.7778 14.018C29.7166 14.018 29.6554 14.0315 29.6018 14.072ZM19.0871 21.2667C19.0871 21.1676 19.0734 21.1279 19.0094 21.1002C18.9453 21.0724 18.8905 21.0605 18.8356 21.0605C18.7579 21.0605 18.5978 21.0684 18.3509 21.0922C17.7748 21.1477 17.5187 21.1755 16.8237 21.2905C16.6545 21.3182 16.6454 21.4054 16.6454 21.5283C16.6454 21.5572 16.6466 21.586 16.6478 21.6137C16.6489 21.6393 16.65 21.664 16.65 21.6869C16.65 21.7543 16.746 21.8019 16.8237 21.8177C16.8786 21.8296 16.9289 21.8653 16.9289 21.9525C16.9289 22.0333 16.8896 22.2091 16.8439 22.413C16.8314 22.4693 16.8183 22.5277 16.8054 22.5869C16.746 22.8683 16.6637 23.2767 16.6637 23.4353C16.6637 23.5701 16.7048 23.6533 16.8923 23.6533C16.9655 23.6533 17.1346 23.6533 17.2261 23.578C17.3663 23.4663 17.3903 23.3301 17.4465 23.0113C17.4581 22.9455 17.4711 22.8719 17.4867 22.7891C17.5279 22.5829 17.6148 22.1309 17.6559 21.8891C17.6696 21.8098 17.7428 21.7821 17.8297 21.7702C18.232 21.7186 18.3006 21.7107 18.6161 21.679C18.6939 21.6711 18.7762 21.6592 18.8356 21.6473C18.9545 21.6235 19.0505 21.5918 19.0734 21.453C19.0825 21.4094 19.0871 21.3341 19.0871 21.2667ZM18.8858 23.693C19.247 23.693 19.5716 23.4868 19.7317 23.2925C19.9146 23.0666 20.0014 22.8644 20.1112 22.5869C20.1873 22.3974 20.2299 22.2599 20.2736 22.1187C20.2903 22.0649 20.3072 22.0105 20.3261 21.9525L20.3285 21.9449C20.3727 21.8071 20.3959 21.7345 20.4633 21.7345C20.5044 21.7345 20.7513 21.7385 20.7513 21.786C20.7513 21.8455 20.6462 22.3609 20.6004 22.5631C20.5273 22.8842 20.4404 23.2727 20.4404 23.5502C20.4404 23.7049 20.7925 23.7049 20.9114 23.7049C21.0485 23.7049 21.14 23.6176 21.1583 23.5463C21.1674 23.5106 21.1994 23.3401 21.2131 23.2489C21.2383 23.0843 21.2617 22.9537 21.2855 22.821C21.3007 22.7364 21.316 22.6509 21.332 22.5551C21.3527 22.4331 21.3772 22.2963 21.4021 22.1574C21.4378 21.9581 21.4743 21.7544 21.5012 21.5838C21.5104 21.5283 21.5195 21.4015 21.5195 21.2825C21.5195 21.235 21.4783 21.1795 21.364 21.1636C21.076 21.12 20.6096 21.0962 20.3215 21.0843C20.2322 21.0805 20.1598 21.0767 20.0948 21.0733C19.9568 21.066 19.8522 21.0605 19.6905 21.0605C19.5762 21.0605 19.5122 21.2508 19.4802 21.4094C19.471 21.4451 19.4665 21.4887 19.4665 21.5244C19.4665 21.6257 19.6009 21.6517 19.689 21.6687C19.7318 21.677 19.7637 21.6832 19.7637 21.6948C19.7637 21.7385 19.6768 22.0556 19.6265 22.1706C19.6084 22.2138 19.5904 22.2573 19.5725 22.3008C19.464 22.5642 19.3569 22.8239 19.2196 22.9873C19.1555 23.0626 19.1052 23.0864 19.0549 23.0864C18.9909 23.0864 18.9589 23.0666 18.8995 22.9992C18.8887 22.9873 18.8792 22.9764 18.8704 22.9663C18.8234 22.9124 18.7989 22.8842 18.7257 22.8842C18.648 22.8842 18.5748 22.908 18.4742 22.9912C18.4011 23.0547 18.3416 23.1419 18.3416 23.2212C18.3416 23.4353 18.6068 23.693 18.8858 23.693ZM22.3609 21.5283C22.1323 21.8137 21.8717 22.3212 21.8717 22.7692C21.8717 22.9476 21.9266 23.1617 22.0729 23.3361C22.1918 23.4828 22.4615 23.6572 22.7496 23.6572C23.088 23.6572 23.4446 23.4987 23.7373 23.2449C24.1716 22.8683 24.3545 22.2934 24.3545 21.7344C24.3545 21.3102 23.9659 20.9851 23.5132 20.9851C22.9462 20.9851 22.521 21.3221 22.3609 21.5283ZM23.3944 21.4411C23.5499 21.4411 23.6642 21.5323 23.6642 21.6869C23.6642 21.9406 23.5453 22.2657 23.4447 22.4719C23.3716 22.6225 23.1109 23.0665 22.896 23.0665C22.736 23.0665 22.6034 22.9278 22.6034 22.7454C22.6034 22.6067 22.6171 22.341 22.896 21.901C23.0012 21.7345 23.207 21.4411 23.3944 21.4411ZM24.6975 23.317C24.6975 23.42 24.7478 23.5271 24.7935 23.5866C24.8575 23.6658 25.013 23.7015 25.2187 23.7015C25.7034 23.7015 26.4076 23.4795 26.7551 23.1703C26.8923 23.0474 27.0752 22.8611 27.0752 22.5835C27.0752 22.3615 26.7917 22.0245 26.4396 22.0245C26.2293 22.0245 26.1378 22.0483 25.8817 22.1157C25.8609 22.1207 25.8227 22.1331 25.7832 22.146C25.7275 22.1641 25.6692 22.1831 25.6531 22.1831C25.6211 22.1831 25.6074 22.1514 25.6074 22.1236C25.6074 22.0959 25.6303 21.9611 25.6486 21.8897C25.676 21.7708 25.6851 21.7431 25.7354 21.7113C25.7766 21.6836 25.9641 21.6598 26.0601 21.6479C26.2091 21.629 26.3208 21.6155 26.4159 21.6039C26.5805 21.5839 26.6955 21.57 26.8694 21.5448C26.9929 21.529 27.1437 21.4695 27.1575 21.3307C27.162 21.2871 27.1666 21.2356 27.1666 21.2078C27.1666 21.0651 27.1072 20.97 26.9151 20.97C26.8054 20.97 26.6316 20.9898 26.3847 21.0215C26.2335 21.0411 26.0897 21.0569 25.9441 21.073C25.6188 21.1087 25.2846 21.1455 24.8392 21.2277C24.7112 21.2515 24.6746 21.2951 24.6655 21.418C24.6609 21.4735 24.6609 21.5052 24.6609 21.5528C24.6609 21.6202 24.7021 21.7232 24.8209 21.7549C24.8267 21.7564 24.8328 21.7578 24.8391 21.7592C24.8828 21.769 24.9352 21.7808 24.9352 21.8501C24.9352 21.9096 24.9215 21.9849 24.8941 22.1078C24.8784 22.1823 24.863 22.2537 24.8482 22.3226C24.7637 22.7156 24.6975 23.0235 24.6975 23.317ZM25.603 23.1854C25.5527 23.1854 25.4613 23.1498 25.4613 23.0705C25.4613 22.9753 25.4841 22.8167 25.5253 22.6899C25.5619 22.5749 25.8865 22.4877 26.106 22.4877C26.234 22.4877 26.3163 22.5828 26.3163 22.6621C26.3163 22.7652 26.2798 22.904 26.0603 23.0308C25.9185 23.1141 25.6991 23.1854 25.603 23.1854ZM28.3145 22.9634C28.3145 23.0189 28.3008 23.0467 28.2551 23.0982C28.1956 23.1617 28.1453 23.1894 28.095 23.1894C28.031 23.1894 27.9899 23.1617 27.9213 23.0824C27.908 23.0667 27.8966 23.0521 27.8863 23.0387C27.8469 22.9878 27.8219 22.9555 27.7567 22.9555C27.6652 22.9555 27.6012 22.9952 27.5052 23.0784C27.432 23.1419 27.336 23.2608 27.336 23.3401C27.336 23.5145 27.7247 23.7564 27.9579 23.7564C28.2459 23.7564 28.598 23.5343 28.7855 23.3559C28.9638 23.1855 29.0415 23.0943 29.1833 22.904C29.5399 22.4282 29.6863 22.1705 29.8875 21.786C29.988 21.5957 30.1115 21.3578 30.1115 21.2428C30.1115 21.1596 30.0292 21.0922 29.892 21.0129C29.8372 20.9812 29.764 20.9415 29.668 20.9415C29.5428 20.9415 29.435 21.1501 29.3747 21.2668L29.3708 21.2746C29.33 21.3545 29.2844 21.447 29.2372 21.5427C29.1626 21.6939 29.0841 21.8532 29.0141 21.9842C29.003 22.0049 28.9904 22.0296 28.9767 22.0563C28.9117 22.1836 28.8231 22.3569 28.7626 22.3569C28.6996 22.3569 28.5392 22.0496 28.3248 21.6392L28.3145 21.6195C28.2907 21.5734 28.2683 21.528 28.2468 21.4843C28.1441 21.276 28.0613 21.108 27.9442 21.108C27.8619 21.108 27.7933 21.1279 27.6835 21.1754C27.5464 21.2349 27.4183 21.3142 27.4183 21.4371C27.4183 21.5917 27.6881 22.0159 27.8893 22.3252C27.9331 22.3916 27.9966 22.4816 28.0613 22.5733C28.1858 22.7497 28.3145 22.9321 28.3145 22.9634ZM30.5868 21.5719C30.3582 21.8574 30.0518 22.3649 30.0518 22.8128C30.0518 23.0309 30.157 23.2569 30.317 23.4194C30.4542 23.5582 30.6599 23.7009 30.948 23.7009C31.3458 23.7009 31.8305 23.5701 32.1368 23.3758C32.3517 23.241 32.6261 22.9992 32.6261 22.8168C32.6261 22.7137 32.3838 22.571 32.2649 22.571C32.1063 22.571 32.0021 22.6557 31.8873 22.749C31.8531 22.7768 31.818 22.8054 31.7802 22.8327C31.6293 22.9397 31.3641 23.1102 31.1492 23.1102C30.9434 23.1102 30.8108 22.9714 30.8108 22.7098C30.8108 22.571 30.852 22.3371 31.14 21.905C31.1995 21.8177 31.4784 21.4768 31.6202 21.4768C31.6842 21.4768 31.7436 21.5085 31.7436 21.5957C31.7436 21.6411 31.7144 21.688 31.6816 21.7406C31.64 21.8073 31.5927 21.8831 31.5927 21.9763C31.5927 22.1191 31.8488 22.2499 31.9768 22.2499C32.1186 22.2499 32.2512 22.0992 32.3197 22.016C32.37 21.9486 32.4798 21.7781 32.4798 21.5402C32.4798 21.3658 32.3838 21.235 32.2237 21.1358C32.1368 21.0803 31.9448 21.0129 31.7573 21.0129C31.1903 21.0129 30.7468 21.3658 30.5868 21.5719Z"
                                  fill="white"/>
                        </g>
                    </g>
                    <defs>
                        <filter id="filter0_d_15951_45063" x="0" y="0" width="48" height="36"
                                filterUnits="userSpaceOnUse"
                                color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                           values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                           result="hardAlpha"/>
                            <feOffset/>
                            <feGaussianBlur stdDeviation="2"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.14 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix"
                                     result="effect1_dropShadow_15951_45063"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_15951_45063"
                                     result="shape"/>
                        </filter>
                        <clipPath id="clip0_15951_45063">
                            <rect x="4" y="4" width="40" height="28" rx="6" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </td>
            <td>
                **** 2345
            </td>
        </tr>
        <tr>
            <td style="font-size: 12px;color: #B2B2B2">Карта «Мой Глобус»</td>
        </tr>
        </tbody>
    </table>
</div>

<div style="padding: 16px;">
    <table style="width: 100%; border-collapse: collapse;">
        <tbody>
        <tr>
            <td>Глобус Красногорск</td>
        </tr>
        <tr>
            <td style="font-size: 12px;color:#B2B2B2">143082, г. Москва, Новорижское ш., 22‑й км, вл. 1, стр. 1</td>
        </tr>
        <tr>
            <td style="text-align: center; padding: 30px 0 10px;">
                <img src="data:image/gif;base64,{{ $binaryImage }}">
            </td>
        </tr>
        <tr>
            <td style="font-size: 14px; color: #B2B2B2; text-align: center;">Чек отправлен на Email</td>
        </tr>
        </tbody>
    </table>
</div>

<svg xmlns="http://www.w3.org/2000/svg" width="375" height="22" viewBox="0 0 375 22" fill="none">
    <g filter="url(#filter0_d_51775_57063)">
        <path fill-rule="evenodd" clip-rule="evenodd"
              d="M0 9L7.54358 5.70094C8.56536 5.25408 9.72732 5.25408 10.7491 5.70094L16.6899 8.29906C17.7117 8.74592 18.8737 8.74592 19.8954 8.29906L25.8363 5.70094C26.858 5.25408 28.02 5.25408 29.0418 5.70094L34.9826 8.29906C36.0044 8.74592 37.1663 8.74592 38.1881 8.29906L44.1289 5.70094C45.1507 5.25408 46.3127 5.25408 47.3345 5.70094L53.2753 8.29906C54.2971 8.74592 55.459 8.74592 56.4808 8.29906L62.4216 5.70094C63.4434 5.25408 64.6054 5.25408 65.6272 5.70094L71.568 8.29906C72.5898 8.74592 73.7517 8.74592 74.7735 8.29906L80.7143 5.70094C81.7361 5.25408 82.898 5.25408 83.9198 5.70094L89.8606 8.29906C90.8824 8.74592 92.0444 8.74592 93.0662 8.29906L99.007 5.70094C100.029 5.25408 101.191 5.25408 102.213 5.70094L108.153 8.29906C109.175 8.74592 110.337 8.74592 111.359 8.29906L117.3 5.70094C118.321 5.25408 119.483 5.25408 120.505 5.70094L126.446 8.29906C127.468 8.74592 128.63 8.74592 129.652 8.29906L135.592 5.70094C136.614 5.25408 137.776 5.25408 138.798 5.70094L144.739 8.29906C145.76 8.74592 146.922 8.74592 147.944 8.29906L153.885 5.70094C154.907 5.25408 156.069 5.25408 157.091 5.70094L163.031 8.29906C164.053 8.74592 165.215 8.74592 166.237 8.29906L172.178 5.70094C173.2 5.25408 174.361 5.25408 175.383 5.70094L181.324 8.29906C182.346 8.74592 183.508 8.74592 184.53 8.29906L190.47 5.70094C191.492 5.25408 192.654 5.25408 193.676 5.70094L199.617 8.29906C200.639 8.74592 201.8 8.74592 202.822 8.29906L208.763 5.70094C209.785 5.25408 210.947 5.25408 211.969 5.70094L217.909 8.29906C218.931 8.74592 220.093 8.74592 221.115 8.29906L227.056 5.70094C228.078 5.25408 229.24 5.25408 230.261 5.70094L236.202 8.29906C237.224 8.74592 238.386 8.74592 239.408 8.29906L245.348 5.70094C246.37 5.25408 247.532 5.25408 248.554 5.70094L254.495 8.29906C255.517 8.74592 256.679 8.74592 257.7 8.29906L263.641 5.70094C264.663 5.25408 265.825 5.25408 266.847 5.70094L272.788 8.29906C273.809 8.74592 274.971 8.74592 275.993 8.29906L281.934 5.70094C282.956 5.25408 284.118 5.25408 285.139 5.70094L291.08 8.29906C292.102 8.74592 293.264 8.74592 294.286 8.29906L300.227 5.70094C301.248 5.25408 302.41 5.25408 303.432 5.70094L309.373 8.29906C310.395 8.74592 311.557 8.74592 312.578 8.29906L318.519 5.70094C319.541 5.25408 320.703 5.25408 321.725 5.70094L327.666 8.29906C328.687 8.74592 329.849 8.74592 330.871 8.29906L336.812 5.70094C337.834 5.25408 338.996 5.25408 340.017 5.70094L345.958 8.29906C346.98 8.74592 348.142 8.74592 349.164 8.29906L355.105 5.70094C356.126 5.25408 357.288 5.25408 358.31 5.70094L364.251 8.29906C365.273 8.74592 366.435 8.74592 367.456 8.29906L375 5V21H0V9Z"
              fill="white"/>
    </g>
    <defs>
        <filter id="filter0_d_51775_57063" x="-3" y="0" width="381" height="22"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
            <feColorMatrix in="SourceAlpha" type="matrix"
                           values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                           result="hardAlpha"/>
            <feOffset dy="-2"/>
            <feGaussianBlur stdDeviation="1.5"/>
            <feColorMatrix type="matrix"
                           values="0 0 0 0 0.901098 0 0 0 0 0.901098 0 0 0 0 0.901098 0 0 0 0.321951 0"/>
            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_51775_57063"/>
            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_51775_57063"
                     result="shape"/>
        </filter>
    </defs>
</svg>

</div>

</body>
</html>

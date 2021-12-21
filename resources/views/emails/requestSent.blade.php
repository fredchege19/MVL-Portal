<html>

<head>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);

    * {
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background-color: black;
        font-family: 'Roboto', sans-serif;
        background-repeat: repeat-y;
        background-size: 100%;
    }

    ::selection {
        background: #f31544;
        color: #FFF;
    }

    ::moz-selection {
        background: #f31544;
        color: #FFF;
    }

    h1 {
        font-size: 1.5em;
        color: #222;
    }

    h2 {
        font-size: .9em;
    }

    h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }

    p {
        font-size: 1.1em;
        color: #666;
        line-height: 1.2em;
    }

    #invoiceholder {
        width: 100%;
        height: 100%;
        padding-top: 50px;
    }

    #invoice {
        width: 90%;
        background: #FFF;
    }


    .info {
        display: block;
        float: left;
        margin-left: 20px;
    }

    .title {
        float: right;
    }

    .title p {
        text-align: right;
    }

    #project {
        margin-left: 52%;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 5px 0 5px 15px;
        border: 1px solid #EEE
    }

    .tabletitle {
        padding: 5px;
        background: #167BA1;
        color: white;
    }

    .headDoc {
        padding: 15px;
        background: #167BA1;
        color: white;
    }

    .service {
        border: 1px solid #EEE;
    }

    .item {
        width: 50%;
    }

    .itemtext {
        font-size: 1.1em;
    }

    #legalcopy {
        margin-top: 30px;
    }

    form {
        float: right;
        margin-top: 30px;
        text-align: right;
    }

    .effect2 {
        position: relative;
    }

    .effect2:before,
    .effect2:after {
        z-index: -1;
        position: absolute;
        content: "";
        bottom: 15px;
        left: 10px;
        width: 50%;
        top: 50%;
        max-width: 300px;
        background: #777;
        -webkit-box-shadow: 0 15px 10px #777;
        -moz-box-shadow: 0 15px 10px #777;
        box-shadow: 0 15px 10px #777;
        -webkit-transform: rotate(-3deg);
        -moz-transform: rotate(-3deg);
        -o-transform: rotate(-3deg);
        -ms-transform: rotate(-3deg);
        transform: rotate(-3deg);
    }

    .effect2:after {
        -webkit-transform: rotate(3deg);
        -moz-transform: rotate(3deg);
        -o-transform: rotate(3deg);
        -ms-transform: rotate(3deg);
        transform: rotate(3deg);
        right: 7px;
        left: auto;
    }

    .legal {
        width: 70%;
    }
    </style>
</head>
<div id="invoiceholder">

    <div id="invoice" class="effect2">

        <div class="message" style="padding:4px">
            Hello {{$name}}, your {{$type}} application has been submitted for approval.
        </div>
    </div>

    <!--End InvoiceBot-->
</div>
<!--End Invoice-->
</div><!-- End Invoice Holder-->
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing for <?php echo $_SESSION['organisation'] ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <style>
        * {
            border: 0;
            box-sizing: content-box;
            color: inherit;
            font-family: inherit;
            font-size: inherit;
            font-style: inherit;
            font-weight: inherit;
            line-height: inherit;
            list-style: none;
            text-decoration: none;
        }

        /* content editable */

        *[contenteditable] {
            border-radius: 0.25em;
            min-width: 1em;
            outline: 0;
        }

        *[contenteditable] {
            cursor: pointer;
        }

        *[contenteditable]:hover,
        *[contenteditable]:focus,
        td:hover *[contenteditable],
        td:focus *[contenteditable],
        img.hover {
            background: #DEF;
            box-shadow: 0 0 1em 0.5em #DEF;
        }

        span[contenteditable] {
            display: inline-block;
        }

        /* heading */

        table {
            font-size: 75%;
            table-layout: fixed;
            width: 100%;
        }

        table {
            border-collapse: separate;
            border-spacing: 2px;
        }

        th,
        td {
            border-width: 1px;
            padding: 0.5em;
            position: relative;
            text-align: left;
        }

        th {
            width: 20px !important;
        }

        th,
        td {
            border-radius: 0.25em;
            border-style: solid;
        }

        th {
            background: #EEE;
            border-color: #BBB;
        }

        td {
            border-color: #DDD;
        }

        /* page */

        html {
            font: 16px/1 'Open Sans', sans-serif;
            overflow: auto;
            padding: 0.5in;
        }

        html {
            background: #999;
            cursor: default;
        }

        body {


            margin: 0 auto;
            overflow: hidden;

        }

        body {
            background: #FFF;
            border-radius: 1px;
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        }

        /* header */

        header {
            margin: 0 0 3em;
        }

        header:after {
            clear: both;
            content: "";
            display: table;
        }

        header h1 {
            background: #000;
            border-radius: 0.25em;
            color: #FFF;
            margin: 0 0 1em;
            padding: 0.5em 0;
        }

        header address {
            float: left;
            font-size: 75%;
            font-style: normal;
            line-height: 1.25;
            margin: 0 1em 1em 0;
        }

        header address p {
            margin: 0 0 0.25em;
        }

        header span,
        header img {
            display: block;
            float: right;
        }

        header span {
            margin: 0 0 1em 1em;
            max-height: 25%;
            max-width: 60%;
            position: relative;
        }

        header img {
            max-height: 100%;
            max-width: 100%;
        }

        header input {
            cursor: pointer;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            height: 100%;
            left: 0;
            opacity: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }

        /* article */

        article,
        article address,
        table.meta,
        table.inventory {
            margin: 0 0 3em;
        }

        article:after {
            clear: both;
            content: "";
            display: table;
        }



        article h1 {
            clip: rect(0 0 0 0);
            position: absolute;
        }

        article address {
            float: left;
            font-size: 125%;
            font-weight: bold;
        }

        /* table meta & balance */

        table.meta,
        table.balance {
            float: right;
            width: 36%;
        }

        table.meta:after,
        table.balance:after {
            clear: both;
            content: "";
            display: table;
        }

        /* table meta */

        table.meta th {
            width: 40%;
        }

        table.meta td {
            width: 60%;
        }

        /* table items */

        table.inventory {
            clear: both;
            width: 100%;
        }



        /* table balance */

        table.balance th,
        table.balance td {
            width: 50%;
        }

        table.balance td {
            text-align: right;
        }

        /* aside */

        aside h1 {
            border: none;
            border-width: 0 0 1px;
            margin: 0 0 1em;
        }

        aside h1 {
            border-color: #999;
            border-bottom-style: solid;
        }

        /* javascript */

        .add,
        .cut {
            border-width: 1px;
            display: block;
            font-size: .8rem;
            padding: 0.25em 0.5em;
            float: left;
            text-align: center;
            width: 0.6em;
        }

        .add,
        .cut {
            background: #9AF;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
            background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
            border-radius: 0.5em;
            border-color: #0076A3;
            color: #FFF;
            cursor: pointer;
            font-weight: bold;
            text-shadow: 0 -1px 2px rgba(0, 0, 0, 0.333);
        }

        .add {
            margin: -2.5em 0 0;
        }

        .add:hover {
            background: #00ADEE;
        }

        .cut {
            opacity: 0;
            position: absolute;
            top: 0;
            left: -1.5em;
        }

        .cut {
            -webkit-transition: opacity 100ms ease-in;
        }

        tr:hover .cut {
            opacity: 1;
        }



        @page {
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="container" style="margin: 10px;">
        <header>
            <img style="float:right;" src="data:image/png;base64,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" width="90" />
            <address contenteditable>
                <p></p>
                <h3>From</h3>
                <p>150 Rivonia Road, Sandton, Gauteng, South Africa</p>
                <p>0103300330</p>
                <p>accounts@net15.co.za</p>
                <p>www.net15.co.za</p>
            </address>
        </header>
        <article>
            <table style="float:right; " id="info" class="meta">
                <tr>
                    <th><span contenteditable>Invoice #</span></th>
                    <td><span contenteditable>101138XXXXX</span></td>
                </tr>
                <tr>
                    <th><span contenteditable>Date</span></th>
                    <td><span contenteditable>January 1, 2012</span></td>
                </tr>
                <tr>
                    <th><span contenteditable>Amount Due</span></th>
                    <td><span id="prefix" contenteditable>$</span><span>600.00</span></td>
                </tr>
            </table>
            <table class="inventory">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Rate</th>
                        <th>Unit</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <?php $sum = 0; ?>
                <?php foreach ($records as $row) { ?>
                    <tbody>
                        <tr>
                            <td><span><?php echo $row->tenant; ?></span></td>
                            <td><span>R0.06</span></td>
                            <td><span><?php echo $row->units; ?></span></td>
                            <td><span><?php $units = $row->units;
                                        $amount = $units * 0.6;
                                        echo "R" . $amount;
                                        ?>
                                          <?php 
                            $sum += $amount; ?></span></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
            <table style="float:right;" class="meta">
                <tr>
                    <th><span contenteditable>Subtotal (excl VAT):</span></th>
                    <td><span data-prefix>R</span><span><?php echo number_format($sum, 2); ?></span></td>
                </tr>
                <tr>
                    <th><span contenteditable>VAT</span></th>
                    <td><span data-prefix>R</span><span contenteditable><?php echo number_format($sum * 0.15, 2); ?></span></td>
                </tr>
                <tr>
                    <th><span contenteditable>Total</span></th>
                    <td><span data-prefix>R</span>
                        <span><?php $totalfloat = $sum + $sum * 0.15;
                               
                                echo $totalfloat;
                                ?></span>
                    </td>
                </tr>
            </table>
        </article>
    </div>
</body>

</html>
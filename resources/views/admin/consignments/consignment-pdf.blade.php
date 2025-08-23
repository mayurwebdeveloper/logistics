<html>
    <head>
        <meta charset="UTF-8">
        <style>
        *{
            box-sizing: border-box;
        }
        html, body {
            margin: 0;
            padding: 5px;
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
            background: #fceec4;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .top-line ul{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .top-line ul li{
            margin:  0 5px;
            color: #f00;
            font-weight: 700;
        }
        .top-head {
            display: grid;
            grid-template-columns: 25% 50% 25%;
        }
        .left-head {
            font-size: 14px;
            text-align: center;
        }
        .right-head {
            text-align: right;
            display: flex;
            justify-content: flex-end;
            font-size: 14px;
            color: #5b2026;
            font-weight: 700;
        } 
        .right-head > span {
            padding-right: 5px;
        }
        .right-head > * {
            color: #5b2026;
        }
        .left-head > div {
            text-decoration: underline;
            color: #5b2026;
            margin-bottom: 10px;
        }
        .center-head {
            text-align: center;
        }
        .center-head h1 {
            font-size: 28px;
            font-weight: 800;
            line-height: 1;
            margin: 3px 0 0 0;
        }
        .center-head h1 span{
            display: block;
            font-size: 12px;
            margin: 5px 0 0 0;
        }
        .address {
            text-align: center;
            font-weight: 400;
            margin: 8px 0;
        }
        .address  p{
            margin: 0 0 5px 0;
            font-weight: 700;
        }
        .address  p:first-child {
            color: #5b2026;
        }
        .address  p + p{
            color: #f00;
        }
        .body-content {
            display: flex;
            justify-content: space-between;
        }
        .body-left {
            width: 65%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        .body-left  .box.border-box p {
            margin: 0;
            font-size: 11px;
        }
        .body-right {
            width: 30%;
        }
        .border-box {
            border: 1px solid #5b2026;
            padding: 4px;
        }
        .box h4 {
            margin: 0;
            color: #5b2026;
        }
        .box h4 span {
            border-bottom: 1px solid #5b2026;
            display: block;
        }
        .declare h3{
            text-transform: uppercase;
            color: #383c6c;
            text-align: center;
            margin: 0 0 5px 0 ;
            font-weight: 700;
        }
        .declare p {
            text-align: justify;
            font-size: 11px;
            color: #5b2026;
            line-height: 1.2;
        }
        .consi-block table {
            width: 100%;
        }
        .consi-block table span{
            border-bottom:1px solid #5b2026;
            display: block;
        }
        .invoice-box {
            width: 800px;
            margin: auto;
            padding: 15px;
            border: 2px solid black;
            background-color: #fef9e7;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid black;
            padding-bottom: 5px;
            position: relative;
        }
        .header .jurisdiction {
            position: absolute;
            top: 0;
            left: 0;
            font-size: 9px;
        }
        .header .logo {
            position: absolute;
            top: 10px;
            left: 20px;
            border: 2px solid #000;
            border-radius: 50%;
            padding: 5px;
            width: 40px;
            height: 40px;
            text-align: center;
            font-weight: bold;
        }
        .header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: bold;
            color: #000080;
        }
        .header .tagline {
            margin: 2px 0;
            font-size: 12px;
            font-weight: bold;
        }
        .header-details {
            display: flex;
            justify-content: space-between;
            text-align: left;
            font-size: 10px;
            margin-top: 5px;
        }
        .header-details .address {
            width: 60%;
        }
        .header-details .contact {
            width: 38%;
            text-align: right;
        }
        .contact p {
            margin: 0;
            font-weight: bold;
        }
        .copy-type {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            padding: 5px 0;
            border: 1px solid black;
            width: 200px;
            margin: 5px auto;
            background-color: #fff;
        }
        .main-content {
            display: flex;
            justify-content: space-between;
            margin-top: 5px;
            width: 100%;
        }
        .left-column {
            width: 60%;
        }
        .right-column {
            width: 38%;
        }
        .bordered-box {
            border: 1px solid black;
            padding: 2px 8px;
            margin-bottom: 4px;
        }
        .left-column .bordered-box p, .right-column .bordered-box p {
            margin: 4px 0;
        }
        .consignment-box {
            display: flex;
        }
        .consignment-box > div:first-child {
            width: 60%;
            border-right: 1px solid black;
            padding-right: 5px;
        }
        .consignment-box > div:last-child {
            width: 40%;
            padding-left: 10px;
        }
        .insurance-box ul {
            list-style-type: none;
            padding-left: 10px;
            margin: 2px 0;
        }
        .insurance-box ul li {
            margin-bottom: 4px;
        }
        .insurance-box .check {
            font-size: 20px;
            font-weight: bold;
            color: black;
            vertical-align: middle;
        }
        .notice-box {
            font-size: 8px;
            padding: 4px;
        }
        .notice-box p {
            margin: 0;
        }
               .body-content  table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 3px;
            font-size: 10px;
        }
        .body-content th, .body-content  td {
            border: 1px solid black;
            padding: 4px 8px;
            text-align: left;
        }
        .details-td {
            text-align: left;
            vertical-align: top;
            padding: 8px;
        }
        .amount-td {
            text-align: right;
            padding-right: 20px;
        }
        .final-total-td {
            font-weight: bold;
            text-align: right;
            padding-right: 20px;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 5px;
            padding-top: 3px;
        }
        .footer div {
            width: 30%;
        }
        .bold {
            font-weight: bold;
        }
        .text-left {
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
        td.details-td {
            padding: 10px 10px;
            text-align: left;
            font-size: 11px;
            color: #f00;
        }
        .consi-block {
            text-align: center;
            text-transform: uppercase;
        }
        .consi-block > * {
            border-top: 1px solid #5b2026;
            padding: 5px 0;
            color: #5b2026;
        }
        .consi-block h3{
            margin-bottom: 0;
        }
        .consi-block .insure-block {
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 2px;
        }
        .notice-block {
            border: 1px solid #5b2026;
            padding: 10px 10px 0;
        }
        .notice-block p {
            line-height: 16px;
            text-align: justify;
            color: #5b2026;
        }
        .notice-block h5 {
            text-align: center;
            text-transform: uppercase;
            font-weight: 700;
            color: #000080;
            font-size: 18px;
            margin: 0;
        }
        .msme-block {
            font-size: 18px;
            text-transform: uppercase;
            color: #f00;
            margin: 0;
            font-weight: 700;
        }
        .msme-block {
            margin: 0 0 10px 0;
        }
        .body-left .bordered-box {
            grid-column: span 2;
        }
        .body-left .bordered-box p {
            margin: 3px 0;
            text-align: left !important;
        }
        
        /* Additional spacing optimizations */
        .bordered-box {
            margin-bottom: 3px !important;
        }
        
        .block {
            margin-bottom: 8px;
        }
        
        .declare {
            margin-bottom: 5px;
        }
        
        .box {
            margin-bottom: 3px;
        }
        </style>
    </head>
    <body>
        <div class="top-head">
            <div>
                <div class="left-head">
                    <div>Subject to Ahmedabad Jurisdiction</div>
                    <img src="./cr-logo.jpg" alt="" />
                </div>
            </div>
            <div class="center-head">
                <div class="top-line">
                    <ul>
                        <li>॥ श्री गणेशाय नमः ॥</li>
                        <li>॥ श्री १ ॥</li>
                        <li>॥ श्री चामुंडाये नमः ॥</li>
                    </ul>
                </div>
                <div>
                    <h1>{{ $company->name ?? 'CHAVDA ROADLINES' }}
                        <span>Transport Contractor & Commission Agent</span>
                    </h1>
                </div>
            </div>
            <div class="right-head">
                <span>Mobile : </span> 
                <div>
                    @if($company && $company->mobile_numbers)
                        @php
                            $mobileNumbers = is_string($company->mobile_numbers) ? json_decode($company->mobile_numbers, true) : $company->mobile_numbers;
                        @endphp
                        @if(is_array($mobileNumbers))
                            @foreach($mobileNumbers as $mobile)
                                {{ $mobile }}<br>
                            @endforeach
                        @else
                            9825020994<br>9724545153<br>9879508994
                        @endif
                    @else
                        9825020994<br>9724545153<br>9879508994
                    @endif
                </div>
            </div>
        </div>
        <div class="address">
            <p>{{ $company->head_office_address ?? 'H.O. : 5/A, Gopalak Complex, Nr. K. D. Garden Restaurant, Opp. Samratnagar, N.H. Road, Isanpur, Ahmedabad-382443. Email: chavdaroadlines@gmail.com' }}</p>
            <p>{{ $company->godown_address ?? 'Godown: Part-1, Shed No. 4, Parishikhar Ind. Estate, Near Ramol Toll Plaza, S.P. Ring Road, Ramol, Ahmedabad-382449.' }}</p>
        </div>
        <div class="body-content">
            <div class="body-left">
                <div class="block declare">
                    <h3>DECLARATION</h3> 
                    <p>We hereby declare that we have not availed Cenvat credit Paid on input or capital goods used for providing services. Notification No. 12/2003-Service Tax dated 20th June 2003 (G.S.R. 503(E))</p>   
                    <div class="box border-box">
                        <h4>Address of delivery Office :	<br /><span>AT</span><br /> <span>{{ $consignment->delivery_office_address }}</span></h4> 
                        <div class="consi-block">
                            <h4>Consignment Note NO.</h4>
                            <table border="0" cellspacing="0">
                                <tr>
                                    <td>No.</td>
                                    <td><span>{{ $consignment->consignment_number }}</span></td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td><span>{{ $consignment->consignment_date->format('d/m/Y') }}</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class="consi-block">
                        <h3>CONSIGNOR COPY</h3> 
                        <div>{{ $consignment->at_owners_risk ? 'At Owner\'s Risk' : 'At Company\'s Risk' }}</div>
                        <div class="insure-block">Insurance</div>
                    </div>
                    <div class="box border-box">
                        <p>The customer has stated that :</p>
                        <ul>
                            <li>{{ $consignment->is_insured ? '✓' : '☐' }} He has not insured the consignment or</li>
                            <li>{{ $consignment->is_insured ? '☐' : '✓' }} He has insured consignment</li>
                        </ul>
                        @if($consignment->is_insured)
                        <table>
                            <tr>
                                <td colspan="2">{{ $consignment->insurance_company ?? 'Company' }}</td>
                            </tr>
                            <tr>
                                <td>Policy No.</td>
                                <td>{{ $consignment->insurance_policy_no ?? 'Date' }}</td>
                            </tr>
                            <tr>
                                <td>{{ $consignment->insurance_amount ?? 'Amount' }}</td>
                                <td>{{ $consignment->insurance_risk ?? 'Risk' }}</td>
                            </tr>
                        </table>
                        @endif
                    </div>
                </div>
                <div class="bordered-box">
                    <p>Consignor's Name &amp; Address M/s. <span class="bold">{{ $consignment->consignor->name ?? 'Pushpak Engineering Co.' }}</span></p>
                    <p class="bold" style="text-align: center;">{{ $consignment->consignor->address ?? 'Ahmedabad' }}</p>
                    <p>GST No: <span class="bold">{{ $consignment->consignor->gst_no ?? '24ACRPJ0386R1ZV' }}</span></p>
                </div>
                <div class="bordered-box">
                    <p>Consignee's Name &amp; Address M/s. <span class="bold">{{ $consignment->consignee->name ?? 'New Sahyadri Elevators' }}</span></p>
                    <p class="bold" style="text-align: center;">{{ $consignment->consignee->address ?? 'Airoli, Navi Mumbai' }}</p>
                    <p>GST No: <span class="bold">{{ $consignment->consignee->gst_no ?? '27AVVPA0441M1ZD' }}</span></p>
                </div>
            </div>
            <div class="body-right">
                <div class="msme-block">
                    MSME NO.: {{ $company->msme_no ?? 'UDYAM-GJ-01-0199161' }} <br>
                    E-Way Bill ID : {{ $company->eway_bill_id ?? '24AIDPC0731B1ZB' }}
                </div>
                <div class="notice-block">
                    <h5>Notice</h5>
                    <p>The Consignment covered by this sent of Special Lorry Receipt Form shall be stored at the destination under the control of the Transport Operator and shall be delivered to or to the order of the Consignee Bank whose name is mentioned in the Lorry Receipt. It will under no circumstances be delivered to any one without the written authority for the Consignee Bank of its order endorsed on the Consignee Copy or on a separate Letter of Authority.</p>
                </div>
                <table class="truck-table">
                    <tbody>
                        <tr><td class="label">Truck No.</td><td class="value">{{ $consignment->truck_number }}</td></tr>
                        <tr><td class="label">From :</td><td class="value">{{ $consignment->from_location }}</td></tr>
                        <tr><td class="label">To :</td><td class="value">{{ $consignment->to_location }}</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="body-content">
            <table>
                <thead>
                    <tr>
                        <th rowspan="2">No. of Packages</th>
                        <th rowspan="2">Description (Said to Contains)</th>
                        <th colspan="2">Weight in Kgs.</th>
                        <th rowspan="2">Rate</th>
                        <th colspan="2">Freight Amount To Pay/Paid</th>
                    </tr>
                    <tr>
                        <th>S. W. A.</th>
                        <th>Charged</th>
                        <th>Rs.</th>
                        <th>Ps.</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consignment->items as $item)
                    <tr>
                        <td style="height: 60px; vertical-align: top;">
                            <span class="bold">{{ $item->package_count }}</span><br>{{ $item->package_type ?? 'Unit' }}
                        </td>
                        <td class="text-left" style="vertical-align: top;">
                            <span class="bold">{{ $item->description }}
                            @if($item->invoice_number)
                                <br>Invoice No :- {{ $item->invoice_number }} 
                                @if($item->invoice_date)
                                    Dated :- {{ $item->invoice_date->format('d/m/Y') }}
                                @endif
                            @endif
                            </span>
                        </td>
                        <td class="bold">{{ $item->weight_type ?? 'FTL' }}</td>
                        <td class="bold">{{ $item->rate_type ?? 'FIX' }}</td>
                        <td>{{ $item->rate ?? '' }}</td>
                        <td class="text-center bold" style="vertical-align: top;">
                            {{ number_format($item->amount, 0) }}/-<br>{{ $consignment->payment_mode }}<br>Only
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td rowspan="5" colspan="4" class="details-td">
                            <p><span class="bold">GSTIN : {{ $company->gstin ?? '24AIDPC0731B1ZB' }}</span></p>
                            <p class="bold">Our Bank Details</p>
                            <p style="font-size: 10px;">A/c. Name : {{ $company->account_name ?? 'Chavda Roadlines' }} A/c. No : {{ $company->account_number ?? '013138230001200' }}</p>
                            <p style="font-size: 10px;">Bank Name : {{ $company->bank_name ?? 'Nutan Nagarik Sahakari Bank Ltd.' }} Branch : Isanpur, Ahmedabad. RTGS/NEFT IFSC : {{ $company->ifsc_code ?? 'NNSB0128013' }}</p>
                        </td>
                        <td class="text-left">IGST {{ $consignment->igst_rate ?? 0 }}%</td>
                        <td></td>
                        <td>{{ number_format($igst_amount, 0) }}</td>
                    </tr>
                    <tr>
                        <td class="text-left">CGST {{ $consignment->cgst_rate ?? 0 }}%</td>
                        <td></td>
                        <td>{{ number_format($cgst_amount, 0) }}</td>
                    </tr>
                    <tr>
                        <td class="text-left">SGST {{ $consignment->sgst_rate ?? 0 }}%</td>
                        <td></td>
                        <td>{{ number_format($sgst_amount, 0) }}</td>
                    </tr>
                    <tr>
                        <td class="text-left">Hamali/Union<br>Sur. Ch.</td>
                        <td class="amount-td"></td>
                        <td class="bold">{{ number_format($consignment->hamali_union, 0) }} 00</td>
                    </tr>
                    <tr>
                        <td class="bold text-left">Total</td>
                        <td class="final-total-td">{{ $formatted_total }}/-</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="footer">
            <div>Value _____________________</div>
            <div>Private Mark ______________</div>
            <div class="text-right">Signature of the Transport Operator<br><br><span class="bold">{{ $consignment->driver_name ?? 'N. B. Chud...' }}</span></div>
        </div>
    </body>
</html>
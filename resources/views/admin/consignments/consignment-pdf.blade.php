
<html>
    <head>
        <title>Consignment Note - {{ $consignment->consignment_number ?? 'View' }}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
       *{
            box-sizing: border-box;
        }
        html, body {
            margin: 0;
            padding: 2px;
            font-size: 10px;
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
            margin:  0 2px;
            color: #f00;
            font-weight: 700;
        }
        .top-head {
            display: grid;
            grid-template-columns: 25% 50% 25%;
        }
        .left-head {
            font-size: 10px;
            text-align: center;
        }
        .right-head {
            text-align: right;
            display: flex;
            justify-content: flex-end;
            font-size: 10px;
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
            margin-bottom: 2px;
        }
        .center-head {
            text-align: center;
        }
        .center-head h1 {
            font-size: 28px;
            font-weight: 800;
            line-height: 1;
            margin: 2px 0 0 0;
        }
        .center-head h1 span{
            display: block;
            font-size: 12px;
            margin: 2px 0 0 0;
        }
        .address {
            text-align: center;
            font-weight: 400;
            margin: 3px 0;
        }
        .address  p{
            margin: 0 0 1px 0;
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
            gap: 5px;
        }
        .body-left  .box.border-box p {
            margin: 0;
            font-size: 10px;
        }
        .body-right {
            width: 30%;
        }
        .border-box {
            border: 1px solid #5b2026;
            padding: 1px;
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
            margin: 0 0 2px 0 ;
            font-weight: 700;
        }
        .declare p {
            text-align: justify;
            font-size: 10px;
            color: #5b2026;
            line-height: 1.1;
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
            padding: 3px;
            border: 2px solid black;
            background-color: #fef9e7;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid black;
            padding-bottom: 1px;
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
            font-size: 24px;
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
            margin-top: 1px;
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
            font-size: 10px;
            padding: 1px 0;
            border: 1px solid black;
            width: 200px;
            margin: 1px auto;
            background-color: #fff;
        }
        .main-content {
            display: flex;
            justify-content: space-between;
            margin-top: 1px;
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
            padding: 1px 4px;
            margin-bottom: 1px;
        }
        .left-column .bordered-box p, .right-column .bordered-box p {
            margin: 1px 0;
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
            margin-bottom: 1px;
        }
        .insurance-box .check {
            font-size: 20px;
            font-weight: bold;
            color: black;
            vertical-align: middle;
        }
        .notice-box {
            font-size: 8px;
            padding: 1px;
        }
        .notice-box p {
            margin: 0;
        }
       .body-content  table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1px;
            font-size: 10px;
        }
        .body-content th, .body-content  td {
            border: 1px solid black;
            padding: 2px 4px;
            text-align: left;
        }
        .details-td {
            text-align: left;
            vertical-align: top;
            padding: 2px;
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
            margin-top: 2px;
            padding-top: 1px;
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
            padding: 5px 5px;
            text-align: left;
            font-size: 10px;
            color: #f00;
        }
        .consi-block {
            text-align: center;
            text-transform: uppercase;
        }
        .consi-block > * {
            border-top: 1px solid #5b2026;
            padding: 2px 0;
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
            padding: 5px 5px 0;
        }
        .notice-block p {
            line-height: 12px;
            text-align: justify;
            color: #5b2026;
        }
        .notice-block h5 {
            text-align: center;
            text-transform: uppercase;
            font-weight: 700;
            color: #000080;
            font-size: 14px;
            margin: 0;
        }
        .msme-block {
            font-size: 12px;
            text-transform: uppercase;
            color: #f00;
            margin: 0 0 2px 0;
            font-weight: 700;
        }
        .body-left .bordered-box {
            grid-column: span 2;
        }
        .body-left .bordered-box p {
            margin: 1px 0;
            text-align: left !important;
        }
        
        /* Print button styles */
        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        
        .print-button:hover {
            background: #0056b3;
        }
        
        /* Print styles - hide browser elements and optimize for printing */
        @media print {
            .print-button {
                display: none;
            }
            
            html, body {
                margin: 0;
                padding: 0;
                background: white;
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }
            
            * {
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }
            
            .top-head, .address, .body-content, .footer {
                page-break-inside: avoid;
            }
            
            table {
                page-break-inside: avoid;
            }
            
            /* Ensure background colors print */
            .msme-block {
                color: #f00 !important;
            }
            
            .address p + p {
                color: #f00 !important;
            }
            
            .top-line ul li {
                color: #f00 !important;
            }
            
            .declare h3 {
                color: #383c6c !important;
            }
            
            .notice-block h5 {
                color: #000080 !important;
            }
            
            .center-head h1 {
                color: #000080 !important;
            }
        }
    </style>
    </head>
    <body>
        <!-- Print Button -->
        <button class="print-button" onclick="printReceipt()">
            🖨️ Print Receipt
        </button>
        
        <div class="top-head">
            <div>
                <div class="left-head">
                    <div>Subject to Ahmedabad Jurisdiction</div>
                </div>
            </div>
            <div class="center-head">
                <div class="top-line">
                    <ul>
                        <li>॥ શ્રી ગણેશાય નમઃ ॥</li>
                        <li>॥ શ્રી ૧| ॥</li>
                        <li>॥ શ્રી ચામુંડાયે નમઃ ॥</li>
                    </ul>
                </div>
                <div>
                    <h1>CHAVDA ROADLINES
                        <span>Transport Contractor & Commission Agent</span>
                    </h1>
                </div>
            </div>
            <div class="right-head">
                <span>Mobile : </span> 
                <div>
                    {{ $company->mobile_no ?? '9825020994' }}<br>
                    {{ $company->mobile_no2 ?? '9724545153' }}<br>
                    {{ $company->second_person_name ?? '9879508994' }}
                </div>
            </div>
        </div>
        <div class="address">
            <p>H.O. : {{ $company->address ?? '5/A, Gopalak Complex, Nr. K. D. Garden Restaurant, Opp. Samratnagar, N.H. Road, Isanpur, Ahmedabad-382443. Email: chavdaroadlines@gmail.com' }}</p>
            <p>Godown: Part-1, Shed No. 4, Parishikhar Ind. Estate, Near Ramol Toll Plaza, S.P. Ring Road, Ramol, Ahmedabad-382449.</p>
        </div>
        <div class="body-content">
            <div class="body-left">
                <div class="block declare">
                    <h3>DECLARATION</h3> 
                    <p>We hereby declare that we have not availed Cenvat credit Paid on input or capital goods used for providing services. Notification No. 12/2003-Service Tax dated 20th June 2003 (G.S.R. 503(E))</p>   
                  <div class="box border-box">
                       <h4>Address of delivery Office :	<br /><span>{{ $consignment->delivery_office_address ?? 'AT' }}</span><br /> <span>{{ $consignment->to_location ?? 'Airoli' }}</span></h4> 
                       <div class="consi-block">
                        <h4>Consignment Note NO.</h4>
                        <table border="0" cellspacing="0">
                            <tr>
                                <td>No.</td>
                                <td><span>{{ $consignment->consignment_number ?? '0313/25-26' }}</span></td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td><span>{{ $consignment->consignment_date ? $consignment->consignment_date->format('d/m/Y') : '21/06/2025' }}</span></td>
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
                            <li>{{ $consignment->is_insured ? '✓' : '☐' }} He has insured the consignment</li>
                            <li>{{ !$consignment->is_insured ? '✓' : '☐' }} He has not insured the consignment</li>
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
                                <td>Amount</td>
                                <td>{{ $consignment->insurance_risk ?? 'Risk' }}</td>
                            </tr>
                        </table>
                        @endif
                    </div>
                </div>
                 <div class="bordered-box">
                    <p>Consignor's Name &amp; Address M/s. <span class="bold">{{ $consignment->consignor->name ?? 'Pushpak Engineering Co. Ahmedabad' }}</span></p>
                    <p>GST No: <span class="bold">{{ $consignment->consignor->gst_no ?? '24ACRPJ0386R1ZV' }}</span></p>
                </div>
                <div class="bordered-box">
                    <p>Consignee's Name &amp; Address M/s. <span class="bold">{{ $consignment->consignee->name ?? 'New Sahyadri Elevators Airoli, Navi Mumbai' }}</span></p>
                    <p>GST No: <span class="bold">{{ $consignment->consignee->gst_no ?? '27AVVPA0441M1ZD' }}</span></p>
                </div>
            </div>
            <div class="body-right">
                <div class="msme-block">
                    MSME NO.: UDYAM-GJ-01-0199161 <br>
                    E-Way Bill ID : {{ $company->gst_no ?? '24AIDPC0731B1ZB' }}
                </div>
                <div class="notice-block">
                    <h5>Notice</h5>
                    <p>The Consignment covered by this sent of Special Lorry Receipt Form shall be stored at the destination under the control of the Transport Operator and shall be delivered to or to the order of the Consignee Bank whose name is mentioned in the Lorry Receipt. It will under no circumstances be delivered to any one without the written authority for the Consignee Bank of its order endorsed on the Consignee Copy or on a separate Letter of Authority.</p>
                </div>
                <table class="truck-table">
                    <tbody>
                        <tr><td class="label">Truck No.</td><td class="value">{{ $consignment->truck_number ?? 'GJ-27-V-7589' }}</td></tr>
                        <tr><td class="label">From :</td><td class="value">{{ $consignment->from_location ?? 'Ahmedabad' }}</td></tr>
                        <tr><td class="label">To :</td><td class="value">{{ $consignment->to_location ?? 'Airoli' }}</td></tr>
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
                    <td style="vertical-align: top;"><span class="bold">{{ $item->package_count ?? '1' }}</span><br>{{ $item->package_type ?? 'Unit' }}</td>
                    <td class="text-left" style="vertical-align: top;">
                        <span class="bold">{{ $item->description ?? 'Machinery as per' }}<br>
                        @if($item->invoice_number)
                        Invoice No :- {{ $item->invoice_number }} 
                        @endif
                        @if($item->invoice_date)
                        Dated :- {{ $item->invoice_date->format('d/m/Y') }}
                        @endif
                        </span>
                    </td>
                    <td class="bold">{{ $item->weight_type ?? 'FTL' }}</td>
                    <td class="bold">{{ $item->rate_type ?? 'FIX' }}</td>
                    <td>{{ $item->rate ? number_format($item->rate, 2) : '' }}</td>
                    <td class="text-center bold" style="vertical-align: top;">
                        {{ number_format($item->amount, 0) }}/-<br>
                        {{ $consignment->payment_mode ?? 'To Pay Cash' }}<br>
                        Only
                    </td>
                    <td></td>
                </tr>
                @endforeach
                <tr>
                    <td rowspan="5" colspan="4" class="details-td">
                        <p><span class="bold">GSTIN : {{ $company->gst_no ?? '24AIDPC0731B1ZB' }}</span></p>
                        <p class="bold">Our Bank Details</p>
                        <p style="font-size: 12px;">A/c. Name : {{ $company->name ?? 'Chavda Roadlines' }} A/c. No : 013138230001200</p>
                        <p style="font-size: 12px;">Bank Name : Nutan Nagarik Sahakari Bank Ltd. Branch : Isanpur, Ahmedabad. RTGS/NEFT IFSC : NNSB0128013</p>
                    </td>
                    <td class="text-left">IGST {{ $consignment->igst_rate ?? 0 }}%</td>
                    <td class="amount-td">{{ number_format($igst_amount ?? 0, 0) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-left">CGST {{ $consignment->cgst_rate ?? 0 }}%</td>
                    <td class="amount-td">{{ number_format($cgst_amount ?? 0, 0) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-left">SGST {{ $consignment->sgst_rate ?? 0 }}%</td>
                    <td class="amount-td">{{ number_format($sgst_amount ?? 0, 0) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-left">Hamali/Union<br>Sur. Ch.</td>
                    <td class="amount-td"></td>
                    <td class="bold">{{ number_format($consignment->hamali_union ?? 30, 0) }} 00</td>
                </tr>
                <tr>
                    <td class="bold text-left">Total</td>
                    <td class="final-total-td">{{ number_format($consignment->total_amount ?? 4530, 0) }}/-</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        </div>
        <div class="footer">
            <div>Value _____________________</div>
            <div>Private Mark ______________</div>
            <div class="text-right">Signature of the Transport Operator<br><br><span class="bold">N. B. Chud...</span></div>
        </div>
    
        <!-- Print JavaScript -->
        <script>
            function printReceipt() {
                // Create a new window for printing
                const printWindow = window.open('', '_blank', 'width=800,height=600,scrollbars=yes,resizable=yes');
                const printDocument = printWindow.document;
                
                // Get the current page content without the print button
                const contentToPrint = document.body.innerHTML.replace(
                    '<button class="print-button" onclick="printReceipt()">🖨️ Print Receipt</button>', 
                    ''
                );
                
                // Create clean HTML for printing
                printDocument.write(`
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <title>Consignment Receipt</title>
                        <meta charset="UTF-8">
                        <style>
                            * {
                                box-sizing: border-box;
                            }
                            html, body {
                                margin: 0 !important;
                                padding: 5px !important;
                                font-size: 10px;
                                font-family: Arial, Helvetica, sans-serif;
                                background: white !important;
                                -webkit-print-color-adjust: exact !important;
                                color-adjust: exact !important;
                                print-color-adjust: exact !important;
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
                                margin: 0 2px;
                                color: #f00;
                                font-weight: 700;
                            }
                            .top-head {
                                display: grid;
                                grid-template-columns: 25% 50% 25%;
                            }
                            .left-head {
                                font-size: 10px;
                                text-align: center;
                            }
                            .right-head {
                                text-align: right;
                                display: flex;
                                justify-content: flex-end;
                                font-size: 10px;
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
                                margin-bottom: 2px;
                            }
                            .center-head {
                                text-align: center;
                            }
                            .center-head h1 {
                                font-size: 28px;
                                font-weight: 800;
                                line-height: 1;
                                margin: 2px 0 0 0;
                                color: #000080 !important;
                            }
                            .center-head h1 span{
                                display: block;
                                font-size: 12px;
                                margin: 2px 0 0 0;
                            }
                            .address {
                                text-align: center;
                                font-weight: 400;
                                margin: 8px 0;
                            }
                            .address p{
                                margin: 0 0 1px 0;
                                font-weight: 700;
                            }
                            .address p:first-child {
                                color: #5b2026;
                            }
                            .address p + p{
                                color: #f00 !important;
                            }
                            .body-content {
                                display: flex;
                                justify-content: space-between;
                            }
                            .body-left {
                                width: 65%;
                                display: grid;
                                grid-template-columns: 1fr 1fr;
                                gap: 8px;
                            }
                            .body-left .box.border-box p {
                                margin: 0;
                                font-size: 10px;
                            }
                            .body-right {
                                width: 30%;
                            }
                            .border-box {
                                border: 1px solid #5b2026;
                                padding: 2px;
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
                                color: #383c6c !important;
                                text-align: center;
                                margin: 0 0 4px 0;
                                font-weight: 700;
                            }
                            .declare p {
                                text-align: justify;
                                font-size: 10px;
                                color: #5b2026;
                                line-height: 1.1;
                            }
                            .consi-block table {
                                width: 100%;
                            }
                            .consi-block table span{
                                border-bottom: 1px solid #5b2026;
                                display: block;
                            }
                            .consi-block {
                                text-align: center;
                                text-transform: uppercase;
                            }
                            .consi-block > * {
                                border-top: 1px solid #5b2026;
                                padding: 3px 0;
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
                                padding: 8px 8px 0;
                            }
                            .notice-block p {
                                line-height: 12px;
                                text-align: justify;
                                color: #5b2026;
                            }
                            .notice-block h5 {
                                text-align: center;
                                text-transform: uppercase;
                                font-weight: 700;
                                color: #000080 !important;
                                font-size: 14px;
                                margin: 0;
                            }
                            .msme-block {
                                font-size: 12px;
                                text-transform: uppercase;
                                color: #f00 !important;
                                margin: 0 0 5px 0;
                                font-weight: 700;
                            }
                            .body-left .bordered-box {
                                grid-column: span 2;
                            }
                            .body-left .bordered-box p {
                                margin: 2px 0;
                                text-align: left !important;
                            }
                            .body-content table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-top: 1px;
                                font-size: 10px;
                            }
                            .body-content th, .body-content td {
                                border: 1px solid black;
                                padding: 2px 4px;
                                text-align: left;
                            }
                            .details-td {
                                text-align: left;
                                vertical-align: top;
                                padding: 2px;
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
                                padding: 5px 5px;
                                text-align: left;
                                font-size: 10px;
                                color: #f00 !important;
                            }
                            
                            /* Print-specific styles */
                            @media print {
                                @page {
                                    margin: 0 !important;
                                    size: A4 !important;
                                }
                                html, body {
                                    margin: 0 !important;
                                    padding: 0 !important;
                                    background: white !important;
                                }
                                .print-button {
                                    display: none !important;
                                }
                                .top-head, .address, .body-content, .footer {
                                    page-break-inside: avoid !important;
                                    break-inside: avoid !important;
                                }
                                table {
                                    page-break-inside: avoid !important;
                                    break-inside: avoid !important;
                                }
                            }
                        </style>
                    </head>
                    <body>
                        ${contentToPrint}
                    </body>
                    </html>
                `);
                
                printDocument.close();
                
                // Wait for content to load then print
                printWindow.onload = function() {
                    setTimeout(() => {
                        printWindow.print();
                        printWindow.close();
                    }, 500);
                };
            }
            
            // Add keyboard shortcut (Ctrl+P or Cmd+P)
            document.addEventListener('keydown', function(e) {
                if ((e.ctrlKey || e.metaKey) && e.key === 'p') {
                    e.preventDefault();
                    printReceipt();
                }
            });
            
            // Auto-hide print button after 5 seconds of inactivity
            let printButton = document.querySelector('.print-button');
            let timeout;
            
            function resetTimeout() {
                clearTimeout(timeout);
                printButton.style.opacity = '1';
                timeout = setTimeout(() => {
                    printButton.style.opacity = '0.7';
                }, 5000);
            }
            
            // Reset timeout on mouse movement
            document.addEventListener('mousemove', resetTimeout);
            document.addEventListener('click', resetTimeout);
            
            // Initialize timeout
            resetTimeout();
        </script>
    </body>
</html>
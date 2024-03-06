<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Agricultural Insurance</title>
</head>
<link rel="stylesheet" href="css/insurance.css">

<body>
@include('admin.adminhome')
<div id="tableContainer">

<h2 id="h2"><p>Agricultural Insurance</p></h2>
<div id="checkboxCounter">0</div>
<div id="Counter"></div>
<button  style="margin-left:30px" type="button" class="button-30" id="printButton"><i class="bi bi-printer"> </i> Print Checked Rows (Max 15)</button>
<a href="register">
    

</a>


    <script>
        function filterByCommodity() {
            var selectedCommodity = document.getElementById('commodityFilter').value;
            var table = document.getElementById('myfrm');
            
            if (!table) {
                console.error("Table element not found");
                return;
            }

            var trList = table.querySelectorAll('tbody tr');

            for (var i = 0; i < trList.length; i++) {
                var tdCommodity = trList[i].querySelector('td:nth-child(4)'); // Assuming commodity is in the 4th column (index 3)

                if (selectedCommodity === 'all' || (tdCommodity && tdCommodity.innerText.toLowerCase() === selectedCommodity)) {
                    trList[i].style.display = '';
                } else {
                    trList[i].style.display = 'none';
                }
            }
        }
    </script>
<style>
    .containerfilter {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-left:50px;
    }

    .dropdown select,
    .search-container input {
        width: 100%;
        box-sizing: border-box;
    }

    /* Add any additional styling as needed */
</style>



<div class="containerfilter">
<div class="dropdown">
    <select id="commodityFilter" onchange="filterByCommodity()">
        <option value="all">All Commodities</option>
        <option value="rice">Rice</option>
        <option value="corn">Corn</option>
        <option value="vegetable">Vegetable</option>
        <option value="coconut">Coconut</option>
    </select>
</div>
    <div class="search-container">
        <label for="search">Search by Name:</label>
        <input type="text" id="search" placeholder="Enter Farmers Name" oninput="filterByName()" onblur="clearSearch()">
    </div>
</div>


<script>
function clearSearch() {
    var input = document.getElementById('search');
    input.value = '';
    filterByName(); // Optionally, you can re-run the filtering when the search box is cleared
}
function filterByName() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById('search');
    filter = input.value.toUpperCase();
    table = document.getElementById('myfrm');
    tr = table.getElementsByTagName('tr');

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName('td')[1]; // Assuming name is in the 2nd column (index 1)

        if (td) {
            txtValue = td.textContent || td.innerText;
            if (filter === '' || txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }
        }
    }
}

</script>
<table id="myfrm" style="margin-left:30px">
    <thead>
        <tr>
            <th id="id">No.</th>
            <th id="id">Name</th>
            <th id="id">Address</th>
            <th id="id">Commodity</th>
            <th id="id">Mark</th>
        </tr>
    </thead>
    <?php $i=1; ?>
    @foreach($insurance as $account)
   
    <tr>
         <!-- Data displayed in the table -->
       
         <td class="print-only">{{$i++}}</td>
         <td class="print-only">{{ $account->surname }} {{ $account->first_name }}</td>
        <td class="print-only">{{ $account->address }}</td>
        <td class="print-only">{{ $account->crop_type }}</td>
        <td class="print-only">
          
            <div class="checkbox-wrapper-39">
  <label>
    <input type="checkbox"class="print-checkbox" name="mark"/>
    <span class="checkbox"></span>
  </label>
</div>
        </td>


        <!-- Additional details hidden by default -->
        <td class="print-details" style="display:none;">{{$account->surname}}</td>
        <td class="print-details" style="display:none;">{{$account->first_name}}</td>
        <td class="print-details" style="display:none;">{{$account->middle_name}}</td>
        <td class="print-details" style="display:none;">{{$account->extension_name}}</td>
        <td class="print-details" style="display:none;">{{$account->sex}}</td>
        <td class="print-details" style="display:none;">{{$account->status}}</td>
        <td class="print-details" style="display:none;">{{$account->barangay}}</td>
        <td class="print-details" style="display:none;">{{$account->Bdate}}</td>
        <td class="print-details" style="display:none;">{{$account->phone}}</td>
        <td class="print-details" style="display:none;">{{$account->wife}}</td>
        
        <td class="print-details" style="display:none;">{{$account->benificiary}}</td>
        <td class="print-details" style="display:none;">{{$account->bankname}} {{$account->bankAccount}}</td>
        <td class="print-details" style="display:none;">{{$account->amountCover}}</td>
        <td class="print-details" style="display:none;">{{$account->sowing}}</td>
        <td class="print-details" style="display:none;">{{$account->planting}}</td>
        <td class="print-details" style="display:none;">{{$account->harvest}}</td>
        <td class="print-details" style="display:none;">{{$account->crop_type}}</td>

          <!-- print this to new document page -->
          <td class="print-details2" style="display:none;">{{$account->first_name}} {{$account->middle_name}}
            {{$account->surname}} {{$account->extension_name}}</td>
        <td class="print-details2" style="display:none;">{{$account->address}}</td>
        <td class="print-details2" style="display:none;">{{$account->land_area}}</td>
        <td class="print-details2" style="display:none;">{{$account->farm_type}}</td>
        <td class="print-details2" style="display:none;">{{$account->tenurial}}</td>
        <td class="print-details2" style="display:none;">{{$account->north}}</td>
        <td class="print-details2" style="display:none;">{{$account->south}}</td>
        <td class="print-details2" style="display:none;">{{$account->east}}</td>
        <td class="print-details2" style="display:none;">{{$account->west}}</td>
        <td class="print-details2" style="display:none;"></td> 
    </tr>
@endforeach

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</table>
</div>

<script>
document.getElementById('printButton').addEventListener('click', function () {
    let checkedRows = document.querySelectorAll('input.print-checkbox:checked');

    if (checkedRows.length === 0) {
        alert('Please check at least one row to print.');
    } else if (checkedRows.length > 15) {
        alert('You can only print up to 15 rows at a time.');
    } else {
        // Create a new window for printing
        var printWindow = window.open('', '_blank');

        // Begin building the content for the new window
        var content = '<html><head><style>';
        // Add your print CSS code here
        content += '@media print {';
        content += 'table {width: 100%; page-break-after: auto; page-break-before: auto; page-break-inside: avoid; transform: rotate(0deg);}';
        content += 'td, th {padding: 10px; font-size: 12px; border: 1px solid #ccc; text-align: center;}';
        content += 'td:first-child {text-align: left;}';
        content += '.print-cell {display: block;}';
        content += '.print-details {display: table-cell;}';
        content += '.print-details2 {display: table-cell;}';
        content += '.print-only {display: none;}';  // Add this line to hide columns with class "print-only"
        content += '.new-page {page-break-before: always;}';  // Add this line for a new page
        content += '}</style></head><body>';

        var rowNumber = 1;
        var rowNumber1 = 1;
        // Iterate through checked rows and add them to the content (First Page)
        content += `
           <html>
            <head>
                <style>
                    @page {
                        size: 17in 8.5in; /* Set the page size to long bond paper dimensions in landscape */
                        margin: 0.5in; /* Set margins (adjust as needed) */
                        margin-top: -1.5in;
                        margin-bottom: -1.5in;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    td, th {
                        padding: 10px;
                        border: 1px solid black;
                        text-align: center;
                    }
                    td:first-child {
                        text-align: left;
                    }
                    th {
                        background-color: #f0f0f0;
                    }
                    @media print {
                        table {
                            width: 100%;
                            page-break-after: auto;
                            page-break-before: auto;
                            page-break-inside: avoid;
                            transform: rotate(0deg);
                        }
                        td, th {
                            padding: 10px;
                            
                            font-size: 11.5px;
                            border: 1px solid #ccc;
                            text-align: center;
                        }
                        td{
                            padding-top: 9px;
                            padding-bottom: 9px;
                        }
                        td:first-child {
                            text-align: left;
                        }
                        .print-cell {
                            display: block;
                        }
                    }
                </style>
            </head>
            <body>
                <div style="display: flex; flex-direction: column; align-items: right; text-align: right;">
                    <p style="text-align: right; font-size: 10px; font-family: 'figtree', sans-serif;">
                        RC-UPI-07<br>2017/FEB<br>PAGE1
                    </p>
                    <table style="display: flex; white-space: nowrap; padding-left: 995px;">
                        <tr>
                            <td style="white-space: nowrap; text-indent: 50px; height: 215px; text-align: left; padding-left: 10px; padding-right: 10px;">
                                <p style="line-height: 1.8;"><strong style="margin-left: -50px;">FOR PCIC ONLY:</strong><br>
                                CIC No.________________________________&emsp;&emsp; &emsp;CIC No.___________________________________<br>
                                Date Issued: __________________________&emsp;&emsp; Date Issued: ____________________________________<br>
                                Crop: &emsp; ( )RICE &emsp; ( ) CORN &emsp; &emsp;  &emsp;&emsp;&emsp;Period Covered From: ____________________________<br>
                                Phase: &emsp; &emsp; &emsp; &emsp;&emsp;&emsp;  &emsp; &emsp;&emsp; &emsp;&emsp; &emsp; 
                                &emsp;&emsp;&emsp;  &emsp;&emsp;&emsp;&emsp;  &emsp; To: _____________________________<br>
                                Rice: Wet ____________________________  &emsp;&emsp; O.R. No. _______________________________________ <br>
                                &emsp; &emsp; Dry ____________________________ &emsp;&emsp; O.R. Date _____________________________________<br>
                                Corn: A. _______________________________ &emsp; &emsp; Amount Paid _________________________________<br>
                                &emsp; &emsp; B. _______________________________
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div style="display:  flex; flex-direction: column; margin-top: -230px; align-items: center; text-align: center;">
                    <p style="font-size: 13px; display:  flex; font-family: 'figtree', sans-serif;">
                        PHILIPPINES CROP INSURANCE CORPORATION<br>Region V
                    </p>
                    <h3 style="font-size: 13px; display:  flex; font-family: 'figtree', sans-serif;">APPLICATION FOR CROP INSURANCE<br>(Group Application)</h3>
                </div>
                </p>
                <div style="display:  flex; flex-direction: column; align-items: left; text-align: left;">
                    <p style="font-size: 13px; ">
                        *Name of FO/FA/COOP/IA/Barangay:______________________________________________________ Mailing Address:_________________________ <input type="checkbox">IP Tribe:______________<br><br>
                        Underwriter ? Solicitor: __________________________________________________________________ &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;_________________________________________________<br><br>
                        Program:&emsp; &emsp;  ( ) Regular  &emsp; ( ) SikatSake &emsp;
                        ( ) RSBSA &emsp;  ( ) APCP-CAP-PBD  &emsp; ( ) PUNLA &emsp;
                        ( ) Cooperate Rice Farming &emsp; ( ) Others:_______________________<br><br>
                        We, bonafide members/resident of the FO/FA/Cooperative/LA/Barangay, whose names and signature appear herein and on
                        page 2, hereby apply for crop insurance and certify to the coorrectness of the information shown here below and on page 2;
                    </p>
                </div>
               
            </body>
            </html>
`;
        content += `<table border="1" style="margin-top:-5px;">
        <thead>
        <tr><th rowspan="3">NO.</th></tr>
        <tr><th colspan="4">Name of Farmers</th><th rowspan="2" style="padding:0 0;">Gender<br>(F/M)</th><th rowspan="2" style="white-space: nowrap;">Civil<br>Status<br>(S/M/W)</th><th rowspan="2" style="white-space: nowrap;">Address (Sitio & Barangay)</th><th rowspan="2" style="white-space: nowrap;">Date of Birth</th><th rowspan="2">Cellphone No.</th><th rowspan="2">Spouse</th><th rowspan="2">Beneficiary</th><th rowspan="2" style="white-space: nowrap;">Bank Name / <br>Bank Account No.</th><th rowspan="2">Amount of Cover</th><th colspan="3">Planting calendar</th><th rowspan="2">Variety</th></tr><tr><th>Last Name</th><th>First Name</th><th>Middle Name</th><th style="white-space: nowrap; font-size:10px; padding:0 0;">Suffix<br>(Sr, jr, etc)</th><th>Sowing/DS</th><th>TP/Planting</th><th>Harvest</th></tr></thead>`;

        checkedRows.forEach(function (row) {
            var tr = row.closest('tr');

            // Continue building the content for the new window (First Page)
            content += '<tr>';
            content += '<td style="text-align:center;">' + rowNumber + '</td>';
            rowNumber++;

            tr.childNodes.forEach(function (cell) {
                if (cell.tagName === 'TD' && !cell.classList.contains('print-only') && cell.classList.contains('print-details')) {
                    content += '<td>' + cell.innerText + '</td>';
                }
            });

            content += '</tr>';
        });

        // End the first page content
        content += '</tbody></table>';
 // Add an empty page
 content += `
<div style="display:  flex; flex-direction: column; margin-top:5px; align-items:left; text-align: left; margin-right:330px;">
                    <table >
                        <tr>
                            <td style="padding-right:-380px;">
                                <strong style="white-space: nowrap; display:flex; text-align: center; ">
                                    &emsp;&emsp;  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp; 
                                    TECHNOLOGIST CERTIFICATION<br><br>
                                </strong>
                                &emsp;&emsp;&emsp;&emsp; I hereby certify that the above farmer applicants follow POT/GAP, and that, for the crop already planted at<br>
                                the time of the application, no risk insured against has occured.<br><br>
                                _______________________________________________ &emsp; &emsp; ____________________________&emsp; &emsp;__________________<br>
                                <strong>&emsp; &emsp;&emsp;Signature Over Printed Name &emsp; &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;
                                Office &emsp; &emsp;&emsp; &emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;Date
                                </strong>
                            </td>
                            <td style="white-space: nowrap; font-size:10px; padding:0 0;">
                                <p style=" margin-right:7px;"> <strong style="margin-left:-120px;">
                                    &emsp;&emsp;  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp; 
                                    CERTIFICATION<br><br>
                                </strong>
                                I hereby certify that the above information is true and correct to the best of my knowledge<br><br><br><br>
                                &emsp; __________________________________________ &emsp; &emsp; ________________________&emsp; &emsp;______________<br>
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong style="margin-left:-65px;">Signature Over Printed Name &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                Office &emsp; &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;Date
                                </strong></p>
                            </td>
                        </tr>
                    </table>
                    <table style="margin-top:5px">
                        <tr>
                            <td>
                                <strong>LEGENDS</strong>
                            </td>
                            <td style=" padding-right:220px; text-align:left;">
                                <p  style="padding-left:-160px; text-align:left;">
                                    <strong>
                                    *Types of Group:<br>
                                    </strong>
                                    &emsp; &emsp;&emsp;
                                    FO - Farmers Organization
                                    &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;
                                    COOP-Cooperative<br>
                                    &emsp; &emsp;&emsp;
                                    FA - Farmers' Association 
                                    &emsp; &emsp;&emsp;&emsp; &emsp;&emsp;
                                    IA-Irrigators' Association
                                </p>
                            </td>
                            <td style="padding-left:-90px;">
                                <h3 style="margin-top:5px;">
                                    OR NO._____________ Amount:__________<br><br>
                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                    Date : __________
                                </h2>
                            </td>
                        </tr>
                    </table>
                </div>
                <div style="display:  flex;white-space: pre-wrap; 
                width:325px; margin-left:1195px; margin-top:-192px; height:192px;align-items:left; text-align: left;">
                <table>
                        <tr>
                            <td>
                            <strong style="font-size:12px;">
                                    PREMIUM COMPUTATION (FOR PCIC ONLY):<br>
                                    </strong> 
                                    <strong>
                                   Premium Rate:</strong> ___________________________________<br>
                                    
                                    <p style="margin-left:30px;  line-height: 0.5;">Farmer's Share(FS)____________________________</p>
                                    <p style="margin-left:30px;  line-height: 0.5;">Lending Institution Share(LI)_____________________</p>
                                    <p style="margin-left:30px;  line-height: 0.5;">Gov't Premium Subsidy(GPS)____________________</p>
                                    <p style="margin-left:30px;  line-height: 0.5;">Gross Premium ________________________________</p>
                                    <p style="margin-left:80px;  line-height: 0.5;">Less: Underwriter's/Solictor's</p>
                                    <p style="margin-left:100px;  line-height: 0.5;">Incentive(less wothholding</p>
                                    <p style="margin-left:80px;  line-height: 0.5;">tax)_________________________________</p>
                                   <strong> <p style="margin-left:30px;  line-height: 0.5;">Net Premium due to PCIC</strong>______________________</p>
                    
                                   </td>
                            <br><br><br>
                         
                        </tr>
                    </table>
                    </div>
`;
        // Add the content of the hidden details to the second page
        content += '<div class="new-page">';
        content += '<h4 style="text-align:center;">APPLICATION FOR CROP INSURANCE</h3>';
        content += '<table border="1">';
        content += `<tr>
        <th rowspan="2"> NO.</th>
        <td rowspan="2"> <strong>Name of Farmers</strong>(follow the order on page 1)<br>Format: FirstName / Initials, Middle<br>Initial, full Surname and Suffix</td>
        <th rowspan="2"> Farm Location </th>
        <th rowspan="2">Area<br>(ha) </th>
        <th rowspan="2"> *Land<br>Category<br>Soil Type</th>
        <th rowspan="2">**Tenurial<br>Status </th>
        <th colspan="4"> Adjacent Lot Owners</th>
        <th rowspan="2"> Signature</th>
        </tr>
        <tr>
        <th  > North</th>
        <th  > South</th>
        <th > East</th>
        <th > West </th>
       
        </tr>
        `;
        checkedRows.forEach(function (row) {
            var tr = row.closest('tr');

            content += '<tr>';
            content += '<td style="text-align:center;">' + rowNumber1 + '</td>';
            rowNumber1++;

            tr.childNodes.forEach(function (cell) {
                if (cell.tagName === 'TD' && !cell.classList.contains('print-only') && cell.classList.contains('print-details2')) {
                    content += '<td>' + cell.innerText + '</td>';
                }
            });

            // Add an empty cell to match the structure
            content += '<td class="print-details2" style="display:none; "></td>';

            content += '</tr>';
        });
        content += '<tr ><th style="text-align:center;" colspan="11";>TOTAL</th></tr>';
        content += '</table>';
        content += '</div>';

        // End building the content for the new window
        content += '</body></html>';
        content +=`<table style="margin-top:5px;"><tr>
        <th style="text-align:left; width:50px; ">LEGENDS</th>
        <td style="text-align:left; width:900px; margin-left:5px;"><strong>LAND CATEGORY / SOIL TYPE:<br> For Rice Crop (Land Category):
        &emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp; &emsp;&emsp;
         For Corn Crop(Soil Type/Topography):</strong>
        <p style="line-height: 0.5;margin-left:60px;">(1) Irrigated - NIA/CIA&emsp; &emsp;&emsp;&emsp; &emsp;&emsp;
        &emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp; &emsp;&emsp;
        (A) Broad Plain - Clay Loam</p>
        <p style="line-height: 0.5; margin-left:60px;">(2) Irrigated - Deep Well Pump / Shallowtube Well(STW)
        &emsp; &emsp;&emsp;&emsp; &emsp;&emsp;(B) Broad Plain - Silty clay Loam </p>
        <p style="line-height: 0.5; margin-left:60px;">(3) Irrigated - Open Source (SWIP, Creek, River)
        &emsp; &emsp;&emsp;&emsp; &emsp;&emsp;&emsp; &emsp;&emsp;(C) Broad Plain - Silty loam</p>
        <p style="line-height: 0.5; margin-left:60px;">(4) Rainfed(D) Broad Plain - Sandy Loam</p>
        <p style="line-height: 0.5; margin-left:70px;">(E) Rolling/Upland</p>
        
        </td>
        <td style="text-align:left; white-space: nowrap;"><strong style="padding-top:110px; white-space: nowrap;">**TEMURIAL STATUS:</strong>
        <br> <p>(1) Landowner &emsp;&emsp;(2) Lessee &emsp;&emsp;(3) others(please specify)</p><br><br><br><br><br>
        </td>
        </tr></div>`;
        // Write the content to the new window, print, and close
        printWindow.document.open();
        printWindow.document.write(content);
        printWindow.document.close();
        printWindow.print();
        printWindow.close();
    }
});

</script>
<script>
  $(document).ready(function() {
    // Function to update the counter
    function updateCheckboxCounter() {
      var checkedCount = $('input.print-checkbox:checked').length;
      $('#checkboxCounter').text(checkedCount);

      // Disable unchecked checkboxes when the limit is reached
      $('input.print-checkbox:not(:checked)').prop('disabled', checkedCount >= 15);

      // Change color to red if more than 15 checkboxes are checked
      if (checkedCount > 15) {
        $('#checkboxCounter').css('color', 'red');
        alert('You can only check up to 15 checkboxes.');
      } else {
        $('#checkboxCounter').css('color', ''); // Reset color to default
      }
    }

    // Call the function on page load
    updateCheckboxCounter();

    // Attach click event to checkboxes
    $('input.print-checkbox').on('change', function() {
      updateCheckboxCounter();
    });
  });
</script>

</body>



</html>

function printRowDetails(button) {
    // Find the closest <tr> element from the clicked button
    var tr = button.closest('tr');

    // Extract the data from the <td> elements in the row
    var name = tr.querySelector('td:nth-child(2)').textContent;
    var address = tr.querySelector('td:nth-child(3)').textContent;
    var cropType = tr.querySelector('td:nth-child(4)').textContent;
    var landArea = tr.getAttribute('data-land-area'); // Replace with actual latitude
    var farmtype = tr.getAttribute('data-farm-type');
    var north = tr.getAttribute('data-north');
    var name = tr.getAttribute('data-name');
    var middle = tr.getAttribute('data-middle');
    var last = tr.getAttribute('data-last');
    var south = tr.getAttribute('data-south');
    var east = tr.getAttribute('data-east');
    var west = tr.getAttribute('data-west');
    var tenurial = tr.getAttribute('data-tenurial');
    // Create a new window for printing
    var printWindow = window.open('', '_blank');

    // Define the content to be printed
    var content = `
        <style>
        body{
    
            font-family: 'figtree', sans-serif;
        }
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
                font-size:12px;
            }
            th {
                background-color: #f2f2f2;
            }
            h2{
                text-align:center;
            }
        </style>
        <h2 >Farmer Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Attribute</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="background-color:black"><strong>First Name, Middle Name, Surname</strong></td>
                    <td>${name} ${middle} ${last}</td>
                </tr>
                <tr>
                    <td><strong>Farm Located</strong></td>
                    <td>${address}</td>
                </tr>
                <tr>
                    <td><strong>Crop Type</strong></td>
                    <td>${cropType}</td>
                </tr>
                <tr>
                    <td><strong>Land Area</strong></td>
                    <td>${landArea} Ha</td>
                </tr>
                <tr>
                <td><strong>Farm Type</strong></td>
                <td>${farmtype} </td>
            </tr>
            <tr>
            <td><strong>Tenurial Status</strong></td>
            <td>${tenurial} </td>
        </tr>
        <tr>
            <th style="text-align:center;" colspan="2">Adjacent Lot Owner</th>
        </tr>
        <td><strong>North</strong></td>
                <td>${north} </td>
            </tr>
            <td><strong>South</strong></td>
                <td>${south} </td>
            </tr>
            <td><strong>East</strong></td>
                <td>${east} </td>
            </tr>
            <td><strong>West</strong></td>
                <td>${west} </td>
            </tr>
            </tbody>
        </table>
    `;

    // Set the content of the new window and trigger printing
    printWindow.document.open();
    printWindow.document.write(content);
    printWindow.document.close();
    printWindow.print();
    printWindow.close();
}


function printTable() {
    // Create a new window for printing
    var printWindow = window.open('', '_blank');

    // Define the content to be printed, including CSS styles
    var content = `
        <style>
        body{
    
            font-family: 'figtree', sans-serif;
        }
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
        <h2>List of Farmers</h2>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Farm Located</th>
                    <th>Crop Type</th>
                    <th>Land Area</th>
                </tr>
            </thead>
            <tbody>
    `;

    // Iterate through the table rows and extract data
    var table = document.getElementById('myfrm');
    for (var i = 1; i < table.rows.length; i++) {
        var row = table.rows[i];
        var name = row.cells[1].textContent;
        var address = row.cells[2].textContent;
        var cropType = row.cells[3].textContent;
        var landArea = row.getAttribute('data-land-area');  // Use row to get the data-land-area attribute

        // Add the row to the content
        content += `
            <tr>
                <td>${i}</td>
                <td style="background-color:white;">${name}</td>
                <td>${address}</td>
                <td>${cropType}</td>
                <td>${landArea} Ha</td>
            </tr>
        `;
    }

    // Complete the content and set it in the print window
    content += `
            </tbody>
        </table>
    `;
    printWindow.document.open();
    printWindow.document.write(content);
    printWindow.document.close();

    // Trigger the printing and close the window
    printWindow.print();
    printWindow.close();
}

const buttons = document.querySelectorAll('.ripple')

buttons.forEach(button => {
    button.addEventListener('click', function(e)  {
        const x = e.clientX
        const y = e.clientY

        const buttonTop = e.target.offsetTop
        const buttonLeft = e.target.offsetLeft 

        const xInside = x - buttonLeft
        const yInside = y - buttonTop

        const circle = document.createElement('span')
        circle.classList.add('circle')
        circle.style.top = yInside + 'px'
        circle.style.left = xInside + 'px'

        this.appendChild(circle)

        setTimeout(() => circle.remove(), 500)

    })
})

function printRice() {
    var printWindow = window.open('', '_blank');

    var content = `
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <style>
                
             
                body{
    
    font-family: 'figtree', sans-serif;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

/* Style alternating rows with different background colors */
tr:nth-child(even) {
    background-color: #f9f9f9; /* Light gray background for even rows */
}

tr:nth-child(odd) {
    background-color: #ffffff; /* White background for odd rows */
}
                /* Add any other styles you need */
            </style>
        </head>
        <body>
        <img src="{{ asset('images/bato.png') }}" alt="Logo"> 
        <h1 style="text-align:center; font-size:20px;">List of Rice Farmers</h1>
            <table>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Farm Located</th>
                    <th>Land Area</th>
                </tr>
                `;
                var rowNumber = 1;
    // Use JavaScript to iterate over the data
    for (var a = 0; a < accountsData.length; a++) {
        var account = accountsData[a];
        if (account.crop_type === 'rice') {
            content += `
                <tr>
            
                    <td>${rowNumber++}</td>
                    <td>${account.surname} ${account.first_name}</td>
                    <td>${account.address}</td>
                    <td>${account.land_area}</td>
                </tr>
            `;
        }
    }

    content += `
            </table>
        </body>
        </html>
    `;

    printWindow.document.open();
    printWindow.document.write(content);
    printWindow.document.close();
    printWindow.print();
    printWindow.close();
}


function printCorn() {
    var printWindow = window.open('', '_blank');

    var content = `
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <style>
                
             
                body{
    
    font-family: 'figtree', sans-serif;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

/* Style alternating rows with different background colors */
tr:nth-child(even) {
    background-color: #f9f9f9; /* Light gray background for even rows */
}

tr:nth-child(odd) {
    background-color: #ffffff; /* White background for odd rows */
}
                /* Add any other styles you need */
            </style>
        </head>
        <body>
        <img src="{{ asset('images/bato.png') }}" alt="Logo"> 
        <h1 style="text-align:center; font-size:20px;">List of Corn Farmers</h1>
            <table>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Farm Located</th>
                    <th>Land Area</th>
                </tr>
                `;
                var rowNumber = 1;
    // Use JavaScript to iterate over the data
    for (var i = 0; i < accountsData.length; i++) {
        var account = accountsData[i];
        if (account.crop_type === 'corn') {
            content += `
                <tr>
                
                <td>${rowNumber++}</td>
                    <td>${account.surname} ${account.first_name}</td>
                    <td>${account.address}</td>
                    <td>${account.land_area}</td>
                </tr>
            `;
        }
    }

    content += `
            </table>
        </body>
        </html>
    `;

    printWindow.document.open();
    printWindow.document.write(content);
    printWindow.document.close();
    printWindow.print();
    printWindow.close();
}


function printCoconut() {
    var printWindow = window.open('', '_blank');

    var content = `
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <style>
                
             
                body{
    
    font-family: 'figtree', sans-serif;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

/* Style alternating rows with different background colors */
tr:nth-child(even) {
    background-color: #f9f9f9; /* Light gray background for even rows */
}

tr:nth-child(odd) {
    background-color: #ffffff; /* White background for odd rows */
}
                /* Add any other styles you need */
            </style>
        </head>
        <body>
        <img src="{{ asset('images/bato.png') }}" alt="Logo"> 
        <h1 style="text-align:center; font-size:20px;">List of Coconut Farmers</h1>
            <table>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Farm Located</th>
                    <th>Land Area</th>
                </tr>
                `;
                var rowNumber = 1;
    // Use JavaScript to iterate over the data
    for (var a = 0; a < accountsData.length; a++) {
        var account = accountsData[a];
        if (account.crop_type === 'coconut') {
            content += `
                <tr>
               
               
                <td>${rowNumber++}</td>
                    <td>${account.surname} ff${account.first_name}</td>
                    <td>${account.address}</td>
                    <td>${account.land_area}</td>
                </tr>
            `;
        }
    }

    content += `
            </table>
        </body>
        </html>
    `;

    printWindow.document.open();
    printWindow.document.write(content);
    printWindow.document.close();
    printWindow.print();
    printWindow.close();
}


function printVegetable() {
    var printWindow = window.open('', '_blank');

    var content = `
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <style>
                
             
                body{
    
    font-family: 'figtree', sans-serif;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

/* Style alternating rows with different background colors */
tr:nth-child(even) {
    background-color: #f9f9f9; /* Light gray background for even rows */
}

tr:nth-child(odd) {
    background-color: #ffffff; /* White background for odd rows */
}
                /* Add any other styles you need */
            </style>
        </head>
        <body>
        <img src="{{ asset('images/bato.png') }}" alt="Logo"> 
        <h1 style="text-align:center; font-size:20px;">List of Vegetable Farmers</h1>
            <table>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Farm Located</th>
                    <th>Land Area</th>
                </tr>
                `;
                var rowNumber = 1;
    // Use JavaScript to iterate over the data
    for (var i = 0; i < accountsData.length; i++) {
        var account = accountsData[i];
        if (account.crop_type === 'vegetable') {
            content += `
                <tr>
                
                <td>${rowNumber++}</td>
                    <td>${account.surname} ${account.first_name}</td>
                    <td>${account.address}</td>
                    <td>${account.land_area}</td>
                </tr>
            `;
        }
    }

    content += `
            </table>
        </body>
        </html>
    `;

    printWindow.document.open();
    printWindow.document.write(content);
    printWindow.document.close();
    printWindow.print();
    printWindow.close();
}


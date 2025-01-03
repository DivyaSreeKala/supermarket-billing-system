<html>
<head>


<style>

#table-container {
max-width: 400px;
padding: 5px;
margin: 0 auto;
}
#main-table {
width: 100%;
color: white;
}
#main-table th {
background: #27afd8;
padding: 7px;
}
#main-table td {
background: #4a9eb8;
text-align: center;
padding: 7px;
}

#table-container button {
float: right;
border: none;
padding: 5px 12px;
margin: 10px 0;
background: #27afd8;
color: white;
cursor: pointer;
}


</style>

<script>
let x = 2;
function clicked(){
//initializing the row counter


//creates a new row element
let row = document.createElement("tr");

//creates a new column element
let column1 = document.createElement("td");

//create text for the column element
const column1text = document.createTextNode(`Row ${x} Column 1`);

//appends the text to the column element
column1.appendChild(column1text);
let column2 = document.createElement("td");
const column2text = document.createTextNode(`Row ${x} Column 2`);
column2.appendChild(column2text);

//appends the first column to the new row
row.appendChild(column1);

//appends the second column to the new row
row.appendChild(column2);

//appends the row to the table
document.querySelector("#main-table").appendChild(row);
x++;
};


</script>

</head>

<body>
<div id="table-container">
    <table id="main-table" cellspacing="0">
    <th colspan="2">Dynamic Table</th>
    <tr>
        <td>Row 1 Column 1</td>
        <td>Row 1 Column 2</td>
    </tr>
    </table>
    <button id="add-row" onclick="return clicked();">Add Row</button>
</div>


</body>

</html>

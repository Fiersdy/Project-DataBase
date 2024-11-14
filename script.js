function fetchTableData() {
    var selectedTable = document.getElementById('table').value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById('table-data').innerHTML = xhr.responseText;
                document.getElementById('table-data').style.display = 'block';
            } else {
                console.error('Error fetching table data.');
            }
        }
    };
    xhr.open('GET', 'fetch_table.php?table=' + selectedTable, true);
    xhr.send();
}

function showExtraInputs() {
    var action = document.getElementById('action').value;
    var extraInputs = document.getElementById('extra-inputs');
    var newDataInput = document.getElementById('new-data-input');

    if (action === 'insert') {
        extraInputs.style.display = 'block';
        newDataInput.style.display = 'inline-block';
    } else if (action === 'delete' || action === 'update' || action === 'select') {
        extraInputs.style.display = 'block';
        newDataInput.style.display = 'none';
    } else {
        extraInputs.style.display = 'none';
    }
}

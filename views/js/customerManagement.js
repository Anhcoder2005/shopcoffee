let isEditing = false;

document.addEventListener('DOMContentLoaded', function() {
    loadCustomerData();
});

function loadCustomerData() {
    // Simulate loading customer data from server
    var customers = [
        { order: 1, name: 'John Doe', dob: '1990-01-01', phone: '123456789', email: 'john@example.com' },
        { order: 2, name: 'Jane Doe', dob: '1985-05-15', phone: '987654321', email: 'jane@example.com' }
    ];

    // Populate table with customer data
    var tableBody = document.querySelector('#customerTable tbody');
    tableBody.innerHTML = '';

    customers.forEach(function(customer) {
        var row = '<tr>';
        row += '<td>' + customer.order + '</td>';
        row += '<td contenteditable="' + isEditing + '" onBlur="updateData(this, ' + customer.order + ', \'name\')">' + customer.name + '</td>';
        row += '<td contenteditable="' + isEditing + '" onBlur="updateData(this, ' + customer.order + ', \'dob\')">' + customer.dob + '</td>';
        row += '<td contenteditable="' + isEditing + '" onBlur="updateData(this, ' + customer.order + ', \'phone\')">' + customer.phone + '</td>';
        row += '<td contenteditable="' + isEditing + '" onBlur="updateData(this, ' + customer.order + ', \'email\')">' + customer.email + '</td>';
        row += '<td>';
        if (!isEditing) {
            row += '<button onclick="editRecord(' + customer.order + ')">Sửa</button>';
            row += '<button onclick="deleteRecord(' + customer.order + ')">Xóa</button>';
        }
        row += '</td>';
        row += '</tr>';
        tableBody.innerHTML += row;
    });
}

function updateData(element, order, field) {
    // Update data on server (simulated)
    console.log('Update data:', order, field, element.innerText);
}

function deleteRecord(order) {
    // Delete record on server (simulated)
    console.log('Delete record:', order);
    // Reload data after deleting record
    loadCustomerData();
    // Disable editing after deleting
    isEditing = false;
}

function editRecord(order) {
    // Enable editing
    isEditing = true;
    // Reload data with editing enabled
    loadCustomerData();
}

function addRecord() {
    var name = document.getElementById('name').value;
    var dob = document.getElementById('dob').value;
    var phone = document.getElementById('phone').value;
    var email = document.getElementById('email').value;

    // Add record on server (simulated)
    console.log('Add record:', name, dob, phone, email);

    // Add the new record to the table
    var tableBody = document.querySelector('#customerTable tbody');
    var newRow = '<tr>';
    newRow += '<td>' + (tableBody.rows.length + 1) + '</td>';
    newRow += '<td contenteditable="true" onBlur="updateData(this, ' + (tableBody.rows.length + 1) + ', \'name\')">' + name + '</td>';
    newRow += '<td contenteditable="true" onBlur="updateData(this, ' + (tableBody.rows.length + 1) + ', \'dob\')">' + dob + '</td>';
    newRow += '<td contenteditable="true" onBlur="updateData(this, ' + (tableBody.rows.length + 1) + ', \'phone\')">' + phone + '</td>';
    newRow += '<td contenteditable="true" onBlur="updateData(this, ' + (tableBody.rows.length + 1) + ', \'email\')">' + email + '</td>';
    newRow += '<td><button onclick="deleteRecord(' + (tableBody.rows.length + 1) + ')">Xóa</button></td>';
    newRow += '</tr>';
    tableBody.innerHTML += newRow;

    // Clear input fields
    document.getElementById('name').value = '';
    document.getElementById('dob').value = '';
    document.getElementById('phone').value = '';
    document.getElementById('email').value = '';

     // Disable editing after adding record
     isEditing = false;
}

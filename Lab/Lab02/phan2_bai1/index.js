function createTable() {
    var table = `
        <div id="table" class="container" style="min-height: auto;">
            <div class="row">
                <div class="col-10 add-col-button-container">
                    <button id="delete-table" class="btn btn-danger">
                        Xóa Bảng
                    </button>

                    <button id="add-col-button" class="btn btn-success">
                        Add Column
                    </button>
                </div>
                <div class="col-2"></div>
            </div>
    
            <div class="row">
                <div class="col-10">
                    <table class="table table-primary table-bordered border-primary" style="margin: 0;">
                        <tr>
                            <td>(1, 1)</td>
                            <td>(1, 2)</td>
                        </tr>
            
                        <tr>
                            <td>(2, 1)</td>
                            <td>(2, 2)</td>
                        </tr>
                    </table>
                </div>
    
                <div class="col-2 add-row-button-container">
                    <button id="add-row-button" class="btn btn-success">
                        Add Row
                    </button>
                </div>
            </div>
    
            <div class="row" style="margin-top: 1rem;">
                <div class="col-12 input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Xóa hàng</span>
                    <input id="input-row" type="text" class="form-control" placeholder="Nhập vào chỉ số của hàng để xóa (chỉ số bắt đầu đếm từ 1)" aria-label="Username" aria-describedby="basic-addon1">
                    <button class="btn btn-danger" type="button" id="delete-row-button">Xóa</button>
                </div>
            </div>

            <div class="row">
                <div class="col-12 input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Xóa cột</span>
                    <input id="input-col" type="text" class="form-control" placeholder="Nhập vào chỉ số của cột để xóa (chỉ số bắt đầu đếm từ 1)" aria-label="Username" aria-describedby="basic-addon1">
                    <button class="btn btn-danger" type="button" id="delete-button">Xóa</button>
                </div>
            </div>
        </div>
    `;
    
    $('#body-container').append(table.toString());
}

function addRow() {

}

$(document).ready(function() {
    $("#create-table").click(createTable);

    $("#body-container").on('click', '#add-row-button', function() {
        const tableContainer = $(this).closest('.container');
        const tableId = tableContainer.attr('id');
        const table = tableContainer.find('table');
        var lastRow = tableContainer.find('table tr:last-child');
        if(table.find('tr').first().find('td').length == 0) {
            lastRow = `<tr>
                            <td>(1, 1)</td>
                            <td>(1, 2)</td>
                        </tr>`;
        }   
        table.append(lastRow.clone());
        lastRow = tableContainer.find('table tr:last-child');
        const firstTdText = lastRow.find('td:first-child').text();
        const firstNumber = parseInt(firstTdText.match(/\d+/)[0]);
        lastRow.find("td").each(function(index, tdElement) {
            const $td = $(tdElement);            
            $td.text(`(${firstNumber + 1}, ${index + 1})`);
        });
    });

    $("#body-container").on('click', '#add-col-button', function() {
        const tableContainer = $(this).closest('.container');
        const table = tableContainer.find('table');
        const columnCount = table.find('tr:first-child td').length;
        table.find('tr').each(function() {
            const newColumnNumber = columnCount + 1;
            $(this).append(`<td>(${$(this).index() + 1}, ${newColumnNumber})</td>`);
        });
    });

    $("#body-container").on('click', '#delete-row-button', function() {
        const inputGroup = $(this).closest('.input-group');
        const input = inputGroup.find('#input-row');
        const value = input.val().trim();
        
        if (!value) {
            if(inputGroup.find('div.valid-feedback').length > 0) {
                inputGroup.find('.valid-feedback').remove();
                input.removeClass('is-valid');
                input.addClass('is-invalid');
            } else if(inputGroup.find('div.invalid-feedback').length > 0) {
                inputGroup.find('.invalid-feedback').remove();
            } else {
                input.addClass('is-invalid');
            }

            inputGroup.append(
                `<div class="invalid-feedback">
                    Bạn Chưa Nhập Input Vào
                </div>`
            );
            return;
        }

        const tableContainer = $(this).closest('.container');
        var lastRow = tableContainer.find('table tr:last-child');
        const firstTdText = lastRow.find('td:first-child').text();
        const firstNumber = parseInt(firstTdText.match(/\d+/)[0]);
        const number = parseInt(value);        
        if (isNaN(number) || number < 1 || number > firstNumber) {
            if(inputGroup.find('div.valid-feedback').length > 0) {
                inputGroup.find('.valid-feedback').remove();
                input.removeClass('is-valid');
                input.addClass('is-invalid');
            } else if(inputGroup.find('div.invalid-feedback').length > 0) {
                inputGroup.find('.invalid-feedback').remove();
            } else {
                input.addClass('is-invalid');
            }
            
            inputGroup.append(
                `<div class="invalid-feedback">
                    Giá trị nhập vào không hợp lệ
                </div>`
            );
            return;
        }

        const hasInvalidFeedback = inputGroup.find('div.invalid-feedback').length > 0;
        if(hasInvalidFeedback) {
            inputGroup.find('.invalid-feedback').remove();
            input.removeClass('is-invalid');
        }
        
        const hasValidFeedback = inputGroup.find('div.valid-feedback').length > 0;
        if(hasValidFeedback) {
            return;
        }

        input.addClass('is-valid');
        inputGroup.append(
            `<div class="valid-feedback">
                Số Nhập Vào Hợp Lệ
            </div>`
        );
    });

    $("#body-container").on('click', '#delete-col-button', function() {
        const inputGroup = $(this).closest('.input-group');
        const input = inputGroup.find('#input-col');
        const value = input.val().trim();
        
        if (!value) {
            if(inputGroup.find('div.valid-feedback').length > 0) {
                inputGroup.find('.valid-feedback').remove();
                input.removeClass('is-valid');
                input.addClass('is-invalid');
            } else if(inputGroup.find('div.invalid-feedback').length > 0) {
                inputGroup.find('.invalid-feedback').remove();
            } else {
                input.addClass('is-invalid');
            }

            inputGroup.append(
                `<div class="invalid-feedback">
                    Bạn Chưa Nhập Input Vào
                </div>`
            );
            return;
        }

        const tableContainer = $(this).closest('.container');
        const table = tableContainer.find('table');
        var firstCol = table.find('tr:first-child td').length;
        const number = parseInt(value);        
        if (isNaN(number) || number < 1 || number > firstCol) {
            if(inputGroup.find('div.valid-feedback').length > 0) {
                inputGroup.find('.valid-feedback').remove();
                input.removeClass('is-valid');
                input.addClass('is-invalid');
            } else if(inputGroup.find('div.invalid-feedback').length > 0) {
                inputGroup.find('.invalid-feedback').remove();
            } else {
                input.addClass('is-invalid');
            }
            
            inputGroup.append(
                `<div class="invalid-feedback">
                    Giá trị nhập vào không hợp lệ
                </div>`
            );
            return;
        }

        const hasInvalidFeedback = inputGroup.find('div.invalid-feedback').length > 0;
        if(hasInvalidFeedback) {
            inputGroup.find('.invalid-feedback').remove();
            input.removeClass('is-invalid');
        }
                
        const hasValidFeedback = inputGroup.find('div.valid-feedback').length > 0;
        if(hasValidFeedback) {
            table.find('tr').each(function() {
                $(this).find('td:eq(' + (number - 1) + ')').remove();
            });
            return;
        }
        
        input.addClass('is-valid');
        inputGroup.append(
            `<div class="valid-feedback">
                Số Nhập Vào Hợp Lệ
            </div>`
        );
        
        table.find('tr').each(function() {
            $(this).find('td:eq(' + (number - 1) + ')').remove();
        });
    });
});
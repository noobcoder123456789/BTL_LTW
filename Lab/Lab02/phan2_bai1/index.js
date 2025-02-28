function createTable() {
    var table = `
        <div id="table" class="container" style="min-height: auto;">
            <div class="row">
                <div class="col-10 add-col-button-container">
                    <button id="delete-table" class="btn btn-danger">
                        Xóa Bảng
                    </button>

                    <button class="btn btn-success" style="margin-bottom: 16px;">
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
                    <button class="btn btn-success">
                        Add Row
                    </button>
                </div>
            </div>
    
            <div class="row" style="margin-top: 1rem;">
                <div class="col-12 input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Xóa hàng / cột</span>                    
                    <input type="text" class="form-control" placeholder="Nhập vào chỉ số của hàng hoặc cột để xóa (chỉ số bắt đầu đếm từ 1)" aria-label="Username" aria-describedby="basic-addon1">                    
                    <button class="btn btn-danger" type="button" id="delete-button-1">Xóa</button>
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
        var lastRow = tableContainer.find('table tr:last-child');
        $(`#${tableId} table`).append(lastRow.clone());
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
});
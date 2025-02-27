function createTable() {
    var table = `
        <table class="table table-primary table-bordered border-primary">
            <tr>
                <td>(1, 1)</td>
                <td>(1, 2)</td>
            </tr>

            <tr>
                <td>(2, 1)</td>
                <td>(2, 2)</td>
            </tr>
        </table>
    `;
    
    $('.container').append(table.toString());
    console.log(document.querySelector(""));
}

$(document).ready(function() {
    $("#create-table").click(createTable);
});
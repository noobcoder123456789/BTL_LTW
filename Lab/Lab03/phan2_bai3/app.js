const { createRoot } = ReactDOM;

const container = document.getElementById('app');
const root = createRoot(container);
const baseURL = window.location.origin + window.location.pathname.replace(/\/[^/]*$/, '/');
const apiURL = baseURL + 'server.php';

var productsData = (() => {
    const request = new XMLHttpRequest();
    request.open('GET', apiURL, false);
    request.send();
    return request.status === 200 ? JSON.parse(request.responseText) : [];
})();

var title = (
    <h1>
        Read Products
    </h1>
);

var createNewProductButton = (
    <a className="btn btn-primary" href='./b.php'>
        Create New Product
    </a>
);

var tableContainer = (
    <table className="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        
        <tbody>
            {
                productsData.slice().reverse().map((product) => {
                    return (
                        <tr>
                            <th scope="row">{product.id}</th>
                            <td style={{width: "10rem"}}>{product.name}</td>
                            <td style={{width: "40rem"}}>{product.description}</td>
                            <td>{product.price.toLocaleString('vi-VN') + 'đ'}</td>
                            <td>
                                <a className="btn btn-info">Read</a>
                                <a className="btn btn-primary">Edit</a>
                                <a className="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    );
                })
            }
        </tbody>
    </table>
);

var divMain = (
    <div className="container" style={{
        marginTop: "2rem"
    }}>
        {title}
        <hr/>
        {createNewProductButton}
        {tableContainer} 
    </div>
);

root.render(divMain);
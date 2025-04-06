const { createRoot } = ReactDOM;

const container = document.getElementById('app');
const root = createRoot(container);
const baseURL = window.location.origin + window.location.pathname.replace(/\/[^/]*$/, '/');
const apiURL = baseURL + 'server.php';

function handleSubmit(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const price = document.getElementById('price').value;
    const description = document.getElementById('description').value;
    const image = document.getElementById('image').value;

    if (!/^\d+(\.\d+)?$/.test(price)) {
        alert("Giá phải là số (ví dụ: 100000 hoặc 123.45)");
        return;
    }

    const data = {
        name: name,
        description: description,
        price: price,
        image: image
    };

    fetch(apiURL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(data => {
        alert(data.message || 'Thêm sản phẩm thành công!');
        window.location.href = baseURL + 'a.php';
    }).catch(error => {
        alert(error.message || 'Có lỗi xảy ra khi thêm sản phẩm!');
    });
}

var mainContent = (
    <form onSubmit={handleSubmit}>
        <div className="container" style={{marginTop: "2rem"}}>
            <h1 style={{textAlign: "center", marginBottom: "2rem"}}>Add Product</h1>

            <div className="row">
                <div className="col-3"></div>
                <div className="col-6">
                    <div className="form-floating mb-3">
                        <input type="text" className="form-control" id="name" placeholder="Name" required/>
                        <label htmlFor="name">Product Name</label>
                    </div>

                    <div className="form-floating mb-3">
                        <input type="text" className="form-control" id="price" placeholder="price" />
                        <label htmlFor="price">Product Price (Ex: 100000, 20000)</label>
                    </div>

                    <div className="form-floating mb-3">
                        <input type="text" className="form-control" id="image" placeholder="image" />
                        <label htmlFor="price">Link Image</label>
                    </div>

                    <div className="form-floating mb-3">
                        <textarea className="form-control" id="description" placeholder="Description" style={{height: "10rem"}}></textarea>
                        <label htmlFor="price">Product Description</label>
                    </div>

                    <button type="submit" className="btn btn-primary">Submit</button>                
                </div>
                <div className="col-3"></div>
            </div>
        </div>
    </form>
);

root.render(mainContent);
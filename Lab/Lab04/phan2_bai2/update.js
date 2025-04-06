const { useState } = React;
const { createRoot } = ReactDOM;

const container = document.getElementById('app');
const root = createRoot(container);
const baseURL = window.location.origin + window.location.pathname.replace(/\/[^/]*$/, '/');
const id = new URLSearchParams(window.location.search).get('id');
const apiURL = baseURL + 'server.php?id=' + id;

var productsData = (() => {
    const request = new XMLHttpRequest();
    request.open('GET', apiURL, false);
    request.send();
    return request.status === 200 ? JSON.parse(request.responseText) : [];
})()[0];

function handleSubmit(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const price = document.getElementById('price').value;
    const description = document.getElementById('description').value;
    const image = document.getElementById('image').value;

    const data = {
        id: id,
        name: name,
        description: description,
        price: price,
        image: image
    };

    fetch(apiURL, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(data => {
        alert(data.message || 'Sửa thông tin sản phẩm thành công!');
        window.location.href = baseURL + 'a.php';
    }).catch(error => {
        alert(error.message || 'Có lỗi xảy ra khi sửa thông tin sản phẩm!');
    });
}

function MainContent() {
    const [name, setName] = useState(productsData.name);
    const [price, setPrice] = useState(productsData.price);
    const [description, setDescription] = useState(productsData.description);
    const [image, setImage] = useState(productsData.image);

    return (
        <form onSubmit={handleSubmit}>
            <div className="container" style={{marginTop: "2rem"}}>
                <h1 style={{textAlign: "center", marginBottom: "2rem"}}>Update Product Information</h1>

                <div className="row">
                    <div className="col-3"></div>
                    <div className="col-6">
                        <div className="form-floating mb-3">
                            <input type="text" className="form-control" id="name" placeholder="Name" value={name} onChange={(e) => setName(e.target.value)}/>
                            <label htmlFor="name">Product Name</label>
                        </div>

                        <div className="form-floating mb-3">
                            <input type="text" className="form-control" id="price" placeholder="price" value={price} onChange={(e) => setPrice(e.target.value)}/>
                            <label htmlFor="price">Product Price (Ex: 100000, 20000)</label>
                        </div>

                        <div className="form-floating mb-3">
                            <input type="text" className="form-control" id="image" placeholder="image" value={image} onChange={(e) => setImage(e.target.value)}/>
                            <label htmlFor="image">Product Image Link</label>
                        </div>

                        <div className="form-floating mb-3">
                            <textarea className="form-control" id="description" placeholder="Description" value={description} onChange={(e) => setDescription(e.target.value)} style={{height: "10rem"}}></textarea>
                            <label htmlFor="price">Product Description</label>
                        </div>

                        <button type="submit" className="btn btn-primary">Submit</button>                
                    </div>
                    <div className="col-3"></div>
                </div>
            </div>
        </form>
    );    
};

root.render(<MainContent/>);
const { createRoot } = ReactDOM;
const { useState } = React;

const container = document.getElementById('app');
const root = createRoot(container);
const baseURL = window.location.origin + window.location.pathname.replace(/\/[^/]*$/, '/');
const id = new URLSearchParams(window.location.search).get('id');
const apiURL = baseURL + 'server.php?id=' + id;

function submitHandle(event) {
    event.preventDefault();
    fetch(
        apiURL, {
            method: "DELETE",
            headers: {
                'Content-Type': 'application/json'
            }
        }
    ).then( response => {
        if (!response.ok) {
            throw new Error("HTTP error: " + response.status);
        }
        
        if (response.status === 204) {
            return; 
        }
        
        return response.json();
    }).then(() => {
        const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
        if(modal) modal.hide();
        alert('Xóa sản phẩm thành công!');
        window.location.href = baseURL + 'a.php';
    }).catch(error => {
        alert(error.message || 'Có lỗi xảy ra khi xóa sản phẩm!');
    });
}

function backHandle(event) {
    event.preventDefault();
    history.back();
}

function ModalContent() {
    return(
        <form onSubmit={submitHandle}>
            <div className="modal fade" id="deleteModal" tabIndex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                <div className="modal-dialog">
                    <div className="modal-content">
                        <div className="modal-header">
                            <h1 className="modal-title fs-5" id="deleteModal">Delete Confirmation</h1>
                            <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div className="modal-body">
                            This action cannot be undo.
                        </div>
                        
                        <div className="modal-footer">
                            <button type="button" className="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" className="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>        
    );
}

function MainContent() {
    return(
        <div className="container">
            <h1 style={{textAlign: "center", marginTop: "2rem"}}>Are you sure you want to delete this product?</h1>

            <div className="row">
                <div className="col-6">
                    <button className="btn btn-primary" onClick={backHandle}>
                        Back
                    </button>
                </div>

                <div className="col-6">
                    <button className="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    );
}

root.render(
    <div>
        <ModalContent/>
        <MainContent/>
    </div>
);
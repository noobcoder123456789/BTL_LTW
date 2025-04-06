<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET, POST, DELETE, PATCH");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    header("Access-Control-Max-Age: 3600");

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shop";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $sql = !isset($_GET['id'])? "SELECT * FROM products" : "SELECT * FROM products WHERE id = " . $_GET['id'];
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            http_response_code(200);
            echo json_encode($result);
        } elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            
            if(!isset($data->name) && !isset($data->price) && !isset($data->image) && !isset($data->description)) {
                http_response_code(400);
                echo json_encode(array("message" => "Dữ Liệu Phải Có Ít Nhất Một Trường."));
                exit;
            }

            $sql = "INSERT INTO products (name, description, price, image) VALUES ('$data->name', '$data->description', $data->price, '$data->image')";
            $stmt = $conn->prepare($sql);
            if($stmt->execute()) {
                http_response_code(201);
                echo json_encode(array(
                    "message" => "Thêm Sản Phẩm Thành Công.",
                    "product" => $data
                ));
            } else {
                http_response_code(500);
                echo json_encode(array("message" => "Thêm Sản Phẩm Thất Bại."));
            }
        } elseif($_SERVER['REQUEST_METHOD'] === "PATCH") {
            $data = json_decode(file_get_contents("php://input"));
            
            if(!isset($data->name) && !isset($data->price) && !isset($data->image) && !isset($data->description)) {
                http_response_code(400);
                echo json_encode(array("message" => "Dữ Liệu Phải Có Ít Nhất Một Trường."));
                exit;
            }

            $updates = array();
            if(isset($data->name)) $updates[] = "name = '$data->name'";
            if(isset($data->price)) $updates[] = "price = $data->price";
            if(isset($data->image)) $updates[] = "image = '$data->image'";
            if(isset($data->description)) $updates[] = "description = '$data->description'";

            if(empty($updates)) {
                http_response_code(400);
                echo json_encode(array("message" => "Dữ Liệu Phải Có Ít Nhất Một Trường."));
                exit;
            }

            $sql = "UPDATE products SET " . implode(", ", $updates) . " WHERE id = $data->id";

            $stmt = $conn->prepare($sql);
            if($stmt->execute()) {
                http_response_code(200);
                echo json_encode(array("message" => "Cập Nhật Sản Phẩm Thành Công."));
            } else {
                http_response_code(500);
                echo json_encode(array("message" => "Cập Nhật Sản Phẩm Thất Bại."));
            }
        } elseif($_SERVER['REQUEST_METHOD'] === "OPTIONS") {
            http_response_code(200);
        } elseif($_SERVER['REQUEST_METHOD'] === "DELETE") {            
            $id = $_GET['id'];
            $sql = "DELETE FROM products WHERE id = $id";
            $stmt = $conn->prepare($sql);
            if($stmt->execute()) {
                http_response_code(200);
                echo json_encode(array("message" => "Xóa Sản Phẩm Thành Công."));
            } else {
                http_response_code(500);
                echo json_encode(array("message" => "Xóa Sản Phẩm Thất Bại."));
            }
        } else {
            http_response_code(500);
            echo json_encode(array("message" => "Method Không Hợp Lệ."));
        }
    } catch(PDOException $e) {
        http_response_code(500);
        echo "<script>alert(\"Lỗi Kết Nối: " . $e->getMessage() . ")</script>";
    }
?>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

class ECOMM
{
    private $conn;

    function __construct($host, $uname, $passwd, $db)
    {
        $this->conn = new mysqli($host, $uname, $passwd, $db);
    }

    public function login($email, $passwd)
    {
        $query = "SELECT * FROM user WHERE email='$email';";
        $result = $this->conn->query($query);
        $numRows = $result->num_rows;

        if ($numRows == 1) {
            $user = $result->fetch_assoc();
            if ($passwd == $user['password']) {
                // session_start();
                $_SESSION["email"] = $user['email'];
                echo 200;
                return true;
            } else {
                echo 403;
                return false;
            }
        } else {
            echo 404;
            return false;
        }
    }

    public function register($name, $email, $contactNumber, $address, $passwd)
    {
        $query = "SELECT * FROM user WHERE email='$email';";
        $result = $this->conn->query($query);
        $numRows = $result->num_rows;

        if ($numRows == 1) {
            echo 303;
            return false;
        } else {

            $insert = "INSERT INTO `user`(`name`, `contactNumber`, `email`,`address`, `password`) VALUES ('$name','$contactNumber','$email', '$address','$passwd')";

            if ($this->conn->query($insert)) {
                echo 201;
                return true;
            } else {
                echo 400;
                return false;
            }
        }
    }

    public function checklogin()
    {
        if ($_SESSION["email"] == true) {
            return true;
        } else {
            // header('location: ./loggedIn.php');
            return false;
        }
    }

    public function logout()
    {
        $_SESSION["email"] = "";
        session_destroy();
        echo "Hello From Logout";
        // header('location: /index.php');
        // return true;
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function getUser()
    {
        $email = $_SESSION["email"];

        $query = "SELECT * FROM user WHERE email='$email';";
        $result = $this->conn->query($query);
        $numRows = $result->num_rows;

        if ($numRows == 1) {
            return $result->fetch_assoc();
        } else {
            echo 404;
            return false;
        }
    }

    public function getOrders()
    {
        $email = $_SESSION["email"];

        $query = "SELECT * FROM orders WHERE email='$email' ;";
        $result = $this->conn->query($query);
        $numRows = $result->num_rows;

        if ($numRows == 1) {
            return $result->fetch_assoc();
        } else {
            echo 404;
            return false;
        }
    }

    public function placeOrder($name, $contactNumber, $address, $paymentMethod, $total, $products)
    // public function placeOrder($name, $email, $contactNumber, $address, $paymentMethod, $total, $products)
    {
        $email = $_SESSION["email"];

        $query = "INSERT INTO `orders`(`name`, `email`, `contactNumber`, `address`, `paymentMethod`, `total`, `products`) VALUES ('
        $name','$email' , '$contactNumber', '$address', '$paymentMethod', '$total', '$products')";

        // $result = $this->conn->query($query);
        // $numRows = $result->num_rows;

        if ($this->conn->query($query)) {
            echo 201;
            return true;
        } else {
            echo 400;
            return false;
        }
    }

    public function pages($pn, $limit, $tbl)
    {
        $sql = "SELECT COUNT(*) FROM $tbl";
        $rs_result = $this->conn->query($sql);
        $row = $rs_result->fetch_row();
        $total_records = $row[0];

        $total_pages = ceil($total_records / $limit);
        $pagLink = "";
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $pn) {
                $pagLink .= "<li class='active'><a href='?dashboard&products&page=" . $i . "'>" . $i . "</a></li>";
            } else {
                $pagLink .= "<li><a href='?dashboard&products&page=" . $i . "'>" . $i . "</a></li>";
            }
        };
        return $pagLink;
    }

    public function pagination($pn, $limit, $tbl)
    {
        $start_from = ($pn - 1) * $limit;
        $sql = "SELECT * FROM $tbl LIMIT $start_from, $limit";

        return $this->conn->query($sql);
    }

    public function addCategory($name)
    {

        $query = "SELECT * FROM category WHERE name='$name';";
        $result = $this->conn->query($query);
        $numRows = $result->num_rows;

        if ($numRows == 1) {
            echo 303;
            return false;
        } else {
            $query = "INSERT INTO `category` (`name`) VALUES ('$name')";

            if ($this->conn->query($query)) {
                echo 201;
                return true;
            } else {
                echo 400;
                return false;
            }
        }
    }

    public function addProduct($name, $categoryId, $desc, $price)
    {
        $query = "INSERT INTO `product` (`name`,`categoryId`,`description`,`price`) VALUES ('$name','$categoryId','$desc','$price')";

        if ($this->conn->query($query)) {
            echo 201;
            return true;
        } else {
            echo 400;
            return false;
        }
    }

    public function getCategorys()
    {
        return $this->conn->query("SELECT * FROM category;");
    }

    public function getProductsPagination($pn, $limit)
    {
        $start_from = ($pn - 1) * $limit;
        $query = "SELECT p.id, p.name, c.name as cName, p.description, p.price FROM product as p JOIN category as c ON p.categoryId=c.id LIMIT $start_from, $limit;";

        return $this->conn->query($query);
    }

    public function userPagination($pn, $limit, $tbl)
    {
        $start_from = ($pn - 1) * $limit;
        $sql = "SELECT * FROM $tbl WHERE role='user' LIMIT $start_from, $limit";

        return $this->conn->query($sql);
    }

    public function deleteData($id, $tbl)
    {
        if ($this->conn->query("DELETE FROM `$tbl` WHERE id='$id'")) {
            echo "<script>alert('Data Deleted Sussfully');</script>";
        } else {
            // echo "<script>alert($this->conn->error);</script>";
            echo $this->conn->error;
        }
    }

    public function getProd($id)
    {
        return $this->conn->query("SELECT * FROM product WHERE id='$id';")->fetch_assoc();
    }

    // public function editProduct($id, $name, $categoryId, $img, $desc, $price)
    public function editProduct($id, $name, $categoryId, $img, $desc, $price)
    {
        // $query = "INSERT INTO `product` (`name`,`categoryId`,`description`,`price`) VALUES ('$name','$categoryId','$desc','$price')";
        // echo $img;


        // if ($tmp_name != "") {
        //     move_uploaded_file($tmp_name, $file);
        //     $query = "UPDATE `user` SET `first_name`='$fname',`last_name`='$lname',`email`='$email',`password`='$passwd',`birthdate`='$bdate',`image`='$file',`gender`='$gender',`mobile`='$number' WHERE id='$id'";
        // } else {
        //     $query = "UPDATE `user` SET `first_name`='$fname',`last_name`='$lname',`email`='$email',`password`='$passwd',`birthdate`='$bdate',`gender`='$gender',`mobile`='$number' WHERE id='$id'";
        // }

        // $query = "UPDATE `product` SET `name`='$name',`categoryId`='$categoryId',`description`='$desc',`price`='$price' WHERE id='$id'";
        // $query = "INSERT INTO `product` (`name`,`categoryId`,`description`,`price`) VALUES ('$name','$categoryId','$desc','$price')";

        // if ($this->conn->query($query)) {
        // echo 201;
        // return true;
        // } else {
        // echo 400;
        // return false;
        // }
    }

    public function editUser($id, $name, $email, $contactNumber, $address)
    {
        $query = "UPDATE `user` SET `name`='$name',`contactNumber`='$contactNumber',`email`='$email' ,`address`='$address' WHERE id='$id'";
        // $query = "INSERT INTO `user`(`name`, `contactNumber`, `email`, `password`) VALUES ('$name','$contactNumber','$email','$passwd')";

        if ($this->conn->query($query)) {
            echo 200;
            return true;
        } else {
            echo 400;
            return false;
        }
    }
}

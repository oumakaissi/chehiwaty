<?php


class Member
{

    private $dbConn;

    private $ds;

    function __construct()
    {
        require_once("DataSource.php");
        $this->ds = new DataSource();
    }

    function validateMember()
    {
        $valid = true;
        $errorMessage = array();
        foreach ($_POST as $key => $value) {
            if (empty($_POST[$key])) {
                $valid = false;
            }
        }

        if ($valid == true) {
            // Password Matching Validation
            if ($_POST['password'] != $_POST['confirm_password']) {
                $errorMessage[] = 'Passwords should be same.';
                $valid = false;
            }

            // Email Validation
            if (!isset($error_message)) {
                if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
                    $errorMessage[] = "Invalid email address.";
                    $valid = false;
                }
            }

            // Validation to check if Terms and Conditions are accepted
            if (!isset($error_message)) {
                if (!isset($_POST["terms"])) {
                    $errorMessage[] = "Accept terms and conditions.";
                    $valid = false;
                }
            }
        } else {
            $errorMessage[] = "All fields are required.";
        }

        if ($valid == false) {
            return $errorMessage;
        }
        return;
    }

    function isMemberExists($username, $email)
    {
        $query = "select * FROM registered_users WHERE user_name = ? OR email = ?";
        $paramType = "ss";
        $paramArray = array($username, $email);
        $memberCount = $this->ds->numRows($query, $paramType, $paramArray);

        return $memberCount;
    }

    function insertMemberRecord($username, $firstName, $lastName, $address, $address2, $city, $state, $zip, $password, $email)
    {
        $passwordHash = md5($password);
        $query = "INSERT INTO registered_users (user_name, first_name, last_name, address, address2, city, state, zip, password, email, gender, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $paramType = "ssssssssssss";
        $paramArray = array(
            $username,
            $firstName,
            $lastName,
            $address,
            $address2,
            $city,
            $state,
            $zip,
            $password,
            $email,
            "male",
            ""
        );
        $insertId = $this->ds->insert($query, $paramType, $paramArray);
        return $insertId;
    }

    function getMemberById($memberId)
    {
        $query = "select * FROM registered_users WHERE id = ?";
        $paramType = "i";
        $paramArray = array($memberId);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);

        return $memberResult;
    }

    function processLogin($username, $password)
    {
        $passwordHash = $password;
        $query = "select * FROM registered_users WHERE user_name = ? AND password = ?";
        $paramType = "ss";
        $paramArray = array($username, $passwordHash);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        if (!empty($memberResult)) {
            $_SESSION["user_id"] = $memberResult[0]["id"];
            $_SESSION["role"] = $memberResult[0]["role"];
            return true;
        }
    }

    function getMemberRole($memberId)
    {
        $role = "";
        $member = $this->getMemberById($memberId);
        $role = $member->$role;
        return $role;
    }
}

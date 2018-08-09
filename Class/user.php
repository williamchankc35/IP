<?php

/*
 * @author William
 */

class user {
    
    private $userType;
    private $userName;
    private $userPassword;
    private $userStatus;
    
    function __construct($userType, $userName, $userPassword, $userStatus) {
        $this->userType = $userType;
        $this->userName = $userName;
        $this->userPassword = $userPassword;
        $this->userStatus = $userStatus;
    }

    function getUserType() {
        return $this->userType;
    }

    function getUserName() {
        return $this->userName;
    }

    function getUserPassword() {
        return $this->userPassword;
    }

    function getUserStatus() {
        return $this->userStatus;
    }

    function setUserType($userType) {
        $this->userType = $userType;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setUserPassword($userPassword) {
        $this->userPassword = $userPassword;
    }

    function setUserStatus($userStatus) {
        $this->userStatus = $userStatus;
    }

}

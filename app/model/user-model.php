<?php

require_once("../app/model/model.php");

class User extends model
{


    function __construct()
    {
        $this->dbh=$this->connect();
    }

    function login($username,$password)
    {

        $sql="select * from user where Username='$username'";
        $result=mysqli_query($this->db->getConn(),$sql);
        $count=mysqli_num_rows($result);
        
        if ($count>0)
        {
            $sql1="SELECT user.* from user join role on user.RoleID=role.RoleID where user.Username='$username' and user.Password='$password' and user.Suspended='0'";
            $result1=mysqli_query($this->db->getConn(),$sql1);
            $count1=mysqli_num_rows($result1);
            if ($count1>0)
            {
                $row=mysqli_fetch_assoc($result1);
                if($row["Title"]!=="instructor" && $row["Title"]!=="admin" && $row["Title"]!=="Teaching Assistant")
                {
                    $_SESSION['ID']=$row['UserID'];
                    $_SESSION['Role']=$row['RoleID'];
                    $_SESSION['Email']=$row['Email'];
                    $_SESSION['Name']=$row['Name'];
                    $_SESSION['Age']=$row['Age'];
                    $_SESSION['Mobile']=$row['Mobile'];
                    $_SESSION['Title']=$row['Title'];
                    $_SESSION['Bio']=$row['Bio'];

                    header("Location:index.php");
                }
                if($row["Title"]==="instructor")
                {
                    $_SESSION['ID']=$row['UserID'];
                    $_SESSION['Role']=$row['RoleID'];
                    $_SESSION['Email']=$row['Email'];
                    $_SESSION['Name']=$row['Name'];
                    $_SESSION['Age']=$row['Age'];
                    $_SESSION['Mobile']=$row['Mobile'];
                    $_SESSION['Title']=$row['Title'];
                    $_SESSION['Bio']=$row['Bio'];
                    header("Location:../Professor-Dashboard/Dashboard.php");
                }
                if($row["Title"]==="admin")
                {
                    $_SESSION['ID']=$row['UserID'];
                    $_SESSION['Role']=$row['RoleID'];
                    $_SESSION['Email']=$row['Email'];
                    $_SESSION['Name']=$row['Name'];
                    $_SESSION['Age']=$row['Age'];
                    $_SESSION['Mobile']=$row['Mobile'];
                    $_SESSION['Title']=$row['Title'];
                    $_SESSION['Bio']=$row['Bio'];
                    header("Location:../admin-dashboard/index.php");
                }
                if($row["Title"]==="Teaching Assistant")
                {
                    $_SESSION['ID']=$row['UserID'];
                    $_SESSION['Role']=$row['RoleID'];
                    $_SESSION['Email']=$row['Email'];
                    $_SESSION['Name']=$row['Name'];
                    $_SESSION['Age']=$row['Age'];
                    $_SESSION['Mobile']=$row['Mobile'];
                    $_SESSION['Title']=$row['Title'];
                    $_SESSION['Bio']=$row['Bio'];
                    header("Location:../Professor-Dashboard/Dashboard.php");
                }
            }

        }
    }

    
}

?> 
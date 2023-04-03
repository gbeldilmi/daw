<?php
require_once 'ConnectionDb.php';
function get_user_login():array{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("select USERNAME,PASSWORD from USER");
    $query->execute();
    $users=array();
    while ($row = $query->fetch()) {
        $a=array();
        $a['username']=$row['USERNAME'];
        $a['password']=$row['PASSWORD'];
        $users[]=$a;
    }
    $conn->closeConnection();
    return $users;
}
function get_ID_User($username):int{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("select ID FROM USER where USERNAME='$username'");
    $query->execute();
    $id=$query->fetch()['ID'];
    $conn->closeConnection();
    return $id;
}
function get_all_roles($role):array{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("select username FROM USER where ROLE='$role'");
    $query->execute();
    $users=array();
    while ($row = $query->fetch()) {
        $users[]=$row['username'];
    }
    $conn->closeConnection();
    return $users;
}
function insert_user($firstname, $lastname, $username, $password, $role):bool{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("INSERT INTO USER(FIRSTNAME,LASTNAME,USERNAME,PASSWORD,ROLE,CREATED_AT)VALUES ('$firstname','$lastname','$username',sha2('$password',256),'$role',sysdate())");
    $returnq=$query->execute();
    $conn->closeConnection();
    return $returnq;
}

function add_followed_courses($username,$id_course):bool{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("INSERT INTO FOLLOWED_COURSE(user_id, course_id) VALUES ('$username','$id_course') ");
    $returnq=$query->execute();
    $conn->closeConnection();
    return $returnq;
}

function course_exists_model($id_course):bool{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("select id FROM course ");
    $query->execute();
    while ($row = $query->fetch()) {
        if($row['id']==$id_course)
            return true;
    }
    $conn->closeConnection();
    return false;

}

function create_course_model($name,$description):int{
    $id=get_ID_User($_SESSION['username']);
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("INSERT INTO COURSE(NAME,AUTHOR_ID, DESCRIPTION, CREATED_AT ) VALUES ('$name','$id','$description',sysdate()) ");
    $idcour=-1;
    if($query->execute()) {
        $querys = $db->prepare("SELECT ID FROM COURSE ORDER BY ID DESC LIMIT 1");
        $querys->execute();
        $idcour = $querys->fetch()['ID'];
    }
    $conn->closeConnection();

    return $idcour;

}

function get_course_model($id):array{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("select ID,NAME,FILE_PATH,DESCRIPTION, AUTHOR_ID from COURSE");
    $query->execute();
    $course=array();
    while ($row = $query->fetch()) {
        if ( $id == $row['ID']){
            $course['NAME']=$row['NAME'];
            $course['FILE_PATH']=$row['FILE_PATH'];
            $course['DESCRIPTION']=$row['DESCRIPTION'];
            $course['AUTHOR_ID']=$row['AUTHOR_ID'];
        }
    }
    $conn->closeConnection();
    return $course;
}
function get_courses_model($id):array{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("select NAME,FILE_PATH,DESCRIPTION from COURSE WHERE AUTHOR_ID=$id");
    $query->execute();
    $courses=array();
    while ($row = $query->fetch()) {
        $a=array();
        $a['NAME']=$row['NAME'];
        $a['FILE_PATH']=$row['FILE_PATH'];
        $a['DESCRIPTION']=$row['DESCRIPTION'];
        $courses[]=$a;
    }
    $conn->closeConnection();
    return $courses;
}
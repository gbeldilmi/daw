<?php
require_once 'ConnectionDb.php';
function get_user_login():array{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT USERNAME,PASSWORD FROM USER");
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
    $query=$db->prepare("SELECT ID FROM USER WHERE USERNAME='$username'");
    $query->execute();
    $id=$query->fetch()['ID'];
    $conn->closeConnection();
    return $id;
}
function get_all_roles($role):array{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT username FROM USER WHERE ROLE='$role'");
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

function add_followed_courses_model($username,$id_course):bool{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("INSERT INTO FOLLOWED_COURSE(user_id, course_id) VALUES ('$username','$id_course') ");
    $conn->closeConnection();
    return $query->execute();
}

function course_exists_model($id_course):bool{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT id FROM COURSE ");
    $query->execute();
    while ($row = $query->fetch()) {

        if($row['id']==$id_course)
            return true;
    }
    $conn->closeConnection();
    return false;

}

function create_course_model($name,$description):bool{
    $id=get_ID_User($_SESSION['username']);
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("INSERT INTO COURSE(NAME,AUTHOR_ID, DESCRIPTION, CREATED_AT ) VALUES ('$name','$id','$description',sysdate()) ");
    $returnq=$query->execute();
    $conn->closeConnection();
    return $returnq;
}

function get_course_model($id):array{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT ID,NAME,DESCRIPTION, AUTHOR_ID FROM COURSE");
    $query->execute();
    $course=array();
    while ($row = $query->fetch()) {
        if ( $id == $row['ID']){
            $course['NAME']=$row['NAME'];
            $course['DESCRIPTION']=$row['DESCRIPTION'];
            $course['AUTHOR_ID']=$row['AUTHOR_ID'];
        }
    }
    $conn->closeConnection();
    return $course;
}

function get_courses_model($owner_id):array{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT ID,NAME,DESCRIPTION FROM COURSE WHERE AUTHOR_ID=$owner_id");
    $query->execute();
    $courses=array();
    while ($row = $query->fetch()) {
        $a=array();
        $a['ID']=$row['ID'];
        $a['NAME']=$row['NAME'];
        $a['DESCRIPTION']=$row['DESCRIPTION'];
        $a['AUTHOR_ID']=$row['AUTHOR_ID'];
        $courses[]=$a;
    }
    $conn->closeConnection();
    return $courses;
}
function get_followed_courses_model():array{
    $id=get_ID_User($_SESSION['username']);
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT COURSE_ID FROM FOLLOWED_COURSE WHERE USER_ID=$id ");
    $query->execute();
    $courses=array();
    while ($row = $query->fetch()) {
        $courses[]=get_course_model($row['COURSE_ID']);
    }
    $conn->closeConnection();
    return $courses;
}

function get_test_model($id):array{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT ID,NAME,COURSE_ID FROM TEST");
    $query->execute();
    $test=array();
    while ($row = $query->fetch()) {
        if ( $id == $row['ID']){
            $test['NAME']=$row['NAME'];
            $test['COURSE_ID']=$row['COURSE_ID'];
        }
    }
    $conn->closeConnection();
    return $test;
}

function get_tests_model($course_id):array{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT NAME FROM TEST WHERE COURSE_ID=$course_id");
    $query->execute();
    $tests=array();
    while ($row = $query->fetch()) {
        $tests[]=$row['NAME'];
    }
    $conn->closeConnection();
    return $tests;
}

function is_course_owner_model($id_course,$id_user):bool{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT ID,AUTHOR_ID FROM COURSE WHERE ID=$id_course ");
    $query->execute();
    while ($row = $query->fetch()) {
        if($row['AUTHOR_ID']==$id_user)
            return true;
    }
    $conn->closeConnection();
    return false;

}

function is_followed_course_model($id_user,$id_course):bool{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT COURSE_ID,USER_ID FROM FOLLOWED_COURSE WHERE COURSE_ID=$id_course ");
    $query->execute();
    while ($row = $query->fetch()) {
        if($row['USER_ID']==$id_user)
            return true;
    }
    $conn->closeConnection();
    return false;

}

function is_test_owner_model($id_test,$id_user):bool{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT TEST.ID,C.AUTHOR_ID FROM TEST 
                                INNER JOIN COURSE C on TEST.COURSE_ID = C.ID;");
    $query->execute();
    while ($row = $query->fetch()) {
        if($row['ID']==$id_test && $row['AUTHOR_ID']==$id_user)
            return true;
    }
    $conn->closeConnection();
    return false;

}
function test_exists($id):bool{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT id FROM TEST ");
    $query->execute();
    while ($row = $query->fetch()) {
        if($row['id']==$id)
            return true;
    }
    $conn->closeConnection();
    return false;

}

function create_forum_model($id_user,$id_course,$titre):bool{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("INSERT INTO FORUM_DISCUSSION(USER_ID, COURSE_ID, TITLE, CREATED_AT) VALUES ($id_user,$id_course,'$titre',sysdate()) ");
    $conn->closeConnection();
    return $query->execute();
}
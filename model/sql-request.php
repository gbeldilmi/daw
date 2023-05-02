<?php
require_once 'ConnectionDb.php';
/////////////////////////
/// @TODO USER
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
function get_username_id($id):string{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT USERNAME FROM USER WHERE ID='$id'");
    $query->execute();
    $id=$query->fetch()['USERNAME'];
    $conn->closeConnection();
    return $id;
}
function get_all_roles_username($role):array{
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

function get_users_model():array{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT ID, FIRSTNAME, LASTNAME, EMAIL, USERNAME FROM USER WHERE ROLE!=3");
    $query->execute();
    $users=array();
    while ($row = $query->fetch()) {
        $a=array();
        $a['id']=$row['ID'];
        $a['firstname']=$row['FIRSTNAME'];
        $a['lastname']=$row['LASTNAME'];
        $a['email']=$row['EMAIL'];
        $a['username']=$row['USERNAME'];
        $users[]=$a;
    }
    $conn->closeConnection();
    return $users;
}

function insert_user($firstname, $lastname, $username, $password, $role):bool{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("INSERT INTO USER(FIRSTNAME,LASTNAME,USERNAME,PASSWORD,ROLE,CREATED_AT)VALUES ('$firstname','$lastname','$username','$password','$role',sysdate())");
    $returnq=$query->execute();
    $conn->closeConnection();
    return $returnq;
}
//////////////
/// @TODO COURSE
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
///////////////////////////
/// @TODO TEST

function create_test_model($data):int{
    $name=$data["name"];
    $course_id=$data["course"];
    $returnq=-1;
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("INSERT INTO TEST(NAME,COURSE_ID, CREATED_AT ) VALUES ('$name','$course_id',sysdate()) ");
    $query->execute();
    $query=$db->prepare("SELECT ID FROM TEST ORDER BY ID DESC LIMIT 1");
    $query->execute();
    $returnq=$query->fetch()['ID'];
    $conn->closeConnection();
    return $returnq;
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
/////////////////////////////////////
/// @TODO FORUM
function create_forum_model($id_user,$id_course,$titre):bool{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("INSERT INTO FORUM_DISCUSSION(USER_ID, COURSE_ID, TITLE, CREATED_AT) VALUES ($id_user,$id_course,'$titre',sysdate()) ");
    $conn->closeConnection();
    return $query->execute();
}

function get_forum_id_model($id_forum):array{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT ID, USER_ID, COURSE_ID, TITLE, CREATED_AT FROM FORUM_DISCUSSION");
    $query->execute();
    $forum=array();
    while ($row = $query->fetch()) {
        if ($id_forum==$row['ID']){
            $forum[]=$row['ID'];
            $forum[]=$row['USER_ID'];
            $forum[]=$row['COURSE_ID'];
            $forum[]=$row['TITLE'];
            $forum[]=$row['CREATED_AT'];
        }
    }
    $conn->closeConnection();
    return $forum;
}

function get_forums_model():array{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT ID, USER_ID, COURSE_ID, TITLE, CREATED_AT FROM FORUM_DISCUSSION");
    $query->execute();
    $forums=array();
    while ($row = $query->fetch()) {
        $forum=array();
        $forum[]=$row['ID'];
        $forum[]=$row['USER_ID'];
        $forum[]=$row['COURSE_ID'];
        $forum[]=$row['TITLE'];
        $forum[]=$row['CREATED_AT'];
        $forums[]=$forum;
    }
    $conn->closeConnection();
    return $forums;
}

function get_messages_forum_model($id_forum):array{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("SELECT DISCUSSION_ID,USER_ID, CONTENT, CREATED_AT FROM FORUM_MESSAGE");
    $query->execute();
    $messages=array();
    while ($row = $query->fetch()) {
        if ($id_forum==$row['DISCUSSION_ID']){
            $message=array();
            $message[]=get_username_id($row['USER_ID']);
            $message[]=$row['CONTENT'];
            $message[]=$row['CREATED_AT'];
            $messages[]=$message;
        }
    }
    $conn->closeConnection();
    return $messages;
}

function send_message_forum_model($id_forum,$message,$id_user):bool{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("INSERT INTO FORUM_MESSAGE(USER_ID, DISCUSSION_ID, CONTENT, CREATED_AT) VALUES ($id_user,$id_forum,'$message',sysdate()) ");
    $conn->closeConnection();
    return $query->execute();
}

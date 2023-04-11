<?php
require_once 'ConnectionDb.php';
function get_user_login():array{
    /** @var ConnectionDb $conn */
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

function course_exists($id_course):bool{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("select id FROM COURSE ");
    $query->execute();
    $users=array();
    while ($row = $query->fetch()) {
      
        if($row['id']==$id_course)
        return true;
    }
    $conn->closeConnection();
    return false;

}

function create_course($name,$description,$path):bool{
    $id=get_ID_User($_SESSION['username']);
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("INSERT INTO cours(NAME,AUTHOR_ID,FILE_PATH, DESCRIPTION, CREATED_AT ) VALUES ('$name','$id','$path','$description',sysdate()) ");
    $returnq=$query->execute();
    $conn->closeConnection();
    return $returnq;

}

function get_course($id):array{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("select ID,NAME,DESCRIPTION, AUTHOR_ID from COURSE");
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

function get_courses($owner_id):array{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("select NAME,DESCRIPTION from COURSE WHERE AUTHOR_ID=$id");
    $query->execute();
    $courses=array();
    while ($row = $query->fetch()) {
        $a=array();
        $a['NAME']=$row['NAME'];
        $a['DESCRIPTION']=$row['DESCRIPTION'];
        $a['AUTHOR_ID']=$row['AUTHOR_ID'];
        $courses[]=$a;
    }
    $conn->closeConnection();
    return $couses;
}
function get_followed_courses_model():array{
    $id=get_ID_User($_SESSION['username']);
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("select COURSE_ID  from FOLLOWED_COURSES WHERE USER_ID=$id ");
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
    $query=$db->prepare("select ID,NAME,COURSE_ID from TEST");
    $query->execute();
    $course=array();
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
    $query=$db->prepare("select NAME from TEST WHERE COURSES_ID=$course_id");
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
    $query=$db->prepare("select ID,AUTHOR_ID FROM COURSE WHERE ID=$id_course ");
    $query->execute();
    $users=array();
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
    $query=$db->prepare("select COURSE_ID,USER_ID FROM FOLLOWED_COURSE WHERE COURSE_ID=$id_course ");
    $query->execute();
    $users=array();
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
    $query=$db->prepare("select ID,NAME,COURSE_ID from TEST  WHERE ID=$id_user ");
    $query->execute();
    $users=array();
    while ($row = $query->fetch()) {
      
        if($row['']==$id_test)
        return true;
    }
    $conn->closeConnection();
    return false;

}
function test_exists($id):bool{
    $conn=new ConnectionDb();
    $db=$conn->database;
    $query=$db->prepare("select id FROM TEST ");
    $query->execute();
    $users=array();
    while ($row = $query->fetch()) {
      
        if($row['id']==$id)
        return true;
    }
    $conn->closeConnection();
    return false;

}
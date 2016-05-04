<?php
/*@session_start();
$_SESSION['facebook']="true";
$_SESSION['username']= $_GET['username'] ;
$_SESSION['id']=$_GET['id'];
$_SESSION['image']='http://graph.facebook.com/'.$_GET['id'].'/picture?type=square';

if (isset($_SESSION['facebook'])){
    if('http://' . $_SERVER['HTTP_HOST'] .'/kcg_final/index.php'==$_SESSION['re_url'])
        header("Location: ".$_SESSION['re_url'].'?loged_in=true');
    else if('http://' . $_SERVER['HTTP_HOST'] .'/kcg_final/temp_test.php?type=restaurant'==$_SESSION['re_url']){
        header("Location: ".$_SESSION['re_url']);
    }
    //else if (preg_match('/^http://' . $_SERVER['HTTP_HOST'] .'/kcg/comment_copy_test.php/', $_SESSION['re_url'])) {
    else if(preg_match("/\bcomment_copy_test\b/i",$_SESSION['re_url'], $match)){
        echo "<script> window.close(); </script>";
    }
    else{
        // header("Location: ".$_SESSION['re_url']);
        // echo "<script> window.close(); </script>";
        header("Location: ".$_SESSION['re_url']);
    }
    // echo "<script> window.close(); </script>";
    //echo "(y)";
}
*/
?>
<!DOCTYPE html>
<!--
文件名： createobjects.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>创建对象</title>
    </head>
    <body>
        <?php
        include 'person.php';
        require 'student.php';
        require 'teacher.php';
        if (class_exists('person')) {
            $person1 = new person("张三", "男", 20);
//            $person1->say();
//            $person1->name = "李四";
//            $person1->sex = "男";
//            $person1->age = "20";
//            echo "原名：".$person1->get_name()."<br>";
//            $person1->set_name("李四");
            $person1->name = "李四";
            $person1->sex = "女";
            $person1->age = 150;
            
//            echo "对象的名称：".$person1->name . "<br>";
//            echo "对象的性别：".$person1->sex . "<br>";
//            echo "对象的年龄：".$person1->age . "<br>";
            
            echo "姓名:".$person1->name."<br>";
            echo "性别:".$person1->sex."<br>";
            echo "年龄:".$person1->age."<br>";
            
            var_dump(isset($person1->name));
            var_dump(isset($person1->sex));
            unset($person1->age);
//            var_dump(unset($person1->age));
            
            $person1->say();
            $person1->eat("苹果");
            $person1->run();
            $person1=null;
            
            $person2 = new person("小桃红");
            $person2->say();
            $person2->eat("李子");
            $person2->run();
            
            $teacher1 = new teacher("陈道明","男", 40);
            $teacher1->school = "兴育强中学";
            $teacher1->wage = 4500;
            
            $teacher1->say();
            $teacher1->study();
            $teacher1->teaching();
            
            $teacher1cp = clone $teacher1;
            $teacher1cp->sex = "女";
            $teacher1cp->say();
            $teacher1cp->study();
            $teacher1cp->teaching();
        
            $obj = new teacher("张帆","男", 30);
            echo $obj."<br>";
            
            $obj2 = new person();
            $obj2->otherfunc("参数1", "参数2", "参数3");
        } else {
            echo '没找到该类';
        }
        ?>
    </body>
</html>

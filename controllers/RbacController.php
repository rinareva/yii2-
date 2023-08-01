<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\db\Migration;

class RbacController extends SiteController
{
    public function actionIndex(){

        // $auth = Yii::$app->authManager;

        // // на всякий случай удаляем старые данные из бд
        // $auth->removeAll();

        // // создание роли админ
        // $admin = $auth->createRole('admin');
        // $admin->description = 'Администратор';
        // $auth->add($admin);

        // // создание роли репетитор и студент
        // $tutor = $auth->createRole('tutor');
        // $tutor->description = 'Репетитор';
        // $auth->add($tutor);

        // $student = $auth->createRole('student');
        // $student->description = 'Студент';
        // $auth->add($student);

        // // Создаем разрешение на доступ создание анкеты
        // $permit = $auth->createPermission('createAnketa');
        // // Добавляем своё описание к разрешению, чтобы не забыть для чего мы его создавали
        // $permit->description = 'Доступ к добавлению анкеты';
        // // Добавляем разрешение в систему через RBAC менеджер
        // $auth->add($permit);

        // // Создаем разрешение на доступ удаления анкеты
        // $permit2 = $auth->createPermission('deleteAnketa');
        // $permit2->description = 'Доступ к удалению анкеты';
        // $auth->add($permit2);
        
        // // Ищем роли
        // $role_a = $auth->getRole('admin');
        // $role_b = $auth->getRole('tutor');
        // // Ищем разрешения
        // $permit_a = $auth->getPermission('createAnketa');
        // $permit_b = $auth->getPermission('deleteAnketa');
        // // Добавляем (наследуем) разрешение для ролей
        // $auth->addChild($role_a, $permit_b);
        // $auth->addChild($role_b, $permit_a);
        // $auth->addChild($role_b, $permit_b);

        // $userRole = $auth->getRole('admin');
        // $auth->assign($userRole, 1);

        // $userRole = $auth->getRole('admin');
        // $auth->assign($userRole, Yii::$app->user->getId());

        // return 123;
    }
}

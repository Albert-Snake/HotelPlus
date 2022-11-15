<?php

use yii\db\Migration;

/**
 * Class m221107_105932_init_rbac
 */
class m221107_105932_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $auth = Yii::$app->authManager;


        //--------------------- Permitions --------------------------

        //add "crudAll" permition - Administrador
        $crudAll = $auth->createPermission('crudAll');
        $crudAll->description = 'CRUD para o Administrador';
        $auth->add($crudAll);

        //add "crudCozinha" permition - Colaborador Cozinha
        $crudCozinha = $auth->createPermission('crudCozinha');
        $crudCozinha->description = 'CRUD na Cozinha';
        $auth->add($crudCozinha);

        //add "crudLimpezas" permition - Colaborador Limpeza
        $crudLimpeza = $auth->createPermission('crudLimpeza');
        $crudLimpeza->description = 'CRUD de Limpeza';
        $auth->add($crudLimpeza);

        //add "crudCliente" permition - Cliente
        $crudCliente = $auth->createPermission('crudCliente');
        $crudCliente->description = 'Permissões de CLiente';
        $auth->add($crudCliente);


        //---------------------------- ROLES ----------------------------------

        // add "cliente" role and give this role the permissions
        $cliente = $auth->createRole('cliente');
        $auth->add($cliente);
        $auth->addChild($cliente, $crudCliente);

        // add "colabCozinha" role and give this role the permissions
        $colabCozinha = $auth->createRole('colabCozinha');
        $auth->add($colabCozinha);
        $auth->addChild($colabCozinha, $crudCliente);
        $auth->addChild($colabCozinha, $crudCozinha);

        // add "colabLimpeza" role and give this role the permissions
        $colabLimpeza = $auth->createRole('colabLimpeza');
        $auth->add($colabLimpeza);
        $auth->addChild($colabLimpeza, $crudCliente);
        $auth->addChild($colabLimpeza, $crudLimpeza);


        // add "admin" role and give this role the permissions

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $crudCliente);
        $auth->addChild($admin, $crudCozinha);
        $auth->addChild($admin, $crudLimpeza);
        $auth->addChild($admin, $crudAll);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($cliente,4);
        $auth->assign($colabCozinha, 3);
        $auth->assign($colabLimpeza, 2);
        $auth->assign($admin, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221106_205226_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}

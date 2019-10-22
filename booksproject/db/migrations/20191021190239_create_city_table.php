<?php

use Phinx\Migration\AbstractMigration;

class CreateCityTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $city = $this->table('city');
        $city->addColumn(id);
    }

    public function up()
    {
        $city = $this->table('city');
        $city->addColumn('name', 'string',['limit' => 50, 'null' => false])
        ->addForeignKey('code', 'country', 'id')
        ->addColumn('district', 'string',['null' => false])
        ->addColumn('population', 'integer')
        ->create();
        //->save();

        // Using SQL
        // $sql = '
        // CREATE TABLE `authors` (
        // `id` int(11) NOT NULL,
        // `firstname` varchar(50) NOT NULL,
        // `lastname` varchar(50) NOT NULL,
        // ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

        // ALTER TABLE `authors`
        // ADD PRIMARY KEY (`id`);

        // ALTER TABLE `authors`
        // MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;';
        // $this->execute($sql);
    }

    public function down()
    {
        $this->dropTable('city');
    }

}

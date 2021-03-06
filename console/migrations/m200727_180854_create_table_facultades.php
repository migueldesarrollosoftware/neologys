<?php


use console\migrations\baseMigration;

/**
 * Class m200727_190854_create_table_facultades
 */
class m200727_180854_create_table_facultades extends baseMigration
{
    const NAME_TABLE='{{%facultades}}';
 const NAME_TABLE_UNIVERSIDADES='{{%universidades}}';
  //const NAME_TABLE_ACTIVOS='{{%activos}}';
//const NAME_TABLE_UM='{{%ums}}';
 //const NAME_TABLE_DOCUMENTOS='{{%documentos}}';
    public function safeUp()
    {
       $table=static::NAME_TABLE;
if(!$this->existsTable($table)) {
    $this->createTable($table, [
        'id'=>$this->primaryKey(),
        'universidad_id'=>$this->integer(11),
             'codfac'=>$this->string(10),
            'desfac' => $this->string(60)->notNull()->append($this->collateColumn()),//id padre
         'code1' => $this->char(2)->append($this->collateColumn()),//id padre
        'code2' => $this->char(2)->append($this->collateColumn()),//id padre
        'code3' => $this->char(3)->append($this->collateColumn()),//id padre
        ],$this->collateTable());
      $this->createIndex($this->generateNameFk($table),$table, 'codfac') ;
      //$this->addPrimaryKey($this->generateNameFk($table),$table, 'codfac');
      $this->addForeignKey($this->generateNameFk($table), $table,
              'universidad_id', self::NAME_TABLE_UNIVERSIDADES,'id'); 
              
      $this->fillData();
            }
 }

public function safeDown()
    {
     $table=static::NAME_TABLE;
       if($this->existsTable($table)) {
            $this->dropTable($table);
        }

    }
    
 private function getUniversidades(){
    return \Yii::$app->db->createCommand()->setSql("select *from {{%universidades}}")->queryAll();
    
    
 }   
 
 public function fillData(){
       \Yii::$app->db->createCommand()->
             batchInsert(static::NAME_TABLE,
             ['universidad_id','codfac','desfac'], $this->getData())->execute();
   
 }
 
 private function getData(){
  $unive=$this->getUniversidades();
  $facultades=[];
  $registro=[];
   
   foreach($unive as $universidad){
       for( $i= 1 ; $i <= 3 ; $i++ ) {
         $registro=[$universidad['id'],$universidad['acronimo'],'-FACULTAD '.$i];
         $facultades[]=$registro;             
       }
   }
   return  $facultades;
 } 

}

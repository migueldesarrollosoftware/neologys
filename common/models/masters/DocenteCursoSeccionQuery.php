<?php

namespace common\models\masters;

/**
 * This is the ActiveQuery class for [[DocenteCursoSeccion]].
 *
 * @see DocenteCursoSeccion
 */
class DocenteCursoSeccionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DocenteCursoSeccion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DocenteCursoSeccion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

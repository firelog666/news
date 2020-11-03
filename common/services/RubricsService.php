<?php

namespace common\services;

use common\models\Rubrics;
use yii\web\NotFoundHttpException;

class RubricsService
{
    /**
     * @var string
     */
    protected $depthAttribute = 'depth';

    /**
     * @var string
     */
    protected $childrenOutAttribute = 'children';

    protected $newsService;

    public function __construct()
    {
        $this->newsService = new NewsService();
    }

    /**
     * @param array $data
     * @return Rubrics
     */
    public function createParent($data)
    {
        $model = new Rubrics(['name' => $data['name']]);
        $model->makeRoot();
        $model->save();
        return $model;
    }

    /**
     * @param int $parentId
     * @param array $data
     * @return Rubrics
     * @throws NotFoundHttpException
     */
    public function createChildren($parentId, $data)
    {
        $model = new Rubrics(['name' => $data['name']]);
        $model->appendTo($this->getParent($parentId));
        $model->save();
        return $model;
    }

    /** Создание древа рубрик
     * @return array
     */
    public function createTree()
    {
        $collection = $this->getRubrics();
        $trees = [];
        if (count($collection) > 0) {
            //Добавляем свои элементы
            foreach ($collection as &$col) {
                $col = $this->addItem($col);
            }
            // Узел. Используется для создания иерархии
            $stack = [];
            foreach ($collection as $node) {
                $item = $node;
                $item[$this->childrenOutAttribute] = [];
                // Количество элементов узла
                $elements = count($stack);
                // Проверка имеем ли мы дело с разными уровнями
                while ($elements > 0 && $stack[$elements - 1][$this->depthAttribute] >= $item[$this->depthAttribute]) {
                    array_pop($stack);
                    $elements--;
                }
                // Если это корень
                if ($elements == 0) {
                    // Создание корневого элемента
                    $i = count($trees);
                    $trees[$i] = $item;
                    $stack[] = &$trees[$i];
                } else {
                    // Добавление элемента в родительский
                    $i = count($stack[$elements - 1][$this->childrenOutAttribute]);
                    $stack[$elements - 1][$this->childrenOutAttribute][$i] = $item;
                    $stack[] = &$stack[$elements - 1][$this->childrenOutAttribute][$i];
                }
            }
        }
        return $trees;
    }

    /**
     * @param Rubrics $rubric
     * @return array
     */
    public function getRubricNews($rubric)
    {
        $rubricsIds = $this->getChildren($rubric);
        //Добавление текущей категории в массив к дочерним категориям
        array_unshift($rubricsIds, $rubric);
        $data = [];
        $element = 0;
        foreach ($rubricsIds as $item) {
            if ($item->links) {
                $data[$element] = [
                    'id' => $item->id,
                    'name' => $item->name,
                ];
                foreach ($item->links as $itemNews) {
                    $data[$element]['news'] = $this->newsService->objectToArray($itemNews->news);
                }
                $element++;
            }
        }
        return $data;
    }

    /**
     * @param Rubrics $model
     * @return mixed
     */
    public function getChildren($model)
    {
        return $model->children()->all();
    }

    /**
     * @return array|Rubrics[]
     */
    public function getRubrics()
    {
        return Rubrics::find()
            ->select('id, name, depth')
            ->orderBy('tree, lft')
            ->asArray()
            ->all();
    }

    /**
     * @param $id
     * @return Rubrics|null
     * @throws NotFoundHttpException
     */
    public function getParent($id)
    {
        if ($model = Rubrics::findOne($id)) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Добавляет в массив дополнительные элементы
     * @param $node array Текущий элемент массива (строка из БД)
     * @return array
     */
    protected function addItem($node)
    {
        $newNode = [];
        return array_merge($node, $newNode);
    }

}
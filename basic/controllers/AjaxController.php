<?php


namespace app\controllers;

use app\models\Task;
use app\models\TimeTracks;
use yii\web\Controller;

class AjaxController extends Controller {

    private $client_id;

    public function actionAddTask()
    {
        $fieldsTask = ['title', 'description', 'manager_id', 'type_id', 'level_id'];
        $fieldsClient = ['first', 'last', 'email'];

        $this->client_id = $this->saveModel('app\models\Client', $fieldsClient);
        $taskSavedId = $this->saveModel('app\models\Task', $fieldsTask);

        if (!empty($taskSavedId) && !empty($this->client_id)) {
            return $this->renderPartial('success', ['taskId' => $taskSavedId]);
        };
    }

    public function actionAddManager()
    {
        $taskId = \Yii::$app->request->post('task_id');
        $managerId = \Yii::$app->request->post('manager_id');

        $task = Task::find()->where(['id' => $taskId])->one();
        $task->manager_id = $managerId;
        $task->status_id = 5;
        $task->save();

        return $taskId;
    }

    public function actionRemoveManager()
    {
        $taskId = \Yii::$app->request->post('task_id');
        $managerId = \Yii::$app->request->post('manager_id');

        $task = Task::find()->where(['id' => $taskId])->one();
        $task->manager_id = null;
        $task->status_id = 1;
        $task->save();

        return $taskId;
    }

    public function actionStartTask()
    {
        $taskId = \Yii::$app->request->post('task_id');

        $timeTracks = TimeTracks::find()->where(['task_id' => $taskId])->one();

        if ($timeTracks) {
            $timeTracks->start_time = time();
            $timeTracks->save();
        } else {
            $timeTracks = new TimeTracks();
            $timeTracks->task_id = $taskId;
            $timeTracks->start_time = time();
            $timeTracks->save();
        }

        return $taskId;
    }

    public function actionStopTask()
    {
        $taskId = \Yii::$app->request->post('task_id');

        $timeTracks = TimeTracks::find()->where(['task_id' => $taskId])->one();

        if ($timeTracks) {
            $timeTracks->total_time += (time()-$timeTracks->start_time);
            $timeTracks->start_time = 0;
            $timeTracks->save();
        }

        $data = array('total_time' => $timeTracks->total_time, 'task_id' => $taskId);

        return json_encode($data);

    }

    private function saveModel($modelName, $fields)
    {
        $model = new $modelName();

        foreach ($fields as $field) {
            $model->$field = key_exists($field, $_POST) ? $_POST[$field] : null;
        }

        if (!empty($this->client_id)) {
            $model->status_id = 1;
            $model->client_id = $this->client_id;
        }
        $model->created_at = time();

        return $model->save() ? $model->id : null;
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent :: beforeAction($action);
    }
}

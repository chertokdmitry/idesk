<?php


namespace app\controllers;

use app\models\Comment;
use \Yii;
use app\models\Status;
use app\models\Task;
use app\models\Type;
use app\models\Level;
use yii\web\Controller;

class TasksController extends Controller
{
    public function actionIndex()
    {
        $items = Task::find()->with(['status', 'level', 'type', 'timeTracks']);

        return $this->render('index', ['items' => $items, 'perPage' => 10]);
    }

    public function actionCreate(int $id = null)
    {
        $post = Yii::$app->request->post();

        if ($post) {
            $postId = $post['Task']['id'];
            $task = Task::findOne($postId);

            if ($task->load(\Yii::$app->request->post())) {
            $task->save();}

            $this->redirect('/tasks');

        }

        if ($id) {
            $model = Task::find()->where(['id' => $id])->with(['client', 'comments'])->one();
            $comment = new Comment();
            $statuses = Status::getList();
            $types = Type::getList();
            $levels = Level::getList();

            return $this->render('form_task', [
                'model' => $model,
                'comment' => $comment,
                'statuses' => $statuses,
                'types' => $types,
                'levels' => $levels
            ]);
        }
    }

    public function actionCommentCreate()
    {
        $post = Yii::$app->request->post();

        if ($post) {
            $taskId = $post['Comment']['task_id'];

            $comment = new Comment();
            $comment->body = $post['Comment']['body'];
            $comment->task_id = $taskId;
            $comment->manager_name = $post['Comment']['manager_name'];
            $comment->save();

            $this->redirect('/tasks/create?id=' . $taskId);
        }
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
}

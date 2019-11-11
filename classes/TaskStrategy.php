<?php
namespace taskforce\classes;

class TaskStrategy
{
    private $workerId;
    private $customerId;
    private $deadline;
    private $activeStatus;

    public function getTaskStatuses()
    {
        return [
            TaskStatuses::NEW => 'Новое',
            TaskStatuses::CANCELED => 'Отменено',
            TaskStatuses::ACTIVE => 'В работе',
            TaskStatuses::COMPLETED => 'Выполнено',
            TaskStatuses::FAILED => 'Провалено'
        ];
    }

    public function getUserRoles() {
        return [
            UserRoles::CUSTOMER => 'Заказчик',
            UserRoles::WORKER => 'Исполнитель'
        ];
    }

    public function getUserActions() {
        return [
            UserActions::CREATE => 'Создать',
            UserActions::CANCEL => 'Отменить',
            UserActions::START => 'Начать',
            UserActions::COMPLETE => 'Завершить',
            UserActions::RESPOND => 'Ответить',
            UserActions::ABANDON => 'Отказаться'
        ];
    }

    public function getStatusAfterAction($action)
    {
        $status = null;
        switch ($action) {
            case UserActions::CREATE:
                $status = TaskStatuses::NEW;
                break;
            case UserActions::CANCEL:
                $status = TaskStatuses::CANCELED;
                break;
            case UserActions::START:
                $status = TaskStatuses::ACTIVE;
                break;
            case UserActions::COMPLETE:
                $status = TaskStatuses::COMPLETED;
                break;
            case UserActions::ABANDON:
                $status = TaskStatuses::FAILED;
                break;
        }
        return $status;
    }


}

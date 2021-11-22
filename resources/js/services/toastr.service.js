export default new class ToastService {

    showToastr(message, type) {
        switch (type) {
            case 'info': {
                toastr.info(message);
                break;
            }
            case 'success': {
                toastr.success(message);
                break;
            }
            case 'error': {
                toastr.error(message);
                break;
            }
            case 'warning': {
                toastr.warning(message);
                break;
            }
            default: {
                toastr.info(message);
                break;
            }
        }
    }

    showSaved() {
        toastr.info('Сохранено!');
    }

    showDeleted() {
        toastr.info('Удалено!');
    }

    showInProccess() {
        toastr.info('В обработке!');
    }

    showEdited() {
        toastr.info('Обновлено!');
    }

    showAdded() {
        toastr.info('Добавлено!');
    }

}
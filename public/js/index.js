function HRErrorMsg(msg, title = "error") {
    Swal.fire({
        icon: 'error',
        title: title,
        text: msg,
    });
}

function HRSuccessMsg(msg, title = "success") {
    Swal.fire({
        icon: 'success',
        title: title,
        text: msg,
    });
}

function HRInfoMsg(msg, title = "info") {
    Swal.fire({
        icon: 'info',
        title: title,
        text: msg,
    });
}
function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data("url");
    let that = $(this);
    Swal.fire({
        title: "Bạn có muốn xóa ?",
        text: "Bạn không thể sửa lại sau khi xóa",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Delete !",
    }).then((result) => {
        if (result.isConfirmed) {
            // call ajax delete record
            $.ajax({
                type: "GET",
                url: urlRequest,
                success: function (data) {
                    if (data.code == 200) {
                        //
                        that.parent().parent().remove();
                        Swal.fire("Đã xóa!", "Xóa thành công.", "success");
                    }
                },
                error: function () {},
            });
        }
    });
}

$(function () {
    $(document).on("click", ".action_delete", actionDelete);
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function configLanguge () {
    return {
        "lengthMenu": "_MENU_ mục",
        "zeroRecords": "Không có dữ liệu để hiển thị",
        "info": "_PAGE_/_PAGES_",
        "infoEmpty": "No records available",
        "infoEmpty": "Không có dữ liệu để hiển thị",
        "infoFiltered": "(filtered from _MAX_ total records)",
        "infoFiltered": "(_MAX_/tổng số)",
        "search": 'Tìm kiếm: ',
        "paginate": {
            "first": "Trang đầu",
            "last": "Trang cuối",
            "next": "Trang sau",
            "previous": "Trang trước"
        }
    }
}

function ajaxFunc(route, data, method = 'POST') {
    console.log(data);
    $.ajax({
        url: route,
        method: method,
        processData: false,
        contentType: false,
        data: data,
    }).done(
        result => {
            console.log(result.error);
            if (result.error == false) {
                location.reload();
            } else {
                alert('Có lỗi!!!');
            }
        }
    )
}
function ajaxFunc2(route, data, method = 'POST') {
    console.log(data);
    $.ajax({
        url: route,
        method: method,
        processData: false,
        contentType: false,
        data: data,
    }).done(
        result => {
            console.log(result.error);
            if (result.err == false) {
                // location.reload();
            } else {
                // alert('Có lỗi!!!');
            }
        }
    )
}

$(function () {
    $('body').on('click', '#checkAll', function () {
        $('input:checkbox[name=checkbox]').not(this).prop('checked', this.checked);
    })


})



function ChangeToSlug(n, s) {
    var title, slug;
    //Lấy text từ thẻ input title
    title = document.getElementById(n).value;
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    slug = slug.replace(/ /gi, "-");
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    document.getElementById(s).value = slug;
}

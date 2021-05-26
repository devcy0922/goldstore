<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>CKEditor </h3>
                    <p class="text-subtitle text-muted">For user to check they list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">CKEditor</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?=$bbsRow['bbs_title']?></h4>
                        </div>
                        <div class="card-body">
                            <textarea id="editor" style="display: none;">
                                <?=$bbsRow['bbs_contents']?>
                            </textarea>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div>
                        <button class="btn btn-primary mr-2" onclick="onSubmitEvent()">저장</button>
                        <button class="btn btn-danger" onclick="location.href = '/notice'; ">취소</button>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 © Mazer</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">A. Saugi</a></p>
            </div>
        </div>
    </footer>
</div>

<script src="/design/dist/assets//vendors/ckeditor/ckeditor.js"></script>

<script>

    let editor;
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then( newEditor => {
            editor = newEditor;
        } )
        .catch(error => {
            console.error(error);
        });

    var bbsId = parseInt("<?=$bbsRow['id']?>");

    function onSubmitEvent(){


        var ajaxURL = "/notice/bbsRegistProc";
        var ajaxParam = {
            id: bbsId,
            contents: editor.getData()
        };


        $.ajax({
            url: ajaxURL,
            type: "POST",
            data: ajaxParam,
            dataType: "JSON",
            success: function (result) {
                if (result.result === true) {
                    alert("수정 완료 하였습니다.");
                    location.href = "/notice";
                }else{
                    alert("작업중 오류가 발생하였습니다.");
                }
            },
            error: function () {
                console.log('ERROR');
            }
        });

    }
</script>



<script src="/design/dist/assets//js/main.js"></script>
<style>
    .swal2-popup,
    .swal2-modal,
    .swal2-icon-success,
    .swal2-show {
        font-size: 15px;
    }

    .circle-loader:before {
        content: '';
        box-sizing: border-box;
        position: absolute;
        top: 50%;
        left: 50%;
        width: 48px;
        height: 48px;
        margin-left: -24px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        border: 2px solid #d0d6e9;
        border-top-color: #118cf1;
        -moz-animation: modalspinner .6s linear infinite;
        -webkit-animation: modalspinner .6s linear infinite;
        animation: modalspinner .6s linear infinite;
    }

    @-moz-keyframes modalspinner {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @-webkit-keyframes modalspinner {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
    .modal-content button.close {
    right: 13px;}
    .modal-title {
    
    font-family: 'Din bold';
}
</style>
<?php if(sys_lang()!='ar'):?>
<style>
.modal-content button.close {
    left: auto;
    right: 13px;}
</style>
<?php else:?>

    <style>
.modal-content button.close {
    left: 13px;
    right: auto;}
</style>
<?php endif;?>

<!-- Modal -->
<div class="modal" id="ajaxModal" tabindex="-1" role="dialog" aria-labelledby="ajaxModal" aria-hidden="true">
    <div class="modal-dialog mini-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <span class="modal-title" id="ajaxModalTitle" data-title=""></span>

                <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close"><span aria-bs-hidden="true">&times;</span></button>
            </div>
            <div id="ajaxModalContent">
            <div class="circle-loader"></div>
            </div>
  
            </div>
        </div>
    </div>
</div>

<script>
    //set datepicker language

    $('body').on('click', '[data-act=ajax-modal]', function() {
        var data = {
                ajaxModal: 1
            },
            url = $(this).attr('data-action-url'),
            isLargeModal = $(this).attr('data-modal-lg'),
            isxLargeModal = $(this).attr('data-modal-xl'),
            title = $(this).attr('data-title');
        if (!url) {
            console.log('Ajax Modal: Set data-action-url!');
            return false;
        }
        if (title) {
            $("#ajaxModalTitle").html(title);
        } else {
            $("#ajaxModalTitle").html($("#ajaxModalTitle").attr('data-title'));
        }

        $("#ajaxModalContent").html($("#ajaxModalOriginalContent").html());
        $("#ajaxModalContent").find(".original-modal-body").removeClass("original-modal-body").addClass("modal-body");
        //$("#ajaxModal").modal('show');
        var ajaxModal = new bootstrap.Modal(document.getElementById('ajaxModal'), {
  keyboard: false
});
ajaxModal.show();

        $(this).each(function() {
            $.each(this.attributes, function() {
                if (this.specified && this.name.match("^data-post-")) {
                    var dataName = this.name.replace("data-post-", "");
                    data[dataName] = this.value;
                }
            });
        });
        ajaxModalXhr = $.ajax({
            url: url,
            data: data,
            cache: false,
            type: 'GET',
            success: function(response) {
                $("#ajaxModal").find(".modal-dialog").removeClass("mini-modal");
                if (isLargeModal === "1") {
                    $("#ajaxModal").find(".modal-dialog").addClass("modal-lg");
                }
                if (isxLargeModal === "1") {
                    $("#ajaxModal").find(".modal-dialog").addClass("modal-xl");
                }
                $("#ajaxModalContent").html(response);

                var $scroll = $("#ajaxModalContent").find(".modal-body"),
                    height = $scroll.height(),
                    maxHeight = $(window).height() - 200;
                if (height > maxHeight) {
                    height = maxHeight;
                    /* if ($.fn.mCustomScrollbar) {
                         $scroll.mCustomScrollbar({setHeight: height, theme: "minimal-dark", autoExpandScrollbar: true});
                     }*/
                }
            },
            statusCode: {
                404: function() {
                    $("#ajaxModalContent").find('.modal-body').html("404: Page not found.");
                    Swal.fire({
                        icon: 'error',
                        title: '404: Page not found.',
                        text: 'Something went wrong!',

                    });

                }
            },
            error: function() {
                $("#ajaxModalContent").find('.modal-body').html("");
                Swal.fire({
                    icon: 'error',
                    title: '500: Internal Server Error.',
                    text: 'Something went wrong!',

                });
            }
        });
        return false;
    });
</script>
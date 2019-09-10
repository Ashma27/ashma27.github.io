var Event = function () {
    this.__construct = function () {
        this.submitForm();
        this.submitFormCol();
        this.addCategory();
        this.addImageForm();
        this.commonForm();
        this.delete();
        this.changeOrderStatus();
        this.orderWrapper();
        this.filterOrder();
        this.changeOrderProductStatus();
        this.getProduct();
        this.filterProductByCategory();
        this.filterProductBySubCategory();
        this.getSubCategory();
        this.updateFit();
        this.cancel();
    };

    this.submitForm = function () {
        $("#login-form,#change-password").submit(function (evt) {
            evt.preventDefault();
            var url = $(this).attr("action");
            var postdata = $(this).serialize();
            var form = $(this)[0];
            $.post(url, postdata, function (out) {
                $(".form-group > .error").remove();
                if (out.result === 0) {
                    for (var i in out.errors) {
                        $("#" + i).parents(".form-group").append('<span class="error">' + out.errors[i] + '</span>');
                        $("#" + i).focus();
                    }
                }
                if (out.result === -1) {
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-danger alert-dismissable').show();
                    $("#error_msg").html(message + out.msg);
                }
                if (out.result === 1) {
                    form.reset();
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-success alert-dismissable').show();
                    $("#error_msg").html(message + out.msg);
                    window.setTimeout(function () {
                        $('#error_msg').slideUp();
                        if (out.url) {
                            window.location.href = out.url;
                        }
                    }, 2000);
                }
            });
        });
    };

    this.submitFormCol = function () {
        $("#add-subcategory,#add-product,#add-stock,#add-coupon,#add-faq").submit(function (evt) {
            evt.preventDefault();
            var url = $(this).attr("action");
            var postdata = $(this).serialize();
            var form = $(this)[0];
            $.post(url, postdata, function (out) {
                $(".col-md-3 > .error").remove();
                $(".col-md-8 > .error").remove();
                if (out.result === 0) {
                    for (var i in out.errors) {
                        $("#" + i).parents(".col-md-3").append('<span class="error">' + out.errors[i] + '</span>');
                        $("#" + i).parents(".col-md-8").append('<span class="error">' + out.errors[i] + '</span>');
                        $("#" + i).focus();
                    }
                }
                if (out.result === -1) {
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-danger alert-dismissable').show();
                    $("#error_msg").html(message + out.msg);
                }
                if (out.result === 1) {
                    form.reset();
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-success alert-dismissable').show();
                    $("#error_msg").html(message + out.msg);
                    window.setTimeout(function () {
                        $('#error_msg').slideUp();
                        if (out.url) {
                            window.location.href = out.url;
                        }
                    }, 2000);
                }
            });
        });
    };

    this.addCategory = function () {
        $(document).ready(function () {
            $('#add-category').on('submit', function (evt) {
                $(".loader").show();
                evt.preventDefault();
                var form = $(this)[0];
                $.ajax({
                    url: $(this).attr("action"),
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (out) {
                        $(".loader").fadeOut("slow");
                        $(".col-md-8 > .error").remove();
                        $(".col-md-3 > .error").remove();
                        if (out.result === 0) {
                            for (var i in out.errors) {
                                $("#" + i).parents(".col-md-3").append('<span class="error">' + out.errors[i] + '</span>');
                                $("#" + i).parents(".col-md-8").append('<span class="error">' + out.errors[i] + '</span>');
                                $("#" + i).focus();
                            }
                        }
                        if (out.result === -1) {
                            var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                            $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-danger alert-dismissable').show();
                            $("#error_msg").html(message + out.msg);
                        }
                        if (out.result === 1) {
                            form.reset();
                            var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                            $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-success alert-dismissable').show();
                            $("#error_msg").html(message + out.msg);
                            window.setTimeout(function () {
                                $('#error_msg').slideUp();
                                if (out.url) {
                                    window.location.href = out.url;
                                }
                            }, 2000);
                        }
                        if (out.result === -2) {
                            for (var i in out.errors) {
                                $("#" + i).parents(".col-md-3").append('<span class="error">' + out.errors[i] + '</span>');
                                $("#" + i).focus();
                            }
                        }
                    }
                });
            });
        });
    };

    this.addImageForm = function () {
        $("#add-list-image,#add-main-image,#size_guide").submit(function (evt) {
            evt.preventDefault();
            $(".loader").fadeIn("slow");
            $.ajax({
                url: $(this).attr("action"),
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success: function (out) {
                    $(".loader").fadeOut("slow");
                    if (out.result === 0) {
                        var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                        $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-danger alert-dismissable').show();
                        $("#error_msg").html(message + out.msg);
                    }
                    if (out.result === 1) {
                        window.location.href = out.url;
                    }
                }
            });
        });
    };

    this.commonForm = function () {
        $("#common").submit(function (evt) {
            evt.preventDefault();
            var url = $(this).attr("action");
            var postdata = $(this).serialize();
            $.post(url, postdata, function (out) {
                $(".col-md-10 > .error").remove();
                if (out.result === 0) {
                    for (var i in out.errors) {
                        $("#" + i).parents(".form-group").append('<span class="error">' + out.errors[i] + '</span>');
                        $("#" + i).focus();
                    }
                }
                if (out.result === -1) {
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-success alert-dismissable').show();
                    $("#error_msg").html(message + out.msg);
                }
                if (out.result === 1) {
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-success alert-dismissable').show();
                    $("#error_msg").html(message + out.msg);
                    window.setTimeout(function () {
                        $('#error_msg').slideUp();
                    }, 2000);
                }
            });
        });
    };

    this.delete = function () {
        $(document).on('click', '.delete', function (evt) {
            evt.preventDefault();
            var url = $(this).attr('href');
            if (confirm('Are you sure you want to Delete?')) {
                $.post(url, '', function (out) {
                    if (out.result === 1) {
                        window.location.href = out.url;
                    } else if (out.result === -1) {
                        var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                        $("#error_msg").removeClass('alert-danger').addClass('alert-success').show();
                        $("#error_msg").html(message + out.msg);
                    }
                });
            }

        });
    };

    this.changeOrderStatus = function () {
        $(document).on('change', '.change-order-status', function () {
            var url = $(this).attr('action');
            var postdata = $(this).serialize();
            $.post(url, postdata, function (out) {
                if (out.result === 1) {
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-success alert-dismissable').show();
                    $("#error_msg").html(message + out.msg);
                    window.setTimeout(function () {
                        $('#error_msg').slideUp();
                        if (out.url) {
                            location.reload();
                        }
                    }, 2000);
                }
            });
        });
    };

    this.orderWrapper = function () {
        $(document).ready(function () {
            var url = $('#order-wrapper').data('url');
            $.post(url, '', function (out) {
                $('#order-wrapper').html(out.order_list);
            });
        });
    };

    this.filterOrder = function () {
        $('#order-type').change(function () {
            var val = $(this).val();
            var url = $(this).data('url');
            $.post(url, {order_type: val}, function (out) {
                $('#order-wrapper').html(out.order_list);
            });
        });
    };

    this.changeOrderProductStatus = function () {
        $(document).on('change', '.change-order-product-status', function () {
            var url = $(this).attr('action');
            var postdata = $(this).serialize();
            $.post(url, postdata, function (out) {
                if (out.result === 1) {
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-success alert-dismissable').show();
                    $("#error_msg").html(message + out.msg);
                    window.setTimeout(function () {
                        $('#error_msg').slideUp();
                        if (out.url) {
                            window.location.href = out.url;
                        }
                    }, 2000);
                }
            });
        });
    };

    this.getProduct = function () {
        $(document).ready(function () {
            var url = $('#product-wrapper').data('url');
            $.post(url, '', function (out) {
                $('#product-wrapper').html(out.product_list);
                $('#product-list').DataTable({
                    responsive: true,
                    destroy: true
                });
            });
        });
    };

    this.filterProductByCategory = function () {
        $('#cat_id').change(function () {
            var url = $(this).data('url');
            var value = $(this).val();
            $('#sub_cat_id').html('<option value="">--Select Sub Category--</option>');
            $.post(url, {category_id: value}, function (out) {
                $('#product-wrapper').html(out.product_list);
                $('#product-list').DataTable({
                    responsive: true,
                    destroy: true
                });
                var html = '<option value="">--Select Sub Category--</option>';
                for (var i in out.sub_category) {
                    html += "<option value='" + i + "'>" + out.sub_category[i] + "</option>";
                }
                $('#sub_cat_id').html(html);
            });
        });
    };

    this.filterProductBySubCategory = function () {
        $(document).on('change', '#sub_cat_id', function () {
            var url = $('#cat_id').data('url');
            var category_id = $('#cat_id').val();
            var sub_category_id = $(this).val();
            $.post(url, {sub_category_id: sub_category_id, category_id: category_id}, function (out) {
                $('#product-wrapper').html(out.product_list);
                $('#product-list').DataTable({
                    responsive: true,
                    destroy: true
                });
            });
        });
    };

    this.getSubCategory = function () {
        $('#category_id').change(function () {
            var id = $(this).val();
            var url = $(this).data('url');
            $.post(url, {category_id: id}, function (out) {
                var html = '<option value="">--Select Sub Category--</option>';
                for (var i in out.sub_category) {
                    html += "<option value='" + i + "'>" + out.sub_category[i] + "</option>";
                }
                $('#sub_category_id').html(html);
            });
        });
    };

    this.updateFit = function () {
        $('#add-fit').submit(function (evt) {
            evt.preventDefault();
            var url = $(this).attr("action");
            var postdata = $(this).serialize();
            var form = $(this)[0];
            $.post(url, postdata, function (out) {
                $(".col-md-4 > .error").remove();
                if (out.result === 0) {
                    for (var i in out.errors) {
                        $("#" + i).parents(".col-md-4").append('<span class="error">' + out.errors[i] + '</span>');
                        $("#" + i).focus();
                    }
                }
                if (out.result === -1) {
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-danger alert-dismissable').show();
                    $("#error_msg").html(message + out.msg);
                }
                if (out.result === 1) {
                    form.reset();
                    var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $("#error_msg").removeClass('alert-warning alert-success').addClass('alert alert-success alert-dismissable').show();
                    $("#error_msg").html(message + out.msg);
                    window.setTimeout(function () {
                        $('#error_msg').slideUp();
                        location.reload();
                    }, 2000);

                }
            });
        });
    };
    
    this.cancel=function(){
        $(document).on('click', '.cancel', function (evt) {
            evt.preventDefault();
            var url = $(this).attr('href');
            if (confirm('Are you sure you want to Cancel this order?')) {
                $.post(url, '', function (out) {
                    if (out.result === 1) {
                        location.reload();
                    } else if (out.result === -1) {
                        var message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                        $("#error_msg").removeClass('alert-danger').addClass('alert-success').show();
                        $("#error_msg").html(message + out.msg);
                    }
                });
            }

        });
    };

    this.__construct();
};
var obj = new Event();

<?php
    $dirs = array_filter(glob('uploads/*'), 'is_dir');
    if(count($dirs)==0)
    {
        ?>
        <div class="card text-center bg-dark">
            <div class="card-body">
                <h5 class="text-white">Please Add New Class</h5>
            </div>
        </div>
        <?php
    }
    else
    {
        ?>
        <link href="template/Template/Admin/dist/assets/css/lightgallery.css" rel="stylesheet">
        <link href="template/Template/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <div class="col-lg-12">
            <?php
                foreach($dirs as $dir)
                {
                    $link_array = explode('/',$dir);
                    ?>
                        <div class="card">
                            <div class="card-header bg-dark py-3 text-white">
                                <div class="card-widgets">
                                    <a data-toggle="collapse" class="collapsed" href="#card_<?=array_search($dir,$dirs)?>" role="button" aria-expanded="false" aria-controls="card_<?=array_search($dir,$dirs)?>"><i class="mdi mdi-minus"></i></a>
                                    <a href="#" data-toggle="remove" data-class_name="<?=end($link_array)?>"><i class="mdi mdi-close"></i></a>
                                </div>
                                    <h5 class="card-title mb-0 text-white class_name" style="display: inline-block;" id="class_name<?=array_search($dir,$dirs)?>" contenteditable="true" ><?=end($link_array)?></h4>
                            </div>
                            <div id="card_<?=array_search($dir,$dirs)?>" class="collapse bg-secondary">
                                <div class="card-body text-white">
                                    <div class="lightgallery" style="width: 250; overflow-x: auto; white-space: nowrap;">
                                        <?php
                                            $files = array_diff(scandir($dir), array('.', '..'));
                                            foreach($files as $file)
                                            {
                                                ?>
                                                <a href="<?=$dir.'/'.$file?>">
                                                    <img src="<?=$dir.'/'.$file?>" width="50" height="50"/>
                                                </a>
                                                <?php
                                            }
                                        
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-->
                    <?php
                }
            ?>     
        </div><!-- end col -->
        
        <!-- Sweet Alerts js -->
		<script src="template/Template/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <!-- Sweet alert init js-->
        <script src="template/Template/Admin/dist/assets/js/pages/sweet-alerts.init.js"></script>

        <script src="template/Template/Admin/dist/assets/js/lightgallery-all.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.lightgallery').lightGallery({
                    thumbnail:true,
                    animateThumb: false,
                    showThumbByDefault: false,
                    share: false,
                    actualSize:false
                });
            });
        </script>
        <script src="template/Template/Admin/dist/assets/libs/jquery.mousewheel.min.js"></script>
        <script>
            $('[data-toggle="remove"]').on("click", function(e) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#6658dd',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm',
                    allowOutsideClick: false,
                    backdrop:'#eeeff3',
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.success) {
                        $.ajax({
                        type: "POST",
                        dataType : 'json',
                        url: "class_remove.php",
                        data: { 
                            name: $(this).attr('data-class_name'),
                        },
                        success: function(result) {
                            Swal.fire({
                                title: 'Success',
                                text: result.Result,
                                type: 'success',
                                confirmButtonColor: '#6658dd',
                                backdrop: '#eeeff3',
                                allowOutsideClick: false,
                                }).then(function(){
                                    location.reload();
                            });                            
                        },
                        error: function(result) {
                            console.log(result);
                            console.clear();
                        }
                        });
                    } 
                    else if (result.dismiss === Swal.DismissReason.cancel) {
                        $("#class_list").load("class_list.php");
                    }
                })
            });

            $( ".class_name" ) .focusout(function(event) {
                var class_data = $( this ).siblings().find('a').eq(1);
                if(class_data.attr('data-class_name')!=event.target.textContent)
                {
                    $.ajax({
                        type: "POST",
                        dataType : 'json',
                        url: "check_duplicate_class.php",
                        data: { 
                            name: event.target.textContent,
                        },
                        success: function(result) {
                            if(result.Status==true)
                            {
                                Swal.fire({
                                    title: 'Failure',
                                    text: result.Result,
                                    type: 'error',
                                    backdrop:'#eeeff3',
                                    showConfirmButton: true,
                                    confirmButtonColor: '#6658dd',
                                    allowOutsideClick: false,
                                }).then(function(){
                                    $("#class_list").load("class_list.php");
                                });
                            }
                            else
                            {
                                $.ajax({
                                    type: "POST",
                                    dataType : 'json',
                                    url: "class_rename.php",
                                    data: { 
                                        old_name: class_data.attr('data-class_name'),
                                        new_name: event.target.textContent,
                                    },
                                    success: function(result) {
                                        Swal.fire({
										title: 'Success',
										text: result.Result,
										type: 'success',
										confirmButtonColor: '#6658dd',
										backdrop:'#eeeff3',
										allowOutsideClick: false,
										}).then(function(){
                                            $("#class_list").load("class_list.php");
										});
                                    },
                                    error: function(result) {
                                        console.log(result);
                                        console.clear();
                                    }
                                });
                            }
                        },
                        error: function(result) {
                            console.log(result);
                            console.clear();
                        }
                    });
                }
            });

            (function($, window, document, undefined) {
                'use strict';
                var defaults = {};
                var Delete = function(element) {
                    // You can access all lightgallery variables and functions like this.
                    this.core = $(element).data('lightGallery');
                    this.$el = $(element);
                    this.core.s = $.extend({}, defaults, this.core.s)
                    this.init();
                    return this;
                }
                Delete.prototype.init = function() {
                    var deleteIcon = '<span id="lg-clear" class="lg-icon deletePicture"><i class="mdi mdi-delete"></i></span>';
                    this.core.$outer.find('.lg-toolbar').append(deleteIcon);
                    this.delete();
                };
                Delete.prototype.delete = function() {
                    var that = this;
                    this.core.$outer.find('.deletePicture').on('click', function() {
                        $.ajax({
                            type: "POST",
                            dataType : 'json',
                            url: "image_remove.php",
                            data: { 
                                name: that.core.$outer.find('.lg-inner').children().eq(that.core.index).find("div").eq(1).find("img").attr('src'),
                            },
                            success: function(result) {
                                if(result.Status==true && result.Count==0)$("#class_list").load("class_list.php");
                                else if(result.Status==true )
                                {
                                    var elements;
                                    if (that.core.s.dynamic) {
                                        elements = that.core.s.dynamicEl;
                                    } else {
                                        if (that.core.s.selector === 'this') {
                                            elements = that.core.$el;
                                        } else if (that.core.s.selector !== '') {
                                            if (that.core.s.selectWithin) {
                                                elements = jQuery(that.core.s.selectWithin).find(that.core.s.selector);
                                            } else {
                                                elements = that.core.$el.find(jQuery(that.core.s.selector));
                                            }
                                        } else {
                                            elements = that.core.$el.children();
                                        }
                                    }
                                    that.core.modules.Thumbnail.destroy();
                                    
                                    elements.splice(that.core.index, 1);
                                    if (!that.core.s.dynamic) {
                                        that.core.$el.children()[that.core.index].remove();
                                        that.core.$items.splice(that.core.index, 1);
                                    }
                                    that.core.$slide.splice(that.core.index, 1);
                                    that.core.$outer.find('.lg-inner').children()[that.core.index].remove();
                                    if (elements.length > 0) {
                                        that.core.index--;
                                        that.core.goToNextSlide();
                                        if (that.core.s.counter)
                                            $('#lg-counter-all').text(elements.length);
                                        if (elements.length == 1)
                                            that.core.$outer.find('.lg-actions').remove();
                                        that.core.modules.Thumbnail = new $.fn.lightGallery.modules.Thumbnail(that.core.$el);
                                    } else that.core.destroy();
                                }
                                else if(result.Status==false)
                                {
                                    Swal.fire({
                                        title: 'Failure',
                                        text: result.Result,
                                        type: 'error',
                                        showConfirmButton: false,
                                        timer: 1500,
                                    })
                                }
                            },
                            error: function(result) {
                                console.log(result);
                                console.clear();
                            }
                        });
                    });
                }
                /**
                * Destroy function must be defined.
                * lightgallery will automatically call your module destroy function
                * before destroying the gallery
                */
                Delete.prototype.destroy = function() {
                }

                // Attach your module with lightgallery
                $.fn.lightGallery.modules.delete = Delete;
            })(jQuery, window, document);
        </script>
        <?php
    }
?>